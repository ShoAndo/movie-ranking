<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Ranking;
use App\Models\Comment;

class CommentController extends Controller
{
    public function edit(Request $request, $comment_id)
    {
        $user_id = \Auth::id();
        $comment = Comment::find($comment_id);
        $contents['user_id'] = $user_id;
        $contents['comment'] = $comment;
        $contents['rank'] = $request->input('rank');

        if ($request->method() === 'POST') {
            
            $contents['post_edit'] = FALSE;
            $contents['ranking_edit'] = FALSE;
            $comment = Comment::find($comment_id);
            $post = Post::find($comment->post_id);
            $post_id = $post->id;
            $ranking = Ranking::find($post->ranking_id);
            $ranking_id = $ranking->id;
            $vote = $post->votes()->count();


            if (\Auth::check()) {
                $user_id = \Auth::id();
                $user = \Auth::user();
                $contents['user'] = $user;
                $contents['user_id'] = $user_id;

                if ($user_id == $post->user_id || $user->role == 1) {
                    $contents['post_edit'] = TRUE;
                }

                if ($user_id == $ranking->user_id || $user->role == 1) {
                    $contents['ranking_edit'] = TRUE;
                }
            }

            $contents['ranking'] = $ranking;
            $contents['ranking_id'] = $ranking_id;
            $contents['post'] = $post;
            $contents['vote'] = $vote;

            $request->validate([
                'content' => 'required',
                'rank' => 'required',
            ]);

            $rank = $request->input('rank');
            $contents['rank'] = $rank;

            $content = $request->input('content');

            try {
                $comment->update([
                    'content' => $content,
                    'user_id' => $user_id,
                    'post_id' => $post_id
                ]);
            } catch (Exception $e) {
                \Log::info($e->getMessage());
            }

            $comments = $post->comments()->get();
            $contents['comments'] = $comments;

            return view('post.detail', $contents);
        } else {
            return view('comment.edit', $contents);
        }
    }

    public function new(Request $request, $post_id)
    {
        $contents['post_edit'] = FALSE;
        $contents['ranking_edit'] = FALSE;
        $post = Post::find($post_id);
        $ranking = Ranking::find($post->ranking_id);
        $ranking_id = $ranking->id;
        $vote = $post->votes()->count();

        if (\Auth::check()) {
            $user_id = \Auth::id();
            $user = \Auth::user();
            $contents['user'] = $user;
            $contents['user_id'] = $user_id;

            if ($user_id == $post->user_id || $user->role == 1) {
                $contents['post_edit'] = TRUE;
            }

            if ($user_id == $ranking->user_id || $user->role == 1) {
                $contents['ranking_edit'] = TRUE;
            }
        }

        $contents['ranking'] = $ranking;
        $contents['ranking_id'] = $ranking_id;
        $contents['post'] = $post;
        $contents['vote'] = $vote;

        $request->validate([
            'content' => 'required',
            'rank' => 'required',
        ]);

        $rank = $request->input('rank');
        $contents['rank'] = $rank;

        $content = $request->input('content');

        try {
            Comment::create([
                'content' => $content,
                'user_id' => $user_id,
                'post_id' => $post_id
            ]);
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }

        $comments = $post->comments()->get();
        $contents['comments'] = $comments;

        return view('post.detail', $contents);
    }
}
