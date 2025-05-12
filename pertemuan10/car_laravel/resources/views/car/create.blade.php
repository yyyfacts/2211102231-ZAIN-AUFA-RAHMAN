@extends('layout.app')

@section('title', 'Add New Car')

@section('content')
    <h2>Add New Car</h2>

    <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="merk_id">Merk</label>
            <select name="merk_id" id="merk_id" class="form-control">
                @foreach ($merks as $merk)
                    <option value="{{ $merk->id }}">{{ $merk->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" id="year" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
