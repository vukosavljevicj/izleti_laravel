<?php

namespace App\Http\Controllers;


use App\Http\Resources\TipoviIzletaResurs as Resurs;
use App\Models\TipIzleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipController extends AbstractController
{
    public function index()
    {
        $podaci = TipIzleta::all();
        return $this->success(Resurs::collection($podaci), 'Vraceni svi podaci o tipovima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'tip' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat = TipIzleta::create($input);

        return $this->success(new Resurs($objekat), 'Novi tip izleta je napravljen.');
    }


    public function show($id)
    {
        $objekat = TipIzleta::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }
        return $this->success(new Resurs($objekat), 'Objekat sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $objekat = TipIzleta::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'tip' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat->tip = $input['tip'];
        $objekat->save();

        return $this->success(new Resurs($objekat), 'Objekat je azuriran.');
    }

    public function destroy($id)
    {
        $objekat = TipIzleta::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $objekat->delete();
        return $this->success([], 'Objekat je obrisan.');
    }
}
