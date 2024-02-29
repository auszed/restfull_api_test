<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// import the custumers to create invoices
use App\Models\Customer;


class InvoiceFactory extends Factory
{


    public function definition(): array
    {
        $status = $this->faker->randomElement(['B','P', 'V']);

        return [
            //import the factory de customers y se crea cuando se crean un invoice
            'customer_id' => Customer::factory(),
            'ammount' => $this->faker->numberBetween(100,20000),
            'status' => $status,
            'bill_dated' => $this->faker->dateTimeThisDecade(),
            'pay_dated' => $status == 'P' ? $this->faker->dateTimeThisDecade() : NULL

        ];
    }
}
