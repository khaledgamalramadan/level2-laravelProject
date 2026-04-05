@extends('admin.master')

@section('title', __('keywords.show_service'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keywords.show_service') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title">{{ __('keywords.title') }}</label>
                                    <p class="form-control" placeholder="{{ __('keywords.title') }}">{{ $service->title }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="icon">{{ __('keywords.icon') }}</label>
                                    <div class="mt-2 text-m">
                                        <i class="{{ $service->icon }} fa-2x"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description">{{ __('keywords.description') }}</label>
                                    <p class="form-control" placeholder="{{ __('keywords.description') }}">
                                        {{ $service->description }}</p>
                                </div>
                            </div>

                        </div>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-primary"><i class="fe fe-arrow-left fa-2x"></i>Back  </a>
                    </div>
                </div>


            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection
