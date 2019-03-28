<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Candidate;

class ImportCandidates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:candidates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports data from the candidates.csv, and puts them in the candidates table';

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
        $file = base_path("resources/csvfiles/candidates.csv"); // hard-coded yes i know
		$data = array_map('str_getcsv', file($file)); //throws the data into an array, i like this function =)
		foreach($data as $row) { // foreach is very nice as opposed to the oldschool way of 0 to array.length
			Candidate::updateOrCreate(['id' => $row[0], 'firstname' => $row[1], 'lastname' => $row[2], 'email' => $row[3]]); //adding id isnt ideal, quick fix around the fact that jobs already pointing at current id's
		}
		
    }
}
