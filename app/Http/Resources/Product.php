<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends JsonResource
{
    use SoftDeletes;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    { //mudar nomes dos campos para mostrar
        $deleted = $this->deleted ? 'sim' : 'não';
        return [
            'identify' => $this->id,
            'title' => $this->title,
            'body' => $this->description,
            'created' => $this->created_at,
            'updated' => $this->updated_at,
            'deleted' => $deleted

        ];
    }
}
