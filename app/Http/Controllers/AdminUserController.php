<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password as PasswordRule;

class AdminUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', PasswordRule::min(8)->letters()->numbers()],
            'role' => 'required|in:super_admin,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','string','email','max:255', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|in:super_admin,admin',
            'password' => ['nullable', 'string', PasswordRule::min(8)->letters()->numbers()],
        ]);

        if ($request->user()->is($user) && $request->input('role') !== $user->role) {
            return redirect()->back()->withErrors([
                'user' => 'Anda tidak dapat mengubah role akun sendiri.',
            ]);
        }

        if ($this->wouldRemoveLastSuperAdmin($user, $request->input('role'))) {
            return redirect()->back()->withErrors([
                'user' => 'Minimal harus ada satu akun super admin aktif.',
            ]);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->back()->with('success', 'User berhasil diperbarui!');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->user()->is($user)) {
            return redirect()->back()->withErrors([
                'user' => 'Anda tidak dapat menghapus akun sendiri.',
            ]);
        }

        if ($this->wouldRemoveLastSuperAdmin($user, null)) {
            return redirect()->back()->withErrors([
                'user' => 'Minimal harus ada satu akun super admin aktif.',
            ]);
        }

        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }

    private function wouldRemoveLastSuperAdmin(User $user, ?string $newRole): bool
    {
        if ($user->role !== 'super_admin') {
            return false;
        }

        if ($newRole === 'super_admin') {
            return false;
        }

        return User::where('role', 'super_admin')->count() <= 1;
    }
}
