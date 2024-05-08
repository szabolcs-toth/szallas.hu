<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CompaniesRepositoryInterface
{
    public function findByIds(array $ids): Collection;
    public function store(array $data): bool;
    public function update(int $id, array $data): bool;
}
