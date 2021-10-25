<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Books;
use Illuminate\Database\Eloquent\Collection;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'judul_buku' => $this->judul_buku,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'lower' => $this->lower,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
