<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MotivationRequest;
use App\Http\Resources\API\MotivationResource;
use App\Models\Motivation;
use Illuminate\Http\Request;

class MotivationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? null;

        $motivations = Motivation::with('user')->latest()->limit($limit)->get();

        return MotivationResource::collection($motivations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MotivationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] = str($request->name)->slug();

        $motivation = Motivation::create($data);

        return MotivationResource::make($motivation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Motivation $motivation)
    {
        return MotivationResource::make($motivation);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Motivation $Motivation, MotivationRequest $request)
    // {
    //     $data = $request->validated();
    //     $Motivation->update($data);

    //     return MotivationSingleResource::make($Motivation);
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Motivation $Motivation)
    // {
    //     $Motivation->delete();

    //     return response(['ok' => true]);
    // }
}
