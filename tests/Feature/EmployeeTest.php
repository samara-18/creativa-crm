<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_employees(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/employees');

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_create_employee(): void
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();

        $this->actingAs($user);
        $response = $this->post('/employees', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'company_id' => $company->id,
        ]);

        $response->assertRedirect('/employees');
        $this->assertDatabaseHas('employees', ['email' => 'testuser@example.com']);
    }
}
