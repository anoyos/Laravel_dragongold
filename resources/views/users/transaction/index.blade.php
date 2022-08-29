@extends('users.layouts.master')

@section('title',__('Transactions'))

@section('content')
<transactions-history inline-template>
	<div class="wrap-transactions">
		<div class="filter-transactions">
			<a href="javascript:void(0);" class="btn-filter">
				<span class="open-text">{{ __('Filter') }}</span>
				<span class="closed-text">{{ __('Close filter') }}</span>
			</a>
			<div class="filter-form">
				<div class="form-content">
					<div class="form-content_box">
						<label for="operation">{{ __('Operation') }}</label>
						<select id="operation" v-model="filters.type"
						name="type" v-validate="'required'"
						:class="{invalid:vee_errors.first('type')}">
                                                    <option value="deposit">{{ __('Deposit') }}</option>
                                                    <option value="withdraw">{{ __('Withdrawal') }}</option>
                                                    <option value="credit">{{ __('Crediting') }}</option>
                                                    <option value="referral">{{ __('Referral bonus') }}</option>
                                                    <option value="leadership">{{ __('Leadership bonus') }}</option>
                                                </select>
                                                <span class="arrow-select"><i class="icon-down"></i></span>
                                        </div>
				<div class="form-content_box">
					<label for="payment_system">{{ __('Payment system') }}</label>
					<select id="payment_system" v-model="filters.ps" :disabled="filter_ps_is_disabled"
                                            name="ps" v-validate="'required'"
                                            :class="{invalid:vee_errors.first('ps')}">
                                            <option value="0" selected>{{ __('All') }}</option>
                                            @foreach($currencies as $currency)
                                            <option value="{{$currency->id}}">{{$currency->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="arrow-select"><i class="icon-down"></i></span>
                                </div>
			<div class="form-content_box">
				<label for="date-from">{{ __('From') }}</label>
				<input type="text" class="tcal tcalInput" id="date-from" name="date_from"
				:class="{invalid:vee_errors.first('date_from')}" :disabled="filter_dates_is_disabled"
				v-model="filters.date_from" @change="dateChanged('date_from', $event)">
			</div>
			<div class="form-content_box">
				<label for="date-to">{{ __('Till') }}</label>
				<input type="text" class="tcal tcalInput" id="date-to" name="date_to"
				:class="{invalid:vee_errors.first('date_to')}" :disabled="filter_dates_is_disabled"
				v-model="filters.date_to" @change="dateChanged('date_to', $event)">
			</div>
		</div>
		<div class="form-btn">
			<button class="btn-effect btn-green" @click="applyFilters" :disabled="isLoading">
				<simple-spinner v-if="isLoading" class="simple-spinner"></simple-spinner>
				{{ __('Show') }} <span></span>
			</button>
		</div>
	</div>
</div>
<div class="section">
	<div class="section-title">
		<p>
			{{ __('Transactions list') }}
                        <template v-if="filters.date_from">
				{{ __('from') }} @php echo '{{ filters.date_from }}' @endphp
			</template>
			<template v-if="filters.date_to">
				{{ __('till') }} @php echo ' {{ filters.date_to }}' @endphp
			</template>
		</p>
	</div>

	<simple-spinner v-if="isLoading"></simple-spinner>

	<template v-if="!isLoading">
		<div class="table-transactions" v-if="list.length === 0">
			<ul class="list" style="border: none">
				<li class="list_item" style="max-width: 100%">
				{{ __('No data ') }} </li>
			</ul>
		</div>

		<div class="table-transactions" v-if="list.length > 0">
			<ul class="list list-title">
				<li class="list_item">
					<p>{{ __('Date') }}</p>
				</li>
				<li class="list_item">
					<p>{{ __('Type') }}</p>
				</li>
				<li class="list_item">
					<p>{{ __('Amount') }}</p>
				</li>
				<li class="list_item">
					<p>{{ __('Status') }}</p>
				</li>
			</ul>
			<ul class="list" v-for="(item, index) in list" :key="'transaction'+index">
				<li class="list_item">
					<p class="title-mobile">{{ __('Date') }}</p>
					<div class="box-pay"
                                            v-for="wt_info, wt_info_key in {{$json}}"
                                            v-if="wt_info_key === item.wallet_type.data.name">
                                            <span v-html="wt_info.icon"></span>
                                            <p class="title-pay">@php echo " {{ wt_info.name }} " @endphp</p>
                                            <p>@php echo "{{ item.data.created_at | moment('YYYY-MM-DD HH:mm') }}" @endphp</p>
                                        </div>
                                </li>
			<li class="list_item">
				<p class="title-mobile">{{ __('Type') }}</p>
				<p>
					<template v-if="item.data.type === 'deposit'">{{ __('Deposit') }}</template>
					<template v-if="item.data.type === 'withdraw'">{{ __('Withdrawal') }}</template>
					<template v-if="item.data.type === 'credit'">{{ __('Crediting') }}</template>
					<template v-if="item.data.type === 'referral'">{{ __('Referral bonus') }}</template>
					<template v-if="item.data.type === 'leadership'">{{ __('Leadership bonus') }}</template>
				</p>
			</li>
			<li class="list_item">
				<p class="title-mobile">{{ __('Amount') }}</p>
				<p :class="[typeColorClass(item)]" v-if="item.wallet_type.is_fiat.data.value">
					@php echo "{{ item.data.type === 'withdraw' ? '-' : '+' }}{{ item.data.amount | formatFiat }}" @endphp
				</p>
				<p :class="[typeColorClass(item)]" v-if="!item.wallet_type.is_fiat.data.value">
					@php echo " {{ item.data.type === 'withdraw' ? '-' : '+' }}{{ item.data.amount | formatCrypto(item.wallet_type.data.currency.toUpperCase()) }} " @endphp
				</p>
			</li>
			<li class="list_item">
				<p class="title-mobile">{{ __('Status') }}</p>
				<p v-if="item.data.type === 'withdraw' && item.data.status !== 'active'">
					<countdown class="payment_payout_countdown text-red"
					@end="countdownEnd(item)"
					:time="countdownTime(item)"
					:transform="countdownTransform">
					<template slot-scope="props">@php echo '{{ props.hours }}:{{ props.minutes }}:{{ props.seconds }} ' @endphp</template>
                                        </countdown>
                                </p>
                            <p class="text-green" v-if="item.data.status === 'active'">{{ __('Successful') }}</p>
                            <p class="text-blue" v-if="item.data.status === 'pending'">{{ __('Pending') }}</p>
                            <p class="text-red" v-if="item.data.status === 'canceled'">{{ __('Canceled') }}</p>
                        </li>
	</ul>
</div>


<pagination v-if="list.length > 0" :per-page="pagination.per_page" :total-rows="pagination._total" v-model="pagination.page"></pagination>
</template>
</div>
</div>
</transactions-history>
@endsection