<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class categoria extends Model {

	//

	public function setImagenAtribute($imagen){
		$this->attributes['imagen'] = Carbon::now()->second.$imagen->getClientOriginalName();
		$name =  Carbon::now()->second.$imagen->getClientOriginalName();
		\Storage::disk('local')-put($name, \File::get($imagen));
	}

}
