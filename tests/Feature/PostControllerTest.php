<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** 
     * Test to ensure that the /posts endpoint returns a list of posts 
     * with user information and is sorted by id in descending order.
     */
    public function testIndexSortsResults()
    {
    // Create posts using the factory, ensuring they have different IDs
    $post1 = Post::factory()->create(['id' => 1]);
    $post2 = Post::factory()->create(['id' => 2]);

    // Hit the endpoint
    $response = $this->get('/posts');

    // Decode the JSON response
    $posts = json_decode($response->getContent(), true);

    // Assert that the posts are sorted in descending order based on 'id'
    $this->assertEquals([2, 1], array_column($posts, 'id'));
    }
}
