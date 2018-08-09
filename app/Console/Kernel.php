<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            $data = DB::table('form_dana')
                ->whereRaw('form_dana.status = 1')
                ->get();
            // echo $data[0]->id;
            foreach($data as $value){                
                if($value->cicilan_potongan > 0 ){
                    $dana_potongan = $value->dana_potongan - ($value->dana_potongan /  $value->cicilan_potongan);
                    if($value->cicilan_potongan == 1) $dana_potongan = 0;
                    
                    DB::table('form_dana')->where('id',$value->id)->update([
                        'cicilan_potongan'=>$value->cicilan_potongan - 1,
                        'dana_potongan'=> $dana_potongan
                    ]);
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
