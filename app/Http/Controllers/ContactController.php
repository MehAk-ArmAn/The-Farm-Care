<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Show the contact form
    public function showForm()
    {
        return view('contact'); // points to resources/views/contact.blade.php
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'is_read' => false,
        ]);

        return back()->with('success', 'Your message has been sent successfully.');
    }

    // ADMIN: list all contacts
    public function index()
    {
        $contacts = \App\Models\Contact::latest()->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
    }

    // ADMIN: view single message
    public function show(\App\Models\Contact $contact)
    {
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('contact'));
    }
}
