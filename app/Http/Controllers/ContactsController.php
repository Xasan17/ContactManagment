<?php

namespace App\Http\Controllers;

use App\Services\IndexContactsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    protected $indexContactsService;

    public function __construct(IndexContactsService $indexContactsService)
    {
        $this->indexContactsService = $indexContactsService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):JsonResponse
    {
        $query = $request->input('q');
        $contacts = $this->indexContactsService->searchByPhoneOrName($query);
        return response()->json($contacts);
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
}
