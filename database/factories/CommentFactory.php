<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'             => $this->faker->text,
            'commentable_id'   => Company::factory(),
            'commentable_type' => Company::class,
            'user_id'          => User::factory(),
        ];
    }


    public function company()
    {
        return $this->state(fn () => [
            'commentable_id'   => Company::factory(),
            'commentable_type' => Company::class,
        ]);
    }

    public function employee()
    {
        return $this->state(fn () => [
            'commentable_id'   => Employee::factory(),
            'commentable_type' => Employee::class,
        ]);
    }
}
