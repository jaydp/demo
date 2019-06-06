<?php

use Illuminate\Database\Seeder;

class StatesTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('states')->delete();
		
		$states = [
            ['name' => 'NSW', 'order' => '1'],
            ['name' => 'NT', 'order' => '2'],
            ['name' => 'QLD', 'order' => '3'],
            ['name' => 'SA', 'order' => '4'],
            ['name' => 'TAS', 'order' => '5'],
            ['name' => 'VIC', 'order' => '6'],
            ['name' => 'WA', 'order' => '7'],
        ];
		
		
        DB::table('states')->insert($states);
    }
}
