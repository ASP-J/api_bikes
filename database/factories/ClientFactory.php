<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cnpj = mt_rand(10000000000000, 20000000000000);
        $cpf = mt_rand(10000000000, 20000000000);
        return [
            'name' => $this->faker->name,
            'document' => $this->faker->randomElement([$cnpj, $cpf]),
            'age' => $this->faker->randomDigit,
            'email' => $this->faker->email
        ];
    }
}
