<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Option;

class FormDetailsResource extends JsonResource
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
            'form_name' => $this->form_name,
            'form_detail_id' => $this->form_detail_id,
            'html_field_id' => $this->html_field_id,
            'html_field_value' => $this->html_field_value,
            'options' => $this->getOptions($this->id, $this->form_detail_id),
        ];
    }

    public function getOptions($form_id, $details_id)
    {
        $forms = Option::select(
            'options.value as value',
            'options.label as label'
           
        )
        ->where('options.form_id', $form_id)
        ->where('options.form_details_id', $details_id)->get();
        return $forms;
        
    }
}
