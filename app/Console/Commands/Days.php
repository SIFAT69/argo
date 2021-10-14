<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class Days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will run every days.';

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
      // Days Count
      $allProperties = DB::table('properties')->get();
      foreach ($allProperties as $property) {
        $days = DB::table('properties')->where('id', $property->id)->value('remaining_days');
        $newDays = $days-1;
        if ($newDays <= 5) {
          DB::table('properties')->where('id', $property->id)->update([
            'rent_status' => 'Not Paid',
          ]);
        }
        DB::table('properties')->where('id', $property->id)->update([
          'remaining_days' => $newDays,
        ]);
      }
    }
}
