@extends('admin.master')

@section('title', __('keywords.members'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.members') }}</h2>
                    <x-action-button href="{{ route('admin.members.create') }}" type="create"></x-action-button>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <x-success-alert></x-success-alert>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('keywords.name') }}</th>
                                    <th >{{ __('keywords.position') }}</th>
                                    <th >{{ __('keywords.facebook') }}</th>
                                    <th >{{ __('keywords.twitter') }}</th>
                                    <th >{{ __('keywords.linkedin') }}</th>
                                    <th >{{ __('keywords.image') }}</th>
                                    <th width="15%">{{ __('keywords.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($members) > 0)
                                    @foreach ($members as $key => $member)
                                        <tr>
                                            <td>{{ $members->firstItem() + $loop->index }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->position }}</td>
                                            <td>{{ $member->facebook }}</td>
                                            <td>{{ $member->twitter }}</td>
                                            <td>{{ $member->linkedin }}</td>
                                            <td>
                                                <img src="{{ asset("storage/members/$member->image") }}"
                                                alt="{{ $member->name }}" width="50" height="50">
                                            </td>

                                            <td>
                                                {{-- edit btn --}}
                                                <x-action-button href="{{ route('admin.members.edit', ['member' => $member]) }}" type="edit"></x-action-button>

                                                {{-- Show btn --}}
                                                <x-action-button href="{{ route('admin.members.show', ['member' => $member]) }}" type="show"></x-action-button>

                                                {{-- Delete btn --}}
                                                <x-delete-button href="{{ route('admin.members.destroy', ['member' => $member]) }}" id="{{ $member->id }}"></x-delete-button>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif
                            </tbody>
                        </table>
                        {{ $members->render('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
