<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class MenuOption extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permission(){

        return $this->belongsTo(Permission::class);

    }

    public function padre(){

		return $this->belongsTo(MenuOption::class, 'menu_option_id')->withDefault([NULL]);
		
	}

	public function hijos(){

		return $this->hasMany(MenuOption::class, 'menu_option_id');

	}

    public function menu_option(){

        return $this->belongsTo(MenuOption::class, 'menu_option_id');

    }


    public function nivel(){

        $cadena = '';

        for($i=0; $i<$this->level; $i++){
            $cadena .= '-';
        }

        return $cadena;

    }
}
