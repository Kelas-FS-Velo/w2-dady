<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Tampilkan daftar user.
     */
    public function index(): View
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Ambil data semua user sebagai JSON.
     */
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Tampilkan form untuk membuat user baru.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Simpan user baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'fullname' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'bod' => 'required|date',
            'role' => 'in:user,admin'
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'address' => $request->address,
            'bod' => $request->bod,
            'role' => $request->role ?? 'user',
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail user tertentu.
     */
    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    /**
     * Tampilkan form edit user.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update user dalam database.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'fullname' => 'string|max:255',
            'address' => 'nullable|string|max:255',
            'bod' => 'date',
            'role' => 'in:user,admin'
        ]);

        $user->update([
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'fullname' => $request->fullname ?? $user->fullname,
            'address' => $request->address ?? $user->address,
            'bod' => $request->bod ?? $user->bod,
            'role' => $request->role ?? $user->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Hapus user dari database.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
