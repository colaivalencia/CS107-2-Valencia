<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        //click submit in create form
        $validatedData = $request->validate([
            'username' => 'required|max:50|unique:customers,username',
            'email' => 'required|email|unique:customers,email',
            'password_hash' => 'required|min:8',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable',
            'phone_number' => 'nullable|max:20',
        ]);

        Customer::create($validatedData);

        return redirect()->route('customers.index');
    }
}
