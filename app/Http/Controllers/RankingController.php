<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Ranking;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Support\Facades\Schema;
use DateTime;
use \Auth;
use Exception;

$ranking = new Ranking();


class RankingController extends Controller
{


    public function index($user_id = null){

        $ranking = new Ranking;

        $past_rankings = $ranking->getPastRankings();
        $now_rankings = $ranking->getNowRankings();
        $past_rankings_votes = $ranking->getAllVotesCount($past_rankings);
        $now_rankings_votes = $ranking->getAllVotesCount($now_rankings);

        if (Auth::check()){
            $user_id = Auth::id();
            $contents['user_id'] = $user_id;
        }

        $contents['past_rankings'] = $past_rankings; 
        $contents['now_rankings'] = $now_rankings;
        $contents['past_rankings_votes'] = $past_rankings_votes;
        $contents['now_rankings_votes'] = $now_rankings_votes;

        return view('ranking.index', $contents);
    }

    public function list($time){
        if (\Auth::check()) {
            $user_id = \Auth::id();
            $contents['user_id'] = $user_id;
        }
        
        $ranking = new Ranking;
        if ($time == 'past') {
            $text = '最近の';
            $rankings = $ranking->getNowRankings();
            $votes = $ranking->getAllVotesCount($rankings);
        } elseif($time == 'now') {
            $text = '現在投票中の';
            $rankings = $ranking->getPastRankings();
            $votes = $ranking->getAllVotesCount($rankings);
        }

        $contents['text'] = $text;
        $contents['rankings'] = $rankings;
        $contents['votes'] = $votes;

        return view('ranking.list', $contents);
    }

    public function new(Request $request) {
        if (\Auth::check() === FALSE) {
            redirect('/');
        }
        $user_id = \Auth::id();

        if ($request->method() === 'POST'){
            $date = $request->input('limit_date').' 23:59:59';

            $request->validate([
                'name' => 'required',
                'creator' => 'required',
                'limit_date' => 'required|date|after:today',
            ]);

            $name = $request->input('name');
            $creator = $request->input('creator');
            $limit_date = $date;
    
            try{
                Ranking::create([ 
                    'name' => $name,
                    'creator' => $creator,
                    'limit_date' => $limit_date,
                    'user_id' => $user_id
                ]);

            } catch (Exception $e) {
                \Log::info($e->getMessage());
            };

            return redirect('/');

        } else {
            return view('ranking.new', ['user_id' => $user_id]);
        }

    }

    public function edit( Request $request,  $ranking_id) {
        if (\Auth::check() === FALSE) {
            redirect('/');
        }
        $user_id = \Auth::id();
        $ranking = Ranking::find($ranking_id);

        if ($request->method() === 'POST'){
            $date = $request->input('limit_date').' 23:59:59';

            $request->validate([
                'name' => 'required',
                'creator' => 'required',
                'limit_date' => 'required|date|after:today',
            ]);

            $name = $request->input('name');
            $creator = $request->input('creator');
            $limit_date = $date;
    
            try{
                $ranking->update([ 
                    'name' => $name,
                    'creator' => $creator,
                    'limit_date' => $limit_date,
                    'user_id' => $user_id
                ]);

            } catch (Exception $e) {
                \Log::info($e->getMessage());
            };


            return redirect('/');

        } else {
            return view('ranking.edit', ['ranking' => $ranking, 'user_id' => $user_id]);
        }
    }

    public function delete(Request $request, $ranking_id){
        if (\Auth::check() === FALSE) {
            redirect('/');
        }

        if ($request->method() === 'POST'){
            Ranking::find($ranking_id)->delete();
        }

        return redirect('/');
    }

    public static function result($ranking_id) {

        $post = new Post;
        $posts = Post::where('ranking_id', '=', $ranking_id)->withCount('votes')->orderBy('votes_count', 'desc')->get();
        $votes = $post->getVotesCount($posts);

        $contents['posts'] = $posts;
        $contents['votes'] = $votes;
        $ranking = Ranking::find($ranking_id);
        $contents['ranking'] = $ranking;
        $contents['ranking_id'] = $ranking_id;
        $contents['edit'] = FALSE;

        if (\Auth::check()){
            $user_id = \Auth::id();
            $user = \Auth::user();
            $contents['user_id'] = $user_id;
            $contents['user'] = $user;

            if ($user_id == $ranking->user_id || $user->role == 1) {
                $contents['edit'] = TRUE;
            }
        }

        $date = date('Y-m-d H:i:s');
        if ($date > $contents['ranking']->limit_date) {
            $contents['possible'] = FALSE; 
        } else {
            $contents['possible'] = TRUE;
        }
        

        return view('ranking.result', $contents);
    }
}
