<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use Illuminate\Http\Request;
use App\Services\SupportService;
use App\Http\Controllers\Controller;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Resources\SupportResource;
use App\Http\Requests\StoreUpdateRequest;

class SupportController extends Controller
{

    public function __construct(protected SupportService $supportService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $supports = $this->supportService->getAllPaginated(page: $request->get('page', 1), totalPerPage: $request->get('per_page', 15), filter: $request->filter);

        return ApiAdapter::toJson($supports);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateRequest $request)
    {
        $support = $this->supportService->new(CreateSupportDTO::makeFromRequest($request));

        return new SupportResource($support);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(string $id)
    {
        $support = $this->supportService->findOne($id);

        if (!$support)
            return response()->json(['error' => 'Not Found'], 404);

        return new SupportResource($support);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateRequest $request, string $id)
    {
        $support = $this->supportService->update(UpdateSupportDTO::makeFromRequest($request, $id));

        if (!$support)
            return response()->json(['error' => 'Not Found'], 404);

        return new SupportResource($support);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $support = $this->supportService->findOne($id);

        if (!$support)
            return response()->json(['error' => 'Not Found'], 404);

        $this->supportService->delete($id);

        return response()->json([], 204);
    }
}
