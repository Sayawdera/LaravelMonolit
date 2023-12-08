<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country
{
    use HasFactory;

    /**
     * @var array
     */
    protected $casts = [];

    /**
     * @var string[]
     */
    protected $fillable = [
        'country_info',
        'parent_id',
    ];
    /**
     * @var array|string[]
     */
    public array $translatable = ['country_info'];

    /**
     * @return mixed
     */
    public function regions()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * @return mixed
     */
    public function country()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    /**
     * @param $query
     * @param $data
     * @return void
     */
    public function scopeFilter($query, $data)
    {
        if (isset($data['country']))
        {
            $query->whereNull('parent_id');
        }

        if (isset($data['region']))
        {
            $query->whereNotNull('parent_id')->with('country');
        }
    }
}
