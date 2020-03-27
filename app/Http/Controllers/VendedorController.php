<?php

namespace App\Http\Controllers;

use App\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = DB::select('SELECT * from clientes');
        return view('vendedor.index',['clientes'=> $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $cliente = DB::insert('INSERT INTO clientes (fnombre, lnombre, documento, correo, direccion) VALUES (?, ?, ?, ?, ?)', [$request['fnombre'], $request['lnombre'],$request['documento'],$request['correo'],$request['direccion']]);
        return redirect()->route('vendedor.index')
        ->with('success','Cliente Registado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show($clienteId)
    {
        $cliente = DB::select('SELECT * FROM clientes WHERE id = ?', [$clienteId]);
        return view('vendedor.update',['clientes'=> $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clienteId)
    {
        $update = DB::update('UPDATE clientes set fnombre = ?,
                                                lnombre = ?,
                                                direccion = ?,
                                                correo = ?
                                where id = ?', [$request['fnombre'],$request['lnombre'],$request['direccion'],$request['correo'],$clienteId]); 
        return redirect()->route('vendedor.index')
        ->with('success','cliente Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendedor)
    {
        $delete = DB::delete('DELETE FROM clientes WHERE id = ?', [$vendedor]);
        return redirect()->route('vendedor.index')
        ->with('success','cliente Eliminado con exito');
    }
}
