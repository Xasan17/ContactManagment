<?php

namespace Database\Seeders;

use App\Models\ContactsGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactsGroupseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactsGroup::factory()
            ->count(1000)
            ->create();
    }
}
