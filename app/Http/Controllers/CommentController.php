<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::where('parent_id', '=', NULL)->latest()->paginate(25);
        return view('home', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(?int $parentId = null)
    {
        //save comment parentId into session or clear previous session for top-level comment
        if ($parentId) {
            session(['parentId' => $parentId]);
        } else {
            session(['parentId' => null]);
        }

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //find user in DB or create new
        $user = User::firstOrCreate(['email' => $request->email]);

        //create a sub-comment or top-level comment
        if (session()->get('parentId')) {
            $comment = Comment::findOrFail(session()->get('parentId'));
            $comment->children()->create([
                'user_id' => $user->id,
                'user_name' => $request->userName,
                'home_page' => $request->homePage,
                'text' => $request->text,
            ]);
        } else {
            Comment::create([
                'user_id' => $user->id,
                'user_name' => $request->userName,
                'home_page' => $request->homePage,
                'text' => $request->text,
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
