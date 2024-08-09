<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'message' => 'required|string|min:5',
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function send(){

        $validatedDate = $this->validate();

        // send email

        Session()->flash('success','Message sent successfully');

        $this->reset();

    }

}