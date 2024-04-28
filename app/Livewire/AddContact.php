<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddContact extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $phone_number;
    public $gender;
    public $address;

    public function saveContact()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email',
            'phone_number' => 'required|numeric|unique:contacts,phone_number',
            'gender' => 'required|in:male,female,other',
            'address' => 'nullable|max:2048',
        ]);        

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'address' => $this->address,
        ]);
        $this->alert('success', 'Successfully added new contact');
        // return to_route('contact.index');

        // Reset form data
        $this->reset([
            'name',
            'email',
            'phone_number',
            'gender',
            'address',
        ]);

    }

    public function render()
    {
        return view('livewire.add-contact');
    }
}
