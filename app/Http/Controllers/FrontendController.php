<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\AssignPerson;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $users = User::all();
        return view('frontend.index', compact('services', 'users'));
    }


}
