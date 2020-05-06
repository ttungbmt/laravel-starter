<?php

use Illuminate\Database\Seeder;

class GeoFileManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        artisan db:seed --class=GeoFileManagerSeeder

        DB::table('geo_drives')->insert(
            [
                ['id' => 1, 'user_id' => 1, 'name' => 'DATA (E)', 'storage' => 100],
            ]
        );

        DB::table('geo_files_manager')->insert(
           [
               ['id' => 1, 'parent_id' => null, 'name' => null, 'type' => 1],
               ['id' => 2, 'parent_id' => 1, 'name' => 'SHP', 'type' => 2],
               ['id' => 3, 'parent_id' => 1, 'name' => 'GeoJSON', 'type' => 2],
               ['id' => 4, 'parent_id' => 1, 'name' => 'hc_quan.zip', 'type' => 3],
               ['id' => 5, 'parent_id' => 1, 'name' => 'hc_phuong.zip', 'type' => 3],
           ]
        );

    }
}
