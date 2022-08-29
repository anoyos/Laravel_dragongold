<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use Auth;
use App\User;
use App\Currency;
use App\Transaction;
class DepositController extends Controller
{

    public function __construct() {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balances = Balance::where('user_id', Auth::id())->with('currency')->get();
        $transactions = Transaction::latest()
                ->where([['status', 'active'],['type','deposit'],['user_id', Auth::id()]])
                ->with(['currency', 'deposit'])->limit(20)->get();
        
        return view('users.deposit.index', compact('balances','transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = [];
        $currency = Currency::all();
        $balances = [];
        foreach (Auth::user()->balances as $bal){
            $balances[$bal->currency_id] = $bal->amount;
        }
        
        foreach ($currency as $curr){
            $data = [
                'id' => $curr->id,
                'name' => $curr->sname(),
                'deposit' => true,
                'currency' => $curr->is_fiat?'usd':$curr->symbol,
                'is_fiat' => $curr->is_fiat?true:false,
                'additional_field' => null,
            ];
            
            $limits = [
                'invest' => ['min' => $curr->min, 'max' => $curr->max],
                'reinvest' => ['min' => $curr->min, 'max' => $curr->max],
            ];
            $meta = [
                'exchange' => $curr->usdrate,
                'balance' => $balances[$curr->id]
            ];
            
            $color = $curr->color ? ' icon-' . $curr->color : '';
            $bg = '';
            if($curr->symbol === 'EOS') $bg = ' style="background-color:#000;"';
            if($curr->symbol === 'TRX') $bg = ' style="background-color:#c53127;"';
            
            $item = [
                'label' => '<span class="icon' . $color . '"'.$bg .'><img src="'. asset('user_assets/images/currency/'. $curr->sname(). '.png') 
                    . '" alt="' . $curr->code() . '"></span><p>' . $curr->name . '</p>',
                'value' => [
                    'data' => $data,
                    'limits' => $limits,
                    'meta' => $meta,
                ],
            ];
            
            $response[] = $item;
        }
        
        
        $json = json_encode($response);
//        return $json;
        return view('users.deposit.create', compact('json'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
