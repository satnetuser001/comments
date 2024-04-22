<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
</head>
<body>
    <h1>
        Home Page
    </h1>
    <div>
        <a href="{{ route('create') }}">New comment</a>
    </div>
    <div>
        @include('includes.commentTree', ['comments' => $comments])
    </div>
    <div>
        {{ $comments->links() }}
    </div>
</body>
</html>