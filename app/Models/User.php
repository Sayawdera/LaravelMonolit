<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use OpenApi\Annotations as OA;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;



/**
 * @OA\Schema(
 *   description="Users model",
 *   title="Users",
 *   required={},
 *   @OA\Property(type="integer",description="id of Users",title="id",property="id",example="1",readOnly="true"),
 *   @OA\Property(type="string",description="name of Users",title="name",property="name",example="Macbook Pro"),
 *   @OA\Property(type="string",description="sku of Users",title="sku",property="sku",example="MCBPRO2022"),
 *   @OA\Property(type="integer",description="price of Users",title="price",property="price",example="99"),
 *   @OA\Property(type="dateTime",title="created_at",property="created_at",example="2022-07-04T02:41:42.336Z",readOnly="true"),
 *   @OA\Property(type="dateTime",title="updated_at",property="updated_at",example="2022-07-04T02:41:42.336Z",readOnly="true"),
 * )
 *
 *
 *
 *
 *
 * @OA\Schema (
 *   schema="Userss",
 *   title="Userss list",
 *   @OA\Property(title="data",property="data",type="array",
 *     @OA\Items(type="object",ref="#/components/schemas/Users"),
 *   ),
 *   @OA\Property(type="string", title="first_page_url",property="first_page_url",example="http://localhost:8080/api/merchant-customers?page=1"),
 *   @OA\Property(type="string", title="last_page_url",property="last_page_url",example="http://localhost:8080/api/merchant-customers?page=3"),
 *   @OA\Property(type="string", title="prev_page_url",property="prev_page_url",example="null"),
 *   @OA\Property(type="string", title="next_page_url",property="next_page_url",example="http://localhost:8080/api/merchant-customers?page=2"),
 *   @OA\Property(type="integer", title="current_page",property="current_page",example="1"),
 *   @OA\Property(type="integer", title="from",property="from",example="1"),
 *   @OA\Property(type="integer", title="last_page",property="last_page",example="3"),
 *   @OA\Property(type="string", title="path",property="path",example="http://localhost:8080/api/merchant-customers"),
 *   @OA\Property(type="integer", title="per_page",property="per_page",example="1"),
 *   @OA\Property(type="integer", title="total",property="total",example="3"),
 *   @OA\Property(title="links",property="links",type="array",
 *     @OA\Items(type="object",
 *          @OA\Property(type="string",title="url",property="url",example="http://localhost:8080/api/merchant-customers?page=2"),
 *          @OA\Property(type="string",title="label",property="label",example="1"),
 *          @OA\Property(type="bool",title="active",property="active",example="true"),
 *      ),
 *   )
 * )
 *
 * @OA\Parameter(
 *      parameter="Users--id",
 *      in="path",
 *      name="Users_id",
 *      required=true,
 *      description="Id of Users",
 *      @OA\Schema(
 *          type="integer",
 *          example="1",
 *      )
 * ),
 */



class User extends BaseModel
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
        return $this->hasMany(UserRoles::class);
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
