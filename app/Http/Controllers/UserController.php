<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $perfilSuper;
    protected  $perfilAdmin;

    public function __construct()
    {

        $this->middleware("auth");

        $this->perfilSuper = Role::where("name", "super")->first();
        $this->perfilAdmin = Role::where("name", "admin")->first();
    }

    public function index()
    {

        if (auth()->user()->role->isSuper()) {

            $utilizadores = User::all();
        } else if (auth()->user()->role->isAdmin()) {

            $utilizadores = User::company_id()->where("role_id", "!=", $this->perfilSuper->id)->get();
        } else {

            $utilizadores = User::company_id()->whereNotIn("role_id", [$this->perfilSuper->id, $this->perfilAdmin->id])->get();
        }

        return view('utilizador.index', compact('utilizadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $user = new User();
        $company = [];


        if (auth()->user()->role->isSuper()) {

            $role = Role::all();
            $company = Company::all();

        } else if (auth()->user()->role->isAdmin()) {

            $role = Role::where("id", "!=", $this->perfilSuper->id)->get();
        } else {
            $role = Role::whereNotIn("name", ["super", "admin"])->get();
        }

        return view('utilizador.create', compact('user', 'role', 'company'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // dd($request->all());
        if ($user = User::create([

            'name' => $request->name,
            // 'utilizador' => $request->utilizador,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'company_id' => $request->company_id

        ])) {

            return redirect()->back()->with('success', "Utilizador registado com sucesso.");
        } else {

            return redirect()->back()->with('error', "Ops, ocorreu um erro ao tentar registar utilizador.");
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $utilizador
     * @return \Illuminate\Http\Response
     */
    public function show($utilizador)
    {

        $company = [];
        $user=auth()->user();

        if ($user->company_id != User::find($utilizador)->company_id && !$user->role->isSuper())
        return;
        
        if (auth()->user()->role->isSuper()) {
            // dd("here");
            $user = User::findOrfail($utilizador);
            $role = Role::with("permission")->get();
            $company = Company::all();

        } else if (auth()->user()->role->isAdmin()) {

            $user = User::company_id()->where("id", $utilizador)->first();

            $role = Role::where("name", "!=", "super")->with("permission")->get();
        } else {
            $user = User::company_id()->where("id", $utilizador)->first();
            $role = Role::whereNotIn("name", ["super", "admin"])->with("permission")->get();
        }

        return view("utilizador.show", compact("user", "role", "company"));
    }


    public function actualizarDados(Request $request, User $utilizador)
    {

        if ($utilizador->update($request->all())) {
            return redirect()->back()->with("success", "Dados actualizados com sucesso!");
        }
    }

    public function actualizarPassword(Request $request, User $utilizador)
    {
        $dados = ['password' => Hash::make($request->new_password)];

        if ($utilizador->update($dados)) {
            return redirect()->back()->with("success", "Password actualizados com sucesso!");
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("utilizador.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
