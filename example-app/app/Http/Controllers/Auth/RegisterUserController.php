<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RegisterUserController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $roles = Role::pluck('name');
        
        return view('auth.register-user', compact('roles'));
    }

    protected function validator(array $data)
    {
        $roles = Role::pluck('name');

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:' . $roles->implode(',')],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::where('name', $data['role'])->first();
        $user->assignRole($role);

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        // No realizar ninguna acción de inicio de sesión automático
    }

    public function registerUser(Request $request)
    {
        // Validar que el usuario autenticado tenga los permisos adecuados
        if (!$request->user()->can('register-user')) {
            abort(403); // Mostrar error de acceso no autorizado
        }

        // Validar los datos del formulario de registro
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,user'], // Aquí define los roles permitidos
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Asignar el rol al nuevo usuario
        $role = Role::where('name', $data['role'])->first();
        $user->assignRole($role);

        return redirect()->route('home')->with('success', 'User registered successfully.');
    }
}
