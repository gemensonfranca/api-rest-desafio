<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turma;


class TurmaController extends Controller
{
    private $turma;

    public function __construct(Turma $turma)
    {
        $this->turma = $turma;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->turma->orderBy('nome', 'asc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->turma->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma)
    {
        return $turma->with('alunos')->orderBy('nome', 'asc')->first();
        // return $turma;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turma $turma)
    {
        $turma->update($request->all());

        return $turma;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma)
    {
        $turma->delete();

        return $this->turma->orderBy('nome', 'asc')->paginate(10);
    }
}
