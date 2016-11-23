<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\categoria;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\Storage;
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

	public function viewSubCategoria()
	{
		return view('admin.categoria.crud_sub_categoria');
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
	public function store(Request $request)
	{
		$estado = 0;
		$mensaje = "";

		$categoria = new categoria();

		$categoria->nombre = $request->input('nombre');
		$categoria->categoria_id = $request->input('categoria_id');
		$categoria->imagen = $request->input('imagen');

		$lcategoria = DB::table('categorias')
							->where('categoria_id', '=', $categoria->categoria_id)
							->where('nombre', '=', $categoria->nombre)->get();


		if(count($lcategoria)>0){
			$estado = 1;
			$mensaje = "La categoría ya existe.";
        }else{
			$estado = 0;
			$mensaje = "Se guardo correctamente la Categoría.";

			$fileImagen = $request->file('imagen');
			$nombreImagen = Carbon::now()->second.$fileImagen->getClientOriginalName();
       		\Storage::disk('local')->put($nombreImagen,  \File::get($fileImagen));
       		$categoria->imagen = $nombreImagen;


			$categoria->save();
        }

		$res = $array = [
	    "estado" => $estado,
	    "mensaje" => $mensaje
		];


		return $res;
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
		$categoria = DB::table('categorias')
			->where('categoria_id', '=', 1)
			->where('id', '<>', 1)->get();

		return $categoria;
	}

	public function showSubCategoria($id)
	{
		$categoria = DB::table('categorias')->where('categoria_id', '=', $id)->get();

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
	public function update(Request $request, $id)
	{


		
		$estado = 0;
		$mensaje = "";
		$lcategoria = DB::table('categorias')
							->where('categoria_id', '=', $request->input('categoria_id'))
							->where('nombre', '=', $request->input('nombre'))
							->where('id', '<>',$id)
							->get();


		if(count($lcategoria)>0){
			$estado = 1;
			$mensaje = "La categoría ya existe.";
        }else{
			$estado = 0;
			$mensaje = "Se actualizo correctamente la Categoría.";

			$categoria = categoria::find($id);
			$categoria->nombre = $request->input('nombre');

			$categoria->save();
        }

		$res = $array = [
	    "estado" => $estado,
	    "mensaje" => $mensaje
		];

		return $res;
	}

	public function updateImagen(Request $request){

		$categoria = categoria::find($request->input('categoriaid'));
		$estado = 0;
		$mensaje = "";

		if(empty($categoria)){

			$estado = 0;
			$mensaje = "La imagen se encuentra vacia.";				

		}else{

			$estado = 0;
			$mensaje = "Se actualizo correcamente la imagen.";			

			\Storage::Delete($categoria->imagen);
			$fileImagen = $request->file('imagen');
			$nombreImagen = Carbon::now()->second.$fileImagen->getClientOriginalName();
	       	\Storage::disk('local')->put($nombreImagen,  \File::get($fileImagen));
	       	$categoria->imagen = $nombreImagen;	
	       	$categoria->save();	
		}

		$res = $array = [
	    "estado" => $estado,
	    "mensaje" => $mensaje
		];  

		return $res;   
	}	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$estado = 0;
		$mensaje = "";
		


		$lcategoria =DB::select('select * from empresas e join categorias c on e.categoria_id = c.id and c.id = :id', ['id' => $id]);
		$lsubcategoria =DB::select('select * from categorias c join categorias sc on c.id =sc.categoria_id where c.id = :id', ['id' => $id]);

		if(count($lcategoria)>0){
			$estado = 1;
			$mensaje = "La categoría ya es usada en empresas.";
		}elseif (count($lsubcategoria)>0) {
			$estado = 1;
			$mensaje = "La categoría cuenta con sub categorias.";
        }else{

        	$categoria = categoria::find($id);
        	\Storage::Delete($categoria->imagen);
			$estado = 0;
			$mensaje = "Se elimino correctamente la Categoría.";
			$categoria->delete();
        }

		$res = $array = [
	    "estado" => $estado,
	    "mensaje" => $mensaje,
	    "Lista" =>$lcategoria
		];

		return $res;		
	}

}
