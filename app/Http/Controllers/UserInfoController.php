<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Auth;

class UserInfoController extends Controller
{
    /**
     * Método que roda ao criar a instancia do controlador que é utilizado pelo Laravel.
     * Em outras palavras, esse método pode ser utilizado para configurar o controlador
     * de forma inicial.
     */
    public function __construct(){
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Como não possui index, mando carregar a view create
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $logged = Auth::user();
            // procuro e vejo se existe a informção do usuário logado
            $userInfo = UserInfo::find($logged->id);
            if(isset($userInfo))
                return view("UserInfo/show")->with("userInfo", $userInfo);
            else
                return view("UserInfo/create");
        } catch (\Throwable $th) {
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            // lembrar de dar o use Auth; (lá em cima)
            $logged = Auth::user();
            // lembrar de dar o use App\Models\UserInfo; (lá em cima)
            $userInfo = new UserInfo();
            $userInfo->Users_id = $logged->id;
            // dados dentro do model = dados vindos da view
            $userInfo->profileImg = $request->profileImg;
            $userInfo->status = 'A';
            $userInfo->dataNasc = $request->dataNasc;
            $userInfo->genero = $request->genero;
            $userInfo->save();
            return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ["Informações cadastradas com sucesso", "success"]);
        } catch(\Throwable $th){
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
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
        try {
            $logged = Auth::user();
            // procuro e vejo se existe a informção do usuário logado
            $userInfo = UserInfo::find($logged->id);
            if(isset($userInfo))
                if($id == $logged->id)
                {
                    return view("UserInfo/show")->with("userInfo", $userInfo);
                }
                else
                {
                    return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ["Não é possível acessar informações de outros usuários", "warning"]);
                }
            else
                return view("UserInfo/create")->with("message", ["O usuário não possui informações adicionais cadastradas", "warning"]);
        } catch (\Throwable $th) {
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
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
        try {
            $logged = Auth::user();
            // procuro e vejo se existe a informção do usuário logado
            $userInfo = UserInfo::find($logged->id);
            if(isset($userInfo))
            {
                if($id == $logged->id)
                {
                    return view("UserInfo/edit")->with("userInfo", $userInfo);
                }
                else {
                    return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ["Não é possível acessar informações de outros usuários", "warning"]);
                }
            }
            else
            {
                return view("UserInfo/create")->with("message", ["O usuário não possui informações adicionais cadastradas", "warning"]);
            }
        } catch (\Throwable $th) {
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }
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
        $userInfo = new UserInfo();
        try {
            $logged = Auth::user();
            $userInfo = UserInfo::find($logged->id);
            if(isset($userInfo)) {
                if($id == $logged->id){
                    $userInfo->profileImg = $request->profileImg;
                    $userInfo->genero = $request->genero;
                    $userInfo->dataNasc = $request->dataNasc;
                    $userInfo->update();
                    return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ["Informações atualizadas com sucesso", "success"]);
                } else {
                    return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ["Não é possível acessar informações de outros usuários", "warning"]);
                }
            }
            else {
                return view("UserInfo/create")->with("message", ["O usuário não possui informações adicionais cadastradas", "warning"]);
            }
        } catch (\Throwable $th) {
            if($userInfo->Users_id == null)
                return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
            else
                return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // procuro e vejo se existe a informção do usuário logado
        $userInfo = UserInfo::find(1);
        if(isset($userInfo)){
            $userInfo->delete();
        }
        return view("UserInfo/create");
    }
}
