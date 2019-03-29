<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Job;
use App\Candidate;

class ShowList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command merges the tables, sorts them according to spec, and prints them to the console';

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
		// $candidates = Candidate::with('jobs')->get();
		$candidates = Candidate::with(['jobs' => function($query)
			{
			$query->orderBy('enddate', 'desc')->orderBy('startdate', 'desc');
			}])->get();
		
		 foreach($candidates as $candi) {
			
				echo "Name: " . $candi['firstname'] . " " . $candi['lastname'] . " Email: " . $candi['email'] ."\r\n";
				echo "Jobs: ";
				$i =  1;
				$len = count($candi['jobs']);
				foreach($candi['jobs'] as $jobs) {
					 echo $jobs['title'] . " at " . $jobs['company'];
						if ($i == $len) echo ".\r\n";
						else echo ", ";
					$i++;	
				 }
			}	
	}
}
