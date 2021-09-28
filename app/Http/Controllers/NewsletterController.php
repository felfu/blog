<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages(['email' => 'Sorry, your Email Address could not be added to our Newsletter.']);
        }
        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }

    public function index()
    {
        return view('admin.newsletter.index', [
            'members' => $this->newsletter->all()
        ]);
    }

    public function destroy($memberMail) {
        $this->newsletter->destroy($memberMail);

        return back()->with('success', 'Abbonent erfolgreich entfernt');
    }

}
