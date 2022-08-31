<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MstPrefectureSeeder;

class DatabaseSeeder extends Seeder
{
    /** 実行したいSeederをここに登録 */
    private const SEEDERS = [
        MstPrefectureSeeder::class,
        MstGenreSeeder::class,
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        foreach (self::SEEDERS as $seeder) {
            $this->call($seeder);
        }
    }
}
