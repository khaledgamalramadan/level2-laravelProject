@extends('admin.master')

@section('title', __('keywords.subscribers'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.subscribers') }}</h2>

                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <x-success-alert></x-success-alert>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('keywords.email') }}</th>
                                    <th>{{ __('keywords.created_at') }}</th>
                                    <th width="10%">{{ __('keywords.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($subscribers) > 0)
                                    @foreach ($subscribers as $key => $subscriber)
                                        <tr>
                                            <td>{{ $subscribers->firstItem() + $loop->index }}</td>
                                            <td>{{ $subscriber->email }}</td>
                                            <td>{{ $subscriber->created_at }}</td>
                                            <td>
                                                {{-- Delete btn --}}
                                                <x-delete-button href="{{ route('admin.subscribers.destroy', ['subscriber' => $subscriber]) }}" id="{{ $subscriber->id }}"></x-delete-button>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif
                            </tbody>
                        </table>
                        {{ $subscribers->render('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
