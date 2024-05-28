<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = Item::where('name', 'LIKE', "%$query%")->get();
        if(auth()->user()->role == "user"){
            return view('denied');
        }
        return view('items.search', compact('items'));
    }

    public function create()
    {
        if(auth()->user()->role == "user"){
            return view('denied');
        }
        return view('items.create');
        
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new item
        $item = new Item();
        $item->name = $validatedData['name'];
        $item->description = $validatedData['description'];

        // Store the photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('uploads/products', $filename, 'public');
            $item->photo = $filename;
        }

        $item->price = $validatedData['price'];
        $item->save();
        if(auth()->user()->role == "user"){
            return view('denied');
        }
        return redirect()->route('admin.dashboard')->with('success', 'Item created successfully.');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        if(auth()->user()->role == "user"){
            return view('denied');
        }
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $item = Item::findOrFail($id);

            // Update the item
            $item->name = $request->input('name');
            $item->description = $request->input('description');
            $item->price = $request->input('price');

            // Store the photo if provided
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $path = $photo->storeAs('uploads/products', $filename, 'public');
                $item->photo = $filename;
            }

            $item->save();
            if(auth()->user()->role == "user"){
                return view('denied');
            }
            return redirect()->route('admin.dashboard')->with('success', 'Item updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating item: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        if(auth()->user()->role == "user"){
            return view('denied');
        }
        return redirect()->route('admin.dashboard')->with('success', 'Item deleted successfully.');
    }
}
