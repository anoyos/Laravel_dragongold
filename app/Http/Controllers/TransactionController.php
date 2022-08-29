<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
class TransactionController extends Controller
{
    public function index() {
        $currencies = Currency::all();
        
        $json = [];
        
        foreach($currencies as $curr){
            
            $color = $curr->color ? ' icon-' . $curr->color : '';
            $bg = '';
            if($curr->symbol === 'EOS') $bg = ' style="background-color:#000;"';
            if($curr->symbol === 'TRX') $bg = ' style="background-color:#c53127;"';
            
            $json[$curr->sname()] = [
                'icon' => '<span class="icon' . $color . '"'.$bg .'><img src="'. asset('user_assets/images/currency/'. $curr->sname(). '.png') 
                    . '" alt="' . $curr->code() . '"></span>',
                'name' => $curr->name,
                'is_fiat' => $curr->is_fiat?true:false,
                'currency' => $curr->is_fiat?'usd':$curr->code(),
            ];
        }
        $json = json_encode($json);
        
        
        
        return view('users.transaction.index', compact('currencies', 'json'));
    }
}
