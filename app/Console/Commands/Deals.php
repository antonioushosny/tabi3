<?php

namespace App\Console\Commands;
use App\Deal ;
use Illuminate\Console\Command;

class Deals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deal:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $deals = Deal::all();
        foreach($deals as $deal){
            $deal->expiry_time  = '18:01';
            $deal->save();
        }
        $this->info('success');
    }
}
