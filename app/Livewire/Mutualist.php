<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\SmartCard;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use App\Models\Mutualist as ModelsMutualist;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Mutualist extends Component
{
    use LivewireAlert;

    use WithFileUploads;

    public $secondaryInsureds = [];

    public $create = 'false';

    // #[Validate('required|image|max:1024')]
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

    // #[Validate('required')]
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

    protected $listeners = ['confirmed'];

    public $edit;

    public function addSecondaryInsured()
    {
        $this->secondaryInsureds[] = '';
    }

    public function removeSecondaryInsured($index)
    {
        unset($this->secondaryInsureds[$index]);
        $this->secondaryInsureds = array_values($this->secondaryInsureds);
    }

    public function editUserProfile($id)
    {
        $this->edit = $id;
        $mutual = ModelsMutualist::findOrFail($id);
        $this->firstName = $mutual->first;
        $this->lastName = $mutual->last;
        $this->sex = $mutual->sexe;
        $this->avatar = User::findOrFail($mutual->user_id)->profile_photo_url;
        $this->phone = $mutual->phone;
        $this->country = $mutual->country;
        $this->birth = $mutual->birth_date;
        $this->placeBirth = $mutual->place_birth;
        $this->profession = $mutual->work;
        $this->residence = $mutual->localisation;
        $this->repere = $mutual->repere;
        $this->identificationType = $mutual->identification_type;
        $this->identification = $mutual->num_identification;
        $this->dateDelivryPiece = $mutual->date_delivry;
        $this->matrimonialStatus = $mutual->matrimonial;
        $this->beneficary = $mutual->beneficiary;
        $this->create = 'on';
    }

    public function editCard($id)
    {
        $mutual = ModelsMutualist::findOrFail($id);

        if (SmartCard::where([
                'user_id' => $mutual->id,
                'status' => 'on',
            ])->count() > 0) {
            $card = SmartCard::where([
                'user_id' => $mutual->id,
                'status' => 'on',
            ])->firstOrFail();
            $card->status = 'false';
            $card->save();

            return $this->redirectRoute('add-Cart', [
                'mutual' => $mutual,
            ]);
        }
        else{
            return $this->redirectRoute('add-Cart', [
                'mutual' => $mutual,
            ]);
        }
    }

    public function save()
    {
        $this->validate();
        if ($this->edit == null) {
            $user = new User();
        } else {
            $user = User::findOrFail(ModelsMutualist::findOrFail($this->edit)->user_id);
        }

        $user->name = $this->firstName;
        $user->email = $this->firstName . rand(0, 1000) . '@gmail' . rand(0, 10000) . 'com';
        $user->password = Hash::make(12345678);
        $user->user_type = 'App\Models\Mutualist';

        if ($this->edit == null)
            $user->updateProfilePhoto($this->avatar);
        
        
        
            $user->save();

        if ($this->edit) {
            $mutual = ModelsMutualist::findOrFail($this->edit);
        } else {
            $mutual = new ModelsMutualist();
        }

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
        // $mutual->place_delivry = $this->placeDelivryPiece;
        $mutual->matrimonial = $this->matrimonialStatus;
        $mutual->beneficiary = $this->beneficary;
        $mutual->save();

        $this->alert('success', ' Successfully !!');

        if($this->edit)
        {
            return $this->redirectRoute('mutualist.create');
        }

        return $this->redirectRoute('add-Cart', [
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
        if ($this->create == 'on') {
            $this->redirectRoute('mutualist.create');
        } else {
            $this->create = 'on';
        }
    }

    public function render()
    {
        $mutualists = ModelsMutualist::all();
        return view('livewire.mutualist', [
            'mutualists' => $mutualists,
        ]);
    }
}
