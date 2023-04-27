<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // procuro e vejo se existe a informção do usuário logado
        $userInfo = UserInfo::find(1);
        if(isset($userInfo))
            return view("UserInfo/show")->with("userInfo", $userInfo);
        else
            return view("UserInfo/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // lembrar de dar o use App\Models\UserInfo; (lá em cima)
        $userInfo = new UserInfo();
        $userInfo->Users_id = 1;
        // dados dentro do model = dados vindos da view
        $userInfo->profileImg = $request->profileImg;
        $userInfo->status = 'A';
        $userInfo->dataNasc = $request->dataNasc;
        $userInfo->genero = $request->genero;
        $userInfo->save();
        return view("UserInfo/show")->with("userInfo", $userInfo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // procuro e vejo se existe a informção do usuário logado
        $userInfo = UserInfo::find(1);
        if(isset($userInfo))
            return view("UserInfo/show")->with("userInfo", $userInfo);
        else
            return view("UserInfo/create");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // procuro e vejo se existe a informção do usuário logado
        $userInfo = UserInfo::find(1);
        if(isset($userInfo))
            return view("UserInfo/edit")->with("userInfo", $userInfo);
        else
            return view("UserInfo/create");
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
        //
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
