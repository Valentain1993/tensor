<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\Test;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function testAPI() {
        $testAPI = new Test();

        $testGetAPIData = $testAPI->getData();

        dump($testGetAPIData);
    }

    public function form() {
        $reviews = Contact::all();
        return view('form', compact('reviews'));
    }

    public function form_check(Request $request) {
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500',
            'name' => 'required|min:1|max:50php'
        ]);

        $review = new Contact;

        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('form');

        }
    }

