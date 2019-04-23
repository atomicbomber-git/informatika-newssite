<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Artikel;
use Faker\Generator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ArtikelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_visit_index()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get('/artikel/index')
            ->assertStatus(200);
    }

    public function test_admin_can_visit_create()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get('/artikel/create')
            ->assertStatus(200);
    }

    public function test_admin_can_visit_edit()
    {
        $user = factory(User::class)->create();
        $artikel = factory(Artikel::class)->create();

        $this->actingAs($user)
            ->get("artikel/edit/{$artikel->id}")
            ->assertStatus(200);
    }

    public function test_admin_can_create_artikel()
    {
        $faker = app(Generator::class);
        $user = factory(User::class)->create();

        $artikel_data = [
            "judul" => $faker->text(),
            "deskripsi" => $faker->text(),
            "isi" => $faker->realText(),
        ];

        $this->actingAs($user)
            ->postJson("artikel/store", array_merge($artikel_data, [
                "gambar" => UploadedFile::fake()->image("image.jpg")
            ]));

        $this->assertDatabaseHas("artikels", $artikel_data);
        $this->assertFileExists(Artikel::first()->getFirstMediaPath(Artikel::GAMBAR_UTAMA_IMAGE));
    }

    public function test_admin_can_delete_artikel()
    {
        $user = factory(User::class)->create();
        $artikel = factory(Artikel::class)->create();

        $this->actingAs($user)
            ->post("artikel/delete/{$artikel->id}");

        $this->assertDatabaseMissing("artikels", $artikel->toArray());
    }
}
