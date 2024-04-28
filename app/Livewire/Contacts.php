<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Contacts extends Component
{

    public function render()
    {
        // fetch contacts
        $contacts = Contact::latest()->paginate(5);

        return view('livewire.contacts', compact('contacts'));
    }
}
