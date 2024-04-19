<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
</head>
<body>
    <h1>Hello world from "Home Page" !!!</h1>
    @include('includes.commentTree', ['comments' => $comments])
    <div>{{ $comments->links() }}</div>
</body>
</html>