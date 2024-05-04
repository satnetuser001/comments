@extends('layouts.basic')
@section('title', 'Home Page')

@section('content')
    <!-- Add new comment button -->
    <a class="button buttonCreate" href="{{ route('create') }}">Создать комментарий</a>

    <!-- table with comments -->
    @if (count($comments) > 0)
        @include('includes.commentsTable', ['comments' => $comments])
    @endif

    <!-- pagination -->
    {{ $comments->links() }}
@endsection