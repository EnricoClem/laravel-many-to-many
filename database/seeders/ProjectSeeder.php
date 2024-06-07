<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = Type::all();
        $ids = $types->pluck('id')->all();
        $projects = [
            [
                'title' => 'GoGrin landing page',
                'description' => "Un progetto con l'obitetivo di testare le capacità di programmazione frontend tramite l'utilizzo di Vue e Vite, simula una landing page che espone l'azienda fittizia GoGrin.",
                'last_update' => '2024-04-22',
                'thumb' => '',
                'project_link' => 'https://github.com/EnricoClem/proj-html-vuejs'
            ]
        ];
        foreach ($projects as $project) {
            $new_project = new Project();
            $new_project->title = $project['title'];
            $new_project->slug = Str::slug($new_project->title);
            $new_project->description = $project['description'];
            $new_project->last_update = $project['last_update'];
            $new_project->thumb = $project['thumb'];
            $new_project->project_link = $project['project_link'];
            $new_project->type_id = $project['type_id'];
            $new_project->save();
        }
    }
}
