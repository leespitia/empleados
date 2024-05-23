<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// Permisos
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'default_role',
        'tipo_documento_id',
        'documento',
        'documento_ubicacion_id',
        'cargo_id',
        'departamento_id',
        'name1',
        'name2',
        'lastname1',
        'lastname2',
        'email',
        'password',
        'telefono',
        'direccion',
        'direccion_ubicacion_id',
        'activo',
        'fecha_nacimiento',
        'genero',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol(){

        return $this->belongsTo(Role::class, 'default_role');
        
    }

    public function isAdmin(){

        return $this->rol->name == 'Superadministrador';

    }

    public function tipo_documento(){

        return $this->belongsTo(TipoDocumento::class);

    }

    public function documento_ubicacion(){

        return $this->belongsTo(Ubicacion::class, 'documento_ubicacion_id');

    }

    public function direccion_ubicacion(){

        return $this->belongsTo(Ubicacion::class, 'direccion_ubicacion_id');

    }

    public function adminlte_profile_url(){

        // return 'profile/username';
        return 'profile';

    }

    public function adminlte_desc(){

        return $this->rol->name;

    }

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }


    public function nombre(){

        $nombre = $this->name1;
        if(!empty($this->name2)){
            $nombre .= ' '.$this->name2;
        }
        $nombre .= ' '.$this->lastname1;
        if(!empty($this->lastname2)){
            $nombre .= ' '.$this->lastname2;
        }
        
        return $nombre;

    }

    public function apellido(){

        $nombre = $this->lastname1;
        if(!empty($this->lastname2)){
            $nombre .= ' '.$this->lastname2;
        }
        $nombre .= ' '.$this->name1;
        if(!empty($this->name2)){
            $nombre .= ' '.$this->name2;
        }
        
        return $nombre;

    }
}
