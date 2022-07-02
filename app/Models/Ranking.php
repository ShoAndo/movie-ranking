<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Post;
use App\Models\Vote;

class Ranking extends Model
{
    use HasFactory;

    protected $table = 'rankings';

    const UPDATED_AT = null;

    protected $fillable = [
        'name',
        'creator',
        'limit_date',
        'user_id',
    ];

    protected $casts = [
        'limit_date' => 'datetime:Y-m-d H:i:s'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function getPastRankings() {
        $now = date("Y-m-d H:i:s");
        $rankings = Ranking::where('limit_date','<=', $now)->get();
        return $rankings;
    }

    public function getNowRankings() {
        $now = date("Y-m-d H:i:s");
        $rankings = Ranking::where('limit_date','>=', $now)->get();
        return $rankings;
    }

    public function getAllVotesCount($rankings) {
        $votes = [];
        foreach($rankings as $ranking) {
            $vote = 0;
            $posts = Post::where('ranking_id', $ranking['id'])->get()->toArray();
            foreach($posts as $post) {
                $vote += Vote::where('post_id', $post['id'])->count();
            }
            $votes[] = $vote;
        }
        return $votes;
    }
}
