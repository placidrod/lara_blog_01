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

    // public function testBlockUnauthorizedUsersFromCreatingPost()
    // {
    //     $user = Auth::loginUsingId(1);

    //     $this->actingAs($user)
    //         ->visit('posts/create')
    //         ->assertResponseStatus(200);
    // }

    public function testUniqueSlugInPostsTable()
    {   
        $post = factory(App\Post::class)->create(['title' => 'First Post', 'body' => 'first post body']);
        $post2 = factory(App\Post::class)->create(['title' => 'First Post', 'body' => 'first post body']);

        $this->get(route('posts.index'))
            ->assertResponseOk();

        $this->dontSeeInDatabase('posts', ['id' => $post2->id, 'title' => 'First Post', 'slug' => 'first-post' ]);
    }
}
