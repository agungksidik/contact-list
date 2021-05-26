<?php

namespace Database\Factories;

use App\Models\FollowUp;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowUpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FollowUp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_id' => $this->faker->numberBetween(1, Task::count()),
            'remark' => $this->faker->sentence,            
            'status' => $this->faker->randomElement([
                "uncontacted",
                "pending",                
                "qualified",                
                "lost",                
                ]),
            'follow_up_date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month'),  
        ];
    }
}
