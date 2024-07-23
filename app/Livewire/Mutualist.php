<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Mutualist extends Component
{
    use WithFileUploads;

    
    public function render()
    {
        return view('livewire.mutualist');
    }
}
