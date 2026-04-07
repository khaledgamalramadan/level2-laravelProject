@extends('admin.master')

@section('title', __('keywords.show_message'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.show_message') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">{{ __('keywords.name') }}</label>
                                    <p class="form-control" placeholder="{{ __('keywords.name') }}">{{ $message->name }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email">{{ __('keywords.email') }}</label>
                                    <p class="form-control">{{ $message->email }}</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="subject">{{ __('keywords.subject') }}</label>
                                    <p class="form-control">{{ $message->subject }}</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="message">{{ __('keywords.message') }}</label>
                                    <p class="form-control" placeholder="{{ __('keywords.message') }}">
                                        {{ $message->message }}</p>
                                </div>
                            </div>

                        </div>
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-primary"><i class="fe fe-arrow-left fa-2x"></i>Back  </a>
                    </div>
                </div>


            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection
