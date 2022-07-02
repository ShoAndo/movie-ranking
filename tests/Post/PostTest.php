<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Ranking;
use App\Models\Post;
use App\Models\Vote;

use function PHPUnit\Framework\isEmpty;

class PostTest extends TestCase
{

  use RefreshDatabase;

  public function testgetVotesCount()
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
  
    $posts = Post::all();

    $post_2 = new Post;

    $votes = $post_2->getVotesCount($posts);

    $this->assertFalse(empty($votes));
  }

  public function testisVotedBy()
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

    $vote = new Vote;

    $vote->user_id = $user->id;
    $vote->post_id = $post->id;

    $vote->save();
  
    $this->assertTrue($post->isVotedBy($user));
  }

}