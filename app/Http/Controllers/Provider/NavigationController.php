<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function dashboard()
    {
        return view('provider.dashboard');
    }
}
