<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable {
    use AuthenticatableTrait;

    protected $fillable = [
        'username', 'password', 'name', 'email', 'is_admin',
    ];

    public function isAdmin() {
        return $this->is_admin;
    }

    public function scopeAdmin($query) {
        return $query->where('is_admin', true);
    }
}
