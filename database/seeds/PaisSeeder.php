<?php

use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('pais')->insert([
            'nombre' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        factory(App\Pais::class, 5)->create();
    }
}
