<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        
        return Validator::make($data, 
        [
            'nome' => ['required', 'string', 'max:80'],
            'sobrenome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'unique:users', 'cpf'],
            'celular' => ['required', 'string'],
            'endereco' => ['required', 'string', 'max:80'],
            'numero' => ['required', 'integer', 'max:999999'],
            'bairro' => ['required', 'string', 'max:40'],
            'cidade' => ['required', 'string', 'max:30'],
            'estado' => ['required', 'string', 'max:2'],
            'complemento' => ['max:255'],
            'email' => ['required', 'string', 'email', 'max:60', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], 
        [
            'required' => 'O campo :attribute ?? obrigat??rio',
            'string' => 'O campo :attribute ?? inv??lido',
            'nome.max' => 'O nome deve conter no m??ximo 80 caracteres',
            'sobrenome.max' => 'O sobrenome deve conter no m??ximo 255 caracteres',
            'endereco.max' => 'O endereco deve conter no m??ximo 80 caracteres',
            'numero.max' => 'O numero deve conter no m??ximo 8 caracteres',
            'bairro.max' => 'O bairro deve conter no m??ximo 40 caracteres',
            'cidade.max' => 'A cidade deve conter no m??ximo 30 caracteres',
            'complemento.max' => 'O complemento deve conter no m??ximo 255 caracteres',
            'email.max' => 'O email deve conter no m??ximo 60 caracteres',
            'unique' => 'O :attribute j?? existe no banco de dados',
            'email' => 'Por favor digite um email v??lido',
            'password.confirmed' => 'As senhas digitadas n??o correspondem',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        return User::create([
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'cpf' => $data['cpf'],
            'celular' => $data['celular'],
            'telefone' => $data['telefone'],
            'endereco' => $data['endereco'],
            'numero' => $data['numero'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
            'complemento' => $data['complemento'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
