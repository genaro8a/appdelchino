<?php

namespace Remolque;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{    
    protected $fillable = ['total','id_cliente'];

    public function cliente()
    {
    		return $this->belongsTo('Remolque\Cliente');
    }
    public function item()
    {
    	return $this->belongsToMany('Remolque\Item');
    }
     
}
