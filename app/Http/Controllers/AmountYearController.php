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
        return view('pages.year', compact('amounts'));
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
        $now = Carbon::now();

        // Déterminez les dates de début et de fin en fonction de la date actuelle
        if ($now->month > 6 || ($now->month == 6 && $now->day >= 30)) {
            // Si nous sommes après le 30 juin, commencez cette année et finissez l'année suivante
            $start = Carbon::create($now->year, 6, 30);
            $end = Carbon::create($now->year + 1, 6, 29);
        } else {
            // Sinon, commencez l'année dernière et finissez cette année
            $start = Carbon::create($now->year - 1, 6, 30);
            $end = Carbon::create($now->year, 6, 29);
        }

        // Créez un nom pour la nouvelle année
        $name = $start->format('Y') . '-' . $end->format('Y');

        // Mettre à jour toutes les autres années pour qu'elles soient "close"
        AmountYear::where('type', 'open')->update(['type' => 'close']);

        // Créez une nouvelle instance de Year et définissez les attributs
        $year = new AmountYear();
        $year->start = $start->format('Y-m-d');
        $year->end = $end->format('Y-m-d');
        $year->type = 'open';
        $year->amount = 26000;
        $year->name = $name;
        $year->save();
        return redirect()->back()->with('message', 'Enregistree !!');
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
            'status' => 'required',
        ]);

        $amount = new AmountYear();
        $amount->start = $request->start;
        $amount->end = $request->end;
        $amount->type = $request->status;
        $amount->amount = $request->amount;
        $amount->save();
        return redirect()->back()->with('message', 'edited !!');
    }

    public function closeYear(AmountYear $year)
    {
        $now = Carbon::now();

        // Déterminez les dates de début et de fin en fonction de la date actuelle
        if ($now->month > 6 || ($now->month == 6 && $now->day >= 30)) {
            // Si nous sommes après le 30 juin, commencez cette année et finissez l'année suivante
            $start = Carbon::create($now->year, 6, 30);
            $end = Carbon::create($now->year + 1, 6, 29);
        } else {
            // Sinon, commencez l'année dernière et finissez cette année
            $start = Carbon::create($now->year - 1, 6, 30);
            $end = Carbon::create($now->year, 6, 29);
        }

        // Créez un nom pour la nouvelle année
        $name = $start->format('Y') . '-' . $end->format('Y');

        // Mettre à jour toutes les autres années pour qu'elles soient "close"
        AmountYear::where('type', 'open')->update(['type' => 'close']);

        // Créez une nouvelle instance de Year et définissez les attributs
        $year = new AmountYear();
        $year->start = $start->format('Y-m-d');
        $year->end = $end->format('Y-m-d');
        $year->type = 'open';
        $year->amount = 26000;
        $year->name = $name;
        $year->save();
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AmountYear $amountYear)
    {
        $amountYear->delete();
        return redirect()->back()->with('message', 'deleted !!');
    }

    public function closeYearAmount()
    {
        $year = AmountYear::where('type', 'open')->latest()->firstOrFail();

        return view('pages.close-year', [
            'year' => $year,
        ]);
    }
}
