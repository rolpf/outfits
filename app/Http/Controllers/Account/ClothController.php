<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClothRequest;
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
    public function store(ClothRequest $request)
    {
        $this->authorize('create', Cloth::class);

        $data = $request->validated();

        if($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store(sprintf('%s/clothes', \Auth::id()), 'public');
        }

        $cloth = \Auth::user()->clothes()->create($data);

        if($request->has('brand')) {
            $cloth->brand()->attach($request->get('clothes'));
        }

        if($request->has('category')) {
            $cloth->category()->attach($request->get('category'));
        }



        return redirect()->route('account.clothes.index')->banner(sprintf(__("Outfit %s created"), $cloth->name));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('account.clothes.edit', [
            'cloth' => Cloth::with('brand', 'category')->findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClothRequest $request, string $id)
    {
        $cloth = Cloth::findOrFail($id);
        $this->authorize('update', $cloth);

        $data = $request->validated();

        if($request->hasFile('thumbnail')) {
            if($cloth->thumbnail) {
                \Storage::disk('public')->delete($cloth->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store(sprintf('%s/clothes', \Auth::id()), 'public');
        }

        $cloth->brand()->sync($request->get('brand'));
        $cloth->category()->sync($request->get('category'));

        $cloth->update($data);

        return redirect()->route('account.clothes.index')->banner(sprintf(__("Cloth %s updated"), $cloth->name));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cloth = Cloth::findOrFail($id);
        $this->authorize('delete', $cloth);

        if ($cloth->thumbnail) {
            \Storage::disk('public')->delete($cloth->thumbnail);
        }

        $cloth->delete();

        return redirect()->route('account.clothes.index')->banner(sprintf(__("Cloth %s deleted"), $cloth->name));
    }
}
