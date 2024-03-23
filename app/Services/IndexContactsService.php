<?php

namespace App\Services;

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

        return $contacts;
    }
//    public function searchByPhoneOrName($query)
//    {
//        return  Contact::where('first_name', 'like', "%$query%")
//            ->orWhere('last_name', 'like', "%$query%")
//            ->orWhereHas('phones', function ($query) use ($query) {
//                $query->where('phone', 'like', "%$query%");
//            })
//            ->get();}
}
