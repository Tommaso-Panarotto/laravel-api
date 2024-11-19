<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadStoreRequest;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(LeadStoreRequest $request)
    {
        $formData = $request->validated();

        $lead = Lead::create($formData);
    }

    public function create()
    {
        return view("guest.pages.contact-us");
    }
}