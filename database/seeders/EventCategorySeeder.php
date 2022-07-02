<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Vocational School Graduate Academy',
                'short_name' => 'VSGA',
            ],
            [
                'name' => 'Fresh Graduate Academy',
                'short_name' => 'FGA',
            ],
            [
                'name' => 'Coding Teacher Academy',
                'short_name' => 'CTA',
            ],
            [
                'name' => 'Online Academy',
                'short_name' => 'OA',
            ],
            [
                'name' => 'Digital Entrepreneurship Academy',
                'short_name' => 'DEA',
            ],
        ];

        foreach ($data as $data) {
            EventCategory::create($data);
        }
    }
}
