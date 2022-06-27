<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Foto;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Models\Adocao;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animais = Animal::latest()->where('user_id', '!=', auth()->id())
                                    ->where('status', 'adoção')
                                    ->filtrarTipo(request('tipo'))
                                    ->filtrarEndereco(request('filtro'))
                                    ->with('foto')
                                    ->get();

        return view('animais.index', 
                ['animais' => $animais]
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnimalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnimalRequest $request)
    {
        $animal = $request->validated();

        $foto = [];

        if($request->hasFile('foto')) {
            $foto['url'] = $request->file('foto')->store('fotos', 'public');
        }

        $animal['user_id'] = auth()->id();
        $animal['status'] = 'adoção';

        $savedAnimal = Animal::create($animal);
        
        if($foto) {
            $foto['animal_id'] = $savedAnimal->id;
            Foto::create($foto);
        }

        return redirect('/animais');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        $adocoes = [];

        if (auth()->id() == $animal->user->id) {
            $adocoes = Adocao::where('animal_id', $animal->id)->with('user')->get();
        }

        return view('animais.show', [ 'animal' => $animal, 'adocoes' => $adocoes ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        if($animal->user_id != auth()->id()) {
            abort(403);
        }

        return view('animais.edit', [ 'animal' => $animal ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnimalRequest  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnimalRequest $request, Animal $animal)
    {
        $animalParaAtualizar = $request->validated();

        $animalParaAtualizar['user_id'] = auth()->id();

        $foto = [];

        if($request->hasFile('foto')) {
            $foto['url'] = $request->file('foto')->store('fotos', 'public');
        }

        $animal->update($animalParaAtualizar);

        if($foto) {
            $foto['animal_id'] = $animal->id;
            Foto::create($foto);
        }

        return redirect('/animais');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        if($animal->user_id != auth()->id()) {
            abort(403);
        }
        
        $animal->delete();
        return redirect('/');
    }

    public function animaisCadastrados() {
        $animais = Animal::latest()->where('user_id', auth()->id())->get();

        return view('animais.cadastrados', 
                ['animais' => $animais]
            );
    }
}
