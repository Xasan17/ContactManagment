<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'blocked',
        'email',
        'address'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function phones()
    {
        return $this->hasMany(ContactPhone::class);
    }
}
