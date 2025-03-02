<?php

namespace Database\Factories;
use App\Models\Transactions;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transactions>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(), // Utiliser sentence() au lieu de description()
            'amount' => $this->faker->randomFloat(2, 10, 1000), // Un montant aléatoire entre 10 et 1000
            'type' => $this->faker->randomElement(['income', 'expense']), // Type : soit "income" soit "expense"
            'transaction_date' => $this->faker->dateTimeThisYear(), // Date aléatoire cette année
            'user_id' => \App\Models\User::factory(), // Associe un utilisateur généré
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
