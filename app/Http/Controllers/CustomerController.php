<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }
    
    public function create() {
        return view('customers.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'company_name' => 'required|max:255',
            'company_address' => 'required|max:255',
            'phone' => 'required|max:15',
        ]);
        $customer = Customer::create($validatedData);
        return redirect('/customers')->with('success', 'Customer has been added');
    }

    public function show($id) {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'company_name' => 'required|max:255',
            'company_address' => 'required|max:255',
            'phone' => 'required|max:15',
        ]);
        Customer::whereId($id)->update($validatedData);

        return redirect('/customers')->with('success', 'Customer has been updated');
    }

    public function destroy($id) {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('/customers')->with('success', 'Customer has been deleted successfully');
    }
}
