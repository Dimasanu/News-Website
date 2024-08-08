<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $categories = [
            ['name' => 'Business', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Culture', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sport', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Food', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Politics', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Celebrity', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Startups', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Travel', 'created_at' => $now, 'updated_at' => $now]
        ];

        DB::table('categories')->insert($categories);
    }
}
