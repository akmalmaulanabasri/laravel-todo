<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.index');
    }

    public function register()
    {
        return view('page.register');
    }

    public function login()
    {
        return view('page.login');
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

    public function loginS(Request $request){
       $login = $request->validate([
           'username' => 'required|max:10|exists:users,username',
           'password' => 'required'
       ],[
           'username.required' => 'Username harus diisi',
           'username.exists' => 'Username tidak tersedia',
           'password.required' => 'Password harus diisi',
       ]);

       if(Auth::attempt($login)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success-login', 'Login berhasil');
        }

        return redirect('/login')->with('error', 'Username atau Password salah');
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
        $validate = $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|unique:users|min:4|max:8',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:4',
        ]);
        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);
        return redirect('/login')->with('success', 'Register berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('page.dashboard.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }

    public function dashboard()
    {
        $todos = Todo::where('user_id', Auth::user()->id)->orderBy('status', 'desc')->get();
        return view('page.dashboard.index', compact('todos'));
    }

    public function createTodo(){
        return view('page.dashboard.create');
    }
    

    public function addTodo(Request $request){
        // dd($request->all());
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $validate['user_id'] = Auth::user()->id;
        $validate['status'] = 0;

        Todo::create($validate);
        return redirect()->route('dashboard')->with('success-todo', 'Buat todo berhasil');
    }

    public function todoComplete($id){
        $todo = Todo::findOrfail($id);
        $todo->status = 1;
        $todo->update();
        return redirect()->route('dashboard')->with('success-todo', 'Buat todo berhasil');
    }

    public function todoDelete($id){
        $todo = Todo::find($id)->delete();
        return redirect()->route('dashboard')->with('success-delete', 'Buat todo berhasil');
    }

    public function UpdateTodo(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $update = Todo::find($id)->update($validate);

        return redirect()->route('dashboard')->with('success-update', 'Buat todo berhasil');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('home'));
    }
}
