<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Brands/Index', [
            'brands' => Brand::filter(request()->query('search'))->paginate(6),
            'search' => request()->query('search')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): Response
    {
        return Inertia::render('Brands/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $validated = $request->validated();

        Brand::create($validated);

        return redirect()->route('admin.brands.index')->with([
            'success' => 'Brand created successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Brand $brand): Response
    {
        return Inertia::render('Brands/Show', [
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Brand $brand): Response
    {
        return Inertia::render('Brands/Edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
