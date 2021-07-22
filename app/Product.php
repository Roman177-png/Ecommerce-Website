<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
/*    public function getCategory()
    {
        return  Category ::find($this->category_id);
    }*/
    protected $fillable = [
        'category_id', 'name', 'code','image'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount()
    {
        if(!is_null($this->pivot))
        {
            return $this->pivot->count * $this->price;
        }
        dd($this->price);
        return $this->price;
    }

}
