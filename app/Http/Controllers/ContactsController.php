<?php

namespace App\Http\Controllers;

use App\DTO\ContactsDTO;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Models\User;
use App\Repository\ContactRepository;
use App\Services\IndexContactsService;
use App\Services\showContactsService;
use App\Services\StoreContactsService;
use App\Services\UpdateContactsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
        public function __construct(
     private   IndexContactsService   $indexContactsService,
   private     ShowContactsService    $showContactsService)
    {
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
    public function store(ContactRequest $request, StoreContactsService $services)
    {
        $validated=$request->validated();
        $contract=$services->execute(ContactsDTO:: fromArray($validated));
        return new ContactResource($contract);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $contactId):ContactResource
    {
        $contact = $this->showContactsService->showContactsService($contactId);
        return new ContactResource($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request,int $contactId,
                           UpdateContactsService $updateContactsService ):ContactResource
    {
        $validated=$request->validated();
        $user_id=Auth::user()->id;
        $contact = $updateContactsService->updateContactsService($contactId, ContactsDTO::fromArray($validated,$user_id));
        return new ContactResource($contact);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
