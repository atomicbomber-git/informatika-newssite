<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;

class GuestArticleController extends Controller
{
    public function index()
    {
    }
    
    public function show(Artikel $artikel)
    {
        return view("guest_artikel.show", compact("artikel"));
    }
}
