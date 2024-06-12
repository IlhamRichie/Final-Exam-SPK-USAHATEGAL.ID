<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profil()
    {
        $data['title'] = 'Ubah Profil';
        $data['user'] = Auth::user();
        return view('user.profil', $data);
    }

    public function profilUpdate(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'username' => 'required',
        ], [
            'nama_user.required' => 'Nama user harus diisi',
            'username.required' => 'Username harus diisi',
        ]);
        $user = current_user();
        if (get_row("SELECT * FROM tb_user WHERE username='{$request->username}' AND id_user<>'$user->id_user'"))
            return back()->withErrors([
                'username' => 'Username sudah terdaftar!',
            ]);

        $user->nama_user = $request->nama_user;
        $user->username = $request->username;

        $user->save();
        $request->session()->regenerate();
        return back()->with('message', 'Data berhasil diubah!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function password()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = Auth::user();
        return view('user.password', $data);
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'pass1' => 'required',
            'pass2' => 'required|confirmed',
        ], [
            'pass1.required' => 'Password lama harus diisi',
            'pass2.required' => 'Password baru harus diisi',
            'pass2.confirmed' => 'Password baru dan konfirmasi password baru harus sama',
        ]);
        $user = current_user();
        if (!Hash::check($request->pass1, $request->user()->password))
            return back()->withErrors([
                'username' => 'Password lama salah!',
            ]);

        $user->password = Hash::make($request->pass2);
        $user->save();
        $request->session()->regenerate();
        return back()->with('message', 'Data berhasil diubah!');
    }
    public function loginForm()
    {
        return view('user.login');
    }
    public function loginAction(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status_user' => 1])) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'Salah kombinasi username dan password',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['q'] = $request->input('q');
        $data['title'] = 'Data User';
        $data['limit'] = 10;
        $data['rows'] = User::where('nama_user', 'like', '%' . $data['q'] . '%')
            ->orderBy('id_user')
            ->paginate($data['limit']);
        $data['no'] = $data['rows']->firstItem();
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah User';
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'level' => 'required',
            'status_user' => 'required',
        ], [
            'nama_user.required' => 'Nama user harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username harus unik',
            'password.required' => 'Password harus diisi',
            'level.required' => 'Level harus diisi',
            'status_user.required' => 'Status harus diisi',
        ]);
        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('user')->with('message', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['row'] = $user;
        $data['title'] = 'Ubah User';
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama_user' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'status_user' => 'required',
        ], [
            'nama_user.required' => 'Nama user harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username harus unik',
            'password.required' => 'Password harus diisi',
            'level.required' => 'Level harus diisi',
            'status_user.required' => 'Status harus diisi',
        ]);

        if (get_row("SELECT * FROM tb_user WHERE username='{$request->username}' AND id_user<>'$user->id_user'"))
            return back()->withErrors([
                'username' => 'Username sudah terdaftar!',
            ]);

        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->status_user = $request->status_user;
        $user->save();
        return redirect('user')->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user')->with('message', 'Data berhasil dihapus!');
    }
}
