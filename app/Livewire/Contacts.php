<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Contacts extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $q;
    public $pagination=5;

    // public $contacts;

    public function render()
    {
        // fetch contacts
        // $contacts = Contact::latest()->paginate(5);
        // $contacts = Contact::latest()->simplePaginate(5);

        if(!$this->q) {
            $contacts = Contact::simplePaginate($this->pagination);
        }else {
            $contacts = Contact::where('name', 'like', '%'.$this->q.'%')
                                ->orWhere('email', 'like', '%'.$this->q.'%')
                                ->orWhere('gender', 'like', '%'.$this->q.'%')
                                ->simplePaginate($this->pagination);
        }

        // return view('livewire.contacts', compact('contacts'));
        return view('livewire.contacts', [
            'contacts' =>$contacts,
        ]);
    }

    public function updatedQ()
    {
        $this->resetPage();
    }
}
