<?php

namespace App\Http\Requests;

use App\Models\Adocao;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdocaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $adocao = $this->route('adocao');
        
        return auth()->user()->id == $adocao->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'animal_id' => ['required', 'integer'],
            'status' => ['required', 'string', 'in:em andamento,cancelada,concluida']
        ];
    }
}
