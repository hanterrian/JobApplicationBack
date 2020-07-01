@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('register.form.select.title') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">{{ __('register.form.select.contractor') }}</div>

                                    <div class="card-body">
                                        {{ __('register.form.select.contractorText') }}
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ URL::route('register-type',['type'=>'contractor']) }}">
                                            {{ __('register.form.select.buttonLabel') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">{{ __('register.form.select.customer') }}</div>

                                    <div class="card-body">
                                        {{ __('register.form.select.customerText') }}
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ URL::route('register-type',['type'=>'customer']) }}">
                                            {{ __('register.form.select.buttonLabel') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
