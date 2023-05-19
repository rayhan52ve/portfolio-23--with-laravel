<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Protfolio;

class IndexController extends Controller
{
    public function index()
    {
        $user = User::get()->first();
        return view('Frontend.home',compact('user'));
    }

    public function about()
    {
        $educations = Education::all();
        $experiences = Experience::all();
        $experience = Experience::first();
        $skills = Skill::all();
        $users = User::get()->first();
        // dd($education);
        return view('Frontend.about',compact('educations','experiences','users','experience','skills'));
    }

    public function portfolio()
    {
        $portfolios = Protfolio::all();
        return view('Frontend.portfolio',compact('portfolios'));
    }

    public function contact()
    {
        $user = User::get()->first();
        $portfolio = Protfolio::first();
        return view('Frontend.contact',compact('user','portfolio'));
    }

}
