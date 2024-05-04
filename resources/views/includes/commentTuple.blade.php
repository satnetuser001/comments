<ul type="none">
<!-- <ul> -->
    <li>
        <div class="comment">
            <div class="commentHead">
                <div>
                    {{ $comment->user_name }}
                </div>
                <div>
                    {{ $comment->user->email }}
                </div>
                <div>
                    {{ $comment->created_at }}
                </div>
            </div>
            <div class="commentBody">
                <div class="text">
                    {{ $comment->text }}
                </div>
                <a class="button buttonAnswer" href="{{ route('create', $comment->id) }}">Ответить</a>
            </div>
            @if ($comment->children)
                <div class="commentChild">
                    @foreach ($comment->children as $comment)
                        @include('includes.commentTuple', ['comment' => $comment])
                    @endforeach
                </div>
            @endif
        </div>
    </li>
</ul>