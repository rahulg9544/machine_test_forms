<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HtmlFieldResource extends JsonResource
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
            'id' => $this->id,
            'field' => $this->html_fields,
            
        ];
    }
}
