<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }


    public function permissions($idProfile)
    {
        // $profile = $this->profile->with('permissions')->find($idProfile);
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permissions',
            compact('permissions', 'profile'));
    }

    public function permissionAvailable($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        // $permissions = $this->permission->paginate();
        $permissions = $profile->permissionAvailable();

        return view('admin.pages.profiles.permissions.available',
            compact('permissions', 'profile'));

    }

    public function attachPermissionProfile(Request $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if (!$profile) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()->with('info', 'precisa escolher pelo menos uma permissão');
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions', $profile->id);

    }
}
