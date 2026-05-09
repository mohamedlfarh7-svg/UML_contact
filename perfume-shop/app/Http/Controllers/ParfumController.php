<?php

namespace App\Http\Controllers;

use App\Models\Parfum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParfumController extends Controller
{
    public function index() {
        $parfumsHommes = Parfum::where('category', 'homme')->get();
        $parfumsFemmes = Parfum::where('category', 'femme')->get();
        return view('parfums.index', compact('parfumsHommes', 'parfumsFemmes'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required',
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('parfums', 'public');

        Parfum::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'image' => $path
        ]);

        return redirect()->route('home')->with('success', 'Parfum ajouté avec succès!');
    }

    public function order($id) {
        $parfum = Parfum::findOrFail($id);
        
        if($parfum->quantity > 0) {
            $parfum->decrement('quantity');
            return back()->with('success', 'Commande effectuée !');
        }
        
        return back()->with('error', 'Désolé, produit épuisé.');
    }

    public function edit(Parfum $parfum)
    {
        return view('parfums.edit', compact('parfum'));
    }

    public function update(Request $request, Parfum $parfum)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'quantity', 'category']);

        if ($request->hasFile('image')) {
            if ($parfum->image) {
                Storage::disk('public')->delete($parfum->image);
            }
            $data['image'] = $request->file('image')->store('parfums', 'public');
        }

        $parfum->update($data);

        return redirect()->route('dashboard')->with('success', 'Le parfum a été modifié avec succès !');
    }
}
