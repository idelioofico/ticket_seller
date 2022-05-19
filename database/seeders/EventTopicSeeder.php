<?php

namespace Database\Seeders;

use App\Models\EventTopic;
use Illuminate\Database\Seeder;

class EventTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventTopic::Create([
            'name'=>'Social'
        ]);

        EventTopic::Create([
            'name'=>'Academia e ciência'
        ]);

        EventTopic::Create([
            'name'=>'Estilo de vida'
        ]);

        EventTopic::Create([
            'name'=>'Negócios'
        ]);

        EventTopic::Create([
            'name'=>'Política'
        ]);
    }
}
