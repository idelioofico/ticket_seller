<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->role->isSuper()){

            $perfil=Role::with("permission")->get();

        }else if(auth()->user()->role->isAdmin()) {

            $perfil=Role::where("name","!=","super")->with("permission")->get();
        
        }else{

            $perfil=Role::whereNotIn("name",["super","admin"])->with("permission")->get();
        }

        return view("role.index",compact('perfil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfil=new Role();
        return view('role.create',compact("perfil"));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(($perfil=Role::create(["name"=>$request->nome]))){
            
            foreach($request->permissao as $permissao){

                $role=Permission::find($permissao);
    
                $perfil->permissao()->attach($role);
    
            }

            return redirect()->back()->with('success',"Perfil registado com sucesso.");
        }
    
       
        // if(($perfil= Perfil::create(['nome'=>$request->nome,'permissao'=> implode(',',$request->permissao)]))){

        //     return redirect()->back()->with('success',"Perfil registado com sucesso.");

        // }else{

        //     return redirec()->back()->with("error","Opss,ocorreu um erro ao tentar registar perfil.");
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Role $perfil)
    {
       
        return view('role.show',compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $perfil)
    {
       $perfil->permissao()->sync($request->permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $perfil)
    {
        //
    }
}
