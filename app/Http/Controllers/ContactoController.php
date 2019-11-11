<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::all();
        return view('contacto.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:25',
            'telefono' => 'required|max:9',
            'direccion' => 'required|max:50'
        ]);

        if ($validator->fails()) {
            return redirect('/nuevo')
                ->withErrors($validator)
                ->withInput();
        }

        $nuevoContacto = new Contacto;

        $nuevoContacto->nombre = $request->input('nombre');
        $nuevoContacto->telefono = $request->input('telefono');
        $nuevoContacto->direccion = $request->input('direccion');

        if($nuevoContacto->save()) {
            return redirect()->route('contacto.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $nombre_contacto = $request->input('nombre-contacto');
        $contactos = Contacto::where('nombre', 'like', "%$nombre_contacto%")->get();

        if(count($contactos) == 0) {
            return view('contacto.show')->with(['mensaje' => 'No se encontró un contacto con ese nombre.']);
        }

        return view('contacto.show', compact('contactos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::find($id);

        if($contacto == null) {
            return route('contacto.index');
        }

        return view('contacto.edit',compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contacto = Contacto::find($id);

        $contacto->nombre = $request->input('nombre');
        $contacto->telefono = $request->input('telefono');
        $contacto->direccion = $request->input('direccion');

        if($contacto->update()) {
            return redirect()->route('contacto.index');
        }

        return redirect()->route('contacto.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto = Contacto::find($id);

        $contacto->delete();

        return back();
    }
}
