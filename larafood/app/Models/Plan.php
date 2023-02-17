<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'price', 'description'];


    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(3);
        return $results;
    }

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    /*public function profilesAvailable($filter = null)
    {
// SELECT * FROM `permissions` WHERE id NOT IN (
// SELECT permission_id FROM `permission_profile` WHERE profile_id = 1);
        $profiles = Profile::whereNotIn('profiles.id', function ($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
            // })->toSql();
        })->where(function ($queryFilter) use ($filter) {
            if ($filter) {
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");

            }
        })
            ->paginate();
        // dd($permissions);
// "select * from `permissions` where `id` not in (
//  select `permission_profile`.`permission_id` from `permission_profile` where permission_profile.profile_id=1)"
        return $profiles;
    }*/
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter)
                    $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $profiles;
    }

}
