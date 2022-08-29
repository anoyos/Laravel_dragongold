<?php

use App\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = array(
         array('name' => 'Bitcoin', 'symbol' => 'BTC', 'status' => 1, 'is_fiat' => 0, 'color' => 'orange', 'min' => 0.0005, 'max' => 5),
         array('name' => 'Ethereum', 'symbol' => 'ETH', 'status' => 1, 'is_fiat' => 0,'color' => 'violet', 'min' => 0.0005, 'max' => 5),
         array('name' => 'Litecoin', 'symbol' => 'LTC', 'status' => 1, 'is_fiat' => 0,'color' => 'gray', 'min' => 0.0005, 'max' => 5),
         array('name' => 'Tron', 'symbol' => 'TRX', 'status' => 1, 'is_fiat' => 0,'color' => 'red', 'min' => 0.0005, 'max' => 5),
         array('name' => 'Ripple', 'symbol' => 'XRP', 'status' => 1, 'is_fiat' => 0,'color' => '', 'min' => 0.0005, 'max' => 5),
         array('name' => 'EOS', 'symbol' => 'EOS', 'status' => 1, 'is_fiat' => 0,'color' => '', 'min' => 0.0005, 'max' => 5),
         array('name' => 'Ethereum Classic', 'symbol' => 'ETC', 'status' => 1, 'is_fiat' => 0,'color' => '', 'min' => 0.0005, 'max' => 5),
         array('name' => 'Bitcoin Cash', 'symbol' => 'BCH', 'status' => 1, 'is_fiat' => 0,'color' => 'green', 'min' => 0.0005, 'max' => 5),
         array('name' => 'Bitcoin Gold', 'symbol' => 'BTG', 'status' => 1, 'is_fiat' => 0,'color' => '', 'min' => 0.0005, 'max' => 5),
         array('name' => 'ZCash', 'symbol' => 'ZEC', 'status' => 1, 'is_fiat' => 0,'color' => '', 'min' => 0.0005, 'max' => 5),
         array('name' => 'Dash', 'symbol' => 'DASH', 'status' => 1, 'is_fiat' => 0,'color' => '', 'min' => 0.0005, 'max' => 5),
      );
        
        foreach($currencies as $curr){
            DB::table('currencies')->insert($curr);
        }

    }
}
