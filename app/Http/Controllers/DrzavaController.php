<?php

namespace App\Http\Controllers;


use App\Http\Resources\DrzavaIzletaResurs as Resurs;
use App\Models\DrzavaIzleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DrzavaController extends AbstractController
{
    public function index()
    {
        $podaci = DrzavaIzleta::all();
        return $this->success(Resurs::collection($podaci), 'Vraceni svi podaci o drzavama!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivDrzave' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat = DrzavaIzleta::create($input);

        return $this->success(new Resurs($objekat), 'Drzava je dodata.');
    }


    public function show($id)
    {
        $objekat = DrzavaIzleta::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }
        return $this->success(new Resurs($objekat), 'Objekat sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $objekat = DrzavaIzleta::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivDrzave' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $objekat->nazivDrzave = $input['nazivDrzave'];
        $objekat->save();

        return $this->success(new Resurs($objekat), 'Objekat je azuriran.');
    }

    public function destroy($id)
    {
        $objekat = DrzavaIzleta::find($id);
        if (is_null($objekat)) {
            return $this->error('Objekat sa zadatim id-em ne postoji.');
        }

        $objekat->delete();
        return $this->success([], 'Objekat je obrisan.');
    }
}
