<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MotivationRequest;
use App\Http\Resources\API\MotivationBlockResource;
use App\Http\Resources\API\MotivationSingleResource;
use App\Models\Motivation;
use Illuminate\Http\Request;

class MotivationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? 10;

        $Motivations = Motivation::with('user')->latest('remind_at')->limit($limit)->get();

        return MotivationBlockResource::collection($Motivations)->additional([
            'meta' => ['limit' => $limit],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MotivationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['event_at'] = now()->timestamp;

        $Motivation = Motivation::create($data);

        return MotivationSingleResource::make($Motivation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Motivation $Motivation)
    {
        return MotivationBlockResource::make($Motivation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Motivation $Motivation, MotivationRequest $request)
    {
        $data = $request->validated();
        $Motivation->update($data);

        return MotivationSingleResource::make($Motivation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motivation $Motivation)
    {
        $Motivation->delete();

        return response(['ok' => true]);
    }
}
