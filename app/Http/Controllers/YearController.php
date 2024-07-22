<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $year = Year::where('status','open')->lastest()->take(1)->first();
        return view('pages.year',compact('year'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ]);

        $year = new Year();
        $year->start = $request->start;
        $year->end = $request->end;
        $year->type = 'open';
        $year->save();
        return redirect()->back()->with('message','saved !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Year $year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Year $year)
    {
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'type' => 'required',
        ]);
        
        $year = new Year();
        $year->start = $request->start;
        $year->end = $request->end;
        $year->type = $request->type;
        $year->save();
        return redirect()->back()->with('message','saved !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Year $year)
    {
        $year->delete();
        return redirect()->back()->with('message','Year deleted !!');
    }
}
