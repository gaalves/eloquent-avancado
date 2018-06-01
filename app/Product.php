<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['title', 'description'];
    protected $appends = ['resume_title']; //ADICIONAR CAMPO DO MUTATOR
    protected $hidden = ['title']; //ESCONDER CAMPO, PARA MOSTRAR USAR ->makeVisible('title')->toJson() ou ->makeHidden('description')->toJson() para esconder lugar especifico

    public function getResumeTitleAttribute($value){
        if (isset($this->attributes['title'][3])){
            return mb_substr($this->attributes['title'], 0, 3) . '...';
        }

        return $this->attributes['title'];
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = strtoupper($value);
    }
}
