<?php

namespace App\Http\Controllers;

use App\Models\Adocao;
use App\Http\Requests\StoreAdocaoRequest;
use App\Http\Requests\UpdateAdocaoRequest;

class AdocaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adocoes.index',
            ['adocoes' => Adocao::latest()->paginate(10)]
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

        $adocao->update($adocaoParaAtualizar);

        return redirect('/adocoes');
    }
}
