<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
        $this->authorize("create", Artikel::class);
        return view("artikel.create");
    }
    
    public function store(Request $request, Response $response)
    {
        $this->authorize("create", Artikel::class);

        $data = $this->validate(request(), [
            "judul" => "required|string",
            "deskripsi" => "required|string",
            "gambar" => "required|file|mimes:jpg,jpeg,png",
            "isi" => "required|string",
        ]);

        DB::transaction(function() use($data) {
            $article = Artikel::create($data);
            $article->addMediaFromRequest("gambar")
                ->toMediaCollection(Artikel::GAMBAR_UTAMA_IMAGE);
        });

        return redirect()
            ->route("artikel.index")
            ->with("message.success", __("messages.create.success"));
    }
    
    public function edit(Artikel $artikel)
    {
        $this->authorize("update", $artikel);
        return view("artikel.edit", compact("artikel"));
    }
    
    public function update(Request $request, Artikel $artikel)
    {
        $this->authorize("update", $artikel);

        $data = $this->validate(request(), [
            "judul" => "required|string",
            "deskripsi" => "required|string",
            "gambar" => "nullable|file|mimes:jpg,jpeg,png",
            "isi" => "required|string",
        ]);

        DB::transaction(function() use($data, $request, $artikel) {
            $artikel->update($data);
            
            if ($request->hasFile("gambar")) {
                $artikel->addMediaFromRequest("gambar")
                    ->toMediaCollection(Artikel::GAMBAR_UTAMA_IMAGE);
            }
        });

        return back()
            ->with("message.success", __("messages.update.success"));
    }
    
    public function delete(Artikel $artikel)
    {
        $this->authorize("delete", $artikel);

        $artikel->delete();
        return back()
            ->with("message.success", __("messages.delete.success"));
    }

    public function mainImage(Artikel $artikel)
    {
        return response()
            ->file($artikel->getFirstMediaPath(Artikel::GAMBAR_UTAMA_IMAGE));
    }
}
