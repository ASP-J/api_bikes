<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table ='clients';
    protected $primaryKey ='id';
    protected $fillable =['name','age','document','email'];

    public function bikes()
    {
        return $this->belongsToMany(Bike::class, 'id', 'client_id');
    }
}
