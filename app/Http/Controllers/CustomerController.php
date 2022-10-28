<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerRepository;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->all();

        return $customers;
    }


    public function show($customerId)
    {
        $customer = $this->customerRepository->findById($customerId);

        return $customer;
    }


    public function update($customerId)
    {
        $customer = $this->customerRepository->updateById($customerId);

        return redirect('/customer/'.$customerId);
    }


    public function destroy($customerId)
    {
        $customer = $this->customerRepository->deleteById($customerId);

        return redirect('/customer');
    }
}
