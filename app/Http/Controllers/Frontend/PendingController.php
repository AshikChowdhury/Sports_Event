<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment\Comment;
use App\Models\Post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')
            ->where('status', 0)
            ->with('user')
            ->with(['comments' =>function ($q){
                return $q->latest()->where('status', 0);
            }])
            ->get();

        $comments = Comment::orderBy('created_at','desc')
            ->where('status', 0)
            ->with('user')
            ->with('post')
            ->get();


        return view('frontend.pending', compact(
                'posts', $posts, 'comments', $comments)
        );
    }
    public function post_status(Request $request, $id){

        Post::findOrFail($id)->update($request->all());

        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function comment_status(Request $request, $id){

        Comment::findOrFail($id)->update($request->all());

        return redirect()->back()->with('success', 'Status updated successfully');
    }
}
