<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;

class GuestHomeController extends Controller
{
    public function show()
    {
        $artikels = Artikel::query()
            ->orderByDesc("created_at")
            ->limit(6)
            ->get();

        return view("guest_home.show", compact("artikels"));
    }
}
