<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_companies(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/companies');

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_create_company(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/companies', [
            'name' => 'Test Company',
            'email' => 'test@company.com',
            'website' => 'https://test.com',
        ]);

        $response->assertRedirect('/companies');
        $this->assertDatabaseHas('companies', ['name' => 'Test Company']);
    }
}
