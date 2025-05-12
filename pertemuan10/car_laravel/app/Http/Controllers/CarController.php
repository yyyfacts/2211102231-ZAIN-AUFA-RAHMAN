<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Merk;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('merk')->get();
        return view('car.index', compact('cars'));
    }

    public function create()
    {
        $merks = Merk::all();
        return view('car.create', compact('merks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'merk_id' => 'required|exists:merks,id',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('car_images', 'public');
        }

        Car::create($data);

        return redirect()->route('car.index')->with('message', 'Car added successfully!');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('car.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $merks = Merk::all();
        return view('car.edit', compact('car', 'merks'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $data = $request->validate([
            'merk_id' => 'required|exists:merks,id',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('car_images', 'public');
        }

        $car->update($data);

        return redirect()->route('car.index')->with('message', 'Car updated successfully!');
    }

    public function destroy($id)
    {
        Car::destroy($id);
        return redirect()->route('car.index')->with('message', 'Car deleted successfully!');
    }
}
