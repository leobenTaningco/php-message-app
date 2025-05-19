<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $content = $this->ask('Enter the message content');

        \App\Models\Message::create(['content' => $content]);

        $this->info('Message added!');
    }
}
