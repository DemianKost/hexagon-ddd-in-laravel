<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Agenda\User\Infastructure\EloquentModels\UserEloquentModel;
use Database\Factories\UserFactory;

uses(RefreshDatabase::class);

describe('WorkspaceController main endpoints tests with auth', function() {
    beforeEach(function () {
        $this->user = UserFactory::new()->create();
    });

    it('Create a new workspace', function() {
        $response = $this->actingAs($this->user)
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

    it('Can\'t create a new workspace with empty body', function() {
        $response = $this->actingAs($this->user)
            ->post('/workspace', [
                'name' => 'Test workspace',
                'is_active' => true,
            ]);
    });
});