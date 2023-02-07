<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advertisements = Advertisement::factory(20)->create();
        foreach($advertisements as $advertisement){
            DB::table('taggables')->insert([
                'tag_id' => rand(1, Tag::count()),
                'taggable_id' => $advertisement->id,
                'taggable_type' => Advertisement::class
            ]);
        }
    }
}
