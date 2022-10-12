<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'date' => $this->created_at->diffForHumans(),
            'description' => $this->category->description,
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug,
                'image' => $this->category->image,
                'description' => $this->category->description
            ]
        ];
        return parent::toArray($request);
    }
}
