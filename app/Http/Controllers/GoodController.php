<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GoodController extends Controller
{
    use AuthorizesRequests;
    // Show all available goods
    public function index()
    {
        $goods = Good::where('is_sold', false)->get();
        return view('goods.index', compact('goods'));
    }

    // Show the form to create a good
    public function create()
    {
        return view('goods.create');
    }

    // Save the newly created good
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        Auth::user()->goods()->create($request->all());

        return redirect()->route('goods.index')->with('success', 'Good listed for sale!');
    }

    // Show one item (optional)
    public function show(Good $good)
    {
        return view('goods.show', compact('good'));
    }

    // Show form to edit your item
    public function edit(Good $good)
    {
        $this->authorize('update', $good);
        return view('goods.edit', compact('good'));
    }

    // Update the good
    public function update(Request $request, Good $good)
    {
        $this->authorize('update', $good);

        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $good->update($request->all());

        return redirect()->route('goods.index')->with('success', 'Good updated.');
    }

    // Delete your own item
    public function destroy(Good $good)
    {
        $this->authorize('delete', $good);
        $good->delete();

        return redirect()->route('goods.index')->with('success', 'Good deleted.');
    }   

    public function buy(Good $good)
    {
        $user = auth()->user();

        if ($good->is_sold) {
            return back()->with('error', 'Already sold.');
        }

        if ($good->user_id === $user->id) {
            return back()->with('error', 'You cannot buy your own item.');
        }

        $good->update([
            'is_sold' => true,
            'bought_by' => $user->id,
        ]);

        return back()->with('success', 'Purchase successful!');
    }


    public function dashboard()
    {
        $user = auth()->user();

        $myGoods = $user->goods()->latest()->get();

        // If you want to track purchases, you'd also do:
        // $purchased = Good::where('bought_by', $user->id)->get();

        return view('dashboard', compact('myGoods'));
    }
}
