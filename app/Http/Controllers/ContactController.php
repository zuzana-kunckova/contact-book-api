<?php

namespace App\Http\Controllers;

use App\Http\Resources\Contact as ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return ContactResource::collection(Contact::all());
    }

    public function store(Request $request)
    {
        $contact = Contact::create($request->only([
            'first_name', 'last_name', 'phone_number', 'info',
        ]));

        return new ContactResource($contact);
    }

    public function show(Contact $contact)
    {
        return new ContactResource($contact);
    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->only([
            'first_name', 'last_name', 'phone_number', 'info',
        ]));

        return new ContactResource($contact);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json(null, 200);
    }
}
