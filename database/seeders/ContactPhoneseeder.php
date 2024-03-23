<?php

namespace Database\Seeders;

use App\Models\ContactPhone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactPhoneseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactPhone::factory()
            ->count(1000)
            ->create();
    }
}
