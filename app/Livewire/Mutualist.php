<?php

namespace App\Livewire;

use App\Models\Mutualist as ModelsMutualist;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Mutualist extends Component
{
    use LivewireAlert;

    use WithFileUploads;

    public $secondaryInsureds = [];

    public $create = 'false';

    #[Validate('required|image|max:1024')]
    public $avatar;

    #[Validate('required|min:3')]
    public $firstName;

    #[Validate('required|min:3')]
    public $lastName;

    #[Validate('required')]
    public $sex;

    #[Validate('required')]
    public $country;

    #[Validate('required|min:9')]
    public $phone;

    #[Validate('required')]
    public $birth;

    #[Validate('required')]
    public $placeBirth;

    #[Validate('required')]
    public $profession;

    #[Validate('required')]
    public $residence;

    #[Validate('required')]
    public $repere;

    #[Validate('required')]
    public $identificationType;

    #[Validate('required')]
    public $identification;

    #[Validate('required')]
    public $dateDelivryPiece;

    #[Validate('required')]
    public $placeDelivryPiece;

    #[Validate('required')]
    public $matrimonialStatus;

    #[Validate('required')]
    public $beneficary;

    // #[Validate('required|integer')]
    public $idCard;

    public $status1 = 'show active';
    public $status2 = 'none';
    public $status3 = 'none';

    protected $listeners = [
        'confirmed'
    ];



    public function addSecondaryInsured()
    {
        $this->secondaryInsureds[] = '';
    }

    public function removeSecondaryInsured($index)
    {
        unset($this->secondaryInsureds[$index]);
        $this->secondaryInsureds = array_values($this->secondaryInsureds);
    }


    public function save()
    {
        $this->validate();
        $user = new User();
        $user->name = $this->firstName;
        $user->email = $this->firstName.rand(0,1000).'@gmail'.rand(0,10000).'com';
        $user->password = Hash::make(12345678);
        $user->user_type =  'App\Models\Mutualist';
        $user->updateProfilePhoto($this->avatar);
        $user->save();

        $mutual = new ModelsMutualist();
        $mutual->user_id = $user->id;
        $mutual->first = $this->firstName;
        $mutual->last = $this->lastName;
        $mutual->sexe = $this->sex;
        $mutual->phone = $this->phone;
        $mutual->country = $this->country;
        $mutual->birth_date = $this->birth;
        $mutual->place_birth = $this->placeBirth;
        $mutual->work = $this->profession;
        $mutual->localisation = $this->residence;
        $mutual->repere = $this->repere;
        $mutual->identification_type = $this->identificationType;
        $mutual->num_identification = $this->identification;
        $mutual->date_delivry = $this->dateDelivryPiece;
        $mutual->matrimonial = $this->matrimonialStatus;
        $mutual->beneficiary = $this->beneficary;
        $mutual->save();

        $this->alert('success','Mutualist Created Successfully !!');
        return $this->redirectRoute('add-Cart',[
            'mutual' => $mutual,
        ]);
        
    }



    public function confirmInfo()
    {
        $this->validate();
        $this->status1 = 'none';
        $this->status3 = 'none';
        $this->status2 = 'show active';

    }

    public function fillForm()
    {
        $this->status3 = 'none';
        $this->status2 = 'none';
        $this->status1 = 'show active';

    }

    public function changeCreate()
    {
        if($this->create == 'on')
             $this->redirectRoute('mutualist.create');
        else
            $this->create = 'on';
    }

    public function render()
    {
        $mutualists = ModelsMutualist::all();
        return view('livewire.mutualist',[
            'mutualists' => $mutualists,
        ]);
    }
}
