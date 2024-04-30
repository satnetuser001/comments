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
        <a href="{{ route('home', ['sortField' => 'user_name', 'sortDirection' => 'asc']) }}">User Name ASC</a><br>
        <a href="{{ route('home', ['sortField' => 'user_name', 'sortDirection' => 'desc']) }}">User Name DESC</a><br><br>

        <a href="{{ route('home', ['sortField' => 'email', 'sortDirection' => 'asc']) }}">!!! User Email ASC</a><br>
        <a href="{{ route('home', ['sortField' => 'email', 'sortDirection' => 'desc']) }}">!!! User Emaile DESC</a><br><br>

        <a href="{{ route('home', ['sortField' => 'created_at', 'sortDirection' => 'asc']) }}">Comment Created at ASC</a><br>
        <a href="{{ route('home', ['sortField' => 'created_at', 'sortDirection' => 'desc']) }}">Comment Created at DESC</a><br><br>
    </div>
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