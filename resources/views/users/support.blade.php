@extends('users.layouts.master')

@section('title', __('Support'))

@section('content')

<tickets-container inline-template>
        <div>
            <tickets-list inline-template>
                <div>
                    <tickets-single inline-template v-for="item in list" :key="'fullticket'+item.data.id" :ticket="item" v-cloak>
                        <div class="wrapper-support wrapper-support-inner" v-if="isOpen">
                            <div class="correspondence">
                                <div class="correspondence-header">
                                    <ul class="list">
                                        <li class="list_item">
                                            <p>{{ __('Request from') }} {{-- {{ ticket.data.created_at | moment('YYYY-MM-DD HH:mm') }} --}}</p>
                                        </li>
                                        <li class="list_item">
                                            <p>{{ __('Subject') }}: {{-- {{ ticket.ticket_department_subject.data.name }} --}}</p>
                                        </li>
                                    </ul>
                                    <div class="will-return">
                                        <a href="" class="btn-will-return" @click.prevent="closeFullMode">{{ __('Back') }}</a>
                                    </div>
                                </div>
                                <div class="container-chat">
                                    <div class="wrap-chat">
                                        <div class="message ma-message">
                                            <div class="sender">
                                                <span class="name">{{ Auth::user()->username }}</span>
                                                <span class="date">{{-- {{ ticket.data.created_at | moment('YYYY-MM-DD HH:mm') }} --}}</span>
                                            </div>
                                            <div class="message-text">
                                                <p>
                                                    {{-- {{ ticket.data.body }} --}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message ma-message" v-for="message in ticket_messages"
                                             :class="{'ma-message':message.data.body.from !== 'support','support-message':message.data.body.from === 'support'}">
                                            <div class="sender">
                                                <span class="name" v-if="message.data.body.from === 'support'"> {{ config('app.name') . ' ' . __('Support') }}</span>
                                                <span class="name" v-else>{{ Auth::user()->username }}</span>
                                                <span class="date">{{-- {{ message.data.body.time | moment('YYYY-MM-DD HH:mm') }} --}}</span>
                                            </div>
                                            <div class="message-text">
                                                <p v-if="message.data.body.from === 'support'" v-html="message.data.body.message"></p>
                                                <p v-else>{{-- {{ message.data.body.message }} --}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="support-form" @submit.prevent="sendMessage" v-if="ticket_status !== 'closed'">
                                <div class="box">
                                    <label for="message">{{ __('Write an answer') }}</label>
                                    <textarea id="message" v-model="message" name="message"
                                              v-validate="'required|min:10'"
                                              :class="{invalid:vee_errors.first('message')}"></textarea>
                                </div>
                                <div class="box-text">
                                    <p>
                                        {{ __('If you are satisfied with the answer and your question is closed, please click the “Close request” button, if there is no response from you within 72 hours, your appeal will be closed automatically.') }}                                    </p>
                                </div>
                                <div class="box-btn">
                                    <div class="wrap-lock">
                                        <a href="" @click.prevent="closeTicket">
                                            <i class="icon-lock"></i>
                                            <span>{{ __('Close request') }}</span>
                                        </a>
                                    </div>
                                    <div class="wrap-btn">
                                        <button type="submit" class="btn-effect btn-green">{{ __('Reply') }} <span></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </tickets-single>

                    <div class="my-appeals" v-show="!$parent.singleTicketOpen">
                        <div class="section-title">
                            <p>{{ __('My requests') }}</p>
                        </div>
                        <div class="my-appeals_content">
                            <simple-spinner v-if="isLoading"></simple-spinner>

                            <template v-if="!isLoading">
                                <ul class="list list-title">
                                    <li class="list_item">
                                        <p>{{ __('Date') }}</p>
                                    </li>
                                    <li class="list_item">
                                        <p>{{ __('Subject') }}</p>
                                    </li>
                                    <li class="list_item">
                                        <p>{{ __('Last message') }}</p>
                                    </li>
                                </ul>

                                <ul class="list" style="border: none" v-if="list.length == 0">
                                    <li class="list_item" style="max-width: 100%">
                                        {{ __('No data') }}                                    </li>
                                </ul>

                                <tickets-single inline-template mode="preview"
                                                v-for="item in list" :key="'ticket'+item.data.id" :ticket="item"
                                                @click.native="openTicket(item)" v-cloak>


                                    <ul class="list ticket-item" :class="class_block">
                                        <li class="list_item">
                                            <span class="icon">
                                                <i :class="class_icon"></i>
                                            </span>
                                            <span class="date">{{-- {{ ticket.data.created_at | moment('YYYY-MM-DD HH:mm') }} --}}</span>
                                        </li>
                                        <li class="list_item">
                                            <span class="them-message">{{-- {{ ticket.ticket_department_subject.data.name }} --}}</span>
                                        </li>
                                        <li class="list_item">
                                            <span class="message" v-if="last_message.data.body.from === 'support'" v-html="last_message.data.body.message"></span>
                                            <span class="message" v-else>{{-- {{ last_message.data.body.message }} --}}</span>
                                        </li>
                                    </ul>

                                </tickets-single>
                            </template>

                            <br>
                            <pagination v-if="list.length > 0 && pagination._total > pagination.per_page" :per-page="pagination.per_page" :total-rows="pagination._total" v-model="pagination.page"></pagination>


                            <div class="explanations">
                                <ul class="exp-list">
                                    <li class="exp-list_item">
                                <span class="icon">
                                    <i class="icon-mail-open"></i>
                                </span>
                                        <p>{{ __('Message read') }}</p>
                                    </li>
                                    <li class="exp-list_item">
                                <span class="icon icon-green">
                                    <i class="icon-mail-alt"></i>
                                </span>
                                        <p>{{ __('New message') }}</p>
                                    </li>
                                    <li class="exp-list_item">
                                <span class="icon icon-blue">
                                    <i class="icon-lock"></i>
                                </span>
                                        <p>{{ __('Request closed') }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </tickets-list>

            <tickets-create inline-template v-show="!singleTicketOpen">
                <div class="wrapper-support">
                    <form class="support-form" data-vv-scope="ticket_create" @submit.prevent="send">
                        <div class="box">
                            <label for="subject">{{ __('Subject of request') }}</label>
                            <select id="subject" v-model="form.subject"
                                    name="subject" v-validate="'required'" :class="{invalid:vee_errors.first('ticket_create.subject')}">
                                <option value="" disabled selected>- {{ __('Select subject') }} -</option>
                                                                    <option value="1">{{ __('Reset PIN code') }}</option>
                                                                    <option value="2">{{ __('Advertising offer') }}</option>
                                                                    <option value="3">{{ __('Technical issue') }}</option>
                                                                    <option value="4">{{ __('Profile change') }}</option>
                                                                    <option value="5">{{ __('Investment') }}</option>
                                                                    <option value="6">{{ __('Withdrawal') }}</option>
                                                                    <option value="7">{{ __('Question') }}</option>
                                                                    <option value="8">{{ __('Translation services') }}</option>
                                                                    <option value="9">{{ __('Other') }}</option>
                                                            </select>
                            <div class="arrow"><i class="icon-down"></i></div>
                        </div>
                        <div class="box">
                            <label for="message">{{ __('Message text') }}</label>
                            <textarea id="message" v-model="form.message"
                                      name="message" v-validate="'required|min:4'" :class="{invalid:vee_errors.first('ticket_create.message')}"></textarea>
                        </div>
                        <div class="box-text">
                            <p>
                                {{ __('Technical support will review your appeal within 24 hours. You will receive an answer to the email address associated with this account.') }}                            </p>
                        </div>
                        <div class="box-btn">
                            <div class="wrap-btn">
                                <button type="submit" class="btn-effect btn-green" :disabled="isLoading">
                                    <simple-spinner v-if="isLoading" class="simple-spinner"></simple-spinner>
                                    {{ __('Create a request') }} <span></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </tickets-create>
        </div>
    </tickets-container>

@endsection