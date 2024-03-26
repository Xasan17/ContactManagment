<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Contact;

class IndexContactsService
{
    public function searchByPhoneOrName($query)
    {
        $contacts = Contact::where('first_name', 'like', "%$query%")
            ->orWhere('last_name', 'like', "%$query%")
            ->orWhereHas('phones', function ($phoneQuery) use ($query) {
                $phoneQuery->where('phone', 'like', "%$query%");
            })
            ->get();
        if ($contacts === null) {
            throw new NotFoundException(__('messages.object_not_found'), 404);
        }

        return $contacts;
    }
}
