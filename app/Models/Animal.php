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
