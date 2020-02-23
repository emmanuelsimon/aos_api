<?php

use Illuminate\Database\Seeder;
use App\Models\Etape;

class EtapesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etape::create([
            'description' => 'New York',
            'lat'=>40.713540,
            'long'=>-74.009900
        ]);

        Etape::create([
            'description' => 'Sydney',
            'lat'=>-33.856100,
            'long'=>151.203739
        ]);
    }
}
