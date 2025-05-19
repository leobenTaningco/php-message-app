<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Message;

class MessageTest extends TestCase
{
    use RefreshDatabase;  

    public function test_message_can_be_created()
    {
        $message = Message::create([
            'content' => 'Hello world!'
        ]);

        $this->assertDatabaseHas('messages', [
            'content' => 'Hello world!'
        ]);
    }
}
