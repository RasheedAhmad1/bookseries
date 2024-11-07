<?php

namespace Modules\Setting\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    // The name of the factory's corresponding model
    protected $model = \Modules\Setting\App\Models\Setting::class;

    // Define the model's default state
    public function definition(): array
    {
        return [];
    }
}

