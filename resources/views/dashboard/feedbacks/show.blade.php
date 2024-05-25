@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $feedback->title }}</h5>
                    <span class="badge bg-secondary">{{$feedback->category->title}}</span>
                </div>
                <div class="card-body">
                    <p>{{ $feedback->description }}</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="comments">
                        @forelse ($feedback->comments as $comment)
                        @include('dashboard.feedbacks.includes.comment')
                        @empty
                        <p class="no-comment text-center text-muted">No comments yet.</p>

                        @endforelse
                    </div>
                    <hr>

                    <form id="commentForm" class="mt-4">
                        @csrf
                        <input type="hidden" name="feedback_id" value="{{ $feedback->id }}">
                        <div class="form-group mb-2">
                            <textarea id="content"></textarea>
                            <small class="comment-error text-danger"></small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('feedbacks.index')}}" class="btn btn-secondary">Go back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

<!-- used online builder for ckeditor to download the build -->
<script src="{{asset('vendors/ckeditor/build/ckeditor.js')}}"></script>

<script>
    var commentEditor;

    $(document).ready(function() {
        initializeCKEditor();
        handleFormSubmission();
    });

    // Initialize CKEditor
    function initializeCKEditor() {
        ClassicEditor
            .create(document.querySelector('#content'), {
                placeholder: 'Leave a comment - Type @ to mention a user..',
                mention: {
                    feeds: [{
                        marker: '@',
                        feed: fetchMentionData
                    }]
                }
            })
            .then(editor => {
                commentEditor = editor;
                console.log('CKEditor initialized');
            })
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
            });
    }

    // Fetch mention data
    function fetchMentionData(query) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '{{ route("comments.users") }}',
                data: {
                    query: query
                },
                success: (response) => {
                    console.log(response.data);
                    resolve(response.data);
                },
                error: (xhr, status, error) => {
                    console.error("Error fetching mention data:", error);
                    reject(error);
                }
            });
        });
    }


    // Handle comment form submission
    function handleFormSubmission() {
        $('#commentForm').submit(function(event) {
            event.preventDefault();

            var $form = $(this);
            var $submitBtn = $form.find('button[type="submit"]');
            var $commentError = $form.find('.comment-error');

            var editorData = commentEditor.getData();
            var formData = $form.serialize() + '&content=' + encodeURIComponent(editorData);

            $.ajax({
                url: '{{ route("comments.store") }}',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $commentError.text('');
                    $submitBtn.prop('disabled', true).html('<i class="fa fa-refresh fa-spin m-1"></i>Loading..');
                },
                success: function(response) {
                    $('.no-comment').remove();
                    $('.comments').append(response);
                    commentEditor.setData('');
                },
                error: function(xhr, status, error) {
                    var errorMessage = "Error: Failed to submit comment!";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    $commentError.text(errorMessage);
                },
                complete: function() {
                    $submitBtn.prop('disabled', false).html('Submit');
                }
            });
        });
    }
</script>


@endpush