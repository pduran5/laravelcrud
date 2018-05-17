@extends('layouts/default')

@section('title')
    List Items
@endsection

@section('content')
    <h1>Items</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}</td>
                <td><a href="items/update/{{$item->id}}" class="btn btn-primary">UPDATE</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="items/create" class="btn btn-primary">New Item</a>
@endsection