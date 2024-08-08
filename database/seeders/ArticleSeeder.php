<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [];

        for ($i = 1; $i <= 10; $i++) {
            $articles[] = [
                'judul' => 'Judul Artikel ' . $i,
                'penulis' => 'Penulis ' . $i,
                'isi' => 'Isi dari artikel ' . $i . ' yang sangat informatif.',
                'category_id' => rand(9, 16),
                'gambar' => 'gambar-' . $i . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ];
        }

        DB::table('articles')->insert($articles);
    }
}
