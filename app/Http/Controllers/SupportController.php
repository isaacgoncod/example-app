<?php

namespace App\Http\Controllers;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

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
        $supports = $this->supportService->getAllPaginated(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin.support.index', compact('supports', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.support.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateRequest $request, Support $support)
    {
        // $data = $request->validated();
        // $data['status'] = 'a';

        // $support->create($data);

        $this->supportService
            ->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('support.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $support = Support::find($id);
        $support = $this->supportService->findOne($id);

        if (! $support) {
            return back();
        }

        return view('admin.support.show', compact('support'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $support = $support->where('id', $id)->first();
        $support = $this->supportService->findOne($id);

        if (! $support) {
            return back();
        }

        return view('admin.support.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateRequest $request, string $id)
    {
        // $support = Support::find($id);

        // if (!$support) return back();

        // $validated = $request->validated();

        // $support->update($validated);

        $support = $this->supportService
            ->update(UpdateSupportDTO::makeFromRequest($request));

        if (! $support) {
            return back();
        }

        return redirect()->route('support.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $support = Support::find($id);
        $support = $this->supportService->findOne($id);

        if (! $support) {
            return back();
        }

        $this->supportService->delete($id);

        return redirect()->route('support.index');
    }
}
