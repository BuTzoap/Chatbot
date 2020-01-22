<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Users extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'token' => [
                'token' => $this->accessToken,
            ]
        ];
    }


}
