<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Choice;
use Image;
use Illuminate\Support\Facades\Auth;
use App\Events\ActivityHappened;

class ChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choices = Choice::all();
        return view('Dashboard.Choices.index', compact('choices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Choices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|string|max:255',
            'description' => 'bail|required|string|max:255',
            'icon' => 'bail|required|file|image|mimes:jpg,jpeg,png|max:1000|dimensions:ratio=1/1',
        ]);

        $randomNumber =rand();
        $icon = $request->file('icon');
        $icon_rename = $randomNumber.'.'.$icon->getClientOriginalExtension();
        $newLocation = public_path('uploads/'.$icon_rename);
        Image::make($icon)->resize(100, 100)->save($newLocation, 100);
    
        Choice::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $icon_rename,
        ]);

        ActivityHappened::dispatch(Auth::id(), 'A new choice has been created.');

        return redirect()->route('choices.index')->with('success', 'Choice added successfully');
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
        $choice = Choice::findOrFail($id);
        return view('Dashboard.Choices.edit', compact('choice'));
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
        $request->validate([
            'title' => 'bail|required|string|max:255',
            'description' => 'bail|required|string|max:255',
            'icon' => 'bail|sometimes|file|image|mimes:jpg,jpeg,png|max:1000|dimensions:ratio=1/1',
        ]);

        if (!empty($request->icon)) 
        {
            $randomNumber =rand();
            $icon = $request->file('icon');
            $icon_rename = $randomNumber.'.'.$icon->getClientOriginalExtension();
            $newLocation = public_path('uploads/'.$icon_rename);
            Image::make($icon)->resize(100, 100)->save($newLocation,100);
      
            Choice::where('id', $id)->update([
                'icon' => $icon_rename,
            ]);
        }

        Choice::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        ActivityHappened::dispatch(Auth::id(), 'A choice has been updated.');

        return redirect()->route('choices.index')->with('success', 'Choice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Choice::destroy($id);

        ActivityHappened::dispatch(Auth::id(), 'A choice has been deleted.');

        return redirect()->route('choices.index')->with('danger', 'Choice deleted successfully');
    }
}
