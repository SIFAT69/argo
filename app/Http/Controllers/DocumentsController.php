<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;

class DocumentsController extends Controller
{
    public function store(Request $request)
    {

        if(!empty($request->file('docs')))
        {
          foreach($request->file('docs') as $file)
          {
              $name = rand().'.'.$file->extension();
              $file->move(public_path().'/uploads/docs/', $name);
              DB::table('documents')->insert([
                'send_to' => $request->tenant_id,
                'send_from' => Auth::id(),
                'documents' => $name,
                'created_at' => now(),
              ]);
          }
       }

       return back()->with('success', 'Your documents has been added!');
    }

    public function tenant_doscs()
    {
      $docs = DB::table('documents')->where('send_to', Auth::id())->get();
      return view('Tanent.Docs.index',compact('docs'));
    }
}
