<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function updateSite(Request $request, Site $site) {

        // Create array from form field data
        $formFields = $request->post();

        $site->update($formFields);

        return back()->with('message', 'Site updated successfully');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Site::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'company_id' => 'required',
            'site_ref' => 'required',
            'site_location' => 'required'
        ]);
        return Site::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Return Site::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFromAPI(Request $request, $id)
    {
        $site = Site::find($id);
        $site->update($request->all());
        return $site;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Return Site::destroy($id);
    }

    /**
     * Search for a name.
     *
     * @param  string $siteRef
     * @return \Illuminate\Http\Response
     */
    public function search(string $siteRef)
    {
        Return Site::where('site_ref', 'like', '%' . $siteRef . "%")->get();
    }
}
