<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSwapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
  $skills = ['Laravel', 'Vue', 'React', 'Node.js', 'Figma', 'Python', 'Docker'];

foreach ($skills as $name) {
    \App\Models\Skill::firstOrCreate(['name' => $name]);
}

    \App\Models\User::factory(10)->create()->each(function ($user) {
        $user->skills_offered()->attach(
            \App\Models\Skill::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray()
        );
        $user->skills_wanted()->attach(
            \App\Models\Skill::inRandomOrder()->take(rand(1, 2))->pluck('id')->toArray()
        );
    });
}

}
