<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $table = 'setores';

    protected $fillable = ['cod_setor', 'departamento', 'nome', 'ativo'];

    public function departamento()
    {
        return $this->hasOne(Departamento::class, 'cod_departamento', 'departamento');
    }
}
