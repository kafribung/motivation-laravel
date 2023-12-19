<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
    // public function store(MotivationRequest $request)
    // {
    //     $data = $request->validated();
    //     $data['user_id'] = auth()->id();
    //     $data['event_at'] = now()->timestamp;

    //     $Motivation = Motivation::create($data);

    //     return MotivationSingleResource::make($Motivation);
    // }

    /**
     * Display the specified resource.
     */
    // public function show(Motivation $Motivation)
    // {
    //     return MotivationBlockResource::make($Motivation);
    // }

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
