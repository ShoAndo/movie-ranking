<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use \App\Models\Ranking;
use App\Models\Vote;

class PostController extends Controller
{
    public function new(Request $request, $ranking_id) {
        $post = new Post;
        $posts = Post::where('ranking_id', '=', $ranking_id)->withCount('votes')->orderBy('votes_count', 'desc')->get();
        $votes = $post->getVotesCount($posts);

        $contents['posts'] = $posts;
        $contents['votes'] = $votes;

        $contents['ranking_id'] = $ranking_id;
        $ranking = Ranking::find($ranking_id);
        $contents['ranking'] = $ranking;

        if(\Auth::check()){
            $user_id = \Auth::id();
            $user = \Auth::user();
            $contents['user_id'] = $user_id;
            $contents['user'] = $user;

            if ($user_id == $ranking->user_id || $user->role == 1) {
                $contents['edit'] = TRUE;
            } else {
                $contents['edit'] = FALSE;
            }
        } else {
            redirect('/');
        }

        $date = date('Y-m-d H:i:s');
        if ($date > $contents['ranking']->limit_date) {
            $contents['possible'] = FALSE; 
        } else {
            $contents['possible'] = TRUE;
        }

        if ($request->method() === 'POST'){

            $request->validate([
                'title' => 'required',
                'url' => 'required',
            ]);

            $title = $request->input('title');

            $url = $request->input('url');
            if (strpos($url, 'embed/')){
                $youtube_id = substr($url, (strpos($url, 'embed/') + 6));
            } else {
                $youtube_id = substr($url, (strpos($url, '=') + 1));
            }
            $youtube_url = "https://www.youtube.com/embed/{$youtube_id}";

            try {
                Post::create([
                    'title' => $title,
                    'url' => $youtube_url,
                    'user_id' => $user_id,
                    'ranking_id' => $ranking_id
                ]);
            } catch(Exception $e) {
                \Log::info($e->getMessage());
            }

            return view('ranking.result', $contents);

        } else {
            $contents['ranking_id'] = $ranking_id;
            return view('post.new', $contents);
        }

    }

    public function edit(Request $request, $post_id) {
        $contents['edit'] = FALSE;

        if (\Auth::check() === FALSE) {
            redirect('/');
        }

        $user_id = \Auth::id();
        $contents['user_id'] = $user_id;
        
        $post = Post::find($post_id);
        $user = \Auth::user();
        $ranking = Ranking::find($post->ranking_id);
        $posts = Post::where('ranking_id', '=', $ranking->id)->withCount('votes')->orderBy('votes_count', 'desc')->get();
        $votes = $post->getVotesCount($posts);

        $contents['ranking'] = $ranking;
        $contents['ranking_id'] = $ranking->id;
        $contents['post'] = $post;
        $contents['posts'] = $posts;
        $contents['votes'] = $votes;

        if ($user_id == $ranking->user_id || $user->role == 1) {
            $contents['edit'] = TRUE;
        }

        $date = date('Y-m-d H:i:s');
        if ($date > $contents['ranking']->limit_date) {
            $contents['possible'] = FALSE; 
        } else {
            $contents['possible'] = TRUE;
        }

        if ($request->method() === 'POST'){

            $request->validate([
                'title' => 'required',
                'url' => 'required',
            ]);

            $title = $request->input('title');

            $url = $request->input('url');
            if (strpos($url, 'embed/')){
                $youtube_id = substr($url, (strpos($url, 'embed/') + 6));
            } else {
                $youtube_id = substr($url, (strpos($url, '=') + 1));
            }
        
            $youtube_url = "https://www.youtube.com/embed/{$youtube_id}";

            try {
                $post->update([
                    'title' => $title,
                    'url' => $youtube_url,
                    'user_id' => $user_id,
                    'ranking_id' => $post->ranking_id
                ]);

            } catch(Exception $e) {
                \Log::info($e->getMessage());
            }

            return view('ranking.result', $contents);

        } else {
            return view('post.edit', $contents);
        }

    }

    public function vote(Request $request) {

        $user_id = \Auth::id();
        $post_id = $request->post_id;
        $post = Post::find($post_id);

        $already_voted = Vote::where('user_id', $user_id)->where('post_id', $post_id)->first();

        if (!$already_voted){
            $vote = new Vote;
            $vote->post_id = $post_id;
            $vote->user_id = $user_id;
            $vote->save();
        } else {
            Vote::where('user_id', $user_id)->where('post_id', $post_id)->delete();
        }

        $votes_count = $post->votes()->count();

        $contents['votes_count'] = $votes_count;

        
        return response()->json($contents);
    }


    public function detail($ranking_id, $post_id, $rank) {
        $contents['post_edit'] = FALSE;
        $contents['ranking_edit'] = FALSE;
        $ranking = Ranking::find($ranking_id);
        $post = Post::find($post_id);
        $vote = $post->votes()->count();
        $comments = $post->comments()->get();

        if(\Auth::check()){
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
        $contents['rank'] = $rank;
        $contents['vote'] = $vote;
        $contents['comments'] = $comments;

        return view('post.detail', $contents);
    }

    public function delete(Request $request, $post_id){
        if (\Auth::check() === FALSE) {
            redirect('/');
        }

        if ($request->method() === 'POST'){
            Post::find($post_id)->delete();
        }

        return redirect('/');
    }
}
