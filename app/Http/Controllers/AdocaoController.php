<?php

namespace App\Http\Controllers;

use App\Models\Adocao;
use App\Http\Requests\StoreAdocaoRequest;
use App\Http\Requests\UpdateAdocaoRequest;
use App\Models\Animal;

class AdocaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adocoes = Adocao::where('user_id', auth()->id())->latest()->get();

        return view('adocoes.index',
            [
                'adocoes' => $adocoes
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdocaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdocaoRequest $request)
    {
        $adocao = $request->validated();

        $adocao['user_id'] = auth()->id();
        $adocao['status'] = 'em andamento';

        Adocao::create($adocao);

        return redirect('/adocoes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdocaoRequest  $request
     * @param  \App\Models\Adocao  $adocao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdocaoRequest $request, Adocao $adocao)
    {
        $adocaoParaAtualizar = $request->validated();

        if ($adocaoParaAtualizar['status'] == 'concluida') {
            $animal = Animal::where('id', $adocao->animal_id)->first();
            $animal->status = 'adotado';

            $animal->update();
        }
        
        $adocaoParaAtualizar['finalizada_em'] = date('Y-m-d H:i:s');

        $adocao->update($adocaoParaAtualizar);

        return redirect('/adocoes');
    }
}
