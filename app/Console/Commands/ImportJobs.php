<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Job;

class ImportJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports data from the jobs.csv, and puts them in the jobs table';

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
     * Execute the console command.  ['user_id','title','company','startdate','enddate']; 
     *
     * @return mixed
     */
    public function handle()
    {
        $file = base_path("resources/csvfiles/jobs.csv"); // hard-coded yes i know
		$data = array_map('str_getcsv', file($file)); //throws the data into an array, i like this function =)
		foreach($data as $row) { // foreach is very nice as opposed to the oldschool way of 0 to array.length
			Job::updateOrCreate(['user_id' => $row[1], 'title' => $row[2], 'company' => $row[3], 'startdate' => date("Y-m-d",strtotime($row[4])), 'enddate' => date("Y-m-d",strtotime($row[5]))]); //convert the time format to MySQL compatible values
		}
    }
}
