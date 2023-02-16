<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


    /* GET PERMISSION */

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}
