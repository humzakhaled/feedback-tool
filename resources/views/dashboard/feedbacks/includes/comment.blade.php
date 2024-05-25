<div class="mb-3">
    <strong class="text-primary">{{ $comment->user->name }}</strong>
    <small class="text-muted float-end">{{ $comment->created_date }}</small>
    <p>{!! $comment->content !!}</p>
</div>