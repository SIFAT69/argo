<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('expenses')->insert([
            'expense_name' => $request->expense_name,
            'expense' => $request->price,
            'date' => $request->date,
            'desc' => $request->desc,
            'request_id' => $request->request_id,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Your expense added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        DB::table('expenses')->where('id', $request->id)->update([
            'expense_name' => $request->expense_name,
            'expense' => $request->price,
            'date' => $request->date,
            'desc' => $request->desc,
            'request_id' => $request->request_id,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Your expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('expenses')->where('id', $request->id)->delete();
        return back()->with('danger', 'Your expense deleted!');
    }
}
