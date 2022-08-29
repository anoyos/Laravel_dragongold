@extends('users.layouts.master')

@section('title', __('Make a deposit'))

@section('stylesheet')
@endsection


@section('content')

<deposit-new inline-template v-cloak>
    <div>
        <div class="section" :class="{'section-currency':selectedPS && selectedPS.data.is_fiat}">
             <form action="" class="form-new-deposit" @submit.prevent="createDeposit" data-vv-scope="deposit_create">
                <div class="currency">
                    <div class="section-title">
                        <p>{{ __('Select the base currency of the deposit') }}</p>
                    </div>
                    <div class="base-currency">
                        <payment-system-select :options="{{$json}}" v-model="selectedPS"></payment-system-select>

                        <ul class="list" v-if="selectedPS && form.type == 'invest'">
                            <li class="list_item" v-if="selectedPS.meta.exchange">
                                <p class="title-text">{{ __('Exchange rate')}}  @php echo "{{ selectedPS.data.currency.toUpperCase() }}" @endphp </p>
                                <p class="text-big">@php echo " {{ selectedPS.meta.exchange | formatFiat }} " @endphp</p>
                            </li>
                            <li class="list_item">
                                <p class="title-text">{{ __('Minimum deposit') }}</p>
                                <p class="text-big" v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.limits.invest.min | formatFiat }} " @endphp</p>
                                <p class="text-big" v-if="!selectedPS.data.is_fiat">
                                    @php echo " {{ selectedPS.limits.invest.min | formatCrypto(selectedPS.data.currency.toUpperCase()) }} " @endphp
                                </p>
                            </li>
                            <li class="list_item">
                                <p class="title-text">{{ __('Maximum deposit') }}</p>
                                <p class="text-big" v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.limits.invest.max | formatFiat }} " @endphp</p>
                                <p class="text-big" v-if="!selectedPS.data.is_fiat">
                                    @php echo " {{ selectedPS.limits.invest.max | formatCrypto(selectedPS.data.currency.toUpperCase()) }} " @endphp
                                </p>
                            </li>
                        </ul>
                        <ul class="list justify-content-end" v-if="selectedPS && form.type == 'reinvest'">
                            <li class="list_item">
                                <p class="title-text">{{ __('Minimum reinvest') }}</p>
                                <p class="text-big" v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.limits.reinvest.min | formatFiat }} " @endphp</p>
                                <p class="text-big" v-if="!selectedPS.data.is_fiat">
                                    @php echo " {{ selectedPS.limits.reinvest.min | formatCrypto(selectedPS.data.currency.toUpperCase()) }} " @endphp
                                </p>
                            </li>
                            <li class="list_item">
                                <p class="title-text">{{ __('Maximum reinvest') }}</p>
                                <p class="text-big" v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.limits.reinvest.max | formatFiat }} " @endphp</p>
                                <p class="text-big" v-if="!selectedPS.data.is_fiat">
                                    @php echo " {{ selectedPS.limits.reinvest.max | formatCrypto(selectedPS.data.currency.toUpperCase()) }} " @endphp
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <template v-if="selectedPS">
                    <div class="payment-options">
                        <div class="section-title">
                            <p>{{ __('Payment methods') }}</p>
                        </div>
                        <div class="radio-group">
                            <div class="radio-box">
                                <input type="radio" class="radio check-new-dep" name="options-radio" id="g-r-1" value="invest" v-model="form.type">
                                <label for="g-r-1">
                                    {{ __('make a new deposit') }} 
                                    <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="{{ __('Creating a new deposit using your bankroll for the further profit.')}}"></i>
                                </label>
                            </div>
                            <div class="radio-box">
                                <input type="radio" class="radio check-rein" name="options-radio" id="g-r-2" value="reinvest" v-model="form.type">
                                <label for="g-r-2">
                                    {{ __('reinvest from the balance') }}
                                    <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="{{ __('You can reinvest funds from your current balance to your increase profit growth.')}}"></i>
                                </label>
                                <p class="is-available" v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.meta.balance | formatFiat }} " @endphp</p>
                                <p class="is-available" v-if="!selectedPS.data.is_fiat">@php echo " {{ selectedPS.meta.balance | formatCrypto(selectedPS.data.currency.toUpperCase()) }} " @endphp</p>
                            </div>
                            <div class="radio-box">
                                <input type="radio" class="radio check-coupon" name="options-radio" id="g-r-3" disabled value="coupon" v-model="form.type">
                                <label for="g-r-3">
                                    {{ __('apply coupon') }}
                                    <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="{{ __('You can apply your existing coupon to replenish your personal account in our project.')}}"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="specify-sum active" v-if="form.type === 'invest'">
                        <div class="section-title">
                            <p>{{ __('Set the amount') }}</p>
                        </div>
                        <div class="specify-sum_content" style="padding-bottom: 20px;">
                            <div class="box-field">
                                <input type="text" autocomplete="off" name="amount"
                                       v-model="form.amount"
                                       v-validate="`required|${validateRuleAmountDecimal}|min_value:${selectedPS.limits.invest.min}|max_value:${selectedPS.limits.invest.max}`"
                                       :class="{invalid:vee_errors.first('deposit_create.amount')}">
                            </div>
                            <div class="box-information">
                                <div class="icon">
                                    <span>!</span>
                                </div>
                                <div class="box-text">
                                    <p v-if="selectedPS.data.name === 'bitcoin'">{{ __('The deposit will be credited after') }} <span>3 {{ __('network confirmations') }}Bitcoin</span></p>
                                    <p v-if="selectedPS.data.name === 'bitcoin_cash'">{{ __('The deposit will be credited after') }} <span>3 {{ __('network confirmations ') }}Bitcoin Cash</span></p>
                                    <p v-if="selectedPS.data.name === 'ethereum'">{{ __('The deposit will be credited after') }} <span>3 {{ __('network confirmations ') }}Ethereum</span></p>
                                    <p v-if="selectedPS.data.name === 'litecoin'">{{ __('The deposit will be credited after') }} <span>3 {{ __('network confirmations') }}Litecoin</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="section-footer">
                            <div class="wrap-text" v-if="selectedPS.data.is_fiat">
                                <p>
                                    {{ __('After clicking on the “Make a deposit” button, you will be directed to the payment page of the payment aggregator. In case of successful payment, the deposit is automatically credited to your account.') }}     </p>
                            </div>
                            <div class="wrap-text" v-if="!selectedPS.data.is_fiat">
                                <p>
                                    {{ __('After clicking on the “Make a deposit” button, a request will be generated for you, which') }} 
                                    <span>{{ __('must be paid within 1 hour') }}</span>, {{ __('otherwise it will be automatically deleted.') }}
                                    <span v-if="selectedPS.data.name === 'bitcoin'">{{ __('Transactions are credited after 3 network confirmations') }} Bitcoin</span>
                                    <span v-if="selectedPS.data.name === 'bitcoin_cash'">{{ __('Transactions are credited after 3 network confirmations') }} Bitcoin Cash</span>
                                    <span v-if="selectedPS.data.name === 'ethereum'">{{ __('Transactions are credited after 3 network confirmations') }} Ethereum</span>
                                    <span v-if="selectedPS.data.name === 'litecoin'">{{ __('Transactions are credited after 3 network confirmations') }} Litecoin</span>
                                </p>
                            </div>
                            <div class="box-btn">
                                <button type="submit" class="btn-effect btn-green" :disabled="(selectedPS && !selectedPS.data.deposit) || isSubmit || responseData" >
                                        <simple-spinner v-if="isSubmit" class="simple-spinner"></simple-spinner>
                                    {{ __('Make a deposit') }} <span></span>
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
                                       :class="{invalid:vee_errors.first('deposit_create.amount')}">
                                <div class="input-errors-block" v-if="vee_errors.first('deposit_create.amount')">
                                    <p>@php echo " {{ vee_errors.first('deposit_create.amount') }} " @endphp</p>
                                </div>
                            </div>
                            <div class="box-information">
                                <div class="box-text">
                                    <p> {{ __('Available') }}</p>
                                    <p>
                                        <span v-if="selectedPS.data.is_fiat">@php echo " {{ selectedPS.meta.balance | formatFiat }} " @endphp</span>
                                        <span v-if="!selectedPS.data.is_fiat">@php echo " {{ selectedPS.meta.balance | formatCrypto(selectedPS.data.currency.toUpperCase()) }} " @endphp</span>
                                        <a href="" @click.prevent="setAmount(selectedPS.meta.balance, selectedPS.data.is_fiat)">{{ __('Reinvest the entire amount') }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="section-footer">
                            <div class="wrap-text">
                                <p>
                                    {{ __('After clicking on the “Make a reinvest” button, a deposit for the specified amount will be automatically created for you, which will be debited from your current account.') }}                                    </p>
                            </div>
                            <div class="box-btn">
                                <button type="submit" class="btn-effect btn-green" :disabled="isSubmit" >
                                    <simple-spinner v-if="isSubmit" class="simple-spinner"></simple-spinner>
                                    {{ __('Make a reinvest') }} <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="specify-sum-coupon active" v-if="form.type === 'coupon'">

                    </div>

                    <p class="invalid" v-if="responseError !== undefined">@php echo " {{ responseError.message }} " @endphp</p>
                </template>
            </form>
        </div>

        <div class="section transaction-details" v-if="responseData !== undefined && !responseData.payment.is_fiat && this.responseMeta !== undefined && this.responseMeta.type === 'invest'">
            <div class="section-title">
                <p>{{ __('Transaction details') }}</p>
            </div>
            <div class="transaction-details_content">
                <div class="transaction-info">
                    <ul class="list additional_field_attention" v-if="responseData.form.additional_field">
                        <li class="list_item" style="max-width: 100%;">
                            <h3 class="text-red">{{ __('ATTENTION!') }}</h3>
                            <p class="text-red">
                                {{ __('SET a payment') }} <strong>@php echo " {{ responseData.form.additional_field.name.toUpperCase() }} " @endphp</strong> {{ __('in the') }} "<strong>@php echo " {{ responseData.form.additional_field.name.toUpperCase() }} " @endphp</strong>" {{ __("field, in accuracy as it's specified in the") }} “<strong>@php echo " {{ responseData.form.additional_field.name.toUpperCase() }} " @endphp</strong>{{ __('” line, under the payment details (COPY and PASTE).') }}
                                <br>
                                {{ __('If you will enter the wrong data in the field') }} "<strong>@php echo " {{ responseData.form.additional_field.name.toUpperCase() }} " @endphp</strong>{{ __(" or won't enter them at all, your payment will be") }} <strong>LOST</strong>!
                            </p>
                        </li>
                    </ul>
                    <ul class="list">
                        <li class="list_item">
                            <p>{{ __('Date') }}</p>
                        </li>
                        <li class="list_item">
                            <span>@php echo " {{ responseData.payment.created_at | moment('YYYY-MM-DD / HH:mm') }} " @endphp</span>
                        </li>
                    </ul>
                    <ul class="list">
                        <li class="list_item">
                            <p>{{ __('Amount to be paid') }}</p>
                        </li>
                        <li class="list_item">
                            <span class="text-sum">@php echo " {{ responseData.form.crypto_amount | formatCrypto(responseData.payment.currency.toUpperCase()) }} " @endphp</span>
                            <a href="javascript:void(0)" class="copy-sum clipboard-copy" :data-clipboard-text="responseData.form.crypto_amount">{{ __('Copy amount') }}</a>
                        </li>
                    </ul>
                    <ul class="list">
                        <li class="list_item">
                            <p>{{ __('Address for payment') }}</p>
                        </li>
                        <li class="list_item" v-if="responseData.payment.status !== 'canceled'">
                            <span class="address text-sum">@php echo " {{ responseData.form.address }} " @endphp</span>
                            <a href="javascript:void(0)" class="copy-address clipboard-copy" :data-clipboard-text="responseData.form.address">{{ __('Copy address') }}</a>
                        </li>
                        <li class="list_item" v-if="responseData.payment.status === 'canceled'">
                            <span class="text-red">
                                {{ __('Your payment has expired.') }}  <a href="" @click.prevent="createDeposit">{{ __('Get new address') }}</a>
                            </span>
                        </li>
                    </ul>
                    <ul class="list" v-if="responseData.form.additional_field">
                        <li class="list_item">
                            <p>@php echo " {{ responseData.form.additional_field.name }} " @endphp</p>
                        </li>
                        <li class="list_item">
                            <span class="text-sum">@php echo " {{ responseData.form.additional_field.value }} " @endphp</span>
                            <a href="javascript:void(0)" class="copy-sum clipboard-copy" :data-clipboard-text="responseData.form.additional_field.value">Copy @php echo " {{ responseData.form.additional_field.name }} " @endphp</a>
                        </li>
                    </ul>
                    <ul class="list">
                        <li class="list_item">
                            <p>{{ __('Status') }}</p>
                        </li>
                        <li class="list_item">
                            <span v-if="responseData.payment.status === 'pending'">{{ __('Payment pending') }}</span>
                            <span class="text-blue" v-if="responseData.payment.status === 'confirming'">
                                @php echo " {{ responseData.payment.confirmations }} " @endphp /3 confirmations  </span>
                            <span class="text-green" v-if="responseData.payment.status === 'active'">{{ __('Confirmed') }}</span>

                            <span v-if="responseData.payment.status === 'pending'" class="payment_expire_countdown-container">
                                {{ __('Your payment will expire in') }}  <countdown class="payment_expire_countdown"
                                                                                         :time="countdownTime(responseData.payment)"
                                                                                         @end="countdownEnd(responseData.payment)" :transform="countdownTransform">
                                    <template slot-scope="props">@php echo " {{ props.minutes }}:{{ props.seconds }} " @endphp</template>
                                </countdown>
                            </span>
                            <span class="text-red" v-if="responseData.payment.status === 'canceled'">{{ __('Canceled') }}</span>
                        </li>

                    </ul>
                </div>
                <div class="box-qr-code">
                    <template v-if="responseData.payment.status === 'pending'">
                        <simple-spinner :size="20" v-if="cancelDepositLoading" style="margin-bottom:10px"></simple-spinner>
                        <a href="" @click.prevent="cancelDeposit(responseData.payment.id)" v-if="!cancelDepositLoading">{{ __('Cancel request') }}</a>
                    </template>
                    <simple-spinner :size="60" v-if="isSubmit"></simple-spinner>
                    <qr-code :text="qrCodeData" v-if="responseData.payment.status !== 'canceled'"></qr-code>
                </div>
            </div>
        </div>

        <div class="section" v-if="selectedPS">
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

                <ul class="list" v-for="item in transactionsPS.items" :key="`deposit${item.data.id}`">
                    <li class="list_item">
                        <p class="title-mobile">Date</p>
                        <p>@php echo " {{ item.data.created_at | moment('YYYY-MM-DD / HH:mm') }} " @endphp</p>
                    </li>
                    <li class="list_item">
                        <p class="title-mobile">Type</p>
                        <p v-if="item.data.sub_type === 'invest'">{{ __('Direct deposit') }}</p>
                        <p v-if="item.data.sub_type === 'reinvest'">{{ __('Reinvest') }}</p>
                        <p v-if="item.data.sub_type === 'coupon'">{{ __('Coupon activation') }}</p>
                    </li>
                    <li class="list_item">
                        <p class="title-mobile">{{ __('Amount') }}</p>
                        <p v-if="selectedPS.data.is_fiat">@php echo " {{ item.data.amount | formatFiat }} " @endphp</p>
                        <p v-if="!selectedPS.data.is_fiat">@php echo " {{ item.data.amount | formatCrypto(selectedPS.data.currency.toUpperCase()) }} " @endphp</p>
                    </li>
                    <li class="list_item" v-if="!selectedPS.data.is_fiat">
                        <p class="title-mobile">TXHASH</p>
                        <p class="text-green tx-hash" v-if="!item.data.batch_num">-</p>
                        <p class="tx-hash" v-if="item.data.batch_num">
                            <a v-if="selectedPS.data.name === 'bitcoin'"
                               class="text-green" target="_blank"
                               :href="`https://www.blockchain.com/btc/tx/${item.data.batch_num}`">
                               @php echo " {{ item.data.batch_num }} " @endphp
                        </a>
                        <a v-else-if="selectedPS.data.name === 'bitcoin_cash'"
                           class="text-green" target="_blank"
                           :href="`https://www.blockchain.com/bch/tx/${item.data.batch_num}`">
                           @php echo " {{ item.data.batch_num }} " @endphp
                    </a>
                    <a v-else-if="selectedPS.data.name === 'ethereum'"
                       class="text-green" target="_blank"
                       :href="`https://etherscan.io/tx/${item.data.batch_num}`">
                       @php echo " {{ item.data.batch_num }} " @endphp
                </a>
                <a v-else-if="selectedPS.data.name === 'litecoin'"
                   class="text-green" target="_blank"
                   :href="`https://blockchair.com/litecoin/transaction/${item.data.batch_num}`">
                   @php echo " {{ item.data.batch_num }} " @endphp
            </a>
            <span v-else class="text-green">
                @php echo " {{ item.data.batch_num }} " @endphp
            </span>
        </p>
    </li>
    <li class="list_item">
        <p class="title-mobile">{{ __('Status') }}</p>
        <p class="text-green" v-if="selectedPS.data.is_fiat && item.data.status === 'active'">{{ __('Successful') }}</p>
        <p class="text-green" v-if="!selectedPS.data.is_fiat && item.data.status === 'active'">{{ __('Confirmed') }}</p>
        <p v-if="item.data.status === 'pending'">{{ __('Payment pending') }}</p>
        <p class="text-red" v-if="item.data.status === 'canceled'">{{ __('Canceled') }}</p>
        <p class="text-blue" v-if="!selectedPS.data.is_fiat && item.data.status === 'confirming'">
            @php echo " {{ item.data.confirmations }} " @endphp /3 confirmations </p>
    </li>
</ul>

<div class="box-btn" v-if="!transactionsPS.isLoading && transactionsPS.items.length > 0">
    <a href="{{route('transactions')}}" class="btn-effect">{{ __('Transactions details') }} <span></span></a>
</div>
</div>
</div>
</div>
</deposit-new>

@endsection
@section('scripts')

@endsection