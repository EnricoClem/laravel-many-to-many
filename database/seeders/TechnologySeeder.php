<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;;
use Illuminate\Support\Str;
use App\Models\Technology;
use App\Models\Project;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = ['css', 'html', 'Java Script', 'php', 'laravel', 'vue', 'vite'];
        foreach ($technologies as $technology_name) {
            $new_technology = new Technology();
            $new_technology->name = $technology_name;
            $new_technology->slug = Str::slug($technology_name);
            $new_technology->save();
        };
    }
}
