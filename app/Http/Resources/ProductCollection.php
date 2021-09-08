<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $imgs = [];
        foreach (json_decode($this->images) as $img) {
            $path = 'BurmeseDream/Products/Images/';
            $i = Storage::disk('ln_spaces')->url($path . $img);
            array_push($imgs, $i);
        }


        $arrayData = [
            'id' => $this->id,
            'code' => $this->code,
            'slug' => $this->slug,
            'name' => $this->name,
            'category' => [
                'slug' => $this->category->slug,
                'name' => $this->category->name,
            ],
            'description' => $this->description,
            'price' => $this->price,
            'wholesale' => json_decode($this->wholesale),
            'images' => $imgs,
            'how_to_use' => $this->how_to_use,
            'features' => $this->features,
            'ingredients' => $this->ingredients,
            'weight' => $this->weight,
            'available' => $this->available,
            'url' => url('/api/products/' . $this->slug)
        ];


        return $arrayData;
    }
}
