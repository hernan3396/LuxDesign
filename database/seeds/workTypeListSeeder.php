<?php

use Illuminate\Database\Seeder;

class workTypeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_types')->insert([
            'workType' => 'Cabeceras',
        ]);
        DB::table('work_types')->insert([
            'workType' => 'Carteles',
        ]);
        DB::table('work_types')->insert([
            'workType' => 'Espacios en boliches',
        ]);
        DB::table('work_types')->insert([
            'workType' => 'Exhibidores',
        ]);
        DB::table('work_types')->insert([
            'workType' => 'Islas',
        ]);
        DB::table('work_types')->insert([
            'workType' => 'Kioscos',
        ]);
        DB::table('work_types')->insert([
            'workType' => 'Ploteo de vehiculos',
        ]);
        DB::table('work_types')->insert([
            'workType' => 'Revestimiento',
        ]);
        DB::table('work_types')->insert([
            'workType' => 'Stands',
        ]);
        DB::table('work_types')->insert([
            'workType' => 'Vinilos y lonas',
        ]);
    }
}
