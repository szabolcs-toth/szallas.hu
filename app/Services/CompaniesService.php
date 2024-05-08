<?php

namespace App\Services;

use App\Repositories\CompaniesRepository;
use Illuminate\Database\Eloquent\Collection;

class CompaniesService
{
    private CompaniesRepository $repository;

    public function __construct()
    {
        $this->repository = new CompaniesRepository();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data): bool
    {
        return $this->repository->store($data);
    }

    /**
     * @param array $companyIds
     * @return Collection
     */
    public function findByIds(array $companyIds): Collection
    {
        return $this->repository->findByIds($companyIds);
    }

    /**
     * @param int $companyId
     * @param array $data
     * @return bool
     */
    public function update(int $companyId, array $data): bool
    {
        return $this->repository->update($companyId, $data);
    }
}
