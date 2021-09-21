<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentserviceController extends Controller
{
    public function store(Request $request)
    {
        DB::table('commentservices')->insert([
            'request_id' => $request->request_id,
            'comment' => $request->comment,
            'commented_by' => Auth::user()->name,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }

    public function cancel(Request $request)
    {
        DB::table('servicerequests')->where('id', $request->id)->update([
            'status' => 'Cancelled',
        ]);

        return back()->with('danger','Your services request has been cancelled');
    }
}
