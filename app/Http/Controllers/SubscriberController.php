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

    public function destroy($id)
    {
        Subscriber::destroy($id);
        return redirect()->route('subscribers.index')->with('danger', 'Subscriber has deleted');
    }
}
