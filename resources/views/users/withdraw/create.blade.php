@extends('users.layouts.master')

@section('title',__('Withdraw funds'))
@section('content')


<withdraw-new inline-template v-cloak>
        <div>
            <div class="section" id="withdraw_confirmation" v-if="selectedPS && step === 'confirm'">
                <div class="section-title">
                    <p>{{ __('Confirm transaction') }}</p>
                </div>
                <form action="#" class="form-confirmation" @submit.prevent="createWithdraw"  data-vv-scope="confirmation">
                    <div class="form-confirmation_info-table">
                        <ul class="list">
                            <li class="list_item">
                                <p class="title-text">{{ __('Date') }}</p>
                            </li>
                            <li class="list_item">
                                 <p>@php echo ' {{ $moment().format(`YYYY-MM-DD / HH:mm`) }} ' @endphp</p> 
                            </li>
                        </ul>
                        <ul class="list">
                            <li class="list_item">
                                <p class="title-text">{{ __('Payment system') }}</p>
                            </li>
                             <li class="list_item">
                                <p>@php echo " {{ selectedPS.meta.info.name }} "@endphp</p>
                            </li>
                        </ul>
                        <ul class="list">
                            <li class="list_item">
                                <p class="title-text">{{ __('Amount') }}</p>
                            </li>
                            <li class="list_item">
                                <p class="text-bold" v-if="selectedPS.data.is_fiat">@php echo " {{ form.amount | formatFiat }} "@endphp</p>
                                <p class="text-bold" v-if="!selectedPS.data.is_fiat">@php echo " {{ form.amount | formatCrypto(selectedPS.data.currency.toUpperCase()) }} "@endphp</p>
                            </li>
                        </ul>
                        <ul class="list">
                            <li class="list_item">
                                <p class="title-text">{{ __('Wallet address') }}</p>
                            </li>
                            <li class="list_item">
                                <p>@php echo " {{ selectedPS.meta.wallet }} "@endphp</p>
                            </li>
                        </ul>
                        <ul class="list" v-if="selectedPS.data.additional_field && form.additional_field.trim() !== ''">
                            <li class="list_item">
                                <p class="title-text">@php echo " {{ selectedPS.data.additional_field.name }} "@endphp</p>
                            </li>
                            <li class="list_item">
                                <p>@php echo " {{ form.additional_field.trim() }} "@endphp</p>
                            </li>
                        </ul>
                    </div>
                    <div class="invalid" v-if="vee_errors.any('confirmation')">
                        <p v-for="error in vee_errors.all('confirmation')">@php echo " {{ error }} "@endphp</p>
                    </div>
                    <p class="invalid" v-if="responseError !== undefined">@php echo " {{ responseError.message }} "@endphp</p>
                    <div class="box-pin">
                        <div class="box-pin_title">
                            <p>{{ __('Enter secret PIN') }}</p>
                        </div>
                        <div class="pin-field">
                            <input type="password" style="display: none" :value="form.pin" name="pin" v-validate="'required|length:4'">
                            <div class="box-mask" :class="{wrong:vee_errors.first('confirmation.pin')}">
                                <span class="num-one" :class="{active:form.pin.length >= 1}"></span>
                                <span class="num-two" :class="{active:form.pin.length >= 2}"></span>
                                <span class="num-three" :class="{active:form.pin.length >= 3}"></span>
                                <span class="num-for" :class="{active:form.pin.length >= 4}"></span>
                            </div>
                        </div>
                        <digits-keyboard @input="keyPressed"></digits-keyboard>
                        <div class="box-link">
                            <a href="{{route('support')}}">{{ __('I forgot my PIN') }}</a>
                        </div>
                    </div>
                    <div class="box-btn">
                        <a href="" class="btn-effect" @click.prevent="toForm">{{ __('Back') }} <span></span></a>
                        <button type="submit" class="btn-effect btn-green" :disabled="isSubmit">
                            <simple-spinner v-if="isSubmit" class="simple-spinner"></simple-spinner>
                            {{ __('Withdraw funds') }} <span></span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="section withdrawal-funds">
                <form action="#" class="form-new-deposit" @submit.prevent="confirmForm" data-vv-scope="withdraw_create">
                    <div class="currency" v-if="step !== 'confirm'">
                        <div class="section-title">
                            <p>{{ __('Select payment system') }}</p>
                        </div>
                        <div class="base-currency">
                            
                            <payment-system-select :options="{{ $json }}" v-model="selectedPS"></payment-system-select>

                            <ul class="list" v-if="selectedPS && form.type == 'withdraw'">
                                <li class="list_item" v-if="selectedPS.meta.exchange">
                                    <p class="title-text">{{ __('Exchange rate') }} @php echo " {{ selectedPS.data.currency.toUpperCase() }} "@endphp</p>
                                    <p class="text-big">@php echo "{{ selectedPS.meta.exchange | formatFiat }} "@endphp</p>
                                </li>
                                <li class="list_item">
                                    <p class="title-text">{{ __('Minimum withdrawal') }}</p>
                                    <p class="text-big" v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.limits.withdraw.min | formatFiat }} "@endphp</p>
                                    <p class="text-big" v-if="!selectedPS.data.is_fiat">
                                        @php echo " {{ selectedPS.limits.withdraw.min | formatCrypto(selectedPS.data.currency.toUpperCase()) }} "@endphp
                                    </p>
                                </li>
                            </ul>
                            <ul class="list justify-content-end" v-if="selectedPS && form.type == 'reinvest'">
                                <li class="list_item">
                                    <p class="title-text">{{ __('Minimum reinvest') }}</p>
                                    <p class="text-big" v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.limits.reinvest.min | formatFiat }} "@endphp</p>
                                    <p class="text-big" v-if="!selectedPS.data.is_fiat">
                                        @php echo " {{ selectedPS.limits.reinvest.min | formatCrypto(selectedPS.data.currency.toUpperCase()) }} "@endphp
                                    </p>
                                </li>
                                <li class="list_item">
                                    <p class="title-text">{{ __('Maximum reinvest') }}</p>
                                    <p class="text-big" v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.limits.reinvest.max | formatFiat }} "@endphp</p>
                                    <p class="text-big" v-if="!selectedPS.data.is_fiat">
                                        @php echo " {{ selectedPS.limits.reinvest.max | formatCrypto(selectedPS.data.currency.toUpperCase()) }} "@endphp
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <template v-if="selectedPS && step !== 'confirm'">
                        <div class="payment-options">
                            <div class="section-title">
                                <p>{{ __('Actions') }}</p>
                            </div>
                            <div class="radio-group">
                                <div class="radio-box">
                                    <input type="radio" class="radio check-withdrawal" name="options-radio" id="g-r-1" value="withdraw" v-model="form.type">
                                    <label for="g-r-1">
                                        {{ __('withdraw funds') }}  <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="@lang('You can withdraw funds from your account to your personal account.')"></i>
                                    </label>
                                </div>
                                <div class="radio-box">
                                    <input type="radio" class="radio check-rein" name="options-radio" id="g-r-2" value="reinvest" v-model="form.type">
                                    <label for="g-r-2">
                                        {{ __('make a reinvest from the balance') }} <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="@lang('You can reinvest funds from your current balance to your increase profit growth.')"></i>
                                    </label>
                                    <p class="is-available" v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.meta.balance | formatFiat }} "@endphp</p>
                                    <p class="is-available" v-if="!selectedPS.data.is_fiat">@php echo " {{ selectedPS.meta.balance | formatCrypto(selectedPS.data.currency.toUpperCase()) }} "@endphp</p>
                                </div>
                                <div class="radio-box">
                                    <input type="radio" class="radio check-withdrawal-coupon" name="options-radio" id="g-r-3" value="coupon" v-model="form.type" disabled>
                                    <label for="g-r-3">
                                        {{ __('generate a coupon') }}                                        <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="@lang('You can create a coupon for an amount not exceeding your current balance for onward transfer to your partners or friends. Funds will be deducted from your balance.')"></i>
                                    </label>
                                    <p class="is-available" v-if="selectedPS.data.is_fiat">@lang('available') @php echo " {{ selectedPS.meta.balance | formatFiat }} "@endphp</p>
                                    <p class="is-available" v-if="!selectedPS.data.is_fiat">@lang('available') @php echo " {{ selectedPS.meta.balance | formatCrypto(selectedPS.data.currency.toUpperCase()) }} "@endphp</p>
                                </div>
                            </div>
                        </div>
                        <div class="withdrawal-sun active" v-if="form.type === 'withdraw'">
                            <div class="withdrawal-box">
                                <div class="wallet-address">
                                    <div class="section-title">
                                        <p>{{ __('Wallet') }} @php echo " {{ selectedPS.meta.info.name }} "@endphp</p>
                                    </div>
                                    <div class="wallet-address_content">
                                        <div class="box-wallet-address">
                                            <input type="text" readonly
                                                   :value="selectedPS.meta.wallet"
                                                   :placeholder="selectedPS.meta.wallet === null ? `@lang('No data')` : ''"
                                                   name="wallet"
                                                   v-validate="`required`"
                                                   :class="{invalid:vee_errors.first('withdraw_create.wallet')}">

                                            <p v-if="selectedPS.data.additional_field && !isAdditionalFieldInputVisible"
                                               class="info-label" style="margin-top: 20px; z-index: 4;position: relative">
                                                <a href="" @click.prevent="isAdditionalFieldInputVisible=true">{{ __('Add') }} @php echo " {{ selectedPS.data.additional_field.name.toUpperCase() }} "@endphp</a>
                                            </p>
                                        </div>
                                        <div class="box-information">
                                            <div class="box-text">
                                                <span class="icon">
                                                    <i class="icon-cog"></i>
                                                </span>
                                                <a href="{{ route('settings') }}" class="btn-wallet-address">{{ __('Edit payment details') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div v-if="isAdditionalFieldInputVisible" style="margin-top: 10px;">
                                        <div class="section-title">
                                            <p>@php echo " {{ selectedPS.data.additional_field.name }} "@endphp</p>
                                        </div>
                                        <div class="withdrawal-box_content">
                                            <div class="box-field">
                                                <input type="text" name="additional_field" :data-vv-as="selectedPS.data.additional_field.name.toUpperCase()"
                                                       v-validate="selectedPS.data.additional_field.validation.join('|')"
                                                       v-model="form.additional_field"
                                                       :class="{invalid:vee_errors.first('withdraw_create.additional_field')}">
                                                <div class="input-errors-block" v-if="vee_errors.first('withdraw_create.additional_field')">
                                                    <p>@php echo " {{ vee_errors.first('withdraw_create.additional_field') }} "@endphp</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="section-title">
                                    <p>{{ __('Set the amount') }}</p>
                                </div>
                                <div class="withdrawal-box_content">
                                    <div class="box-field">
                                        <input type="text"
                                               autocomplete="off" name="amount"
                                               v-model="form.amount"
                                               v-validate="`required|${validateRuleAmountDecimal}|min_value:${selectedPS.limits.withdraw.min}|max_value:${selectedPS.limits.withdraw.max}`"
                                               :class="{invalid:vee_errors.first('withdraw_create.amount')}">
                                        <p class="info-label">
                                            <a href="" @click.prevent="setAmount(selectedPS.meta.balance, selectedPS.data.is_fiat)">{{ __('withdraw all funds') }}</a>
                                        </p>
                                    </div>
                                    <div class="box-information">
                                        <div class="icon">
                                            <span>!</span>
                                        </div>
                                        <div class="box-text">
                                            <p><br>
                                                {{ __('Funds withdrawal is made') }} <span>{{ __('instantly') }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-footer">
                                <div class="wrap-text">
                                    <p>
                                        {{ __('After clicking on the “Withdraw funds” button, a request will be generated for you, which will be paid to the wallet specified in') }} <a href="{{ route('settings') }}">{{ __('account settings') }}</a>.
                                        {{ __('Funds withdrawal is made') }} <span>{{ __('instantly') }}</span>                                    </p>
                                </div>
                                <div class="box-btn">
                                    <button type="submit" class="btn-effect btn-green" :disabled="isSubmit">
                                        <simple-spinner v-if="isSubmit" class="simple-spinner"></simple-spinner>
                                        {{ __('Withdraw funds') }} <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="specify-sum-rein active" v-if="form.type === 'reinvest'">
                            <div class="section-title">
                                <p>{{ __('Set the amount') }}</p>
                            </div>
                            <div class="specify-sum-rein_content" style="padding-bottom: 20px;">
                                <div class="box-field">
                                    <input type="text" autocomplete="off" name="amount"
                                           v-model="form.amount"
                                           v-validate="`required|${validateRuleAmountDecimal}|min_value:${selectedPS.limits.reinvest.min}|max_value:${selectedPS.limits.reinvest.max}`"
                                           :class="{invalid:vee_errors.first('withdraw_create.amount')}">
                                    <div class="input-errors-block" v-if="vee_errors.first('withdraw_create.amount')">
                                        <p>@php echo " {{ vee_errors.first('withdraw_create.amount') }} "@endphp</p>
                                    </div>
                                </div>
                                <div class="box-information">
                                    <div class="box-text">
                                        <p>
                                            {{ __('Available ') }} </p>
                                        <p>
                                            <span v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.meta.balance | formatFiat }} "@endphp</span>
                                            <span v-if="!selectedPS.data.is_fiat">@php echo " {{ selectedPS.meta.balance | formatCrypto(selectedPS.data.currency.toUpperCase()) }} "@endphp</span>
                                            <a href="" @click.prevent="setAmount(selectedPS.meta.balance, selectedPS.data.is_fiat)">{{ __('Reinvest the entire amount') }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="section-footer">
                                <div class="wrap-text">
                                    <p>
                                        {{ __('After clicking on the “Make a reinvest” button, a deposit for the specified amount will be automatically created for you and will be debited from your current account.') }}                                    </p>
                                </div>
                                <div class="box-btn">
                                    <button type="submit" class="btn-effect btn-green" :disabled="isSubmit" >
                                        <simple-spinner v-if="isSubmit" class="simple-spinner"></simple-spinner>
                                        {{ __('Make a reinvest') }} <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="withdrawal-coupon active" v-if="form.type === 'coupon'">
                            <div class="withdrawal-sum-coupon">
                                <div class="section-title">
                                    <p>{{ __('Set the amount') }}</p>
                                </div>
                                <div class="withdrawal-sum-coupon_content">
                                    <div class="box-field">
                                        <input type="text" placeholder="0.0001">
                                    </div>
                                    <div class="box-information">
                                        <div class="box-text">
                                            <p> {{ __('Available') }} </p>
                                            <p>
                                                <span>BTC 1.0001</span> <a href="javascript:void(0);">{{ __('create a coupon for the full amount') }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-footer">
                                <div class="wrap-text">
                                    <p>
                                        {{ __('After clicking on the “Create coupon” button, you will automatically receive a coupon for a specified amount, which will be debited from your checking account.') }}<br> <span>The coupon will be sent to the email address you provided during registration.</span>                                    </p>
                                </div>
                                <div class="box-btn">
                                    <button type="submit" class="btn-effect btn-green">{{ __('Create a coupon') }} <span></span></button>
                                </div>
                            </div>
                        </div>

                        <p class="invalid" v-if="responseError !== undefined">@php echo " {{ responseError.message }} "@endphp</p>
                    </template>
                </form>
            </div>
            
            <div class="section withdrawal-funds" v-if="selectedPS && step !== 'confirm'">
                <div class="section-title">
                    <p>{{ __('Transactions history') }}</p>
                </div>
                <div :class="{'currency-history-transactions':selectedPS.data.is_fiat, 'history-transactions':!selectedPS.data.is_fiat}">
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
                        <li class="list_item" v-if="!selectedPS.data.is_fiat">
                            <p>TXHASH</p>
                        </li>
                        <li class="list_item">
                            <p>{{ __('Status') }}</p>
                        </li>
                    </ul>

                    <simple-spinner class="p-20 flex-1" v-if="transactionsPS.isLoading"></simple-spinner>

                    <ul class="list" v-if="!transactionsPS.isLoading && transactionsPS.items.length === 0">
                        <li class="list_item">
                            <p>{{ __('No data') }}</p>
                        </li>
                    </ul>

                    <ul class="list" v-for="item in transactionsPS.items" :key="`withdraw${item.data.id}`">
                        <li class="list_item">
                            <p class="title-mobile">Date</p>
                             <p>@php echo ' {{ item.data.created_at | moment("YYYY-MM-DD / HH:mm") }}  '@endphp</p>
                        </li>
                        <li class="list_item">
                            <p class="title-mobile">{{ __('Type') }}</p>
                            <p v-if="item.data.sub_type === null">{{ __('Withdrawal') }}</p>
                            <p v-if="item.data.sub_type === 'coupon'">{{ __('Create a coupon') }}</p>
                        </li>
                        <li class="list_item">
                            <p class="title-mobile">{{ __('Amount') }}</p>
                            <p v-if="selectedPS.data.is_fiat">@php echo " {{ item.data.amount | formatFiat }} "@endphp</p>
                            <p v-if="!selectedPS.data.is_fiat">@php echo " {{ item.data.amount | formatCrypto(selectedPS.data.currency.toUpperCase()) }} "@endphp</p>
                        </li>
                        <li class="list_item" v-if="!selectedPS.data.is_fiat">
                            <p class="title-mobile">TXHASH</p>
                            <p class="text-green tx-hash" v-if="!item.data.batch_num">-</p>
                            <p class="tx-hash" v-if="item.data.batch_num">
                                <a v-if="selectedPS.data.name === 'bitcoin'"
                                   class="text-green" target="_blank"
                                   :href="`https://www.blockchain.com/btc/tx/${item.data.batch_num}`">
                                    @php echo " {{ item.data.batch_num }} "@endphp
                                </a>
                                <a v-else-if="selectedPS.data.name === 'bitcoin_cash'"
                                   class="text-green" target="_blank"
                                   :href="`https://www.blockchain.com/bch/tx/${item.data.batch_num}`">
                                    @php echo " {{ item.data.batch_num }} "@endphp
                                </a>
                                <a v-else-if="selectedPS.data.name === 'ethereum'"
                                   class="text-green" target="_blank"
                                   :href="`https://etherscan.io/tx/${item.data.batch_num}`">
                                    @php echo " {{ item.data.batch_num }} "@endphp
                                </a>
                                <a v-else-if="selectedPS.data.name === 'litecoin'"
                                   class="text-green" target="_blank"
                                   :href="`https://blockchair.com/litecoin/transaction/${item.data.batch_num}`">
                                    @php echo " {{ item.data.batch_num }} "@endphp
                                </a>
                                <span v-else class="text-green">
                                    @php echo " {{ item.data.batch_num }} "@endphp
                                </span>
                            </p>
                        </li>
                        <li class="list_item">
                            <p class="title-mobile">{{ __('Status') }}</p>
                            <p class="text-green" v-if="item.data.status === 'active'">{{ __('Successful') }}</p>
                            <p class="text-blue" v-if="item.data.status === 'pending'">{{ __('Payment pending') }}</p>
                            <p class="text-red" v-if="item.data.status === 'canceled'">{{ __('Canceled') }}</p>
                        </li>
                    </ul>

                    <div class="box-btn" v-if="!transactionsPS.isLoading && transactionsPS.items.length > 0">
                        <a href="{{route('transactions')}}" class="btn-effect">{{ __('Transactions details') }} <span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </withdraw-new>

@endsection