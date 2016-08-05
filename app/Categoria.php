<?php

namespace Remolque;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
	use SoftDeletes;
	protected $table='categorias';
    protected $fillable = ['nombre_categoria'];
    protected $dates = ['deleted_at'];
    
    public function items(){
    	return $this->hasMany('Remolque\Item');
    }

}
