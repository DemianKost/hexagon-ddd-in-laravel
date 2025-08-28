<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Agenda\User\Infastructure\EloquentModels\UserEloquentModel;

uses(RefreshDatabase::class);

it('Create a new workspace', function() {
    $response = $this->post('/user', [
        'name' => 'test',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password'
    ]);

    $user = UserEloquentModel::find(1);

    $response = $this->actingAs($user)
        ->post('/workspace', [
            'name' => 'Test workspace',
            'is_active' => true,
        ]);
    
    $response->assertStatus(200)
        ->assertJson([
            'name' => 'Test workspace',
            'user_id' => 1,
            'is_active' => true,
        ]);
});