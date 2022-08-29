<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;

class TransactionController extends Controller {

    public function index() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/transactions", 'name' => "All Transactions"]
        ];

        $transactions = Transaction::with(['user', 'currency'])->get();

        return view('admin.transactions.index', compact('breadcrumbs', 'transactions'));
    }

    public function detail($transaction_id){
        $transaction = Transaction::with(['currency', 'user', 'withdraw'])->find($transaction_id);
        $title = 'Transaction Detail';
        $type = $transaction->type;

        if($transaction->type == 'deposit' || $transaction->type == 'withdraw'){
            $name = '$transaction->type->reference';
        }else{
            $name = '$transaction->type';
        }

        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/transactions", 'name' => "Transactions"],
            ['link' => "/admin/transactions/detail/$transaction_id", 'name' => $transaction->$name]
        ];

        return view('admin.transactions.detail', compact('breadcrumbs', 'transaction', 'title', 'type', 'name'));
    }

    public function type(Request $request, $type){
        $title = ucfirst($type) . ' Transactions';
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/deposits", 'name' => "Transactions"],
            ['link' => "/admin/deposits/$type", 'name' => $title]
        ];
        
        $transactions = Transaction::with(['currency', 'user'])->where('type', $type)->get();

        return view('admin.transactions.type', compact('breadcrumbs', 'transactions', 'title', 'type'));
    }

}
