<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Session;
use DB;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->permission_type == 'basic') {

            $this->validate($request, [
                'display_name'=>'required|max:255',
                'name'=>'required|alphadash|unique:permissions,name',
                'description'=>'sometimes|max:255'
            ]);

            $permission = new Permission();
            $permission->display_name = $request->display_name; 
            $permission->name = $request->name; 
            $permission->description = $request->description; 
            $permission->save();

            Session::flash('success', 'Permission has been successfully added');
            return redirect()->route('permissions.index');

        } elseif ($request->permission_type == 'crud') {
            
            $this->validate($request, [
                'resource'=> 'required|alpha|min:3|max:100',
            ]);

            $crud = explode(',', $request->crud_selected);
            if (count($crud) >0) {
                //prepare data to save
                foreach ($crud as $x) {
                   $display_name = ucwords($x ." ". $request->resource);
                   $name = strtolower($x) . '-' . $request->resource;
                   $description = 'Allow a user to ' . strtoupper($x) . ' ' . ucwords($request->resource);

                   $permission = new Permission();
                   $permission->name = $name;
                   $permission->display_name = $display_name;
                   $permission->description = $description;
                   $permission->save();
                }

                Session::flash('success', 'Permssion were all successfull added');
                return redirect()->route('permissions.index');
            }

        } else {
            return redirect()->route('permissions.create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.show')->withPermission($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.edit')->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'display_name' => 'required|max:255',
            'description' => 'sometimes|max:255'
        ]);

        $permission = Permission::findOrFail($id);
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        Session::flash('success', 'Update the '.$permission->display_name.' update');
        redirect()->route('permission.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
