<?php


namespace App\Service;


use App\Entity\Product;

interface ProductInterface
{
    public function getProducts(): array;

    public function save(Product $product): int;

    public function delete(int $id);

    public function findById(int $id): Product;

    public function search(?string $search): array;
}