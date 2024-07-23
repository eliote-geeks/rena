<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mutualist;

class SearchMutualist extends Component
{
    public $search = '';
    public function render()
    {
        $mutualists = [];
        if (strlen($this->search) > 2) {
            $mutualists = Mutualist::where('first', 'like', '%' . $this->search . '%')
                ->orWhere('last', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('num_identification', 'like', '%' . $this->search . '%')
                ->get();
        }
        return view('livewire.search-mutualist', ['mutualists' => $mutualists]);
    }
}
