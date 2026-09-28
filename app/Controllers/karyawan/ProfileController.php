<?php

namespace App\Controllers\Karyawan;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\EmployeeModel;
use App\Models\DependentModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $userId     = session('user_id');
        $employeeId = session('employee_id');

        $userModel      = new UserModel();
        $employeeModel  = new EmployeeModel();
        $dependentModel = new DependentModel();

        $user = $userModel->find($userId);

        if (!$employeeId) {
            $newEmployeeId = $employeeModel->insert([
                'employee_nik' => 'AUTO-' . $userId,
                'full_name'    => $user['full_name'] ?? 'No Name',
                'position'     => 'Karyawan',
                'department'   => '-',
                'base_salary'  => 0,
                'created_at'   => date('Y-m-d H:i:s')
            ]);

            $userModel->update($userId, ['employee_id' => $newEmployeeId]);
            session()->set('employee_id', $newEmployeeId);
            $employeeId = $newEmployeeId;
        }

        $employee   = $employeeModel->find($employeeId);
        $dependents = $dependentModel->where('employee_id', $employeeId)->findAll();

        return view('karyawan/profile/index', [
            'user'       => $user,
            'employee'   => $employee,
            'dependents' => $dependents
        ]);
    }

    public function changePasswordView()
    {
        return view('karyawan/auth/change_password');
    }

    public function updatePassword()
    {
        $userModel = new UserModel();
        $userId    = session('user_id');

        $newPassword     = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak cocok!');
        }

        $userModel->update($userId, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);

        // SINKRON: Balik ke Dashboard Utama (MedicalClaim)
        return redirect()->to(base_url('karyawan/dashboard'))->with('success', 'Password berhasil diganti!');
    }

    public function edit()
    {
        $employee = (new EmployeeModel())->find(session('employee_id'));
        return view('karyawan/profile/edit', [
            'employee' => $employee
        ]);
    }

    public function update()
    {
        (new EmployeeModel())->update(session('employee_id'), [
            'full_name'  => $this->request->getPost('full_name'),
            'position'   => $this->request->getPost('position'),
            'department' => $this->request->getPost('department'),
        ]);

        // SINKRON: Balik ke Dashboard Utama (MedicalClaim)
        return redirect()->to(base_url('karyawan/dashboard'))->with('success', 'Profil berhasil diperbarui');
    }
}