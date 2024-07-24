<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        return view('pages.year',compact('amounts'));
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

        $validatedData = $request->validate([
            'amount' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start_date',
        ], [
            'end.after_or_equal' => 'The end date must be a date after or equal to the start date.',
        ]);

    
        $startDate = Carbon::parse($request->start);
        $endDate = Carbon::parse($request->end);

        if ($startDate->diffInYears($endDate) < 1) {
            return back()->withErrors(['end' => 'The end date must be at least one year after the start date.']);
        }

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
            'amount' => 'required',
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

    public function closeYear(AmountYear $year)
    {
        $year->type = 'close';
        $year->save();
        return redirect()->route('amountYear.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AmountYear $amountYear)
    {
        $amountYear->delete();
        return redirect()->back()->with('message','deleted !!');
    }

    public function closeYearAmount()
    {
        $year = AmountYear::where('type','open')->latest()->firstOrFail();
        
        return view('pages.close-year',[
            'year' => $year
        ]);
    }
}
