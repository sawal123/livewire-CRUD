<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Contact::class;
    public function definition(): array
    {
        $faker = $this->faker;
        return [
            'name'=>$faker->name,
            'phone'=> $faker->e164PhoneNumber
        ];
    }
}
