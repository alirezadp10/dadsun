<?php

namespace Tests\Feature;

use App\Mail\CompanyCreated;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CompaniesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function companies_can_stored()
    {
        $this->signIn();

        $data = \App\Models\Company::factory(['user_id' => auth()->id()])->raw();

        $this->post(route('company.store'),$data)->assertRedirect(route('company.index'));

        $data['logo'] = 'images/company/'.$data['logo']->hashName();

        Storage::disk('public')->assertExists($data['logo']);

        $this->assertDatabaseHas('companies',$data);
    }

    /**
     * @test
     */
    public function companies_can_updated()
    {
        $this->signIn(User::factory(['id' => 2])->create());

        $company = \App\Models\Company::factory(['user_id' => auth()->id()])->create();

        $data = \App\Models\Company::factory(['user_id' => auth()->id()])->raw();

        $this->patch(route('company.update',$company->id),$data)->assertRedirect(route('company.show',$company->id));

        $data['logo'] = 'images/company/'.$data['logo']->hashName();

        Storage::disk('public')->assertExists($data['logo']);

        Storage::disk('public')->assertMissing($company->logo);

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
        $this->signIn()->withoutExceptionHandling();

        $company = \App\Models\Company::factory()->create();

        $this->delete(route('company.destroy',$company->id))->assertRedirect(route('company.index'));

        $this->assertDatabaseMissing('companies',$company->toArray());
    }

    /**
     * @test
     */
    public function when_company_was_created_an_email_must_be_send()
    {
        Mail::fake();

        $this->signIn();

        $data = \App\Models\Company::factory(['user_id' => auth()->id()])->raw();

        $this->post(route('company.store'),$data);

        Mail::assertSent(CompanyCreated::class);
    }
}
