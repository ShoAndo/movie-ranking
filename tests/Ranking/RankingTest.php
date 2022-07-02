<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Ranking;
use App\Models\Post;
use App\Models\Vote;

use function PHPUnit\Framework\isEmpty;

class RankingTest extends TestCase
{

  use RefreshDatabase;

  public function test_getPastRankings()
  {
    $user = User::factory()->create();

    $ranking = new Ranking;

    $ranking->name = "テスト";
    $ranking->creator = "配信者";
    $ranking->limit_date = now()->modify('-1week')->format('Y-m-d H:i:s');
    $ranking->user_id = $user->id;

    $ranking->save();

    $past_rankings = $ranking->getPastRankings();

    $this->assertFalse($past_rankings->isEmpty());
  
  }

  public function test_getNowRankings()
  {
    $user = User::factory()->create();

    $ranking = new Ranking;

    $ranking->name = "テスト";
    $ranking->creator = "配信者";
    $ranking->limit_date = now()->modify('+1week')->format('Y-m-d H:i:s');
    $ranking->user_id = $user->id;

    $ranking->save();

    $now_rankings = $ranking->getNowRankings();

    $this->assertFalse($now_rankings->isEmpty());
  
  }

  public function test_getAllVotesCount()
  {
    $user = User::factory()->create();

    $ranking = new Ranking;

    $ranking->name = "テスト";
    $ranking->creator = "配信者";
    $ranking->limit_date = now()->modify('+1week')->format('Y-m-d H:i:s');
    $ranking->user_id = $user->id;

    $ranking->save();

    $post = new Post;

    $post->title = "テスト";
    $post->url = "asdfasdfasdfasdf";
    $post->ranking_id = $ranking->id;
    $post->user_id = $user->id;

    $post->save();

    $post = new Post;

    $post->title = "テスト";
    $post->url = "asdfasdfasdfasdf";
    $post->ranking_id = $ranking->id;
    $post->user_id = $user->id;

    $post->save();

    $vote = new Vote;

    $vote->user_id = $user->id;
    $vote->post_id = $post->id;

    $vote->save();

    $vote = new Vote;

    $vote->user_id = $user->id;
    $vote->post_id = $post->id;

    $vote->save();
  
    $rankings = Ranking::all()->toArray();

    $ranking_2 = new Ranking;

    $votes = $ranking_2->getAllVotesCount($rankings);

    $this->assertFalse(empty($votes));

  }
}