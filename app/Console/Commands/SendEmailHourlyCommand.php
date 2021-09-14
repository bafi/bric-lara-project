<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmailHourlyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hourly:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'console command that sends an email every hour';

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
     * @return mixed
     */
    public function handle()
    {
        // Prepare the email here
    }
}
