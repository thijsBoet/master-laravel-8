<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageSeeText()
    {
        $response = $this->get('/');

        $response->assertSeeText("Home Page");
        $response->assertSeeText("This is the content of the main page!");
    }
}