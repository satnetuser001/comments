@foreach ($comments as $comment)
    <li>
        User ID: {{ $comment->user_id }}, 
        Comment: {{ $comment->text }}, 
        <a href="{{ route('create', $comment->id) }}">Answer</a>
    </li>
    @if ($comment->children)
        <ul>
            @include('includes.commentTree', ['comments' => $comment->children])
        </ul>
    @endif
@endforeach
