<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function AgentDashboard()
    {
      return view('Agent.Dashboard.dashboard');
    }
}
