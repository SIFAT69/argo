<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::select('users.name as user_name', 'activity_logs.activity', 'activity_logs.created_at')
                            ->leftJoin('users', 'users.id', '=', 'activity_logs.user_id')
                            ->get();
        
        return view('Dashboard.ActivityLog.index', ['logs' => $logs]);
    }

    public function store($user_id, $activity)
    {
        ActivityLog::create([
            'user_id' => $user_id,
            'activity' => $activity,
        ]);
    }
}
