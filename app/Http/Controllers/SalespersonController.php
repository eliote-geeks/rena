<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salesperson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalespersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Salesperson::all();
        return view('users.sales',compact('sales'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = 'App\Models\SalesPerson';
        $user->password = Hash::make('12345678');
        $user->save;

        $sale = new Salesperson();
        $sale->user_id = $user->id;
        $sale->save();
        return redirect()->back()->with('message','SalesPerson saved !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salesperson $salesperson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salesperson $salesperson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salesperson $sales)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = $sales->user_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('12345678');
        $user->save;


        return redirect()->back()->with('message','SalesPerson saved !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salesperson $salesperson)
    {
        $salesperson->delete();
        return redirect()->back()->with('message','SalesPerson deleted !!');
    }
}
