<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ranking;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Vote;

class UserController extends Controller
{

    public function mypage($user_id) {
        $ranking = new Ranking;
        $user = User::find($user_id);
        $rankings = $user->rankings()->get();
        $votes = $ranking->getAllVotesCount($rankings);

        return view('user.mypage', ['user'=> $user, 'user_id' => $user_id, 'rankings' => $rankings, 'votes' => $votes]);
    }

    public function retire_confirm($user_id){
        return view('user.retire_confirm', ['user_id' => $user_id]);
    }

    public function retire_complete($user_id){
        $user = \Auth::user();
        \Auth::logout();

        $user->delete();
        return view('user.retire_complete');
    }
}
