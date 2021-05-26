<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contact_id' => $this->faker->unique()->numberBetween(1, Contact::count()),
            'user_id' => rand(3, 6),                  
        ];
    }
}
