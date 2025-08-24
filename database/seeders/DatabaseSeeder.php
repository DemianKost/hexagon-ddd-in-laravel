<?php

namespace Database\Seeders;

use Src\Agenda\User\Infastructure\EloquentModels\UserEloquentModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        UserEloquentModel::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
