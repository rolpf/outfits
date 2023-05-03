<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\OutfitRequest;
use App\Models\Outfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OutfitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('account.outfits.index', [
            'outfits' => \Auth::user()->outfits()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Outfit::class);

        return view('account.outfits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OutfitRequest $request)
    {
        $this->authorize('create', Outfit::class);

        $data = $request->validated();

        if($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->storePublicly(sprintf('%s/outfits', \Auth::id()));
        }

        $outfit = \Auth::user()->outfits()->create($data);

        return redirect()->route('account.outfits.index')->banner(sprintf(__("Outfit %s created"), $outfit->name));
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
        if($request->hasFile('thumbnail')) {
            if (Storage::disk('public')->exists($thumbnail)) {
                Storage::disk('public')->delete($thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->storePublicly(sprintf('%s/outfits'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outfit $outfit)
    {
        $this->authorize('delete', $outfit);

        $outfit->delete();

        return redirect()->route('account.outfits.index')->banner(sprintf("Outfit %s deleted", $outfit->name));
    }
}
