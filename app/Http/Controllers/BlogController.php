<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use App\Events\ActivityHappened;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    // View Pages Start
    public function blogList(Request $request)
    {
      $blogs = DB::table('blogs')->get();
      return view('Dashboard.Blog.blogs',compact('blogs'));
    }

    public function createNewBlog(Request $request)
    {
      $categories = DB::table('categories')->where('status', 'Published')->get();
      return view('Dashboard.Blog.createnewblog', compact('categories'));
    }

    public function edit(Request $request)
    {
      $blog = DB::table('blogs')->where('id', $request->id)->first();
      return view('Dashboard.Blog.editblog',compact('blog'));
    }
    // View Pages End

    // functional Blogs start
    public function store(Request $request)
    {
      $validated = $request->validate([
          'title' => 'required|unique:blogs|max:255',
          'description' => 'required',
          'meta_image' => 'required',
          'meta_desc' => 'required',
          'status' => 'required',
          'category' => 'required',
      ]);
      if (!empty($request->meta_image)) {
        $randomNumber =rand();
        $meta_image = $request->file('meta_image');
        $meta_image_rename = $randomNumber.'.'.$meta_image->getClientOriginalExtension();
        $newLocation = 'uploads/'.$meta_image_rename;
        Image::make($meta_image)->resize(689, 380)->save($newLocation,100);
      }

      DB::table('blogs')->insert([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'meta_desc' => $request->meta_desc,
        'meta_image' => $meta_image_rename,
        'status' => $request->status,
        'category' => $request->category,
        'description' => $request->description,
        'posted_by' => Auth::id(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      ActivityHappened::dispatch(Auth::id(), 'A new blog has been created.');

      return redirect('/blog-lists')->with('success', 'You have created a blog successfully!');
    }

    public function update(Request $request)
    {

      $validated = $request->validate([
          'title' => 'required  |max:255',
          'description' => 'required',
          'meta_desc' => 'required',
          'status' => 'required',
          'category' => 'required',
      ]);
      if (!empty($request->meta_image)) {
        $randomNumber =rand();
        $meta_image = $request->file('meta_image');
        $meta_image_rename = $randomNumber.'.'.$meta_image->getClientOriginalExtension();
        $newLocation = 'uploads/'.$meta_image_rename;
        Image::make($meta_image)->resize(689, 380)->save($newLocation,100);
        DB::table('blogs')->where('id', $request->id)->update([
          'meta_image' => $meta_image_rename,
        ]);
      }

      DB::table('blogs')->where('id', $request->id)->update([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'meta_desc' => $request->meta_desc,
        'status' => $request->status,
        'category' => $request->category,
        'description' => $request->description,
        'posted_by' => Auth::id(),
        'updated_at' => Carbon::now(),
      ]);

      ActivityHappened::dispatch(Auth::id(), 'A blog has been updated.');

      return back()->with('success', 'You have updated a blog successfully!');
    }

    public function delete(Request $request)
    {
      DB::table('blogs')->where('id', $request->id)->delete();
      ActivityHappened::dispatch(Auth::id(), 'A blog has been deleted.');

      return back()->with('danger', 'You have deleted a blog successfully!');
    }
    // functional Blogs End
}
