<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Contact;
use App\Repository\ContactRepository;

class ShowContactsService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function showContactsService(int $contactId): ?Contact
    {$showContact=$this->contactRepository->getContactById($contactId);
        if ($showContact === null) {
            throw new NotFoundException(__('messages.object_not_found'), 404);
        }
        return $showContact;
    }
}
