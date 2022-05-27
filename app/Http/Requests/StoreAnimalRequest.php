<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
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
            'tipo' => ['required', 'string', 'max:255', 'in:gato, cachorro'],
            'descricao' => ['required', 'string', 'max:255'],
            'raca' => ['string', 'max:255'],
            'idade' => ['integer'],
            'rua' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'complemento' => ['string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:32'],
        ];
    }
}
