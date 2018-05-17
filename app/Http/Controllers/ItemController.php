<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items', ['items' => $items]);
    }

    public function create()
    {
        return view('formitem');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'description' => 'required|min:8',
            'price' => 'required|numeric|min:0'
        ]);

        Item::create($request->all());
        return redirect('/items');
    }

    // Mostra la vista formitem passant-li l'item
	public function updateForm($id)
	{
		$item = Item::find($id) ;   
		return view('formitem', ['item' => $item]);
	}
	
	// Actualitza l'item a la base de dades
    public function update(Request $request)
	{
	    $this->validate($request, [
			'name' => 'required|min:5',
			'description' => 'required|min:8',
			'price' => 'required|min:0'
		]);
			   
		$id = $request->input('id'); 
				
		$item = Item::find($id);
		$item->name = $request->input('name'); 
		$item->description = $request->input('description'); 
        $item->price = $request->input('price');
        $item->save();
		
        return redirect('items');
	}
}
