<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'date' => $this->date,
            'photo' => $this->photo,
            'phone' => $this->phone,
            'phone_verified_at' => $this->phone_verified_at,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'country_id' => $this->country_id,
            'password' => $this->password,
        ];
    }
}
