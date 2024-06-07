<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all(); //collection con vari metodi (guardare documentazione)
        $ids = $types->pluck('id')->all(); //array di id
        //
        for($i = 0; $i < 10; $i++){
            $project = new Project();

            $title = $faker->sentence(6);
            $project->title = $title;
            $project->slug = Str::slug($title);
            $project->content = $faker->optional()->text(500);
            $project->link = $faker->url();
            $project->type_id = $faker->optional()->randomElement($ids);
            $project->save();
        }
    }
}
