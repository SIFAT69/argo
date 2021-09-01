<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Image;
use Illuminate\Support\Facades\Auth;
use App\Events\ActivityHappened;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('Dashboard.Partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'bail|required|file|image|mimes:jpg,jpeg,png|max:1000|dimensions:ratio=1/1',
        ]);

        $randomNumber =rand();
        $image = $request->file('image');
        $image_rename = $randomNumber.'.'.$image->getClientOriginalExtension();
        $newLocation = 'uploads/'.$image_rename;
        Image::make($image)->resize(100, 100)->save($newLocation, 100);
    
        Partner::create([
            'image' => $image_rename,
        ]);

        ActivityHappened::dispatch(Auth::id(), 'A new partner has been created.');

        return redirect()->route('partners.index')->with('success', 'Partner added successfully');
    }

    public function destroy($id)
    {
        Partner::destroy($id);

        ActivityHappened::dispatch(Auth::id(), 'A partner has been deleted.');

        return redirect()->route('partners.index')->with('danger', 'Partner deleted successfully');
    }
}
