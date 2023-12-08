<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailVerificationCode extends BaseModel
{
    use HasFactory;

    protected $table = 'email_verification_code';
    protected $fillable = [
        'code',
        'email',
    ];
    protected $hidden = [
        'code',
    ];
    protected $casts = [];
    public array $translatable = [];
}
