@extends('layouts/default')

@section('title')
    Create and Update Items
@endsection

@section('content')
        
    <?php
        if (!isset($item))
        {
            $id = $name = $description = $price = "";
            $action = "create";
        }
        else
        {
            $id = $item->id;
            $name = $item->name;
            $description = $item->description;
            $price = $item->price;
            $action = url("/items/update");
        }
    ?>

    @if($action == "create")
    <h1>Create Item</h1>
    @else
    <h1>Update Item</h1>
    @endif

	@if(count($errors) > 0)
	    <div class="errors">
		    <ul>
		    @foreach($errors->all() as $error)
		        <li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
    @endif
    <form action="{{$action}}" method="post">
        @csrf
        <div class="form-group">
            <label>Name: </label>
            <input type="text" class="form-control" name="name" value="{{old('name', $name)}}" >
        </div>
        <div class="form-group">
            <label>Description: </label>
            <input type="text" class="form-control" name="description" value="{{old('description', $description)}}" >
        </div>
        <div class="form-group">
            <label>Price: </label>
            <input type="text" class="form-control" name="price" value="{{old('price', $price)}}" >
        </div>
        <input type="hidden" name="id" value="{{$id}}">
        <input type="submit" class="btn btn-success" value="Send">
	</form>
@endsection