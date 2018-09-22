<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListagemDeRespostaPorTopico()
    {
        $user = factory(\App\User::class)->create();
        $this->seed('RepliesTableSeeder');

        $replies = \App\Reply::where('thread_id',2)
            ->get();
        $response = $this->actingAs($user)
            ->json('GET', '/replies/2');

        $response->assertStatus(200)
            ->assertJsonFragment([$replies->toArray()]);
    }
}
