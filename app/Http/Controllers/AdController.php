<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        $ads      = Ad::all();
        return view('home', ['branches' => $branches, 'ads' => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-ad');
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
    public function show(string $id): View|Factory|Application
    {
        $ad = Ad::query()->find($id);
        return view('single-ad', ['ad' => $ad]);
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
        //
    }

    public function search(Request $request)
    {
        $search   = $request->search_phrase;
        $branch   = $request->branch;
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;

        $query = Ad::query();

        if (isset($search) && $search != null) {
            $query->where('title', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        }

        if (isset($branch) && $branch != null) {
            $query->where('branch_id', 'like', $branch);
        }

        if (isset($minPrice) && $minPrice != null) {
            $query->where('price', '>=', $minPrice);
        }
        if (isset($maxPrice) && $maxPrice != null) {
            $query->where('price', '<=', $maxPrice);
        }

        $ads = $query->get();

        return view('home', ['ads' => $ads]);
    }
}
