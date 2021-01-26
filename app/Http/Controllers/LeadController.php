<?php

namespace App\Http\Controllers;

use App\Models\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LeadController extends Controller
{
    //

    public function create()
    {
        return Inertia::render('Leads/LeadAdd');
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'name' => 'required',
            'email' => "required|email",
            'phone' => "required",
            'dob' => "required|date"
        ]);
        $package = "";
        if ($request->has('package')) {
            $package = $request->input('package');
        }
        Lead::create([
            'name' => $postData['name'],
            'email' => $postData['email'],
            'phone' => $postData['phone'],
            'dob' => $postData['dob'],
            'branch_id' => 1,
            'age' => 1,
            'added_by' => Auth::user()->id,
            'interested_package' => $package
        ]);

        return redirect()->route('dash');
    }
}
