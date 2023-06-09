<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $req) {
        /*$validation = $req->validate([
            'age' => 'min:3'
        ]);
*/

        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->age = $req->input('age');
        $contact->title = $req->input('title');
        $contact->body = $req->input('body');

        $contact->save();

        return redirect()->route('test')->with('success', 'Сообщение отправлено');
    }

    public function allData() {
        /*$contact = new Contact();
        dd($contact->all());*/
        //return view('allContact', ['data' => Contact::all() ]);

        $contact = new Contact();
        return view('allContact', ['data' => $contact->all()]);

    }

    public function showOneMessage($id) {
        $contact = new Contact();
        return view('oneContact', ['data' => $contact->find($id)]);

    }

    public function updateMessage($id) {
        $contact = new Contact();
        return view('updateMessage', ['data' => $contact->find($id)]);

    }

    public function updateMessageSubmit($id, ContactRequest $req) {

        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->age = $req->input('age');
        $contact->title = $req->input('title');
        $contact->body = $req->input('body');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение изменено');
    }

    public function deleteMessage($id) {
        Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success', 'Сообщение удалено');
    }

}
