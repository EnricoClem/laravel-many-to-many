<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all();
        $type_ids = $types->pluck('id')->all();
        $technology_ids = Technology::all()->pluck('id')->all();
        
        for ($i = 0; $i < 15; $i++) {

            $project = new Project();

            $title = $faker->sentence(4);

            $project->title = $title;
            $project->slug = Str::slug($title);
            $project->description = $faker->optional()->text(500);
            $project->project_link = $faker->optional()->url('http');

            $project->type_id = $faker->optional()->randomElement($type_ids);

            $project->save();

            $random_technology_ids = $faker->randomElements($technology_ids, null);
            $project->technologies()->attach($random_technology_ids);
        }
    }
}
