<?php

namespace App\Http\Controllers;

use App\Models\Reference;

class FeedbacksController extends Controller
{
    public function index() {
        $feedbacks = Reference::latest()->get();

        return view('pages.feedbacks', compact('feedbacks' ));
    }

    public function store() {
        $validate = $this->validate(request(), [
            'email' => 'required',
            'text'  => 'required'
        ]);
        Reference::create($validate);

        return redirect( route('contacts') );
    }
}
