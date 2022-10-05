<?php

namespace App\Http\Controllers;


use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SlideController extends Controller
{

    public function index()
    {
        return Slide::all();
    }

    // Show create form (create route)
    public function create() {
        return view('slides.create');
    }

    //  Store slide data
    public function store(Request $request) {
        //dd($request->all());
        // Create array from form field data
        $formFields = $request->post();
        // Add User ID to array
        $formFields['user_id'] = auth()->id();
        // Add User ID to array
        $formFields['company_id'] = User::find(auth()->id())->company_id;
        // Get value of 'global' check box and convert to 0 or 1 accordingly
        if($formFields['global'] == "on") {
            $formFields['global'] = 1;
        } else {
            $formFields['global'] = 0;
        }
        // ToDo: add base dates and date checking
        Slide::create($formFields);

        return redirect('/')->with('message', 'Slide added successfully');
    }

    // Manage listings
    public function manage() {
        $result = DB::table('slides')->get();
        return view('slides.manage', ['slides' => $result]);
    }

    // Show edit form
    public function edit(Slide $slide) {
        //dd($slide);
        return view('slides.edit', ['slide' => $slide]);
    }

    public function update(Request $request, Slide $slide) {

        // ToDo: Reinstate user check
        // make sure loggedin user is owner
        /*if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        } */

        // ToDo: Reinstate validation
        /*$formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]); */

        //dd($request->all());
        // Create array from form field data
        $formFields = $request->post();
        // Add User ID to array
        $formFields['user_id'] = auth()->id();
        // Add User ID to array
        $formFields['company_id'] = User::find(auth()->id())->company_id;
        // Get value of 'global' check box and convert to 0 or 1 accordingly
        if($formFields['global'] == "on") {
            $formFields['global'] = 1;
        } else {
            $formFields['global'] = 0;
        }

        /*if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        } */

        $slide->update($formFields);

        return back()->with('message', 'Slide updated successfully');
    }

    // Delete listing
    public function destroy(Slide $slide) {
        // make sure loggedin user is owner
        // ToDo: Reinstate user check?
        /*if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        } */
        $foo = 'bar';
        $slide->delete();
        return redirect('/slides/manage')->with('message', 'Slide deleted successfully');
    }

    public function storeFromApi(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'company_id' => 'required',
            'description' => 'required',
            'link' => 'required',
            'time_on' => 'required',
            'time_off' => 'required',
            'date_on' => 'required',
            'date_off' => 'required',
        ]);
        // ToDo: add base dates and date checking
        return Slide::create($request->all());

        //return redirect('/')->with('message', 'Slide added successfully');
    }

    public function showFromApi($id)
    {
        Return Slide::find($id);
    }

    public function searchFromApi(string $search_string)
    {
        Return Slide::where('description', 'like', '%' . $search_string . "%")->get();
    }

    public function updateFromApi(Request $request, $id)
    {
        $slide = Slide::find($id);
        $slide->update($request->all());
        return $slide;
    }

    public function destroyFromApi($id)
    {
        Return Slide::destroy($id);
    }




}
