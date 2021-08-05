<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'    => $this->faker->company,
            'email'   => $this->faker->email,
            'url'     => $this->faker->url,
            'user_id' => User::factory(),
            'logo'    => UploadedFile::fake()->image('image.jpg'),
        ];
    }
}
