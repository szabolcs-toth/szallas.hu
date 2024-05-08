<?php

namespace App\Repositories;

use App\Interfaces\CompaniesRepositoryInterface;
use App\Models\Companies;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CompaniesRepository implements CompaniesRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data): bool
    {
        $model = new Companies();

        $model->companyName = $data['companyName'];
        $model->companyRegistrationNumber = $data['companyRegistrationNumber'];
        $model->companyFoundationDate = $data['companyFoundationDate'];
        $model->country = $data['country'];
        $model->zipCode = $data['zipCode'];
        $model->city = $data['city'];
        $model->streetAddress = $data['streetAddress'];
        $model->latitude = $data['latitude'];
        $model->longitude = $data['longitude'];
        $model->companyOwner = $data['companyOwner'];
        $model->employees = $data['employees'];
        $model->activity = $data['activity'];
        $model->active = $data['active'];
        $model->email = $data['email'];
        $model->password = $data['password'];

        return $model->save();
    }

    /**
     * @param array $companyIds
     * @return Collection
     */
    public function findByIds(array $companyIds): Collection
    {
        return Companies::whereIn('companyId', $companyIds)->get();
    }

    /**
     * @param int $companyId
     * @param array $data
     * @return bool
     */
    public function update(int $companyId, array $data): bool
    {
        $model = Companies::where('companyId', $companyId);

        return $model?->update(array_merge($data, [
                'updatedAt' => Carbon::now()
            ])) > 0;
    }
}
