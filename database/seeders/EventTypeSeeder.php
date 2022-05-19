<?php

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventType::create([
            'name'=>'Show'
        ]);

                
        EventType::create([
            'name'=>'Teatro'
        ]);
      
        EventType::create([
            'name'=>'Festival'
        ]);

        
        EventType::create([
            'name'=>'Video Conferencia'
        ]);
    }
}
