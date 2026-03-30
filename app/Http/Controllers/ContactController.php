<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Your inquiry has been sent successfully!');
    }
}
