<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="/styles/main.css">
</head>
<body>
    <h1>
        Home Page
    </h1>
    <div>
        <a href="{{ route('create') }}">Новый комментарий</a>
    </div>
    
    @if (count($comments) > 0)
        <div>
            @include('includes.commentsTable', ['comments' => $comments])
        </div>
        <div>
            {{ $comments->links() }}
        </div>
    @endif
</body>
</html>