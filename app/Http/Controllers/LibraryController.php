<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;

class LibraryController extends Controller
{
    public function LibraryIndex()
    {
      return view('Dashboard.Media.media');
    }
    public function LibraryFiles()
    {
      $medias = DB::table('libraries')->where('status', 1)->get();
      return view('Dashboard.Media.media_library',compact('medias'));
    }
    public function LibraryFilesTrash()
    {
      $medias = DB::table('libraries')->where('status', 0)->get();
      return view('Dashboard.Media.trash',compact('medias'));
    }

    public function LibraryPost(Request $request)
    {
      foreach ($request->file('images') as $file)
       {
         $name = $file->getClientOriginalName();
         $file->move(public_path('uploads'), $name);
         $files[] = $name;

         DB::table('libraries')->insert([
           'uploader_id' => Auth::id(),
           'uploader_name' => Auth::user()->name,
           'file_name' => $name,
           'status' => 1,
           'created_at' => Carbon::now(),
         ]);
       }
      return back()->with('success', 'Images upload successfully!');
    }

    public function LibraryFilesDelete(Request $request)
    {
      DB::table('libraries')->where('id', $request->id)->update([
        'status' => 0,
      ]);

      return back()->with('danger', 'Images removed from gallery!');
    }
    public function LibraryFilesTrashRestore(Request $request)
    {
      DB::table('libraries')->where('id', $request->id)->update([
        'status' => 1,
      ]);

      return back()->with('success', 'Images restore from trash!');
    }

    public function HardDelete(Request $request)
    {
      $img = DB::table('libraries')->where('id', $request->id)->first();
      $file_path = public_path()."/uploads/".$img->file_name;
      unlink($file_path);
      DB::table('libraries')->where('id', $request->id)->delete();

      return back()->with('danger', 'Images has been permanently deleted!');
    }
}
