<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class Contacts extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $q;
    public $perPage=5;

    #[Computed]
    public function contacts() 
    {
        if(!$this->q) {
            return Contact::simplePaginate($this->perPage);
        }else {
            return Contact::where('name', 'like', '%'.$this->q.'%')
                            ->orWhere('email', 'like', '%'.$this->q.'%')
                            ->orWhere('gender', 'like', '%'.$this->q.'%')
                            ->simplePaginate($this->perPage);
        }
    }

    public function render()
    {

        return view('livewire.contacts');
    }

    public function updatedQ()
    {
        $this->resetPage();
    }
}
