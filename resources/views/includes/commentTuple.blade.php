<ul type="none">
<!-- <ul> -->
    <li>
        <div>
            <div>
                {{ $comment->user_name }}
                {{ $comment->user->email }}
                {{ $comment->created_at }}
            </div>
            <div>
                {{ $comment->text }}
                <a href="{{ route('create', $comment->id) }}">Answer</a>
            </div>
        </div>
        @if ($comment->children)
            <div class="children">
                @foreach ($comment->children as $comment)
                    @include('includes.commentTuple', ['comment' => $comment])
                @endforeach
            </div>
        @endif
    </li>
</ul>