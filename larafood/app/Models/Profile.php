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

    public function permissionAvailable($filter = null)
    {
// SELECT * FROM `permissions` WHERE id NOT IN (
// SELECT permission_id FROM `permission_profile` WHERE profile_id = 1);
        $permissions = Permission::whereNotIn('permissions.id', function ($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
            // })->toSql();
        })->where(function ($queryFilter) use ($filter) {
            if ($filter) {
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");

            }
        })
            ->paginate();
        // dd($permissions);
// "select * from `permissions` where `id` not in (
//  select `permission_profile`.`permission_id` from `permission_profile` where permission_profile.profile_id=1)"
        return $permissions;
    }

}
