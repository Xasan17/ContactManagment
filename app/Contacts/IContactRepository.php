<?php

namespace App\Contacts;

use App\DTO\ContactsDTO;
use App\Models\Contact;

interface IContactRepository
{
    public function getContactById(int $contactId):?Contact;
    public function createContact(ContactsDTO $contactDTO ):Contact;
    public function updateContact(int $contactId, ContactsDTO $contactDTO):?Contact;
}
