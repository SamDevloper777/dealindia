<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class LoginToken extends Model
{
    protected $table = 'login_tokens';
    protected $fillable = [
        'email',
        'token',
        'expires_at',
    ];
    public function isExpired(): bool
    {
        return Carbon::now()->greaterThan($this->expires_at);
    }

}
