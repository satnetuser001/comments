@foreach ($comments as $comment)
    <li>
        User ID: {{ $comment->user_id }},
        Имя пользователя: {{ $comment->user_name }},
        Email: {{ $comment->user->email }},
        Дата добавления: {{ $comment->created_at }},
        Comment: {{ $comment->text }},
        <a href="{{ route('create', $comment->id) }}">Answer</a>
    </li>
    @if ($comment->children)
        <ul>
            @include('includes.commentTree', ['comments' => $comment->children])
        </ul>
    @endif
@endforeach
