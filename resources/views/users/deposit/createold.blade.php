@extends('users.layouts.master')

@section('title', __('Make a deposit'))

@section('content')

<deposit-new inline-template v-cloak>
	<div>
		<div class="section" :class="{'section-currency':selectedPS && selectedPS.data.is_fiat}">
			<form action="" class="form-new-deposit" @submit.prevent="createDeposit" data-vv-scope="deposit_create">
				<div class="currency">
					<div class="section-title">
						<p>Select the base currency of the deposit</p>
					</div>
					<div class="base-currency">
						
						<payment-system-select :options="[{&quot;label&quot;:&quot;&lt;span class=\&quot;icon icon-orange\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/bitcoin.png\&quot; alt=\&quot;btc\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Bitcoin&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:3,&quot;name&quot;:&quot;bitcoin&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;btc&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;0.0015&quot;,&quot;max&quot;:&quot;4.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;0.0015&quot;,&quot;max&quot;:&quot;4.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:10181.51,&quot;balance&quot;:&quot;0.0&quot;}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon icon-red\&quot;&gt;PM&lt;\/span&gt;&lt;p&gt;Perfect Money&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:1,&quot;name&quot;:&quot;perfect_money_usd&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;usd&quot;,&quot;is_fiat&quot;:true,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;10.0&quot;,&quot;max&quot;:&quot;30000.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;10.0&quot;,&quot;max&quot;:&quot;30000.0&quot;}},&quot;meta&quot;:{&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon icon-blue\&quot;&gt;PR&lt;\/span&gt;&lt;p&gt;Payeer&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:2,&quot;name&quot;:&quot;payeer_usd&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;usd&quot;,&quot;is_fiat&quot;:true,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;10.0&quot;,&quot;max&quot;:&quot;30000.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;10.0&quot;,&quot;max&quot;:&quot;30000.0&quot;}},&quot;meta&quot;:{&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon icon-green\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/bitcoin_cash.png\&quot; alt=\&quot;bch\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Bitcoin Cash&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:4,&quot;name&quot;:&quot;bitcoin_cash&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;bch&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;0.025&quot;,&quot;max&quot;:&quot;75.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;0.025&quot;,&quot;max&quot;:&quot;75.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:281.76,&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/bitcoin_gold.png\&quot; alt=\&quot;btg\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Bitcoin Gold&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:11,&quot;name&quot;:&quot;bitcoin_gold&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;btg&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;0.4&quot;,&quot;max&quot;:&quot;1200.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;0.4&quot;,&quot;max&quot;:&quot;1200.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:27.21,&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/dash.png\&quot; alt=\&quot;dash\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Dash&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:13,&quot;name&quot;:&quot;dash&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;dash&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;0.06&quot;,&quot;max&quot;:&quot;180.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;0.06&quot;,&quot;max&quot;:&quot;180.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:123.01,&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon\&quot; style=\&quot;background-color:#000;\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/eos.svg\&quot; alt=\&quot;eos\&quot;&gt;&lt;\/span&gt;&lt;p&gt;EOS&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:9,&quot;name&quot;:&quot;eos&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;eos&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:{&quot;key&quot;:&quot;memo&quot;,&quot;name&quot;:&quot;Memo&quot;,&quot;validation&quot;:[]}},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;1.5&quot;,&quot;max&quot;:&quot;4250.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;1.5&quot;,&quot;max&quot;:&quot;4250.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:4.1138,&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon icon-violet\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/ethereum.png\&quot; alt=\&quot;eth\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Ethereum&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:6,&quot;name&quot;:&quot;ethereum&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;eth&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;0.06&quot;,&quot;max&quot;:&quot;120.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;0.06&quot;,&quot;max&quot;:&quot;120.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:226.25,&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/ethereum_classic.png\&quot; alt=\&quot;etc\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Ethereum Classic&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:10,&quot;name&quot;:&quot;ethereum_classic&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;etc&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;1.25&quot;,&quot;max&quot;:&quot;3750.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;1.25&quot;,&quot;max&quot;:&quot;3750.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:5.6683,&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon icon-gray\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/litecoin.png\&quot; alt=\&quot;ltc\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Litecoin&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:5,&quot;name&quot;:&quot;litecoin&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;ltc&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;0.13&quot;,&quot;max&quot;:&quot;330.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;0.13&quot;,&quot;max&quot;:&quot;330.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:89.58,&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/ripple.svg\&quot; alt=\&quot;xrp\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Ripple&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:8,&quot;name&quot;:&quot;ripple&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;xrp&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:{&quot;key&quot;:&quot;destination_tag&quot;,&quot;name&quot;:&quot;Destination Tag&quot;,&quot;validation&quot;:[&quot;numeric&quot;]}},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;25.0&quot;,&quot;max&quot;:&quot;72000.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;25.0&quot;,&quot;max&quot;:&quot;72000.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:0.30409,&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon icon-red\&quot; style=\&quot;background-color:#c53127;\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/tron.png\&quot; alt=\&quot;trx\&quot; style=\&quot;margin-top: 5px\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Tron&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:7,&quot;name&quot;:&quot;tron&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;trx&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;328.0&quot;,&quot;max&quot;:&quot;1000000.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;328.0&quot;,&quot;max&quot;:&quot;1000000.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:0.02517,&quot;balance&quot;:0}}},{&quot;label&quot;:&quot;&lt;span class=\&quot;icon\&quot;&gt;&lt;img src=\&quot;\/user_assets\/images\/zcash.png\&quot; alt=\&quot;zec\&quot;&gt;&lt;\/span&gt;&lt;p&gt;Zcash&lt;\/p&gt;&quot;,&quot;value&quot;:{&quot;data&quot;:{&quot;id&quot;:12,&quot;name&quot;:&quot;zcash&quot;,&quot;deposit&quot;:true,&quot;currency&quot;:&quot;zec&quot;,&quot;is_fiat&quot;:false,&quot;additional_field&quot;:null},&quot;limits&quot;:{&quot;invest&quot;:{&quot;min&quot;:&quot;0.085&quot;,&quot;max&quot;:&quot;260.0&quot;},&quot;reinvest&quot;:{&quot;min&quot;:&quot;0.085&quot;,&quot;max&quot;:&quot;260.0&quot;}},&quot;meta&quot;:{&quot;exchange&quot;:82.3,&quot;balance&quot;:0}}}]" v-model="selectedPS"></payment-system-select>

						<ul class="list" v-if="selectedPS && form.type == 'invest'">
							<li class="list_item" v-if="selectedPS.meta.exchange">
								<p class="title-text">Exchange rate {{-- {{ selectedPS.data.currency.toUpperCase() }} --}}</p>
								<p class="text-big">{{-- {{ selectedPS.meta.exchange | formatFiat }} --}}</p>
							</li>
							<li class="list_item">
								<p class="title-text">Minimum deposit</p>
								<p class="text-big" v-if="selectedPS.data.is_fiat">{{-- {{ selectedPS.limits.invest.min | formatFiat }} --}}</p>
								<p class="text-big" v-if="!selectedPS.data.is_fiat">
									{{-- {{ selectedPS.limits.invest.min | formatCrypto(selectedPS.data.currency.toUpperCase()) }} --}}
								</p>
							</li>
							<li class="list_item">
								<p class="title-text">Maximum deposit</p>
								<p class="text-big" v-if="selectedPS.data.is_fiat">{{-- {{ selectedPS.limits.invest.max | formatFiat }} --}}</p>
								<p class="text-big" v-if="!selectedPS.data.is_fiat">
									{{-- {{ selectedPS.limits.invest.max | formatCrypto(selectedPS.data.currency.toUpperCase()) }} --}}
								</p>
							</li>
						</ul>
						<ul class="list justify-content-end" v-if="selectedPS && form.type == 'reinvest'">
							<li class="list_item">
								<p class="title-text">Minimum reinvest</p>
								<p class="text-big" v-if="selectedPS.data.is_fiat">{{-- {{ selectedPS.limits.reinvest.min | formatFiat }} --}}</p>
								<p class="text-big" v-if="!selectedPS.data.is_fiat">
									{{-- {{ selectedPS.limits.reinvest.min | formatCrypto(selectedPS.data.currency.toUpperCase()) }} --}}
								</p>
							</li>
							<li class="list_item">
								<p class="title-text">Maximum reinvest</p>
								<p class="text-big" v-if="selectedPS.data.is_fiat">{{-- {{ selectedPS.limits.reinvest.max | formatFiat }} --}}</p>
								<p class="text-big" v-if="!selectedPS.data.is_fiat">
									{{-- {{ selectedPS.limits.reinvest.max | formatCrypto(selectedPS.data.currency.toUpperCase()) }} --}}
								</p>
							</li>
						</ul>
					</div>
				</div>
				<template v-if="selectedPS">
					<div class="payment-options">
						<div class="section-title">
							<p>Payment methods</p>
						</div>
						<div class="radio-group">
							<div class="radio-box">
								<input type="radio" class="radio check-new-dep" name="options-radio" id="g-r-1" value="invest" v-model="form.type">
								<label for="g-r-1">
									make a new deposit						<i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="Creating a new deposit using your bankroll for the further profit."></i>
								</label>
							</div>
							<div class="radio-box">
								<input type="radio" class="radio check-rein" name="options-radio" id="g-r-2" value="reinvest" v-model="form.type">
								<label for="g-r-2">
									reinvest from the balance				 <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="You can reinvest funds from your current balance to your increase profit growth."></i>
								</label>
								<p class="is-available" v-if="selectedPS.data.is_fiat">{{-- {{ selectedPS.meta.balance | formatFiat }} --}}</p>
								<p class="is-available" v-if="!selectedPS.data.is_fiat">{{-- {{ selectedPS.meta.balance | formatCrypto(selectedPS.data.currency.toUpperCase()) }} --}}</p>
							</div>
							<div class="radio-box">
								<input type="radio" class="radio check-coupon" name="options-radio" id="g-r-3" disabled value="coupon" v-model="form.type">
								<label for="g-r-3">
									apply coupon                                        <i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="You can apply your existing coupon to replenish your personal account in our project."></i>
								</label>
							</div>
						</div>
					</div>
					<div class="specify-sum active" v-if="form.type === 'invest'">
						<div class="section-title">
							<p>Set the amount</p>
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
									<p v-if="selectedPS.data.name === 'bitcoin'">The deposit will be credited after <span>3 network confirmations Bitcoin</span></p>
									<p v-if="selectedPS.data.name === 'bitcoin_cash'">The deposit will be credited after <span>3 network confirmations Bitcoin Cash</span></p>
									<p v-if="selectedPS.data.name === 'ethereum'">The deposit will be credited after <span>3 network confirmations Ethereum</span></p>
									<p v-if="selectedPS.data.name === 'litecoin'">The deposit will be credited after <span>3 network confirmations Litecoin</span></p>
								</div>
							</div>
						</div>
						<div class="section-footer">
							<div class="wrap-text" v-if="selectedPS.data.is_fiat">
								<p>
								After clicking on the “Make a deposit” button, you will be directed to the payment page of the payment aggregator. In case of successful payment, the deposit is automatically credited to your account.     </p>
							</div>
							<div class="wrap-text" v-if="!selectedPS.data.is_fiat">
								<p>
									After clicking on the “Make a deposit” button, a request will be generated for you, which <span>must be paid within 1 hour</span>, otherwise it will be automatically deleted.                                       <span v-if="selectedPS.data.name === 'bitcoin'">Transactions are credited after 3 network confirmations Bitcoin</span>
									<span v-if="selectedPS.data.name === 'bitcoin_cash'">Transactions are credited after 3 network confirmations Bitcoin Cash</span>
									<span v-if="selectedPS.data.name === 'ethereum'">Transactions are credited after 3 network confirmations Ethereum</span>
									<span v-if="selectedPS.data.name === 'litecoin'">Transactions are credited after 3 network confirmations Litecoin</span>
								</p>
							</div>
							<div class="box-btn">
								<button type="submit" class="btn-effect btn-green" :disabled="(selectedPS && !selectedPS.data.deposit) || isSubmit || responseData" >
									<simple-spinner v-if="isSubmit" class="simple-spinner"></simple-spinner>
									Make a deposit <span></span>
								</button>
							</div>
						</div>
					</div>
					<div class="specify-sum-rein active" v-if="form.type === 'reinvest'">
						<div class="section-title">
							<p>Set the amount</p>
						</div>
						<div class="specify-sum-rein_content" style="padding-bottom: 20px;">
							<div class="box-field">
								<input type="text" autocomplete="off" name="amount"
								v-model="form.amount"
								v-validate="`required|${validateRuleAmountDecimal}|min_value:${selectedPS.limits.reinvest.min}|max_value:${selectedPS.limits.reinvest.max}`"
								:class="{invalid:vee_errors.first('deposit_create.amount')}">
								<div class="input-errors-block" v-if="vee_errors.first('deposit_create.amount')">
									<p>{{-- {{ vee_errors.first('deposit_create.amount') }} --}}</p>
								</div>
							</div>
							<div class="box-information">
								<div class="box-text">
									<p>
									Available                                       </p>
									<p>
										<span v-if="selectedPS.data.is_fiat">{{-- {{ selectedPS.meta.balance | formatFiat }} --}}</span>
										<span v-if="!selectedPS.data.is_fiat">{{-- {{ selectedPS.meta.balance | formatCrypto(selectedPS.data.currency.toUpperCase()) }} --}}</span>
										<a href="" @click.prevent="setAmount(selectedPS.meta.balance, selectedPS.data.is_fiat)">Reinvest the entire amount</a>
									</p>
								</div>
							</div>
						</div>
						<div class="section-footer">
							<div class="wrap-text">
								<p>
								After clicking on the “Make a reinvest” button, a deposit for the specified amount will be automatically created for you, which will be debited from your current account.                                    </p>
							</div>
							<div class="box-btn">
								<button type="submit" class="btn-effect btn-green" :disabled="isSubmit" >
									<simple-spinner v-if="isSubmit" class="simple-spinner"></simple-spinner>
									Make a reinvest<span></span>
								</button>
							</div>
						</div>
					</div>
					<div class="specify-sum-coupon active" v-if="form.type === 'coupon'">
						
					</div>

					<p class="invalid" v-if="responseError !== undefined">{{-- {{ responseError.message }} --}}</p>
				</template>
			</form>
		</div>

		<div class="section transaction-details" v-if="responseData !== undefined && !responseData.payment.is_fiat && this.responseMeta !== undefined && this.responseMeta.type === 'invest'">
			<div class="section-title">
				<p>Transaction details</p>
			</div>
			<div class="transaction-details_content">
				<div class="transaction-info">
					<ul class="list additional_field_attention" v-if="responseData.form.additional_field">
						<li class="list_item" style="max-width: 100%;">
							<h3 class="text-red">ATTENTION!</h3>
							<p class="text-red">
								SET a payment <strong>{{-- {{ responseData.form.additional_field.name.toUpperCase() }} --}}</strong>in the "<strong>{{-- {{ responseData.form.additional_field.name.toUpperCase() }} --}}</strong>" field, in accuracy as it's specified in the “<strong>{{-- {{ responseData.form.additional_field.name.toUpperCase() }} --}}</strong>” line, under the payment details (COPY and PASTE).
								<br>
								If you will enter the wrong data in the field "<strong>{{-- {{ responseData.form.additional_field.name.toUpperCase() }} --}}</strong> or won't enter them at all, your payment will be <strong>LOST</strong>!
							</p>
						</li>
					</ul>
					<ul class="list">
						<li class="list_item">
							<p>Date</p>
						</li>
						<li class="list_item">
							<span>{{-- {{ responseData.payment.created_at | moment('YYYY-MM-DD / HH:mm') }} --}}</span>
						</li>
					</ul>
					<ul class="list">
						<li class="list_item">
							<p>Amount to be paid</p>
						</li>
						<li class="list_item">
							<span class="text-sum">{{-- {{ responseData.form.crypto_amount | formatCrypto(responseData.payment.currency.toUpperCase()) }} --}}</span>
							<a href="javascript:void(0)" class="copy-sum clipboard-copy" :data-clipboard-text="responseData.form.crypto_amount">Copy amount</a>
						</li>
					</ul>
					<ul class="list">
						<li class="list_item">
							<p>Address for payment</p>
						</li>
						<li class="list_item" v-if="responseData.payment.status !== 'canceled'">
							<span class="address text-sum">{{-- {{ responseData.form.address }} --}}</span>
							<a href="javascript:void(0)" class="copy-address clipboard-copy" :data-clipboard-text="responseData.form.address">Copy address</a>
						</li>
						<li class="list_item" v-if="responseData.payment.status === 'canceled'">
							<span class="text-red">
								Your payment has expired.                                   <a href="" @click.prevent="createDeposit">Get new address</a>
							</span>
						</li>
					</ul>
					<ul class="list" v-if="responseData.form.additional_field">
						<li class="list_item">
							<p>{{-- {{ responseData.form.additional_field.name }} --}}</p>
						</li>
						<li class="list_item">
							<span class="text-sum">{{-- {{ responseData.form.additional_field.value }} --}}</span>
							<a href="javascript:void(0)" class="copy-sum clipboard-copy" :data-clipboard-text="responseData.form.additional_field.value">Copy {{-- {{ responseData.form.additional_field.name }} --}}</a>
						</li>
					</ul>
					<ul class="list">
						<li class="list_item">
							<p>Status</p>
						</li>
						<li class="list_item">
							<span v-if="responseData.payment.status === 'pending'">Payment pending</span>
							<span class="text-blue" v-if="responseData.payment.status === 'confirming'">
							{{-- {{ responseData.payment.confirmations }} --}}/3 confirmations                                </span>
							<span class="text-green" v-if="responseData.payment.status === 'active'">Confirmed</span>

							<span v-if="responseData.payment.status === 'pending'" class="payment_expire_countdown-container">
								Your payment will expire in       <countdown class="payment_expire_countdown"
								:time="countdownTime(responseData.payment)"
								@end="countdownEnd(responseData.payment)" :transform="countdownTransform">
								<template slot-scope="props">{{-- {{ props.minutes }}:{{ props.seconds }} --}}</template>
							</countdown>
						</span>
						<span class="text-red" v-if="responseData.payment.status === 'canceled'">Canceled</span>
					</li>

				</ul>
			</div>
			<div class="box-qr-code">
				<template v-if="responseData.payment.status === 'pending'">
					<simple-spinner :size="20" v-if="cancelDepositLoading" style="margin-bottom:10px"></simple-spinner>
					<a href="" @click.prevent="cancelDeposit(responseData.payment.id)" v-if="!cancelDepositLoading">Cancel request</a>
				</template>
				<simple-spinner :size="60" v-if="isSubmit"></simple-spinner>
				<qr-code :text="qrCodeData" v-if="responseData.payment.status !== 'canceled'"></qr-code>
			</div>
		</div>
	</div>

	<div class="section" v-if="selectedPS">
		<div class="section-title">
			<p>Transactions history</p>
		</div>
		<div :class="{'currency-history-transactions':selectedPS.data.is_fiat, 'history-transactions':!selectedPS.data.is_fiat}">
			<ul class="list list-title">
				<li class="list_item">
					<p>Date</p>
				</li>
				<li class="list_item">
					<p>Type</p>
				</li>
				<li class="list_item">
					<p>Amount</p>
				</li>
				<li class="list_item" v-if="!selectedPS.data.is_fiat">
					<p>TXHASH</p>
				</li>
				<li class="list_item">
					<p>Status</p>
				</li>
			</ul>

			<simple-spinner class="p-20 flex-1" v-if="transactionsPS.isLoading"></simple-spinner>

			<ul class="list" v-if="!transactionsPS.isLoading && transactionsPS.items.length === 0">
				<li class="list_item">
					<p>No data</p>
				</li>
			</ul>

			<ul class="list" v-for="item in transactionsPS.items" :key="`deposit${item.data.id}`">
				<li class="list_item">
					<p class="title-mobile">Date</p>
					<p>{{-- {{ item.data.created_at | moment('YYYY-MM-DD / HH:mm') }} --}}</p>
				</li>
				<li class="list_item">
					<p class="title-mobile">Type</p>
					<p v-if="item.data.sub_type === 'invest'">Direct deposit</p>
					<p v-if="item.data.sub_type === 'reinvest'">Reinvest</p>
					<p v-if="item.data.sub_type === 'coupon'">Coupon activation</p>
				</li>
				<li class="list_item">
					<p class="title-mobile">Amount</p>
					<p v-if="selectedPS.data.is_fiat">{{-- {{ item.data.amount | formatFiat }} --}}</p>
					<p v-if="!selectedPS.data.is_fiat">{{-- {{ item.data.amount | formatCrypto(selectedPS.data.currency.toUpperCase()) }} --}}</p>
				</li>
				<li class="list_item" v-if="!selectedPS.data.is_fiat">
					<p class="title-mobile">TXHASH</p>
					<p class="text-green tx-hash" v-if="!item.data.batch_num">-</p>
					<p class="tx-hash" v-if="item.data.batch_num">
						<a v-if="selectedPS.data.name === 'bitcoin'"
						class="text-green" target="_blank"
						:href="`https://www.blockchain.com/btc/tx/${item.data.batch_num}`">
						{{-- {{ item.data.batch_num }} --}}
					</a>
					<a v-else-if="selectedPS.data.name === 'bitcoin_cash'"
					class="text-green" target="_blank"
					:href="`https://www.blockchain.com/bch/tx/${item.data.batch_num}`">
					{{-- {{ item.data.batch_num }} --}}
				</a>
				<a v-else-if="selectedPS.data.name === 'ethereum'"
				class="text-green" target="_blank"
				:href="`https://etherscan.io/tx/${item.data.batch_num}`">
				{{-- {{ item.data.batch_num }} --}}
			</a>
			<a v-else-if="selectedPS.data.name === 'litecoin'"
			class="text-green" target="_blank"
			:href="`https://blockchair.com/litecoin/transaction/${item.data.batch_num}`">
			{{-- {{ item.data.batch_num }} --}}
		</a>
		<span v-else class="text-green">
			{{-- {{ item.data.batch_num }} --}}
		</span>
	</p>
</li>
<li class="list_item">
	<p class="title-mobile">Status</p>
	<p class="text-green" v-if="selectedPS.data.is_fiat && item.data.status === 'active'">Successful</p>
	<p class="text-green" v-if="!selectedPS.data.is_fiat && item.data.status === 'active'">Confirmed</p>
	<p v-if="item.data.status === 'pending'">{{ __('Payment pending') }}</p>
	<p class="text-red" v-if="item.data.status === 'canceled'">{{ __('Canceled') }}</p>
	<p class="text-blue" v-if="!selectedPS.data.is_fiat && item.data.status === 'confirming'">
	{{-- {{ item.data.confirmations }} --}}/3 confirmations                            </p>
</li>
</ul>

<div class="box-btn" v-if="!transactionsPS.isLoading && transactionsPS.items.length > 0">
	<a href="{{route('transactions')}}" class="btn-effect">Transactions details <span></span></a>
</div>
</div>
</div>
</div>
</deposit-new>

@endsection