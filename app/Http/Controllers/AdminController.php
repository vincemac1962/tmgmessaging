<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function controlPanel() {
        return view('admin.controlpanel');
    }

    // Manage listings
    public function manageSlides() {
        $result = DB::select('SELECT * FROM slides');
        return view('admin.manageslides', ['slides' => $result]);
    }

    public function editSlide(Slide $slide) {
        return view('admin.editslide', ['slide' => $slide]);
    }

    public function manageUsers()
    {
        $result = DB::select('SELECT * FROM users');
        return view('admin.manageusers', ['users' => $result]);
    }

    public function editUser(User $user) {
        //var_dump($user);
        //die;
        return view('admin.edituser', ['user' => $user]);
    }

    public function manageSites()
    {
        $result = DB::select('SELECT * FROM sites');
        return view('admin.managesites', ['sites' => $result]);
    }

    public function editSite(Site $site) {
        //dd($slide);
        return view('admin.editsite', ['site' => $site]);
    }
}
