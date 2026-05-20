<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name'      => $this->faker->firstName(),
            'last_name'       => $this->faker->lastName(),
            'email'           => $this->faker->unique()->safeEmail(),
            'phone'           => $this->faker->phoneNumber(),
            'address'         => $this->faker->streetAddress(),
            'city'            => $this->faker->city(),
            'state'           => null,
            'postal_code'     => null,
            'sources'         => null,
            'attendance_days' => null,
        ];
    }
}
