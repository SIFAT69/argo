<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;

class RolesController extends Controller
{
    public function index()
    {
      $roles = DB::table('roles')->get();
      return view('Agent.User.roles', compact('roles'));
    }

    public function createRoles($value='')
    {
      return view('Agent.User.rolecreate');
    }

    public function createRolesPost(Request $request)
    {
      DB::table('roles')->insert([
        'rolesname' => $request->rolesname,
        'dashboard' => $request->dashboard,
        'contacts' => $request->contacts,
        'message' => $request->message,
        'properties' => $request->properties,
        'projects' => $request->projects,
        'features' => $request->features,
        'facilities' => $request->facilities,
        'categories' => $request->categories,
        'landlord' => $request->landlord,
        'tenant_list' => $request->tenant_list,
        'service_request' => $request->service_request,
        'contracts' => $request->contracts,
        'created_at' => Carbon::now(),
      ]);

      return back()->with('success', 'Role has been created. Now you can select users and assign to the roles.');
    }

    public function rolesEdit(Request $request)
    {
      $role = DB::table('roles')->where('id', $request->id)->first();
      return view('Agent.User.rolesedit', compact('role'));
    }

    public function rolesUpdate(Request $request)
    {
      DB::table('roles')->where('id', $request->id)->update([
        'rolesname' => $request->rolesname,
        'dashboard' => $request->dashboard,
        'contacts' => $request->contacts,
        'message' => $request->message,
        'properties' => $request->properties,
        'projects' => $request->projects,
        'features' => $request->features,
        'facilities' => $request->facilities,
        'categories' => $request->categories,
        'landlord' => $request->landlord,
        'tenant_list' => $request->tenant_list,
        'service_request' => $request->service_request,
        'contracts' => $request->contracts,
        'updated_at' => Carbon::now(),
      ]);

      return back()->with('success', 'Role has been updated.');
    }

    public function rolesDelete(Request $request)
    {
      return back()->with('danger', 'Your roles has been deleted. And also this roles removed from all the users.');
    }
}
