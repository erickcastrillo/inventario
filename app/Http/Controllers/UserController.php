<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserBasicInfoRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\RolesRequest;

use App\Role;

use App\User;
use Auth;
use App\Pais;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Administrador', ['except' => ['edit','show', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->id == $id || Auth::user()->hasRole('Superuser') || Auth::user()->hasRole('Administrador')) {
            return view('usuarios.ver', [
                'usuario' => User::find($id),
                'roles' =>  User::find($id)->roles()->get()
            ]);
        } else {
            return Redirect::back()->with('error', '¡SU perfil no tiene los permisos necesarios para ingresar a la página solicitada!');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id == $id || Auth::user()->hasRole('Superuser') || Auth::user()->hasRole('Administrador')) {
            return view('usuarios.editar', [
                'usuario' => User::find($id),
                'roles_usuario' => Auth::user()->roles()->get(),
                'roles_usuario_editar' =>  User::find($id)->roles()->get(),
                'paises' => Pais::where('estado' , '=', 1)->get()
            ]);
        } else {
            return Redirect::back()->with('error', '¡SU perfil no tiene los permisos necesarios para ingresar a la página solicitada!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

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

    public function update_password(PasswordChangeRequest $request) {
        $new_password = $request->input('password_change.password');
        $encrypted_password = bcrypt($new_password);

        $user = Auth::user();

        $user->password = $encrypted_password;

        try {
            $user->save();
            return response()->json([
                'estado' => '¡Exito!',
                'mensaje' => "Se han actualizado tu contraseña",
                'tipo' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'estado' => 'Error!',
                'mensaje' => "Sucedio algo inesperado tratando de guardar los cambios\n".$e->getMessage(),
                'tipo' => 'Error'
            ]);
        }
    }

    public function update_basic_info (UserBasicInfoRequest $request) {
        $name = $request->input('basic.name');
        $last_name = $request->input('basic.last_name');
        $user_name = $request->input('basic.user_name');
        $email = $request->input('basic.email');

        $user = Auth::user();

        $user->name = $name;
        $user->last_name = $last_name;
        $user->user_name = $user_name;
        $user->email = $email;

        try {
            $user->save();
            return response()->json([
                'estado' => '¡Exito!',
                'mensaje' => "Se han actualizado los datos del usuario seleccionado",
                'tipo' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'estado' => 'Error!',
                'mensaje' => "Sucedio algo inesperado tratando de guardar los cambios\n".$e->getMessage(),
                'tipo' => 'Error'
            ]);
        }
    }

    public function update_roles(RolesRequest $request) {
        try {
            $user_to_change = User::find($request->input('user_id'));
            $nuevos_roles = $request->input('roles_usuario_editar');

            $user_to_change->detachRoles($user_to_change->roles);

            foreach ($nuevos_roles as $rol_nuevo) {
                $rol = Role::where('name', $rol_nuevo)->get()->first();
                $user_to_change->attachRole($rol);
            }

            return response()->json([
                'estado' => '¡Exito!',
                'mensaje' => "Se han actualizado los roles del usuario seleccionado",
                'tipo' => 'success'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'estado' => 'Error!',
                'mensaje' => "Sucedio algo inesperado tratando de guardar los cambios\n".$e->getMessage(),
                'tipo' => 'Error'
            ]);
        }
    }

    public function update_country(Request $request) {
        try {

            $user_to_change = User::find($request->input('user_id'));
            $new_country = $request->input('pais');

            $user_to_change->country = $new_country;

            $user_to_change->save();

            return response()->json([
                'estado' => '¡Exito!',
                'mensaje' => "Se ha actualizado el pais del usuario seleccionado",
                'tipo' => 'success'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'estado' => 'Error!',
                'mensaje' => "Sucedio algo inesperado tratando de guardar los cambios\n".$e->getMessage(),
                'tipo' => 'Error'
            ]);
        }
    }
}
