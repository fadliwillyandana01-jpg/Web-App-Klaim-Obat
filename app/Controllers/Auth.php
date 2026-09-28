<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\EmployeeModel;

class Auth extends BaseController
{
    public function login()
    {
        // Kalau sudah login → lempar ke dashboard sesuai role
        if (session()->get('logged_in') === true) {
            return $this->redirectByRole(session()->get('role'));
        }

        return view('auth/login');
    }

    public function process()
    {
        $userModel     = new UserModel();
        $employeeModel = new EmployeeModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username
        $user = $userModel->where('username', $username)->first();

        // ❌ User tidak ditemukan atau password salah
        if (!$user || !password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah');
        }

        // ✅ Normalisasi role ke huruf kecil (biar gak sensitif besar/kecil)
        $role = strtolower(trim($user['role']));

        // ✅ LOGIKA KHUSUS KARYAWAN: Buat data employee otomatis jika belum ada
        if ($role === 'karyawan' && empty($user['employee_id'])) {
            try {
                $employeeId = $employeeModel->insert([
                    'employee_nik' => 'EMP-' . time(),
                    'full_name'    => $user['username'],
                    'position'     => 'Staff',
                    'department'   => 'Umum',
                    'base_salary'  => 0
                ], true);

                // Update kolom employee_id di tabel users
                $userModel->update($user['user_id'], [
                    'employee_id' => $employeeId
                ]);

                $user['employee_id'] = $employeeId;
            } catch (\Exception $e) {
                // Jika error (misal: kolom updated_at lupa di-false), tangkap biar gak blank merah
                return redirect()->back()->with('error', 'Gagal sinkronisasi data karyawan: ' . $e->getMessage());
            }
        }

        // ✅ SET SESSION
        session()->set([
            'user_id'     => $user['user_id'],
            'employee_id' => $user['employee_id'] ?? null,
            'username'    => $user['username'],
            'role'        => $role,
            'logged_in'   => true
        ]);
        
        session()->regenerate(true);

        return $this->redirectByRole($role);
    }

    private function redirectByRole(string $role)
    {
        // Pastikan route-route di bawah ini sudah terdaftar di Config/Routes.php
        switch ($role) {
            case 'admin':
                return redirect()->to('/dashboard');

            case 'hrd':
                return redirect()->to('/hrd/dashboard');

            case 'keuangan':
                return redirect()->to('/keuangan/dashboard');

            case 'karyawan':
                return redirect()->to('/karyawan/dashboard');

            default:
                // Jika role tidak terdaftar di case atas, hapus session dan balik ke login
                session()->destroy();
                return redirect()->to('/login')
                    ->with('error', 'Akses ditolak. Role tidak terdaftar: ' . $role);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}