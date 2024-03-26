<?php

namespace App\Repository;

use App\Contacts\IContactRepository;
use App\DTO\ContactsDTO;
use App\Models\Contact;
use App\Models\User;

class ContactRepository implements IContactRepository
{
    public function getContactById(int $contactId):?Contact
    {
        return Contact::findOrFail($contactId);
    }
    public function createContact(ContactsDTO $contactDTO):Contact
    {
        $user = User::where('name', $contactDTO->getUserName())->first();
        if (!$user) {
            $user = new User(['name' => $contactDTO->getUserName()]);
            $user->save();
        }
        $contact = new Contact();
        $contact->user()->associate($user);
        $contact->firstName = $contactDTO->getFirstName();
        $contact->lastName = $contactDTO->getLastName();
        $contact->blocked = $contactDTO->getBlocked();
        $contact->email = $contactDTO->getEmail();
        $contact->address = $contactDTO->getAddress();
        $contact->save();
        return $contact;
    }
    public function updateContact(int $contactId, ContactsDTO $contactDTO): Contact
    { $userId=User::id();
        $contact= $this->getContactById($contactId);
        $contact->userId =$userId;
        $contact->firstName = $contactDTO->getFirstName();
        $contact->lastName = $contactDTO->getLastName();
        $contact->blocked = $contactDTO->getBlocked();
        $contact->email = $contactDTO->getEmail();
        $contact->address = $contactDTO->getAddress();
        $contact->save();
        return $contact;
    }
}
