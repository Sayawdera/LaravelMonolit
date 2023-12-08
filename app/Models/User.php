<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Constants\GeneralStatus;
use App\Constants\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'date',
        'photo',
        'phone',
        'phone_verified_at',
        'email',
        'email_verified_at',
        'country_id',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @var string[]
     */
    protected $with = ['roles'];

    public array $translatable = [];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function UserRoles(): HasMany
    {
        return $this->hasMany(UserRole::class);
    }

    /**
     * @param $query
     * @param $data
     * @return mixed
     */
    public function scopeFilter($query, $data): mixed
    {
        if (isset($data['status']))
        {
            $query->whereHas('roles', function ($q) use ($data)
            {
                $q->where('status', $data['status']);
            });
        }

        if (isset($data['role']))
        {
            $query->whereHas('roles', function ($q) use ($data)
            {
                $q->where('role_code', $data['role']);
            });
        }
        return $query;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|HasMany|object|null
     */
    public function getActiveRole()
    {
        return $this->roles()->where('status', GeneralStatus::STATUS_ACTIVE)->first();
    }
}
