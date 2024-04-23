<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Http\Requests\StoreCommentRequest;

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
    //public function store(Request $request)
    public function store(StoreCommentRequest $request)
    {
        //get the validated input data.
        $validated = $request->validated();

        //find user in DB or create new
        $user = User::firstOrCreate(['email' => $validated['email']]);

        //create a sub-level or top-level comment
        if (session()->get('parentId')) {
            $comment = Comment::findOrFail(session()->get('parentId'));
            $comment->children()->create([
                'user_id' => $user->id,
                'user_name' => $validated['userName'],
                'home_page' => $validated['homePage'],
                'text' => $validated['text'],
            ]);
        } else {
            Comment::create([
                'user_id' => $user->id,
                'user_name' => $validated['userName'],
                'home_page' => $validated['homePage'],
                'text' => $validated['text'],
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //the method is not currently used.
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //the method is not currently used.
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //the method is not currently used.
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //the method is not currently used.
        return redirect()->route('home');
    }
}
