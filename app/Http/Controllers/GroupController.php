<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Illuminate\Support\Facades\DB;


class GroupController extends Controller
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
        $group = new Group;
        $group->name = $request->input('groupName');
        $group->password = 'fafads';
        $group->save();

        return back()->with('Grupo creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = DB::table('group_user')->select('group_id')
        ->where('user_id',$id)->get();
        $usuarios = array();
        for ($i=0; $i < count($groups); $i++) {
          $usuariosGrupo = DB::table('groups')
          ->join('group_user','groups.id', '=','group_user.group_id')
          ->join('users','group_user.user_id', '=','users.id')
          ->select('users.name','groups.name')
          ->where('users.id','=',$id)->get();
          dd($usuariosGrupo);
          array_push($usuarios,$usuariosGrupo);
        }

        return view('users.groups')->with('groups', $usuarios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
