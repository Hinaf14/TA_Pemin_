<?php
namespace App\Models;
use App\Models\Mahasiswa;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Matakuliah extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
'nama' //
];
/**
* The attributes excluded from the model's JSON form.
*
* @var array
*/
protected $hidden = [];
public function matakuliah(){
    return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_matakuliah', 'mhsId', 'mkId');    
}
}