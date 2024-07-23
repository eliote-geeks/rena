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

    public function addCart(Mutualist $mutual)
    {
        return view('users.mutualist.add-cart',[
            'mutual' => $mutual
        ]);
    }

    public function remplace($texte)
    {
        $equivalences = [
            '&' => '1',
            'é' => '2',
            '"' => '3',
            "'" => '4',
            '(' => '5',
            '-' => '6',
            'è' => '7',
            '_' => '8',
            'ç' => '9',
            'à' => '0',
        ];

        $nouveau = str_replace(array_keys($equivalences), array_values($equivalences), $texte);

        return $nouveau;
    }

    public function addCardPost(Request $request, Mutualist $mutual)
    {
       $request->validate([
        'id_card_smart' => 'required|max:10|min:10',
       ]);
       $id = $this->remplace($request->id_card_smart);
        if(Mutualist::where('id_card_smart',$id)->count() == 0){
            $mutual->id_card_smart = $id;
            $mutual->save();
            return redirect()->route('mutualist.create')->with('message','Mutualist Added Successfully With Smart Cart !!');
         }
         else
            return redirect()->back()->with('error','Card has been taken !!');
    }

    public function searchByCard(Request $request)
    {
        $request->validate([
            'id_card_smart' => 'required|min:10|max:10',
        ]);

        $id = $this->remplace($request->id_card_smart);

        if(Mutualist::where('id_card_smart',$id)->count() > 0)
        {
            $mutual = Mutualist::where('id_card_smart',$id)->first();
            //  dd($mutual);
            return redirect()->route('mutualist.show',[
                'mutualist' => $mutual
            ]);
        }
        else
            return redirect()->back()->with('message','user not found');
    }

    public function searchcard()
    {
        return view('users.mutualist.search-card');
    }
}
