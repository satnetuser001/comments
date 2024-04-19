<div>
    @foreach ($comments as $comment)
        <li>User ID: {{ $comment->user_id }}, Comment: {{ $comment->text }}</li>

        @if ($comment->children)
            <ul>
                @include('includes.commentTree', ['comments' => $comment->children])
            </ul>
        @endif
    @endforeach
</div>
