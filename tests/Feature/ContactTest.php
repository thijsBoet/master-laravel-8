<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testContactPageSeeText()
    {
        $response = $this->get('/contact');

        $response->assertSeeText('Contact Page'); 
        $response->assertSeeText('This is the content of the Contact page!'); 
    }
}