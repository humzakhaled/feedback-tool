<?php

namespace Database\Factories;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get random user and feedback IDs
        $userIds = User::pluck('id')->toArray();
        $feedbackIds = Feedback::pluck('id')->toArray();

        return [
            'content' => $this->faker->paragraph,
            'user_id' => $this->faker->randomElement($userIds),
            'feedback_id' => $this->faker->randomElement($feedbackIds),
        ];
    }
}
