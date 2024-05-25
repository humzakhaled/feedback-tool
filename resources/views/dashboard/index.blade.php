@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>

                    <a href="{{route('feedbacks.index')}}" class="btn btn-sm btn-primary">Go to Feedbacks</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection