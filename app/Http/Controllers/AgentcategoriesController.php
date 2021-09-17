<?php

namespace App\Http\Controllers;

use App\Models\Agentcategories;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AgentcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('agentcategories')->where('added_by', Auth::id())->get();
        return view('Agent.Categories.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Agent.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('agentcategories')->insert([
            'name' => $request->name,
            'added_by' => $request->added_by,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Your category has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agentcategories  $agentcategories
     * @return \Illuminate\Http\Response
     */
    public function show(Agentcategories $agentcategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agentcategories  $agentcategories
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $category = DB::table('agentcategories')->where('id', $request->id)->first();
        return view('Agent.Categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agentcategories  $agentcategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('agentcategories')->where('id', $request->id)->update([
            'name' => $request->name,
            'added_by' => $request->added_by,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Your category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agentcategories  $agentcategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('agentcategories')->where('id', $request->id)->delete();
        return back()->with('danger', 'Your category has been deleted');
    }
}
