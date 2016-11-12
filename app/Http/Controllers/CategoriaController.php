<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\categoria;
use DB;

class CategoriaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.categoria.crudcategoria');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$categoria = new categoria();

		$categoria->nombre = $request->input('nombre');
		$categoria->url = $request->input('url');
		$categoria->categoria_id = $request->input('categoria_id');

		$categoria->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categoria = categoria::find($id);

		return $categoria;
	}
	public function showPrincipal()
	{
		$categoria = DB::table('categorias')->where('catagoria_id', '=', 1)->get();

		return $categoria;
	}

	public function showSubCategoria($id)
	{
		$categoria = DB::table('categorias')->where('catagoria_id', '=', $id)->get();

		return $categoria;
	}
	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$categoria = categoria::find($id);
				$categoria->nombre = $request->input('nombre');
		$categoria->url = $request->input('url');

		$categoria->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria = categoria::find($id);
		$categoria->delete();
	}

}
