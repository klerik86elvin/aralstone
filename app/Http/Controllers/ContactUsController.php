<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactFormJob;
use App\Models\ContactUs;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function get()
    {
        $socials = SocialNetwork::all();
        return view('contact', ['socials' => $socials]);
    }

    public function post(Request $request)
    {
        $validatedData =$request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ]);

        $data = [
            'name' => $validatedData['name']." ".$validatedData['surname'],
            'email' => $validatedData['email'],
            'text' => $validatedData['text'],
        ];
        ContactUs::create($data);
//        SendContactFormJob::dispatch($data);
        return back()->with('success', 'Müraciətiniz qəbul olundu');
    }
}
