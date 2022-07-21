<?php

namespace App\Http\Controllers;

use App\Models\Listing as Listing;
use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    // get and show all listing (index route)
    public function index() {
        /*$company = User::find(auth()->id())->company_id;
        dd($company);*/
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);

        /* Current Login User Details
        $user = auth()->user();
        var_dump($user);*/

        /* Current Login User ID - THIS WORKS AND GIVES AN ID OF 1
        $company = auth()->user()->company_id;
        var_dump($company);*/

    }

    // show individual listing (show route)
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form (create route)
    public function create() {
        return view('listings.create');
    }

    //  Store listing data
    public function store(Request $request) {
        //dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    public function edit(Listing $listing) {
        //dd($listing->title);
        return view('listings.edit', ['listing' => $listing]);
    }

    //  Update listing data
    public function update(Request $request, Listing $listing) {

        // make sure loggedin user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully');
    }

    // Delete listing
    public function destroy(Listing $listing) {
        // make sure loggedin user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->slides()->get()]);
    }

}
