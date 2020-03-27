<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = DB::select('SELECT * from usuarios');
        return view('users.create',['usuarios'=> $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $insert = DB::insert('INSERT into usuarios (nombre,apellido,sexo,direcccion,nick,password,id_rol) 
        values (?, ?, ?, ?, ?, ?, ?)', [$request['nombre'],$request['apellido'],$request['sexo'],$request['direccion'],
        $request['nick'],$request['contra'],'2']);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = DB::select('SELECT * from usuarios where id = ?',[$id]);
        return view('users.update',['users'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usuarios)
    {
        $update = DB::update('UPDATE usuarios SET nombre= ?,
        apellido = ?,
        sexo = ?,
        direcccion = ?,
        nick = ?,
        password= ? where id = ?', [$request['nombre'],$request['apellido'],$request['sexo'],$request['direccion'],$request['nick'],$request['contra'],$usuarios]);
        
        return redirect()->route('users.index')
        ->with('success','Product Deleted Successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::delete('DELETE FROM usuarios where id = ?', [$id]);
        return redirect()->route('users.index')
        ->with('success','Product Deleted Successfully');
    }
}
