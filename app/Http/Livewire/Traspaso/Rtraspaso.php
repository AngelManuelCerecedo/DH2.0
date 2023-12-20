<?php

namespace App\Http\Livewire\Traspaso;

use App\Models\Almacen;
use App\Models\Almacen_Producto;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\Traspaso;
use Livewire\Component;

class Rtraspaso extends Component
{
    public $SO, $SD, $prod, $EmpO, $Cant, $Estatus = 'Registro', $EmpD, $Folio = 'TRP', $Obs;
    public $IdSuc, $FConse, $Productos, $search, $ListaAux, $idaux = 0;
    public $modalAP = false, $ListaFT;
    public function render()
    {
        $Sucursales = Sucursal::all();
        $Empleados = Empleado::all();
        if ($this->SO) {
            $FolioCon = Traspaso::Where('almacenO_id', '=', $this->SO)->orderBy('Aux', 'desc')->first();
            if ($FolioCon) {
                $Num = $FolioCon->Aux;
                $this->idaux = $Num + 1;
                $this->Folio = 'TRP0' . $this->SO . $this->idaux;
            } else {
                $this->idaux = 1;
                $this->Folio = 'TRP0' . $this->SO . $this->idaux;
            }
        }

        return view('livewire.Traspaso.Rtraspaso', ['Sucursales' => $Sucursales]);
    }
    public function registrar()
    {
        Traspaso::updateOrCreate([
            'Aux' => $this->idaux,
            'Folio' => $this->Folio,
            'almacenO_id' => $this->SO,
            'almacenD_id' => $this->SD,
            'Estatus' => $this->Estatus,
            'Obs' => $this->Obs,
            'empleadoO_id' => auth()->user()->empleado->id,
        ]);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Traspaso Registrado',
            'type' => 'success'
        ]);
        $this->redic();
    }
    public function redic()
    {
        if (auth()->user()->empleado->Rol == 'Mostrador') {
            $Cot = Traspaso::Where('Folio', '=', $this->Folio)->first();
            return redirect()->route('PETraspaso', [$Cot->id]) ;
        } else {
            $Cot = Traspaso::Where('Folio', '=', $this->Folio)->first();
            return redirect()->route('PETraspaso', [$Cot->id]) ;
        }
    }
}
