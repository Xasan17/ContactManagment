<?php

namespace Database\Seeders;

use App\Models\ContactsGroupPhone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactsGroupPhoneseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactsGroupPhone::factory()
            ->count(1000)
            ->create();
    }
}
