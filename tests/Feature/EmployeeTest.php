<?php

namespace Tests\Feature;

use http\Client\Curl\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function employees_can_stored()
    {
        $this->signIn();

        $data = \App\Models\Employee::factory()->raw();

        $this->post(route('employee.store'),$data)->assertRedirect(route('employee.index'));

        $this->assertDatabaseHas('employees',$data);
    }

    /**
     * @test
     */
    public function employees_can_updated()
    {
        $this->signIn(\App\Models\User::factory(['id' => 2])->create());

        $employee = \App\Models\Employee::factory()->create();

        $data = \App\Models\Employee::factory()->raw();

        $this->patch(route('employee.update',$employee->id),$data)->assertRedirect(route('employee.show',$employee->id));

        $this->assertDatabaseHas('employees',$data);
    }

    /**
     * @test
     */
    public function employees_can_be_shown()
    {
        $employee = \App\Models\Employee::factory()->create();

        $this->get(route('employee.show',$employee->id))->assertSee([
            $employee->name,
            $employee->email,
            $employee->url,
        ]);
    }

    /**
     * @test
     */
    public function employees_can_be_listed()
    {
        $employees = \App\Models\Employee::factory()->count(5)->create();

        $this->get(route('employee.index'))->assertSee($employees->pluck('name')->toArray());
    }

    /**
     * @test
     */
    public function employee_can_be_deleted()
    {
        $this->signIn();

        $employee = \App\Models\Employee::factory()->create();

        $this->delete(route('employee.destroy',$employee->id))->assertRedirect(route('employee.index'));

        $this->assertDatabaseMissing('employees',$employee->toArray());
    }

    /**
     * @test
     */
    public function employee_could_be_exported()
    {
        $employees = \App\Models\Employee::factory()->count(10)->create();

        $response = $this->get(route('employee.export'));

        $response->assertJson([
            'total' => 10,
        ]);

        $response->assertJsonStructure([
            'data' => [
                [
                    'first_name',
                    'last_name',
                    'email',
                    'telephone',
                ],
            ],
        ]);

    }
}
