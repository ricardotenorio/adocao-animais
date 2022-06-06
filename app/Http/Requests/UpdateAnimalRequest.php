<?php

namespace App\Http\Requests;

use App\Models\Animal;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $animal = Animal::find($this->route('animal'));
        
        return auth()->user()->id == $animal->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:255', 'in:gato,cachorro'],
            'descricao' => ['required', 'string', 'max:255'],
            'raca' => ['string', 'max:255'],
            'idade' => ['integer'],
            'rua' => ['string', 'max:255'],
            'numero' => ['string', 'max:255'],
            'bairro' => ['string', 'max:255'],
            'complemento' => ['string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:32'],
        ];
    }
}
