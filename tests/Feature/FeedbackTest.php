<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateStatus()
    {
        $response = $this->get('/feedback/create');
        $response->assertStatus(200);
    }

    public function testCreateForm() {
        $response = $this->get('/feedback/create');
        $response->assertSee('form');
    }
}
