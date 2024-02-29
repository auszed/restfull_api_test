<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

// imported classes
use App\Models\Customer;
use App\Http\Resources\CustomerCollection;
// importamos los filtros
use App\Filters\CustomerFilter;

// importar request
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          // nos permite ver el dato en bruto
        // $customers = Customer::all()

        $filter = new CustomerFilter();
        $queryItems = $filter->transform($request);


        // retrive the resuld in Json
        $customers = Customer::where($queryItems);
        // esta classe de resouses transforma el dato
        return new CustomerCollection($customers->paginate()->appends($request->query()));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
