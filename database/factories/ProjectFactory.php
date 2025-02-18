<?php
// database/factories/ProjectFactory.php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'title'       => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'url'         => $this->faker->url(),
            'image'       => null, // or use a placeholder or $this->faker->imageUrl(640, 480)
        ];
    }
}

