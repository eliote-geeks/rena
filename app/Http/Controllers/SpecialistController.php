<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialists = Specialist::all();
        return view('users.specialists',compact('specialists'));
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
        $user->user_type = 'App\Models\Specialist';
        $user->save;

        $sale = new Specialist();
        $sale->user_id = $user->id;
        $sale->save();
        return redirect()->back()->with('message','Specialist saved !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialist $specialist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialist $specialist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialist $specialist)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = $specialist->user_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('12345678');
        $user->save;

        return redirect()->back()->with('message','Specialist edited !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialist $specialist)
    {
        $specialist->delete();
        return redirect()->with('message','specialist deleted !!');
    }

    public function usersList()
    {
        $users = User::where('user_type', '!=', 'App\Models\Mutualist')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('users.specialist.users-list',compact('users'));
    }

    public function createUser()
    {
        return view('users.specialist.create-user');
    }

    public function newUser(Request $request)
    {
       $validate =  $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'user_type' => 'required',
            'poste' => 'required',
        ]);

        $user =  User::create($validate);
        $user->user_type = $request->user_type;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('usersList');
    }

    public function editUser(Request $request,User $user)
    {
        $validate =  $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'user_type' => 'required',
            'poste' => 'required',
        ]);

        $user->update($validate);
        $user->user_type = $request->user_type;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('message','informations updated !!');
    }


    public function delete(User $user)
    {
        $user->delete();
        return redirect()->back()->with('message','user removed !!!!');
    }
}
