<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;
    protected $fillable=['id','Nombre','sucursal_id'];
    public function almacen_p(){
        return $this->hasMany("App\Models\Almacen_Producto");
    }
    public function sucursal(){
        return $this->belongsTo("App\Models\Sucursal");
    }
    public function traspaso(){
        return $this->hasMany("App\Models\Traspaso");
    }
    public function cotizacion(){
        return $this->hasMany("App\Models\Cotizacion");
    }
    public function compra(){
        return $this->hasMany("App\Models\Compra");
    }
}
