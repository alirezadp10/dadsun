<?php

namespace App\Observers;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyObserver
{
    public function created(Company $company)
    {
        //
    }

    public function updated(Company $company)
    {
        if (isset($company->getChanges()['logo'])) {
            Storage::disk('public')->delete($company->getRawOriginal('logo'));
        }
    }

    public function deleted(Company $company)
    {
        Storage::disk('public')->delete($company->getRawOriginal('logo'));
    }
}
