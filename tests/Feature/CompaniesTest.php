<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompaniesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function companies_can_stored()
    {
        $data = \App\Models\Company::factory()->raw();

        $this->post(route('company.store'),$data)->assertRedirect(route('company.index'));

        $this->assertDatabaseHas('companies',$data);
    }

    /**
     * @test
     */
    public function companies_can_updated()
    {
        $company = \App\Models\Company::factory()->create();

        $data = \App\Models\Company::factory()->raw();

        $this->patch(route('company.update',$company->id),$data)->assertRedirect(route('company.show',$company->id));

        $this->assertDatabaseHas('companies',$data);
    }

    /**
     * @test
     */
    public function companies_can_be_shown()
    {
        $company = \App\Models\Company::factory()->create();

        $this->get(route('company.show',$company->id))->assertSee([
            $company->name,
            $company->email,
            $company->url,
        ]);
    }

    /**
     * @test
     */
    public function companies_can_be_listed()
    {
        $companies = \App\Models\Company::factory()->count(5)->create();

        $this->get(route('company.index'))->assertSee($companies->pluck('name')->toArray());
    }

    /**
     * @test
     */
    public function company_can_be_deleted()
    {
        $company = \App\Models\Company::factory()->create();

        $this->delete(route('company.destroy',$company->id))->assertRedirect(route('company.index'));

        $this->assertDatabaseMissing('companies',$company->toArray());
    }
}
