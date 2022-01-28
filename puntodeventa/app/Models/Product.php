<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Provider;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
		'code',	'name',	'stock',	'image',	'sell_price',	'status',	'category_id',	'provider_id',
    ];

    //un producto pertenece a una categoria
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    //un producto pertenece a un provedor
    public function provider(){
    	return $this->belongsTo(Provider::class);
    }

}
