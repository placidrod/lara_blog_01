<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Placid\'s Blog');
    }

    public function testNumberAddedToSlug()
    {
        // $user = User::find(3);
        // $this->actingAs($user)
        //     ->
        
        // $post = factory(App\Post::class)->create(['title' => 'First Post', 'body' => 'first post body']);
        $post = factory(App\Post::class)->create(['title' => 'First Post', 'body' => 'first post body']);

        $this->post(route('posts.index'), $post->jsonSerialize())
            ->seeInDatabase('posts', ['title' => 'First Post'])
            ->assertResponseOk();
    }
}
