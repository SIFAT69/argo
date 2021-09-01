<?php

namespace App\Listeners;

use App\Events\ActivityHappened;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\ActivityLog;

class CreateActivityLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ActivityHappened  $event
     * @return void
     */
    public function handle(ActivityHappened $event)
    {
        ActivityLog::create([
            'user_id' => $event->user_id,
            'activity' => $event->activity,
        ]);
    }
}
