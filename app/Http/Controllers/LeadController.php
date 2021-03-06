<?php

namespace App\Http\Controllers;

use App\Models\Models\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LeadController extends Controller
{
    //
    private $validations;

    public function __constructor()
    {
        $this->validations([
            'name' => 'required',
            'email' => "required|email",
            'phone' => "required",
            'dob' => "required|date",
            'interested_package' => 'sometimes'
        ]);
    }

    public function create()
    {
        return Inertia::render('Leads/LeadAdd');
    }
    public function index()
    {
        $leads = Lead::query()
            ->where('branch_id', 1)
            ->orderBy('id')
            ->get();
        //$leads = Lead::paginate(5);
        return Inertia::render('Leads/Index', ['leads' => $leads]);
    }

    public function view(Lead $lead)
    {
        // to load the relation table
        $lead->load(['reminders']);

        return Inertia::render('Leads/LeadView', [
            'lead-prop' => $lead
        ]);
    }
    // public function update(Request $request)
    // {
    //     $rules = $this->validations;
    //     $rules['id'] = 'required|exists:leads';
    //     $postData = $this->validate($request, $rules);
    //     Lead::where('id',  $postData['id'])->update($request->all());
    //     return redirect()->route('lead.view', ['lead' =>  $postData['id']]);
    // }

    public function update(Request $request)
    {

        $rules = $this->validations;
        $rules['id'] = 'required|exists:leads';
        $postData = $this->validate($request, $rules);
        $dob = Carbon::parse($postData['dob']);
        $age = $dob->age;
        $rules['age'] = $age;

        Lead::findOrFail($postData['id'])->update($request->all());
        return redirect()->route('lead.view', ['lead' =>  $postData['id']]);
    }


    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'name' => 'required',
            'email' => "required|email",
            'phone' => "required",
            'dob' => "required|date",
            'interested_package' => 'sometimes'
        ]);

        $package = "";
        if ($request->has('interested_package')) {
            $package = $request->input('interested_package');
        }

        $dob = Carbon::parse($postData['dob']);
        $age = $dob->age;

        Lead::create([
            'name' => $postData['name'],
            'email' => $postData['email'],
            'phone' => $postData['phone'],
            'dob' => $postData['dob'],
            'branch_id' => 1,
            'age' => $age,
            'added_by' => Auth::user()->id,
            'interested_package' => $package
        ]);

        return redirect()->route('lead.list');
    }
}
