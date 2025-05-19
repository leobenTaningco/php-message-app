<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Message;

class MessageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_messages()
    {
        Message::create(['content' => 'Test Message']);

        $response = $this->get('/messages'); 

        $response->assertStatus(200);
        $response->assertSee('Test Message');
    }

    public function test_store_creates_new_message(){
        $response = $this->post('/messages', [
            'content' => 'Test Message'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('messages', [
            'content' => 'Test Message'
        ]);
    }
}
