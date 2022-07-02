<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vote;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    const UPDATED_AT = null;

    protected $fillable = [
        'title',
        'url',
        'ranking_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function ranking(){
        return $this->belongsTo('App\Models\Ranking');
    }

    public function votes(){
        return $this->hasMany('App\Models\Vote');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function getVotesCount($posts){
        $votes = [];
        foreach ($posts as $post){
            $votes[] = Vote::where('post_id', $post['id'])->count();
        }
        return $votes;
    }

    public function isVotedBy($user):bool{
        return Vote::where('user_id', $user->id)->where('post_id', $this->id)->first() !== null;
    }   
}
