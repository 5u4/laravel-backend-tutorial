<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Post
 * @package App\Http\Resources
 * @property string $title
 * @property string $description
 * @property array $images
 * @property string $details
 * @property mixed $date
 * @property string $link
 */
class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'images' => $this->images,
            'details' => $this->details,
            'date' => $this->date,
            'link' => $this->link,
        ];
    }
}
