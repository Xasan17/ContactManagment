<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPhone extends Model
{
    use HasFactory;
    protected $fillable = ['contact_id','phone'];

    public function contact()
    {
        return $this->belongsToMany(Contact::class);}
}
