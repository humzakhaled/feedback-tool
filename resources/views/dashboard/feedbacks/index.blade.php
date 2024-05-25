@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-md-flex justify-content-between">
                    <h5>Feedbacks</h5>
                    <a class="btn btn-sm btn-primary" href="{{route('feedbacks.create')}}">Create feedback</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $feedback->title }}</td>
                                    <td>{{ $feedback->category->title }}</td>
                                    <td>{{ $feedback->user->name }}</td>
                                    <td>
                                        <a href="{{ route('feedbacks.show', $feedback->id) }}" class="btn btn-sm btn-secondary">View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No feedbacks at the moment.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer">
                    {{ $feedbacks->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection