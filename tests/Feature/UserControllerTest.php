<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Get list of all users', function() {
    $response = $this->post('/user', [
        'name' => 'test',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password'
    ]);

    $response->assertStatus(201)
        ->assertJson([
            'id' => 1,
            'name' => 'test',
            'email' => 'test@example.com',
            'is_admin' => false,
        ]);
});