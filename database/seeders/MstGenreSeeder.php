<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $params = [
            ['id' => 1, 'name' => 'FREE STYLE'],
            ['id' => 2, 'name' => 'BREAKING'],
            ['id' => 3, 'name' => 'POPING'],
            ['id' => 4, 'name' => 'LOCKING'],
            ['id' => 5, 'name' => 'WAACKING'],
            ['id' => 6, 'name' => 'HIP HOP'],
            ['id' => 7, 'name' => 'HOUSE'],
            ['id' => 8, 'name' => 'KRUMP'],
            ['id' => 9, 'name' => 'REGGAE'],
            ['id' => 10, 'name' => 'JAZZ'],
            ['id' => 11, 'name' => 'SOUL'],
        ];
        DB::table('mst_genres')->insert($params);
    }
}
