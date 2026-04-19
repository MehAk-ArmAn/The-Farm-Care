<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class NewsletterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Frontend subscribe form
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'newsletter_email' => ['required', 'email', 'max:255'],
        ], [
            'newsletter_email.required' => 'Please enter your email address.',
            'newsletter_email.email' => 'Please enter a valid email address.',
        ]);

        $email = trim(strtolower($request->newsletter_email));

        $existing = NewsletterSubscriber::where('email', $email)->first();

        if ($existing) {
            // If the email already exists but is inactive, reactivate it.
            if (!$existing->is_active) {
                $existing->update([
                    'is_active'     => true,
                    'subscribed_at' => now(),
                ]);
            }

            return back()->with('newsletter_success', 'This email is already subscribed.');
        }

        NewsletterSubscriber::create([
            'email'         => $email,
            'is_active'     => true,
            'subscribed_at' => now(),
        ]);

        return back()->with('newsletter_success', 'Thanks for subscribing to our newsletter.');
    }

    /*
    |--------------------------------------------------------------------------
    | Admin: show send newsletter page
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.newsletter.send');
    }

    /*
    |--------------------------------------------------------------------------
    | Admin: send newsletter to all active subscribers
    |--------------------------------------------------------------------------
    | This sends REAL emails if your MAIL_* settings in .env are configured.
    |--------------------------------------------------------------------------
    */
    public function send(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $subscribers = NewsletterSubscriber::where('is_active', true)
            ->pluck('email')
            ->filter()
            ->unique()
            ->values();

        if ($subscribers->isEmpty()) {
            return back()->with('error', 'No active subscribers found.');
        }

        $sentCount = 0;
        $failedEmails = [];

        foreach ($subscribers as $email) {
            try {
                Mail::html(
                    nl2br(e($request->message)),
                    function ($mail) use ($email, $request) {
                        $mail->to($email)
                            ->subject($request->subject);
                    }
                );

                $sentCount++;
            } catch (Throwable $e) {
                dd($e->getMessage(), $e);
            }
        }

        if ($sentCount > 0 && count($failedEmails) === 0) {
            return back()->with('success', "Newsletter sent successfully to {$sentCount} subscriber(s).");
        }

        if ($sentCount > 0 && count($failedEmails) > 0) {
            return back()->with(
                'success',
                "Newsletter sent to {$sentCount} subscriber(s), but failed for " . count($failedEmails) . " email(s)."
            );
        }

        return back()->with('error', 'Newsletter could not be sent. Please check your mail configuration.');
    }
}
