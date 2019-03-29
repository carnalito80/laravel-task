<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FireAway extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fire:away';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kör alla kommandon för uppgiften';

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
		if ($this->confirm('Detta kör igång scriptet, det blir en fresh migrate.. fortsätta? [yes|no]'))
		{
		$this->call('migrate:fresh'); //startar fresh med nya databaser
		$this->call('import:candidates'); //importerar candidaterna
		$this->call('import:jobs'); //importerar jobben
		$this->call('show:list'); //visar den fina listan med data.
		}
        
    }
}
