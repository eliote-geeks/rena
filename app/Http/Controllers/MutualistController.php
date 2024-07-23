<?php

namespace App\Http\Controllers;

use App\Models\Mutualist;
use Illuminate\Http\Request;

class MutualistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.mutualist.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.mutualist.new-account');
    }

    /**
     * Search the resource.
     */
    public function search()
    {
        return view('users.mutualist.search');
    }

    /**
     * new the resource.
     */
    public function newTransaction()
    {
        return view('users.mutualist.new-cotisation');
    }

    /**
     * List the resource.
     */
    public function transaction()
    {
        return view('users.mutualist.transaction');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mutualist $mutualist)
    {
        return view('users.mutualist.show', [
            'mutualist' => $mutualist,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function history()
    {
        return view('users.mutualist.historique');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mutualist $mutualist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mutualist $mutualist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mutualist $mutualist)
    {
        //
    }
}
