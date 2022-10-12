<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'name' => $this->name,
            'category' => $this->category->name,
            'description' => $this->description,
            'seller' => $this->seller->name,
            'image' => $this->image,
            'slug' => $this->slug,
            'color' => $this->color,
            'weight' => $this->weight,
            'price' => $this->price,
            'dimension' => $this->dimension,
            'quantity' => $this->qty,
            'image' => $this->image,
            'date' => $this->created_at->diffForHumans()
        ];
        // return [
        //     'data' => $this->collection->map(function($data){
        //         return[
        //             'name' => $data->name,
        //             'category' => $data->category->name,
        //             'description' => $data->description,
        //             'seller' => $data->seller->name,
        //             'image' => $data->image,
        //             'slug' => $data->slug,
        //             'color' => $data->color,
        //             'weight' => $data->weight,
        //             'price' => $data->price,
        //             'dimension' => $data->dimension,
        //             'quantity' => $data->qty,
        //             'image' => $data->image,
        //         ];
        //     })
        // ];
    }
    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
