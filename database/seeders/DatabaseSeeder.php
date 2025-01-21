<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Project::factory(5)->create(); // Crea 5 proyectos utilizando un Factory (que haremos a continuación)
    }
}
