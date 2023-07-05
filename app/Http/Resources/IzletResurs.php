<?php

namespace App\Http\Resources;

use App\Models\DrzavaIzleta;
use App\Models\TipIzleta;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IzletResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $tip = TipIzleta::find($this->tipId);
        $drzava = DrzavaIzleta::find($this->drzavaId);

        return [
            'id' => $this->id,
            'naziv' => $this->nazivIzleta,
            'cena' => $this->cena,
            'opis' => $this->opis,
            'tip' => new TipoviIzletaResurs($tip),
            'drzava' => new DrzavaIzletaResurs($drzava)
        ];
    }
}
