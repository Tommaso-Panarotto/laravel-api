<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(Faker $faker): void
    {
        $typeIds = Type::all()->pluck("id");

        $project = new Project();
        $project->title = "BoolFlix";
        $project->author = "Tommaso-Panarotto";
        $project->url = "https://github.com/Tommaso-Panarotto/vite-boolflix";
        $project->description = "Simulazione di una libreria stile netfl";
        $project->type_id = $faker->randomElement($typeIds);
        $project->save();
    }
}