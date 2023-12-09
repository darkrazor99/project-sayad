<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BasicArtical>
 */
class BasicArticalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'header' => $this->faker->sentence(),
            'body' => $this->faker->text(),
            'shortDesc' => $this->faker->realText($maxNbChars = 100),
            'img' => 'img/blog-1.jpg',
            'category_id' => $this->faker->numberBetween(1, 2),
            'hasVid' => $this->faker->numberBetween(0, 1),
            'hasPdf' => $this->faker->numberBetween(0, 1),
            'pdf' => 'pdf/sample.pdf',
            'video' => 'vid/sample.mp4',
            'isArabic' => $this->faker->numberBetween(0, 1),


        ];
    }
}
