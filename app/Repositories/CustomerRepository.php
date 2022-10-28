<?php

namespace App\Repositories;

use APP\interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return Customer::orderBy('name')
            ->with('user')
            ->get()
            ->map->format();

            // ->map(function($customer) {
            //     return $customer->format();
            // });

        //return $customers;
    }

    public function findById($customerId)
    {
        return Customer::where('id', $customerId)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->format();
        //return $this->format();
    }


    public function findByUsername()
    {

    }


    public function updateById($customerId)
    {
        $customer = Customer::where('id', $customerId)->firstOrFail();

        $customer->update(request()->only('name'));

    }


    public function deleteById($customerId)
    {
        Customer::where('id', $customerId)->delete();

    }


    // protected function format($customer)
    // {
    //     return [
    //         'customer_id' => $customer->id,
    //         'name' => $customer->name,
    //         'email' => $customer->user->email,
    //         'last_updated' => $customer->updated_at->diffForHumans()
    //     ];
    // }
}
