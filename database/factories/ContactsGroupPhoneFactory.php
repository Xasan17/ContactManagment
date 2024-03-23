<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactsGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactsGroupPhone>
 */
class ContactsGroupPhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'contact_id'=>Contact::all()->random()->id,
//            'group_id' => ContactsGroup::all()->random()->id,
            'contact_id' => function () {
                return \App\Models\Contact::query()->inRandomOrder()->first()->id;
            },
            'group_id' => function () {
                // Получаем случайный group_id из существующих записей в таблице ContactsGroup
                return \App\Models\ContactsGroup::query()->inRandomOrder()->first()->id;}
        ];
    }
}
