<?php

namespace App\Http\Controllers;

use App\Models\AmountYear;
use Illuminate\Http\Request;

class AmountYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $amounts = AmountYear::all();
        return view('pages.year',compact('ammounts'));
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
            'amount' => 'required|float',
        ]);

        $amount = new AmountYear();
        $amount->start = $request->start;
        $amount->end = $request->end;
        $amount->type = 'open';
        $amount->amount = $request->amount;
        $amount->save();
        return redirect()->back()->with('message','saved !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AmountYear $amountYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AmountYear $amountYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AmountYear $amountYear)
    {
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'amount' => 'required|float',
            'status' => 'required'
        ]);

        $amount = new AmountYear();
        $amount->start = $request->start;
        $amount->end = $request->end;
        $amount->type = $request->status;
        $amount->amount = $request->amount;
        $amount->save();
        return redirect()->back()->with('message','edited !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AmountYear $amountYear)
    {
        $amountYear->delete();
        return redirect()->back()->with('message','deleted !!');
    }
}
