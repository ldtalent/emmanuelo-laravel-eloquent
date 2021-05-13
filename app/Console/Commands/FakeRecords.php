<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Post;
use Auth;

class FakeRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fake:records {model} {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fake records';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        if ($this->argument('model') === 'Post') {

            Post::truncate();

            factory(Post::class, $this->argument('number'))->create([
                'user_id' => Auth::id(),
            ]);

        }

    }
}
