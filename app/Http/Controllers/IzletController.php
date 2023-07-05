<?php

namespace App\Http\Controllers;


use App\Http\Resources\IzletResurs as Resurs;
use App\Models\Izlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IzletController extends AbstractController
{
    public function index()
    {
        $podaci = Izlet::all();
        return $this->success(Resurs::collection($podaci), 'Vraceni svi podaci o izletima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivIzleta' => 'required',
            'cena' => 'required',
            'opis' => 'required',
            'drzavaId' => 'required',
            'tipId' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat = Izlet::create($input);

        return $this->success(new Resurs($objekat), 'Novi izlet je napravljen.');
    }


    public function show($id)
    {
        $objekat = Izlet::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }
        return $this->success(new Resurs($objekat), 'Objekat sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $objekat = Izlet::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivIzleta' => 'required',
            'cena' => 'required',
            'opis' => 'required',
            'drzavaId' => 'required',
            'tipId' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat->nazivIzleta = $input['nazivIzleta'];
        $objekat->cena = $input['cena'];
        $objekat->opis = $input['opis'];
        $objekat->drzavaId = $input['drzavaId'];
        $objekat->tipId = $input['tipId'];
        $objekat->save();

        return $this->success(new Resurs($objekat), 'Objekat je azuriran.');
    }

    public function destroy($id)
    {
        $objekat = Izlet::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $objekat->delete();
        return $this->success([], 'Objekat je obrisan.');
    }
}
