<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::orderBy('id', 'DESC')->get();
        return view('Dashboard.Subscriber.index', ['subscribers' => $subscribers]);
    }
}
