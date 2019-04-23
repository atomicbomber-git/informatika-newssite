<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;

class artikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::query()
            ->orderByDesc("updated_at")
            ->orderByDesc("created_at")
            ->paginate();

        return view("artikel.index", compact("artikels"));
    }
    
    public function create()
    {
        return view("artikel.create");
    }
    
    public function store()
    {
        $data = $this->validate(request(), [
            "judul" => "required|string",
            "deskripsi" => "required|string",
            "isi" => "required|string",
        ]);

        Artikel::create($data);

        return redirect()
            ->route("artikel.index")
            ->with("message.success", __("messages.create.success"));
    }
    
    public function edit(Artikel $artikel)
    {
        return view("artikel.edit", compact("artikel"));
    }
    
    public function update(Artikel $artikel)
    {
        $data = $this->validate(request(), [
            "judul" => "required|string",
            "deskripsi" => "required|string",
            "isi" => "required|string",
        ]);

        $artikel->update($data);

        return back()
            ->with("message.success", __("messages.update.success"));
    }
    
    public function delete(Artikel $artikel)
    {
        $artikel->delete();
        return back()
            ->with("message.success", __("messages.delete.success"));
    }
}
