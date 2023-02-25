<?php

namespace Database\Factories;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    }

    public function released(Carbon $date = null): self
    {
        return $this->state(
            fn($attributes) => ['released_at' => $date ?? now()]
        );
    }
}
