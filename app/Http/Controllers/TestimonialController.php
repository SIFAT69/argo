<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use Image;
use App\Events\ActivityHappened;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('Dashboard.Testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_name' => 'bail|required|string|max:255',
            'user_position' => 'bail|required|string|max:255',
            'comment' => 'bail|required|string|max:255',
            'avatar' => 'bail|sometimes|file|image|mimes:jpg,jpeg,png|max:1000|dimensions:ratio=1/1',
        ]);

        if (!empty($request->avatar)) 
        {
            $randomNumber =rand();
            $avatar = $request->file('avatar');
            $avatar_rename = $randomNumber.'.'.$avatar->getClientOriginalExtension();
            $newLocation = public_path('/uploads/'.$avatar_rename);
            Image::make($avatar)->resize(100, 100)->save($newLocation,100);
      
            Testimonial::create([
                'user_name' => $request->user_name,
                'user_position' => $request->user_position,
                'comment' => $request->comment,
                'avatar' => $avatar_rename,
            ]);
        }
        else
        {
            Testimonial::create([
                'user_name' => $request->user_name,
                'user_position' => $request->user_position,
                'comment' => $request->comment,
            ]);
        }
        
        ActivityHappened::dispatch(Auth::id(), 'A new testimonial has been created.');

        return redirect()->route('testimonials.index')->with('success', 'Testimonial added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('Dashboard.Testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'user_name' => 'bail|required|string|max:255',
            'user_position' => 'bail|required|string|max:255',
            'comment' => 'bail|required|string|max:255',
            'avatar' => 'bail|sometimes|file|image|mimes:jpg,jpeg,png|max:1000|dimensions:ratio=1/1',
        ]);

        if (!empty($request->avatar)) 
        {
            $randomNumber =rand();
            $avatar = $request->file('avatar');
            $avatar_rename = $randomNumber.'.'.$avatar->getClientOriginalExtension();
            $newLocation = 'uploads/'.$avatar_rename;
            Image::make($avatar)->resize(100, 100)->save($newLocation,100);
      
            Testimonial::where('id', $id)->update([
                'user_name' => $request->user_name,
                'user_position' => $request->user_position,
                'comment' => $request->comment,
                'avatar' => $avatar_rename,
            ]);
        }
        else
        {
            Testimonial::where('id', $id)->update([
                'user_name' => $request->user_name,
                'user_position' => $request->user_position,
                'comment' => $request->comment,
            ]);
        }

        ActivityHappened::dispatch(Auth::id(), 'A testimonial has been updated.');

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonial::destroy($id);
        ActivityHappened::dispatch(Auth::id(), 'A testimonial has been deleted.');

        return redirect()->route('testimonials.index')->with('danger', 'Testimonial deleted successfully');
    }
}
