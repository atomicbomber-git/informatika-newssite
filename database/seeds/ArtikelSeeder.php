<?php

use Illuminate\Database\Seeder;
use App\Artikel;
use Illuminate\Http\UploadedFile;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::transaction(function() {
            factory(Artikel::class, (int) $this->command->ask("Berapa banyak artikel?"))
                ->create();
        });
    }
}
