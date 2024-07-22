<?php

namespace App\Http\Controllers;

use App\Models\Accountant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountants = Accountant::all();
        return view('users.accountant',compact('accountants'));
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
        $user->password = Hash::make('12345678');
        $user->user_type = 'App\Models\Accountant';
        $user->save;


        $accountant = new Accountant();
        $accountant->user_id = $user->id;
        $accountant->save();
        return redirect()->back()->with('message','Accountant saved !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Accountant $accountant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accountant $accountant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accountant $accountant)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::findOrFail($accountant->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save;

        return redirect()->back()->with('message','Accountant edited !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accountant $accountant)
    {
        $accountant->delete();
        return redirect()->back()->with('message','accountant deleted !!');
    }
}
