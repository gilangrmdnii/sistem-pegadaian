<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $customers = Customer::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->latest()->get();

        return view('admin.customers.index', compact('customers'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'nullable|email',
            'phone_number' => 'required|string',
        ]);

        Customer::create($validated);

        return redirect()->route('admin.customers.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'nullable|email',
            'phone_number' => 'required|string',
        ]);

        $customer->update($validated);

        return redirect()->route('admin.customers.index')->with('success', 'Pelanggan berhasil diupdate.');
    }

    public function create()
    {
        return view('admin.customers.create');
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->with('success', 'Data pelanggan berhasil dihapus.');
    }
}
