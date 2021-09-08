<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $arrayData = [
            'id' => $this->id,
            'group' => $this->group,
            'slug' => $this->slug,
            'name' => $this->name,
            'products' => ProductCollection::collection($this->products)
        ];

        return $arrayData;
    }
}
