<?php

namespace App\Http\Controllers;

use App\Models\AmountYear;
use App\Models\Year;
use App\Models\Mutualist;
use App\Models\Request as ModelsRequest;
use App\Models\SmartCard;
use App\Models\SoldeClient;
use App\Models\Transaction;
use App\Models\TransactionStatus;
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

    public function ApprovalRequest(ModelsRequest $t)
    {
        $tr = Transaction::where([
            'id'=> $t->transaction_id,
            'mutualist_id' => $t->mutualist_id,
            'amount_year_id' => $t->amount_year_id,
        ])->firstOrFail();

        $tr->amount = $t->old_amount;
        $tr->save();

        $t->delete();
        return redirect()->back()->with('message','save');
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
        return view('users.mutualist.add-cart', [
            'mutual' => $mutual,
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
        if (
            SmartCard::where([
                'id_card_smart' => $id,
            ])->count() == 0
        ) {
            $card = new SmartCard();
            $card->id_card_smart = $id;
            $card->user_id = $mutual->id;
            $card->status = 'on';
            $card->save();
            return redirect()->route('mutualist.create')->with('message', 'Mutualist Added Successfully With Smart Cart !!');
        } else {
            return redirect()->back()->with('error', 'Card has been taken !!');
        }
    }

    public function searchByCard(Request $request)
    {
        $request->validate([
            'id_card_smart' => 'required|min:10|max:10',
        ]);

        $id = $this->remplace($request->id_card_smart);

        if (
            SmartCard::where([
                'id_card_smart' => $id,
                'status' => 'on',
            ])->count() > 0
        ) {
            $card = SmartCard::where([
                'id_card_smart' => $id,
                'status' => 'on',
            ])->firstOrFail();
            $mutual = Mutualist::findOrFail($card->user_id);

            return redirect()->route('mutualist.show', [
                'mutualist' => $mutual,
            ]);
        } else {
            return redirect()->back()->with('message', 'user not found');
        }
    }

    public function searchcard()
    {
        return view('users.mutualist.search-card');
    }

    public function searchTransactionCard(Request $request)
    {
        $request->validate([
            'id_card_smart' => 'required|min:10|max:10',
        ]);

        $id = $this->remplace($request->id_card_smart);

        if (
            SmartCard::where([
                'id_card_smart' => $id,
                'status' => 'on',
            ])->count() > 0
        ) {
            $card = SmartCard::where([
                'id_card_smart' => $id,
                'status' => 'on',
            ])->firstOrFail();
            $mutual = Mutualist::findOrFail($card->user_id);

            return redirect()->route('startTransaction', [
                'mutual' => $mutual,
            ]);
        } else {
            return redirect()->back()->with('message', 'user not found');
        }
    }

    public function startTransaction(Mutualist $mutual)
    {
        // $year = now()->year;

        // $balance = $mutual->getBalance();
        // $remainingAmount = $mutual->getRemainingAmountForYear($year);
        return view('cotisations.start-transaction', [
            'mutual' => $mutual,
            // 'remainingAmount' => $remainingAmount,
            // 'balance' => $balance,
        ]);
    }

    public function addTransaction(Request $request, Mutualist $mutual)
    {
        $request->validate([
            'amount' => 'required',
        ]);

      
        // Supprime les séparateurs de milliers (virgules)
        $str = str_replace(',', '', $request->amount);

        // Convertit la chaîne de caractères en nombre
        $number = (float) $str;

        $year = AmountYear::where('type', 'open')->firstOrFail();

        if($number > 26000){
            return redirect()->back()->with('message','montant superieur à la somme requise');
        }
        $som = Transaction::where('mutualist_id', $mutual->id)->sum('amount');

        if ($som + $number > $year->amount) {
            return redirect()->back()->with('message', 'OUps le solde du client est complet');
        } else {
            $t = new Transaction();
            $t->mutualist_id = $mutual->id;
            $t->amount_year_id = $year->id;
            $t->amount = $number;
            $t->status = 1;
            $t->content = 'Paiement par :' . auth()->user()->name . ' le: ' . now();
            $t->save();
            if(Transaction::where('mutualist_id', $mutual->id)->sum('amount') == 26000){
                $so = new SoldeClient();
                $so->mutualist_id = $mutual->id;
                $so->amount_year_id = $year->id;
                $so->status = 1;
                $so->save();
            }
            return redirect()->route('transactionHistory');
        }
    }

    public function cotisationCard()
    {
        return view('cotisations.cotisation-card');
    }

    public function transactionHistory()
    {
        $transactions = Transaction::where('status', 1)->latest()->get();
        return view('cotisations.history', [
            'transactions' => $transactions,
        ]);
    }

    public function editTransaction(Request $request, Transaction $t)
    {
        $request->validate([
            'amount' => 'required',
            'content' => 'required',
        ]);


        // Supprime les séparateurs de milliers (virgules)
        $str = str_replace(',', '', $request->amount);

        // Convertit la chaîne de caractères en nombre
        $number = (float) $str;

        $id = $t->mutualist->id;
        $year = AmountYear::where('type', 'open')->firstOrFail();
        
        if($request->amount > $year->amount){
            return redirect()->back()->with('message','Solde depasse le montant prelevé');
        }

        $req = new ModelsRequest();
        $req->mutualist_id = $id;
        $req->amount_year_id = $year->id;
        $req->transaction_id = $t->id;
        $req->new_amount = $t->amount;
        $req->old_amount = $number;
        $req->content = $request->content;
        $req->save();
        return redirect()->route('transactionHistory');
    }

    public function requests()
    {
        $requests = ModelsRequest::latest()->get();
        return view('cotisations.requests', [
            'requests' => $requests,
        ]);
    }

    public function changeStatus(Transaction $t)
    {
        if ($t->status == 1) {
            $t->status = 0;
        } else {
            $t->status = 1;
        }
        $t->save();

        return redirect()->back()->with('message', 'saved!!');
    }

    public function deleteStatus(Transaction $t)
    {
        $t->delete();

        return redirect()->back()->with('message', 'saved!!');
    }

    public function eligible()
    {
        return view('pages.eligible');
    }

    public function dayOpen()
    {
        if (TransactionStatus::count() == 0) 
            $t = new TransactionStatus();
        else            
            $t = TransactionStatus::first();
        
        
        $t->status = 1;
        $t->save();
        return redirect()->back()->with('message', 'Jour Désormais Ouvert pour les transaction');

    }

    public function dayClose()
    {
        if (TransactionStatus::where('status', 1)->count() > 0) {
            
            $t = TransactionStatus::first();
            $t->status = 0;
            $t->save();
            return redirect()->back()->with('message', 'Jour Désormais Fermée Impossible desormais d\'effectuer des transactions');
        }
        return redirect()->back()->with('message', 'Aucun Jour Ouvert');
    }
}
