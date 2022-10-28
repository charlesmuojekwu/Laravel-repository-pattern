<?php

namespace APP\interfaces;


interface CustomerRepositoryInterface
{
    public function all();

    public function findById($customerId);

    public function findByUsername();

    public function updateById($customerId);

    public function deleteById($customerId);
}
