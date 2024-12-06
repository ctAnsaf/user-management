<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'fk_department', 'fk_designation', 'phone_number'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'fk_department');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'fk_designation');
    }
}
