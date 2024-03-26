<?php

namespace App\Services;

use App\Contacts\IContactRepository;
use App\DTO\ContactsDTO;
use App\Exceptions\BusinessException;
use App\Models\Contact;

class StoreContactsService
{
    public function __construct(private IContactRepository $repository)
    {
    }
    public function execute(ContactsDTO $contactDTO): Contact
    {
        $existingContact = Contact::where('email', $contactDTO->getEmail())->where('id', '<>', $contactId)->first();

        if ($existingContact) {
            throw new
            BusinessException(__('messages.email_already_exists'));
        }
        return $this->repository->CreateContact($contactDTO);
    }
}
