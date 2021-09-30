<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    

    public function testNoPostsWhenNothingInDatabase()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No Posts Found!');
    }

    public function testSeeOnePostWhenThereIsOne()
    {
        // Arrange
        $post = $this->createDummyBlogPost();

        // Act
        $response = $this->get('/posts');

        // Assert
        $response->assertSeeText('First Title');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'First Title'
        ]);
    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid Title',
            'content' => 'At least 10 characters'
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog Post was Created!');
    }
    
    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0], "The title must be at least 5 characters.");
        $this->assertEquals($messages['content'][0], "The content must be at least 10 characters.");
    }

    public function testUpdateValid()
    {
        $post = $this->createDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'First Title',
            'content' => 'Content of the Blog Post'
        ]);

        $params = [
            'title' => 'New Title',
            'content' => 'My changed Content'
        ];

        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog Post was Updated!');
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New Title',
            'content' => 'My changed Content'
        ]);
    }

    public function testDelete()
    {
        $post = $this ->createDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'First Title',
            'content' => 'Content of the Blog Post'
        ]);

        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog Post was Deleted!');

        $this->assertDatabaseMissing('blog_posts', [
            'title' => 'First Title',
            'content' => 'Content of the Blog Post'
        ]);
    }

    private function createDummyBlogPost(): BlogPost
    {
        $post = new BlogPost();
        $post->title = 'First Title';
        $post->content = 'Content of the Blog Post';
        $post->save();

        return $post;
    }
}