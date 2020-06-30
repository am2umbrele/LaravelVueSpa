<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json( Contact::all()->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $messages = [
            'name.required' => 'The name field is required',
            'email.required'  => 'The email field is required',
            'email.email'  => 'Please provide a valid email',
            'phone.required'  => 'The phone field is required',
            'phone.digits'  => 'The phone must contain exactly 10 numbers'
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10'
        ], $messages);

        $contact = new Contact([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'inquiry' => $request->input('inquiry'),
            'message' => $request->input('message')
        ]);

        $contact->save();

        return response()->json('The contact was successfully added');
    }
}
