<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Foto;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('animais.index', 
                ['animais' => Animal::latest()->where('user_id', '!=', auth()->id())->with('foto')->get()]
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
        return view('animais.show', [ 'animal' => $animal ]);
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
}
