@extends('layouts.basic')
@section('title', 'Home Page')

@section('content')
    <div class="newComment">
        <a href="{{ route('create') }}">Новый комментарий</a>
    </div>

    @if (count($comments) > 0)
        <div class="table">
            @include('includes.commentsTable', ['comments' => $comments])
        </div>
        
        <!-- pagination -->
        {{ $comments->links() }}
    @endif
@endsection