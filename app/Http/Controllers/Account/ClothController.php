<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Cloth;
use Illuminate\Http\Request;

class ClothController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('account.clothes.index', [
            'clothes' => auth()->user()->clothes()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Cloth::class);

        return view('account.clothes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cloth = Cloth::findOrFail($id);
        $this->authorize('delete', $cloth);

        $cloth->delete();

        return redirect()->route('account.clothes.index')->banner(sprintf(__("Cloth %s deleted"), $cloth->name));
    }
}
