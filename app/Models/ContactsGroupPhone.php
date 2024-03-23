<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactsGroupPhone extends Model
{
    use HasFactory;
    protected $fillable = ['contact_id', 'group_id'];
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function group()
    {
        return $this->belongsTo(ContactsGroup::class);
    }
}
