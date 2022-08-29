@extends('users.layouts.master')

@section('title', __('Statistics center'))

@section('content')
<div class="section-no-style">
        <div class="section-title-bold">
            <p>{{ __('Overall stats') }}</p>
        </div>
        <div class="overall-stats">
            <ul class="list">
                <li class="list_item">
                    <p>{{ __('Platform capitalization') }}</p>
                    <span class="text-green">$ 17,343,900.21</span>
                </li>
                <li class="list_item">
                    <p>{{ __('Active investors') }}</p>
                    <span class="text-blue">56,888</span>
                </li>
                <li class="list_item">
                    <p>{{ __('Total R.O.I.') }}</p>
                    <span class="text-green"> 300.20%</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="section-no-style">
        <div class="section-title-bold">
            <p>{{ __('Platform recent activity') }}</p>
        </div>
        <div class="recent-activity">
            <div class="tabs-nav">
                <ul class="tabs">
                    <li class="tab">
                        <a href="javascript:void(0);" class="btn-effect">
                            {{ __('Profit') }} <span></span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="javascript:void(0);" class="btn-effect">
                            {{ __('Trades count') }} <span></span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="javascript:void(0);" class="btn-effect">
                            {{ __('Capitalization') }} <span></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-item">
                    <div class="schedule-content">
                        <canvas id="myChart" width="100%"></canvas>
                    </div>
                </div>
                <div class="tab-item">
                    <canvas id="myChart2" width="100%"></canvas>
                </div>
                <div class="tab-item">
                    <canvas id="chart_capitalization" width="100%"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="section-no-style">
        <div class="section-title-bold">
            <p>{{ __('High-frequency trades') }}</p>
        </div>
        <statistic-center_last-trades inline-template>
            <div class="recent-trades">
                <div class="statistic-table">
                    <div class="statistic-table_body-table">
                        <ul class="list list-title">
                            <li class="list_item exchange-column">
                                <p>{{ __('Exchange') }}</p>
                            </li>
                            <li class="list_item time-column">
                                <p>{{ __('Time') }}</p>
                            </li>
                            <li class="list_item">
                                <p>{{ __('Market') }}</p>
                            </li>
                            <li class="list_item">
                                <p>{{ __('Open price') }}</p>
                            </li>
                            <li class="list_item">
                                <p>{{ __('Volume, USD') }}</p>
                            </li>
                            <li class="list_item">
                                <p>{{ __('Close price') }}</p>
                            </li>
                            <li class="list_item">
                                <p>{{ __('Profit, % from STAKE') }}</p>
                            </li>
                        </ul>
                        <simple-spinner v-if="isLoading" style="padding:20px"></simple-spinner>
                        <template v-if="!isLoading" >
                            <ul class="list" v-for="trade in list" :key="trade.data.exchange+trade.data.open_at">
                                <li class="list_item exchange-column">
                                    <img :src="'/images/exchanges/32x32/'+trade.data.exchange+'.png'" :alt="trade.data.exchange">
                                    <span>{{-- {{ trade.data.exchange.toUpperCase() }} --}}</span>
                                </li>
                                <li class="list_item time-column">
                                    <span>{{-- {{ trade.data.open_at | moment('YYYY-MM-DD HH:mm:ss') }} --}}</span>
                                </li>
                                <li class="list_item">
                                    <strong>{{-- {{ trade.data.pair.toUpperCase() }} --}}</strong>
                                </li>
                                <li class="list_item">
                                    <span>{{-- {{ trade.data.open_price | formatCrypto('') }} --}}</span>
                                </li>
                                <li class="list_item">
                                    <span>{{-- {{ trade.data.volume | formatFiat('') }} --}}</span>
                                </li>
                                <li class="list_item">
                                    <span>{{-- {{ trade.data.close_price | formatCrypto('') }} --}}</span>
                                </li>
                                <li class="list_item">
                                    <span :class="{'text-red':trade.data.profit < 0, 'text-green':trade.data.profit > 0 }">
                                        {{-- {{ trade.data.profit | formatFiat('') }} --}}0%
                                    </span>
                                </li>
                            </ul>
                        </template>
                        

                        
                    </div>
                </div>

                <pagination v-if="!isLoading && list.length > 0" :per-page="pagination.per_page" :total-rows="pagination._total" v-model="pagination.page"></pagination>
            </div>
        </statistic-center_last-trades>
    </div>

@endsection