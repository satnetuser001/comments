<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreCommentRequest;
//use Illuminate\Support\Facades\Blade;

//Caution! The model eager greedy loading of all child and parent elements.
use App\Models\Comment;

class CommentController extends Controller
{
    protected $topLevelCommentsCount = 25;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $comments;

        //handle sorting query
        //set and correct
        if (
            (
                $request->query('sortField') == 'user_name'
                or $request->query('sortField') == 'email'
                or $request->query('sortField') == 'created_at'
            ) and (
                $request->query('sortDirection') == 'asc'
                or $request->query('sortDirection') == 'desc'
            )
        ) {
            session([
                'sortField' => $request->query('sortField'),
                'sortDirection' => $request->query('sortDirection'),
            ]);
        }

        //not set in first request or incorrect
        elseif (!session()->get('sortField') or !session()->get('sortDirection')) {
            session([
                'sortField' => 'created_at',
                'sortDirection' => 'desc',
            ]);
        }

        //else { leave the current sorting settings when moving to another page }

        //sort comments
        //by user email
        if (session()->get('sortField') == 'email') {
            $comments = Comment::where('parent_id', '=', NULL)
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*','users.email')
                ->orderBy('users.email', session()->get('sortDirection'))
                ->paginate($this->topLevelCommentsCount)
            ;
        }
        //by user name or created at
        else {
            $comments = Comment::where('parent_id', '=', NULL)
                ->orderBy(session()->get('sortField'), session()->get('sortDirection'))
                ->paginate($this->topLevelCommentsCount)
            ;
        }

        //current sorting for the view
        $sortedBy = [
            'sortField' => session()->get('sortField'),
            'sortDirection' => session()->get('sortDirection'),
        ];

        return view('home', ['comments' => $comments, 'sortedBy' => $sortedBy]);
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

        /*------------*/
        //$sanitizedComment = Blade::clean($validated['text']);
        $formattedComment = Blade::compileHtml($validated['text']);
        /*------------*/

        //find user in DB or create new
        $user = User::firstOrCreate(['email' => $validated['email']]);

        //create a sub-level or top-level comment
        if (session()->get('parentId')) {
            $comment = Comment::findOrFail(session()->get('parentId'));
            $comment->children()->create([
                'user_id' => $user->id,
                'user_name' => $validated['userName'],
                'home_page' => $validated['homePage'],
                //'text' => $validated['text'],
                'text' => $formattedComment,
            ]);
        } else {
            Comment::create([
                'user_id' => $user->id,
                'user_name' => $validated['userName'],
                'home_page' => $validated['homePage'],
                //'text' => $validated['text'],
                'text' => $formattedComment,
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
