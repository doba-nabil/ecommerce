<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Event;
use App\Member;
use App\Moderator;
use App\Our_donation;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class backendController extends Controller
{
    public function backendHome()
    {
        $users = Moderator::all();
        $user = Auth::user();
        return view('backend.home' , compact('user','users'));
    }
    public function our()
    {
        return view('backend.our.index');
    }
    public function noour()
    {
        return view('backend.noour.index');
    }
}
