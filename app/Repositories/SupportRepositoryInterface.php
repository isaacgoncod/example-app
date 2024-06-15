<?php

namespace App\Repositories;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use stdClass;

interface SupportRepositoryInterface
{
    public function getAllPaginated(int $page = 1, int $totalPerPage = 15, ?string $filter = null): PaginationInterface;

    public function getAll(?string $filter = null): array;

    public function findOne(string $id): ?stdClass;

    public function delete(string $id): void;

    public function new(CreateSupportDTO $dto): stdClass;

    public function update(UpdateSupportDTO $dto): ?stdClass;
}
