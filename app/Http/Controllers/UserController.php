<?php

namespace App\Http\Controllers;

use App\Models\User;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('created_at')->get();
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:users",
            "no_hp" => "required",
            "alamat" => "required",
            "jenis_kelamin" => "required",
            "email" => "required|email",
            "password" => "required",
            "hak_akses" => "required",
        ]);

        $input = $request->all();

        User::create($input);
        return redirect()->route("user.index")->with("success", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("user.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $request->validate([
            "name" => "required",
            "no_hp" => "required",
            "alamat" => "required",
            "jenis_kelamin" => "required",
            "email" => "required",
            "password" => "required",
            "hak_akses" => "required",
        ]);

        $input = $request->all();

        $user->update($input);
        return to_route("user.index")->with("success", "Data berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route("user.index")->with("success", "Data berhasil dihapus");
    }
















}
