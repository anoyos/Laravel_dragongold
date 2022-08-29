<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Currency;
class TransactionController extends Controller
{
    public function index(Request $request) {
        $pagination = json_decode($request->query('pagination'), true);
        $filters = json_decode($request->query('filters'), true);
        
        $query = Transaction::latest()->where('user_id', $filters['user'])
                ->where('type', $filters['type']);
        
        if(intval($filters['ps']) !== 0){
            $query = $query->where('currency_id', $filters['ps']);
        }
   
        if(!empty($filters['date_from'])){
            $query = $query->where('created_at' , '>=', $filters['date_from']);
        }
        if(!empty($filters['date_to'])){
            $query = $query->where('created_at' , '<=', $filters['date_to']);
        }
        
        $transactions = $query->paginate($pagination['per_page']);
        
        $data = [];
        
        foreach ($transactions as $transaction){
            $item = [
                'data' => [
                    'id' => $transaction->id,
                    'type' => $transaction->type,
                    'status' => $transaction->status,
                    'created_at' => $transaction->created_at->format('Y-m-d H:i:s'),
                    'expired_at' => $transaction->type === 'withdraw'?$transaction->created_at->add(1, 'day')->format('Y-m-d H:i:s'):null,
                    'amount' => $transaction->amount,
                ],
                'wallet_type' => [
                    'is_fiat' => [
                        'data' => [
                          'value' => $transaction->currency->is_fiat?true:false
                        ],
                    ],
                    'data' => [
                        'name' => $transaction->currency->sname(),
                        'currency' => $transaction->currency->symbol,
                    ],
                ],
            ];
            
            $data[] = $item;
        }
        
        $paginer = [
            'per_page' => $transactions->perPage(),
            'total_pages' => $transactions->lastPage(),
            'total' => $transactions->total(),
            'page' => $transactions->currentPage(),
        ];
        
        $response = [];
        $other = [];

        return ['pagination' => $paginer, 'data' => $data, 'response' => $response, 'other' => $other];
        
    }

}
