<?php

namespace App\Livewire\Frontend;

use App\Mail\ContactEnquiry;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{

    public $name;
    public $email;
    public $phone_number;
    public $company;
    public $subject;
    public $m_messages;


    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required|numeric',
        'company' => 'nullable',
        'subject' => 'nullable',
        'm_messages' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Please enter your name.',
        'email.required' => 'Please enter your email.',
        'email.email' => 'Please enter a valid email',
        'm_messages.required' => 'Please enter a message',
    ];

    public function send()
    {
        $validatedData = $this->validate();

        $contact = Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'company' => $this->company,
            'subject' => $this->subject,
            'message' => $this->m_messages,
        ]);

        Mail::to(env('MAIL_ADMIN'))
            ->queue(new ContactEnquiry($contact));

        $this->reset([
            'name',
            'email',
            'phone_number',
            'company',
            'subject',
            'm_messages',
        ]);

        session()->flash('thankyou', 'Enquiry send successfully.');
    }

    public function render()
    {
        return view('livewire.frontend.contact-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
