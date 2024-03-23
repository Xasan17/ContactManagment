<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactTag>
 */
class ContactTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contact_id' => function () {
                return (App\Models\Contact::class)->create()->id;
            },
            'tag_id' => function () {
                return factory(App\Tag::class)->create()->id;}
        ];
    }
}
