@extends('users.layouts.master')

@section('title', __('Affiliate program'))

@section('content')

<div class="wrap-tab-main">
	<div class="tabs-nav">
		<ul class="tabs">
			<li class="tab-main">
				<a href="javascript:void(0);">
					<span>{{ __('Summary information') }}</span>
				</a>
			</li>
			<li class="tab-main">
				<a href="javascript:void(0);">
					<span>{{ __('Leader program') }}</span>
				</a>
			</li>
			<li class="tab-main">
				<a href="javascript:void(0);">
					<span>{{ __('Promotional materials') }}</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="tab-content-main affiliate-page">
		<div class="tab-item-main">
			<div class="section">
				<affiliates-team-summary-tabs inline-template>
					<div class="info-referral">
						<div class="referral-nav">
							<div class="title-referral">
								<p>{{ __('Referrals summary') }}</p>
							</div>
							<ul class="tabs nojquery">
								<li class="tab" :class="{active: 'all'===active_tab}">
									<a href="" @click.prevent.stop="showTab('all')">
									{{ __('For all time ') }}                                       </a>
								</li>
								<li class="tab" :class="{active: 'today'===active_tab}">
									<a href="" @click.prevent.stop="showTab('today')">
									{{ __('Today') }}                                        </a>
								</li>
								<li class="tab" :class="{active: 'week'===active_tab}">
									<a href="" @click.prevent.stop="showTab('week')">
									{{ __('For a week ') }}                                       </a>
								</li>
								<li class="tab" :class="{active: 'month'===active_tab}">
									<a href="" @click.prevent.stop="showTab('month')">
									{{ __('For a month ') }}                                       </a>
								</li>
							</ul>
						</div>
						<div class="tab-content nojquery">
							<div class="tab-item"
							v-for="(tab, key) in tabs"
							:class="{active: key===active_tab}" :key="'tabcontent'+key">

							<simple-spinner v-if="tab.isLoading" class="simple-spinner" :size="60" :line-size="4"></simple-spinner>

							<template v-if="!tab.isLoading">
								<ul class="list">
									<li class="list_item">
										<span class="icon">
											<img src="{{ asset('user_assets/images/ic--use.png') }}" alt="icon">
										</span>
										<p>{{ __('Total partners') }}</p>
										<p>{{ __('Active') }}</p>
										<p class="number">
											{{-- {{ tab.data.referrals_count | formatFiat('', {minFraction:0}) }} --}} / <span class="text-green">{{-- {{ tab.data.referrals_active_count | formatFiat('', {minFraction:0}) }} --}}</span>
										</p>
									</li>
									<li class="list_item">
										<span class="icon">
											<img src="{{ asset('user_assets/images/ic-turnover.png') }}" alt="icon">
										</span>
										<p>{{ __('Structure turnover') }}</p>
										<p class="number">
											{{-- {{ tab.data.referrals_total_invested | formatFiat }} --}}
										</p>
									</li>
									<li class="list_item">
										<span class="icon">
											<img src="{{ asset('user_assets/images/ic-graph.png') }}" alt="icon">
										</span>
										<p>{{ __('Your affiliate income') }} *</p>
										<p class="number text-green">
											{{-- {{ tab.data.user_referrals_earnings | formatFiat }} --}}
										</p>
									</li>
								</ul>
								<div class="footnote">
									<p>
									*{{ __(' Revenue and turnover are calculated in US dollars at the exchange rate: platform (in case your partners have deposits in cryptocurrency).') }}</p>
								</div>
							</template>
						</div>
					</div>
				</div>
			</affiliates-team-summary-tabs>
		</div>
		<div class="section-header">
			<div class="section-header_title">
				<p>{{ __('My team') }}</p>
			</div>

		</div>
		<div class="section-level">
			<div class="accordion">
				<affiliates-team-level-accordion inline-template :level="1">
					<div class="accordion_block">
						<div class="toggle nojquery" :class="{active:isOpen}" @click="toggleTab">
							<div class="indicator-level">
								<p><span>1st</span></p>
								<p>{{ __('level') }}</p>
							</div>
							<ul class="list">
								<li class="list_item">
									<p>{{ __('Partners') }}</p>
									<span class="text-black">0</span>
								</li>
								<li class="list_item">
									<p>{{ __('Your bonus') }}</p>
									<span class="text-green">{{ config('global.affiliate_l1') }}%</span>
								</li>
								<li class="list_item">
									<p>{{ __('Total deposits') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
								<li class="list_item">
									<p>{{ __('Received') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
							</ul>
							<i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="All other bonuses are awarded only from the moment when you had ten participants you personally invited with any minimum deposit."></i>
						</div>
						<collapse-transition :duration="500">
							<div class="attach nojquery" v-show="isOpen">
								<div class="attach_content">
									<div class="level-table">
										<ul class="list list-title">
											<li class="list_item">
												<p class="text-black">{{ __('Partner') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Registration date') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Contact details') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Deposits') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('My bonus') }}</p>
											</li>
										</ul>

										<simple-spinner v-if="isLoading" style="padding-top: 20px"></simple-spinner>

										<template v-if="!isLoading">
											<ul class="list" v-if="list.length === 0">
												<li class="list_item" style="max-width: 100%;text-align: center;">
													<p class="text-gray">{{ __('No data') }}</p>
												</li>
											</ul>

											<ul class="list" v-if="list.length > 0"
												v-for="item in list" :key="'list'+level+item.data.login">
												<li class="list_item">
													<p class="title-mobile">{{ __('Partner') }}</p>
													<p class="text-black">{{-- {{ item.data.login }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Registration date') }}</p>
													<p class="text-gray">{{-- {{ item.data.registered_at | moment('YYYY-MM-DD HH:mm') }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Contact details') }}</p>
													<ul class="contact-list">
														<li class="contact-list_item">
															<a :href="'mailto:'+item.data.email" title="Email">
																<i class="icon-mail-alt"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.telegram">
															<a :href="'https://t.me/'+item.information.data.telegram" title="Telegram">
																<i class="icon-paper-plane"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.viber" title="Viber">
															<a :href="'viber://chat?number='+item.information.data.viber">
																<i class="icon-viber"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.whatsapp" title="WhatsApp">
															<a :href="'https://wa.me/'+item.information.data.whatsapp">
																<i class="icon-whatsapp"></i>
															</a>
														</li>
													</ul>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Deposits') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.total_invested_sum_usd | formatFiat }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('My bonus') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.user_total_referral_earnings_sum_usd | formatFiat }} --}}</p>
												</li>
											</ul>
										</template>
									</div>

									<pagination v-if="list.length > 0" :per-page="pagination.per_page" :total-rows="pagination._total" v-model="pagination.page"></pagination>
								</div>
							</div>
						</collapse-transition>
					</div>
				</affiliates-team-level-accordion>
				<affiliates-team-level-accordion inline-template :level="2">
					<div class="accordion_block">
						<div class="toggle nojquery" :class="{active:isOpen}" @click="toggleTab">
							<div class="indicator-level">
								<p><span>2nd</span></p>
								<p>{{ __('level') }}</p>
							</div>
							<ul class="list">
								<li class="list_item">
									<p>{{ __('Partners') }}</p>
									<span class="text-black">0</span>
								</li>
								<li class="list_item">
									<p>{{ __('Your bonus') }}</p>
									<span class="text-green">{{ config('global.affiliate_l2') }}%</span>
								</li>
								<li class="list_item">
									<p>{{ __('Total deposits') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
								<li class="list_item">
									<p>{{ __('Received') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
							</ul>
							<i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="All other bonuses are awarded only from the moment when you had ten participants you personally invited with any minimum deposit."></i>
						</div>
						<collapse-transition :duration="500">
							<div class="attach nojquery" v-show="isOpen">
								<div class="attach_content">
									<div class="level-table">
										<ul class="list list-title">
											<li class="list_item">
												<p class="text-black">{{ __('Partner') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Registration date') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Contact details') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Deposits') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('My bonus') }}</p>
											</li>
										</ul>

										<simple-spinner v-if="isLoading" style="padding-top: 20px"></simple-spinner>

										<template v-if="!isLoading">
											<ul class="list" v-if="list.length === 0">
												<li class="list_item" style="max-width: 100%;text-align: center;">
													<p class="text-gray">{{ __('No data') }}</p>
												</li>
											</ul>

											<ul class="list" v-if="list.length > 0"
												v-for="item in list" :key="'list'+level+item.data.login">
												<li class="list_item">
													<p class="title-mobile">{{ __('Partner') }}</p>
													<p class="text-black">{{-- {{ item.data.login }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Registration date') }}</p>
													<p class="text-gray">{{-- {{ item.data.registered_at | moment('YYYY-MM-DD HH:mm') }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Contact details') }}</p>
													<ul class="contact-list">
														<li class="contact-list_item">
															<a :href="'mailto:'+item.data.email" title="Email">
																<i class="icon-mail-alt"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.telegram">
															<a :href="'https://t.me/'+item.information.data.telegram" title="Telegram">
																<i class="icon-paper-plane"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.viber" title="Viber">
															<a :href="'viber://chat?number='+item.information.data.viber">
																<i class="icon-viber"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.whatsapp" title="WhatsApp">
															<a :href="'https://wa.me/'+item.information.data.whatsapp">
																<i class="icon-whatsapp"></i>
															</a>
														</li>
													</ul>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Deposits') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.total_invested_sum_usd | formatFiat }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('My bonus') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.user_total_referral_earnings_sum_usd | formatFiat }} --}}</p>
												</li>
											</ul>
										</template>
									</div>

									<pagination v-if="list.length > 0" :per-page="pagination.per_page" :total-rows="pagination._total" v-model="pagination.page"></pagination>
								</div>
							</div>
						</collapse-transition>
					</div>
				</affiliates-team-level-accordion>
				<affiliates-team-level-accordion inline-template :level="3">
					<div class="accordion_block">
						<div class="toggle nojquery" :class="{active:isOpen}" @click="toggleTab">
							<div class="indicator-level">
								<p><span>3rd</span></p>
								<p>{{ __('level') }}</p>
							</div>
							<ul class="list">
								<li class="list_item">
									<p>{{ __('Partners') }}</p>
									<span class="text-black">0</span>
								</li>
								<li class="list_item">
									<p>{{ __('Your bonus') }}</p>
									<span class="text-green">{{ config('global.affiliate_l3') }}%</span>
								</li>
								<li class="list_item">
									<p>{{ __('Total deposits') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
								<li class="list_item">
									<p>{{ __('Received') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
							</ul>
							<i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="All other bonuses are awarded only from the moment when you had ten participants you personally invited with any minimum deposit."></i>
						</div>
						<collapse-transition :duration="500">
							<div class="attach nojquery" v-show="isOpen">
								<div class="attach_content">
									<div class="level-table">
										<ul class="list list-title">
											<li class="list_item">
												<p class="text-black">{{ __('Partner') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Registration date') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Contact details') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Deposits') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('My bonus') }}</p>
											</li>
										</ul>

										<simple-spinner v-if="isLoading" style="padding-top: 20px"></simple-spinner>

										<template v-if="!isLoading">
											<ul class="list" v-if="list.length === 0">
												<li class="list_item" style="max-width: 100%;text-align: center;">
													<p class="text-gray">{{ __('No data') }}</p>
												</li>
											</ul>

											<ul class="list" v-if="list.length > 0"
												v-for="item in list" :key="'list'+level+item.data.login">
												<li class="list_item">
													<p class="title-mobile">{{ __('Partner') }}</p>
													<p class="text-black">{{-- {{ item.data.login }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Registration date') }}</p>
													<p class="text-gray">{{-- {{ item.data.registered_at | moment('YYYY-MM-DD HH:mm') }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Contact details') }}</p>
													<ul class="contact-list">
														<li class="contact-list_item">
															<a :href="'mailto:'+item.data.email" title="Email">
																<i class="icon-mail-alt"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.telegram">
															<a :href="'https://t.me/'+item.information.data.telegram" title="Telegram">
																<i class="icon-paper-plane"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.viber" title="Viber">
															<a :href="'viber://chat?number='+item.information.data.viber">
																<i class="icon-viber"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.whatsapp" title="WhatsApp">
															<a :href="'https://wa.me/'+item.information.data.whatsapp">
																<i class="icon-whatsapp"></i>
															</a>
														</li>
													</ul>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Deposits') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.total_invested_sum_usd | formatFiat }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('My bonus') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.user_total_referral_earnings_sum_usd | formatFiat }} --}}</p>
												</li>
											</ul>
										</template>
									</div>

									<pagination v-if="list.length > 0" :per-page="pagination.per_page" :total-rows="pagination._total" v-model="pagination.page"></pagination>
								</div>
							</div>
						</collapse-transition>
					</div>
				</affiliates-team-level-accordion>
				<affiliates-team-level-accordion inline-template :level="4">
					<div class="accordion_block">
						<div class="toggle nojquery" :class="{active:isOpen}" @click="toggleTab">
							<div class="indicator-level">
								<p><span>4th</span></p>
								<p>{{ __('level') }}</p>
							</div>
							<ul class="list">
								<li class="list_item">
									<p>{{ __('Partners') }}</p>
									<span class="text-black">0</span>
								</li>
								<li class="list_item">
									<p>{{ __('Your bonus') }}</p>
									<span class="text-green">{{ config('global.affiliate_l4') }}%</span>
								</li>
								<li class="list_item">
									<p>{{ __('Total deposits') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
								<li class="list_item">
									<p>{{ __('Received') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
							</ul>
							<i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="All other bonuses are awarded only from the moment when you had ten participants you personally invited with any minimum deposit."></i>
						</div>
						<collapse-transition :duration="500">
							<div class="attach nojquery" v-show="isOpen">
								<div class="attach_content">
									<div class="level-table">
										<ul class="list list-title">
											<li class="list_item">
												<p class="text-black">{{ __('Partner') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Registration date') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Contact details') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Deposits') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('My bonus') }}</p>
											</li>
										</ul>

										<simple-spinner v-if="isLoading" style="padding-top: 20px"></simple-spinner>

										<template v-if="!isLoading">
											<ul class="list" v-if="list.length === 0">
												<li class="list_item" style="max-width: 100%;text-align: center;">
													<p class="text-gray">{{ __('No data') }}</p>
												</li>
											</ul>

											<ul class="list" v-if="list.length > 0"
												v-for="item in list" :key="'list'+level+item.data.login">
												<li class="list_item">
													<p class="title-mobile">{{ __('Partner') }}</p>
													<p class="text-black">{{-- {{ item.data.login }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Registration date') }}</p>
													<p class="text-gray">{{-- {{ item.data.registered_at | moment('YYYY-MM-DD HH:mm') }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Contact details') }}</p>
													<ul class="contact-list">
														<li class="contact-list_item">
															<a :href="'mailto:'+item.data.email" title="Email">
																<i class="icon-mail-alt"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.telegram">
															<a :href="'https://t.me/'+item.information.data.telegram" title="Telegram">
																<i class="icon-paper-plane"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.viber" title="Viber">
															<a :href="'viber://chat?number='+item.information.data.viber">
																<i class="icon-viber"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.whatsapp" title="WhatsApp">
															<a :href="'https://wa.me/'+item.information.data.whatsapp">
																<i class="icon-whatsapp"></i>
															</a>
														</li>
													</ul>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Deposits') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.total_invested_sum_usd | formatFiat }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('My bonus') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.user_total_referral_earnings_sum_usd | formatFiat }} --}}</p>
												</li>
											</ul>
										</template>
									</div>

									<pagination v-if="list.length > 0" :per-page="pagination.per_page" :total-rows="pagination._total" v-model="pagination.page"></pagination>
								</div>
							</div>
						</collapse-transition>
					</div>
				</affiliates-team-level-accordion>
				<affiliates-team-level-accordion inline-template :level="5">
					<div class="accordion_block">
						<div class="toggle nojquery" :class="{active:isOpen}" @click="toggleTab">
							<div class="indicator-level">
								<p><span>5th</span></p>
								<p>{{ __('level') }}</p>
							</div>
							<ul class="list">
								<li class="list_item">
									<p>{{ __('Partners') }}</p>
									<span class="text-black">0</span>
								</li>
								<li class="list_item">
									<p>{{ __('Your bonus') }}</p>
									<span class="text-green">{{ config('global.affiliate_l5') }}%</span>
								</li>
								<li class="list_item">
									<p>{{ __('Total deposits') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
								<li class="list_item">
									<p>{{ __('Received') }}</p>
									<span class="text-green">$ 0.00</span>
								</li>
							</ul>
							<i class="tooltip-icon-info icon-info tooltip-toggle" data-tooltip="All other bonuses are awarded only from the moment when you had ten participants you personally invited with any minimum deposit."></i>
						</div>
						<collapse-transition :duration="500">
							<div class="attach nojquery" v-show="isOpen">
								<div class="attach_content">
									<div class="level-table">
										<ul class="list list-title">
											<li class="list_item">
												<p class="text-black">{{ __('Partner') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Registration date') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Contact details') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('Deposits') }}</p>
											</li>
											<li class="list_item">
												<p class="text-black">{{ __('My bonus') }}</p>
											</li>
										</ul>

										<simple-spinner v-if="isLoading" style="padding-top: 20px"></simple-spinner>

										<template v-if="!isLoading">
											<ul class="list" v-if="list.length === 0">
												<li class="list_item" style="max-width: 100%;text-align: center;">
													<p class="text-gray">{{ __('No data') }}</p>
												</li>
											</ul>

											<ul class="list" v-if="list.length > 0"
												v-for="item in list" :key="'list'+level+item.data.login">
												<li class="list_item">
													<p class="title-mobile">{{ __('Partner') }}</p>
													<p class="text-black">{{-- {{ item.data.login }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Registration date') }}</p>
													<p class="text-gray">{{-- {{ item.data.registered_at | moment('YYYY-MM-DD HH:mm') }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Contact details') }}</p>
													<ul class="contact-list">
														<li class="contact-list_item">
															<a :href="'mailto:'+item.data.email" title="Email">
																<i class="icon-mail-alt"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.telegram">
															<a :href="'https://t.me/'+item.information.data.telegram" title="Telegram">
																<i class="icon-paper-plane"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.viber" title="Viber">
															<a :href="'viber://chat?number='+item.information.data.viber">
																<i class="icon-viber"></i>
															</a>
														</li>
														<li class="contact-list_item" v-if="item.information.data.whatsapp" title="WhatsApp">
															<a :href="'https://wa.me/'+item.information.data.whatsapp">
																<i class="icon-whatsapp"></i>
															</a>
														</li>
													</ul>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('Deposits') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.total_invested_sum_usd | formatFiat }} --}}</p>
												</li>
												<li class="list_item">
													<p class="title-mobile">{{ __('My bonus') }}</p>
													<p class="text-green">{{-- {{ item.statistic.data.user_total_referral_earnings_sum_usd | formatFiat }} --}}</p>
												</li>
											</ul>
										</template>
									</div>

									<pagination v-if="list.length > 0" :per-page="pagination.per_page" :total-rows="pagination._total" v-model="pagination.page"></pagination>
								</div>
							</div>
						</collapse-transition>
					</div>
				</affiliates-team-level-accordion>
			</div>
		</div>
	</div>
	<div class="tab-item-main">
		<div class="leadership-program">
			<div class="leadership-header">
				<div class="icon">
					<img src="{{ asset('user_assets/images/ic-rank-big.png') }}" alt="img">
				</div>
				<div class="box-text">
					<h3>
					{{ __('Increase your income with an innovative leadership program') }}!                            </h3>
					<p>
					{{ __('Upon reaching the :appname Leadership Program leadership rank, you receive fixed bonuses from the total deposits of your structure, up to the fourth level',['appname' => config('app.name')]) }}.                            </p>
				</div>
			</div>

			<div class="section-rank">
				<div class="wrap-rank">
					<ul class="list">
						
						<li class="list_item">
							<div class="box-rank">
								<span class="icon "> <img src="{{ asset('user_assets/images/ic-scout.png') }}" alt="scout" > </span>
								
								<div class="box-text">
									<p>{{ __('Next rank') }}</p>
									<span>{{ __('Scout 1') }}</span>
								</div>
							</div>
						</li>
						<li class="list_item">
							<div class="bonus-text">
								<p>{{ __('Next rank bonus') }}</p>
								<span class="text-green">$ 120</span>
							</div>
						</li>
						<li class="list_item">
							<p class="info-text">
							{{ __('By reaching the next rank, you will automatically receive a bonus to your BTC wallet') }}.                                    </p>
						</li>
					</ul>
				</div>
				<div class="wrap-content">
					<div class="progress-wrap">
						<div class="progress-wrap_title">
							<p>{{ __('Rank progress') }}</p>
						</div>
						<div class="progress-block">
							<div class="progress-title">
								<p>{{ __('Personal investments') }}</p>
							</div>
							<div class="progress-box">
								<div class="progress-sum">
									<span class="text-green">$ 0</span>
									<span>/$ 200</span>
								</div>
								<div class="progress-bar">
									<div class="progress" style="width: 0.00%;"></div>
								</div>
							</div>
						</div>
						<div class="progress-block">
							<div class="progress-title">
								<p>{{ __('Structure investments') }}</p>
							</div>
							<div class="progress-box">
								<div class="progress-sum">
									<span class="text-green">$ 0</span>
									<span>/$ 3,000</span>
								</div>
								<div class="progress-bar">
									<div class="progress" style="width: 0.00%;"></div>
								</div>
							</div>
						</div>
						<div class="progress-block">
							<div class="progress-title">
								<p>{{ __('The 1st level investments') }}</p>
							</div>
							<div class="progress-box">
								<div class="progress-sum">
									<span class="text-green">$ 0</span>
									<span>/$ 1,500</span>
								</div>
								<div class="progress-bar">
									<div class="progress" style="width: 0.00%;"></div>
								</div>
							</div>
						</div>
						<div class="progress-block">
							<div class="progress-title">
								<p>{{ __('Other levels investments') }}</p>
							</div>
							<div class="progress-box">
								<div class="progress-sum">
									<span class="text-green">$ 0</span>
									<span>/$ 1,500</span>
								</div>
								<div class="progress-bar">
									<div class="progress" style="width: 0.00%;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="leader-table">
				<ul class="list title-list">
					<li class="list_item">
						<p>{{ __('Rank') }}</p>
					</li>
					<li class="list_item">
						<p>{{ __('Personal investments') }}</p>
					</li>
					<li class="list_item">
						<p>{{ __('Structure investments') }}</p>
					</li>
					<li class="list_item">
						<p>{{ __('The 1st level investments') }}</p>
					</li>
					<li class="list_item">
						<p>{{ __('Other levels investments') }}</p>
					</li>
					<li class="list_item">
						<p>{{ __('Bonus') }}</p>
					</li>
				</ul>

				
				
				<div class="table-row">
					<span class="icon rank-indicator "> <img src="{{ asset('user_assets/images/ic-scout.png') }}" src="{{ asset('user_assets/images/ic-scout.png') }}" alt="scout" > </span>
					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-black bold-text ">
								{{ __('Scout 1') }}

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 200</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 3,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 1,500</p>
						</li>
						<li class="list_item">{{ __('Other levels investments') }}
							<p class="title-mobile"></p>
							<p class="text-black">$ 1,500</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 120</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Scout 2

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 400</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 6,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 3,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 3,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 170</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Scout 3

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 600</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 12,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 6,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 6,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 300</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Scout 4

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 800</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 20,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 10,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 10,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 440</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Scout 5

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 1,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 30,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 15,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 15,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 610</span>
							</p>
						</li>
					</ul>


					
				</div>
				
				<div class="table-row">
					<span class="icon rank-indicator "> <img src="{{ asset('user_assets/images/ic-challenger.png') }}" src="{{ asset('user_assets/images/ic-challenger.png') }}" alt="challenger" > </span>
					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-black bold-text ">
								{{ __('Challenger 1') }}
							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 1,300</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 50,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 25,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">Other levels investments</p>
							<p class="text-black">$ 25,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 920</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank<') }}/p>
							<p class="text-gray ">
						{{ __('Challenger 2') }}
							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 1,600</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 80,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 40,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 40,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 1,320</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Challenger 3

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 1,900</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 130,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 65,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 65,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 1,930</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Challenger 4

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 2,200</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 200,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 100,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 100,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 2,640</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Challenger 5

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 2,500</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 250,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 125,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 125,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 3,080</span>
							</p>
						</li>
					</ul>


					
				</div>
				
				<div class="table-row">
					<span class="icon rank-indicator "> <img src="{{ asset('user_assets/images/ic-leader.png') }}" src="{{ asset('user_assets/images/ic-leader.png') }}" alt="leader" > </span>
					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-black bold-text ">
								Leader 1

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 4,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 400,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 200,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 200,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 4,920</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Leader 2

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 5,500</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 500,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 150,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 350,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 6,160</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Leader 3

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 6,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 600,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 200,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 400,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 7,390</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Leader 4

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 7,500</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 850,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 300,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 550,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 11,220</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Leader 5

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 9,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 1,150,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 500,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 650,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 16,980</span>
							</p>
						</li>
					</ul>


					
				</div>
				
				<div class="table-row">
					<span class="icon rank-indicator "> <img src="{{ asset('user_assets/images/ic-top_leader.png') }}" src="{{ asset('user_assets/images/ic-top_leader.png') }}" alt="top_leader" > </span>
					
						<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-black bold-text ">
								Top leader 1

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 15,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 1,550,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 650,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 900,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 28,160</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Top leader 2

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 25,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 2,200,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 850,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 1,350,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 45,760</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								{{ __('Top leader 3') }}

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 35,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 3,100,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 1,100,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 2,000,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 67,760</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Top leader 4

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 45,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 4,100,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 1,400,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 2,700,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 92,400</span>
							</p>
						</li>
					</ul>


					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-gray ">
								Top leader 5

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 55,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 5,300,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 1,800,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 3,500,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 123,200</span>
							</p>
						</li>
					</ul>


					
				</div>
				
				<div class="table-row">
					<span class="icon rank-indicator "> <img src="{{ asset('user_assets/images/ic-shark.png') }}" src="{{ asset('user_assets/images/ic-shark.png') }}" alt="shark" > </span>
					
					

					<ul class="list ">
						<li class="list_item">
							<p class="title-mobile">{{ __('Rank') }}</p>
							<p class="text-black bold-text ">
								{{ __('Shark') }}

							</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Personal investments') }}</p>
							<p class="text-black">$ 100,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Structure investments') }}</p>
							<p class="text-black">$ 7,000,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('The 1st level investments') }}</p>
							<p class="text-black">$ 2,500,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Other levels investments') }}</p>
							<p class="text-black">$ 4,500,000</p>
						</li>
						<li class="list_item">
							<p class="title-mobile">{{ __('Bonus') }}</p>
							<p class="text-gray">
								<i class="icon-watch"></i>
								<span>$ 167,200</span>
							</p>
						</li>
					</ul>


				</div>
				
				
			</div>
		</div>
	</div>
	<div class="tab-item-main">
		<div class="promo-materials">
			<div class="accordion">
				<div class="section section-promo toggle">
					<div class="block-description">
						<div class="icon">
							<img src="{{ asset('user_assets/images/ic-web.png') }}" alt="ic-web">
						</div>
						<div class="box-text">
							<p class="text-black">
							{{ __('WEB banners') }}                                    </p>
							<p class="text-gray">
							{{ __('For posting on sites and social networks') }}                                    </p>
						</div>
					</div>
					<div class="block-btn">
						<a href="javascript:void(0);" class="btn-effect">
							<strong class="btn-active">{{ __('Show') }}</strong>
							<strong class="btn-hide">{{ __('Hide') }}</strong>
							<span></span>
						</a>
					</div>
				</div>
				<div class="attach">
					<div class="web-materials">
						<p class="disable_adblock_hint">
						{{ __('Disable AdBlock to display advertisements correctly.') }}                                </p>

						<div class="web-block">
							<div class="size">
								<p>728 x 90</p>
							</div>
							<div class="media">
								<img src="{{ asset('user_assets/images/728x90.gif') }}" alt="728x90.gif">
							</div>
							<div class="box-link">
								<p>{{ __('Banner code') }}</p>
								<div class="wrap-link">
									<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/728x90.gif') }}&quot;/&gt;&lt;/a&gt;"/>
									<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/728x90.gif') }}&quot;/&gt;&lt;/a&gt;">
										{{ __('Copy') }} <span></span>
									</button>
								</div>
							</div>
						</div>
						<div class="web-block">
							<div class="size">
								<p>468 x 60</p>
							</div>
							<div class="media">
								<img src="{{ asset('user_assets/images/468x60.gif') }}" alt="468x60.gif">
							</div>
							<div class="box-link">
								<p>{{ __('Banner code') }}</p>
								<div class="wrap-link">
									<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/468x60.gif') }}&quot;/&gt;&lt;/a&gt;"/>
									<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/468x60.gif') }}&quot;/&gt;&lt;/a&gt;">
										{{ __('Copy') }} <span></span>
									</button>
								</div>
							</div>
						</div>
						<div class="wrapper-block">
							<div class="web-block">
								<div class="size">
									<p>300 x 250</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/300x250.gif') }}" alt="300x250.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/300x250.gif') }}&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/300x250.gif') }}&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
							<div class="web-block">
								<div class="size">
									<p>250 x 250</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/250x250.gif') }}" alt="250x250.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/250x250.gif') }}&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/250x250.gif') }}&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="wrapper-block">
							<div class="web-block">
								<div class="size">
									<p>160 x 600</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/160x600.gif') }}" alt="160x600.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/160x600.gif') }}&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/160x600.gif') }}&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
							<div class="web-block">
								<div class="size">
									<p>120 x 600</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/120x600.gif') }}" alt="120x600.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/120x600.gif') }}&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/120x600.gif') }}&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="wrapper-block">
							<div class="web-block">
								<div class="size">
									<p>240 x 400</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/240x400.gif') }}" alt="240x400.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/240x400.gif') }}&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/240x400.gif') }}&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
							<div class="web-block">
								<div class="size">
									<p>125 x 125</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/125x125.gif') }}" alt="125x125.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/125x125.gif') }}&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/125x125.gif') }}&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
						</div>


						<div class="web-block">
							<div class="size">
								<p>728 x 90 light v1</p>
							</div>
							<div class="media">
								<img src="{{ asset('user_assets/images/728x90l-v1') }}.gif" alt="728x90l-v1.gif">
							</div>
							<div class="box-link">
								<p>{{ __('Banner code') }}</p>
								<div class="wrap-link">
									<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/728x90l-v1') }}.gif&quot;/&gt;&lt;/a&gt;"/>
									<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/728x90l-v1') }}.gif&quot;/&gt;&lt;/a&gt;">
										{{ __('Copy') }} <span></span>
									</button>
								</div>
							</div>
						</div>
						<div class="web-block">
							<div class="size">
								<p>728 x 90 light v2</p>
							</div>
							<div class="media">
								<img src="{{ asset('user_assets/images/728x90l-v2') }}.gif" alt="728x90l-v2.gif">
							</div>
							<div class="box-link">
								<p>{{ __('Banner code') }}</p>
								<div class="wrap-link">
									<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/728x90l-v2') }}.gif&quot;/&gt;&lt;/a&gt;"/>
									<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/728x90l-v2') }}.gif&quot;/&gt;&lt;/a&gt;">
										{{ __('Copy') }} <span></span>
									</button>
								</div>
							</div>
						</div>
						<div class="web-block">
							<div class="size">
								<p>468 x 60 light v1</p>
							</div>
							<div class="media">
								<img src="{{ asset('user_assets/images/468x60l-v1') }}.gif" alt="468x60l-v1.gif">
							</div>
							<div class="box-link">
								<p>{{ __('Banner code') }}</p>
								<div class="wrap-link">
									<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/468x60l-v1') }}.gif&quot;/&gt;&lt;/a&gt;"/>
									<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/468x60l-v1') }}.gif&quot;/&gt;&lt;/a&gt;">
										{{ __('Copy') }} <span></span>
									</button>
								</div>
							</div>
						</div>
						<div class="web-block">
							<div class="size">
								<p>468 x 60 light v2</p>
							</div>
							<div class="media">
								<img src="{{ asset('user_assets/images/468x60l-v2') }}.gif" alt="468x60l-v2.gif">
							</div>
							<div class="box-link">
								<p>{{ __('Banner code') }}</p>
								<div class="wrap-link">
									<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/468x60l-v2') }}.gif&quot;/&gt;&lt;/a&gt;"/>
									<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/468x60l-v2') }}.gif&quot;/&gt;&lt;/a&gt;">
										{{ __('Copy') }} <span></span>
									</button>
								</div>
							</div>
						</div>
						<div class="wrapper-block">
							<div class="web-block">
								<div class="size">
									<p>300 x 250 light v1</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/300x250l-v1') }}.gif" alt="300x250l-v1.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/300x250l-v1') }}.gif&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/300x250l-v1') }}.gif&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
							<div class="web-block">
								<div class="size">
									<p>300 x 250 light v2</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/300x250l-v2') }}.gif" alt="300x250l-v2.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/300x250l-v2') }}.gif&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/300x250l-v2') }}.gif&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="wrapper-block">
							<div class="web-block">
								<div class="size">
									<p>160 x 600 light v1</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/160x600l-v1') }}.gif" alt="160x600l-v1.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/160x600l-v1') }}.gif&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/160x600l-v1') }}.gif&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
							<div class="web-block">
								<div class="size">
									<p>160 x 600 light v2</p>
								</div>
								<div class="media">
									<img src="{{ asset('user_assets/images/160x600l-v2') }}.gif" alt="160x600l-v2.gif">
								</div>
								<div class="box-link">
									<p>{{ __('Banner code') }}</p>
									<div class="wrap-link">
										<input class="link" value="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/160x600l-v2') }}.gif&quot;/&gt;&lt;/a&gt;"/>
										<button class="btn-effect btn-copy clipboard-copy" data-clipboard-text="&lt;a href=&quot;{{route('referrer', ['username' => Auth::user()->username])}}&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;{{ asset('user_assets/images/160x600l-v2') }}.gif&quot;/&gt;&lt;/a&gt;">
											{{ __('Copy') }} <span></span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="section section-promo">
				<div class="block-description">
					<div class="icon">
						<img src="{{ asset('user_assets/images/ic-video.png') }}" alt="img">
					</div>
					<div class="box-text">
						<p class="text-black">
						{{ __('Platform promotional video') }}                                </p>
						<p class="text-gray">
						{{ __('For upload on video hosting and social networks') }}                                </p>
					</div>
				</div>
				<div class="block-btn">
					<a href="{{ asset('upload/videos/download.mpeg') }}" download="" class="btn-effect">{{ __('Download') }} <span></span></a>
				</div>
			</div>
			<div class="section section-promo">
				<div class="block-description">
					<div class="icon">
						<img src="{{ asset('user_assets/images/ic-pdf.png') }}" alt="ic-pdf">
					</div>
					<div class="box-text">
						<p class="text-black">
						{{ __('Platform presentation') }}                                </p>
						<p class="text-gray">
						{{ __('For speeches and webinars') }}                                </p>
					</div>
				</div>
				<div class="block-btn">
					
					<a href="javascript:void(0)" class="btn-effect">{{ __('Coming soon') }} <span></span></a>
				</div>
			</div>
			<div class="section section-promo">
				<div class="block-description">
					<div class="icon">
						<img src="{{ asset('user_assets/images/ic-brand.png') }}" alt="ic-brand">
					</div>
					<div class="box-text">
						<p class="text-black">
						{{ __('Branding') }}                                </p>
						<p class="text-gray">
						{{ __('Corporate identity and printed products') }}                                </p>
					</div>
				</div>
				<div class="block-btn">
					
					<a href="javascript:void(0)" class="btn-effect">{{ __('Coming soon') }} <span></span></a>
				</div>
			</div>
			<div class="section section-feedback">
				<div class="block-text">
					<p class="text-black">
					{{ __('Did not find the necessary promotional materials?') }}                            </p>
					<p class="text-gray">
					{{ __('Contact us and we will produce promotional materials especially for you!') }}                            </p>
				</div>
				<div class="block-btn">
					<a href="{{route('support')}}" class="btn-effect btn-green">{{ __('Feedback') }} <span></span></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@endsection