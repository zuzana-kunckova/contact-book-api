<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection;
    }

    // public function with($request)
    // {
    //     return [
    //         'version' => '1.0.0',
    //         'author' => 'Zuzana',
    //     ];
    // }
}
