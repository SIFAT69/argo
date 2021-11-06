<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;

class TaskController extends Controller
{
    public function index(Request $request)
    {
      $tasks = DB::table('tasks')->where('added_by', Auth::id())->get();
      return view('Agent.Task.task', compact('tasks'));
    }

    public function save(Request $request)
    {
      DB::table('tasks')->insert([
        'task' => $request->task,
        'added_by' => Auth::id(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      return back()->with('success', 'Task added successfully!');
    }

    public function update(Request $request)
    {
      DB::table('tasks')->where('id', $request->id)->update([
        'task' => $request->task,
        'added_by' => Auth::id(),
        'updated_at' => Carbon::now(),
      ]);

      return back()->with('success', 'Task updated successfully!');
    }

    public function delete(Request $request)
    {
        DB::table('tasks')->where('id', $request->id)->delete();
        return back()->with('danger', 'Task deleted successfully!');
    }
}
