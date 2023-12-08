<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class UserRoles extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'role_code',
        'user_id',
        'status',
    ];
    protected $guarded = [];

    public array $translatable = [];

    public function users(): object
    {
        return $this->belongsTo(User::class);
    }
}
