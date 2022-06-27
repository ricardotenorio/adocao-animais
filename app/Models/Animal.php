<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animais';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto()
    {
        return $this->hasOne(Foto::class);
    }

    public function adocoes()
    {
        return $this->hasMany(Adocao::class);
    }

    public function endereco()
    {
        $endereco['rua'] = $this->rua;
        $endereco['numero'] = $this->numero;
        $endereco['bairro'] = $this->bairro;
        $endereco['complemento'] = $this->complemento;

        $enderecoString = "";

        foreach ($endereco as $key => $value) {
            if (isset($value)) {
                $enderecoString .= $key . ": " . $value . " ";
            } else {
                $enderecoString .= $key . ": N/A ";
            }
        }
        
        return $enderecoString;
    }

    public function scopeFiltrarTipo($query, $tipo) {
        if($tipo) {
            $query->where('tipo', '=', $tipo);
        }        
    }

    public function scopeFiltrarEndereco($query, $endereco)
    {
        if($endereco) {
            $query->where('cidade', 'like', '%' . $endereco . '%')
                ->orWhere('estado', 'like', '%' . $endereco . '%');
        }
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'tipo',
        'descricao',
        'status',
        'raca',
        'idade',
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'estado',
        'user_id',
    ];
    
}
