<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Project;

//Helpers
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();
        
        for ($i=0; $i < 10 ; $i++) { 
            //$project = new Project();
            //$project->tile = fake()->sentence();
            //$project->content = fake()->paragraph();
            //$project->save();

            $tile = fake()->sentence();
            $slug = Str::slug($tile);

            $project = Project::create([
                'title' => $tile,
                'slug' => $slug,
                'content' => fake()->paragraph(),
            ]);     
        }
    }
}
