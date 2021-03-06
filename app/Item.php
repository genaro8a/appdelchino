<?php

namespace Remolque;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Storage;
use File;
use DB;

class Item extends Model
{
	protected $fillable = ['descripcion', 'precio','categoria_id','path','nombre_item'];
    protected $table="items";//
    public function categoria(){
    	return $this->belongsTo('Remolque\Categoria');
    }
    public function factura()
    {
    	return $this->belongsToMany('Remolque\Factura');
    }
    public function pedido()
    {
        return $this->belongsToMany('Remolque\Pedido');
    }
    public function setPathAttribute($path){
        if(!empty($path)){
            $items = DB::table('items')->count();
            if ($items!=0) {
                $last=Item::all() -> last()->id + 1;
                $name ='item_' . $last . '.' . $path->getClientOriginalExtension();
            }else{
                $name ='item_' . 1 . '.'.$path->getClientOriginalExtension();
            }
            $this->attributes['path'] = $name;
            Storage::disk('local')->put($name, File::get($path));
        }
    }
        static function Items()
        {
            return DB::table('items')
            ->join('categorias','categorias.id','=','items.categoria_id')
            ->select('items.*','categorias.nombre_categoria')->get();
        }
}
