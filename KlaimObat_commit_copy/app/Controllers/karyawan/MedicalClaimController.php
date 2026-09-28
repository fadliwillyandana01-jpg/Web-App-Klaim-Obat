<?php

namespace App\Controllers\Karyawan;

use App\Controllers\BaseController;
use App\Models\ClaimLimitModel;
use App\Models\MedicalClaimModel;
use App\Models\DependentModel;
use App\Models\EmployeeModel;

class MedicalClaimController extends BaseController
{
    public function index()
    {
        $employeeId = session('employee_id');
        if (!$employeeId) return redirect()->to('/login');

        $year = date('Y');
        $limitModel     = new ClaimLimitModel();
        $claimModel     = new MedicalClaimModel();
        $dependentModel = new DependentModel();
        $employeeModel  = new EmployeeModel();

        $employee = $employeeModel->find($employeeId);
        if (!$employee) return "Data profil karyawan tidak ditemukan.";

        $limit  = $limitModel->where(['employee_id' => $employeeId, 'year' => $year])->first();
        $claims = $claimModel->where('employee_id', $employeeId)->orderBy('claim_date', 'DESC')->findAll();

        // Path disesuaikan ke sub-folder employee/dashboard.php
        return view('karyawan/employee/dashboard', [
            'employee'   => $employee,
            'dependents' => $dependentModel->where('employee_id', $employeeId)->findAll(),
            'claims'     => $claims,
            'limit'      => $limit
        ]);
    }

    public function create()
    {
        $employeeId = session('employee_id');
        if (!$employeeId) return redirect()->to('/login');

        $dependentModel = new DependentModel();
        
        // Path disesuaikan ke sub-folder karyawan/ajukan_klaim.php
        return view('karyawan/karyawan/ajukan_klaim', [
            'dependents' => $dependentModel->where('employee_id', $employeeId)->findAll()
        ]);
    }

    public function submitClaim()
    {
        $employeeId = session('employee_id');
        if (!$employeeId) return redirect()->to('/login');

        $claimModel = new MedicalClaimModel();

        // ---- Validasi input dasar ----
        $claimDate   = $this->request->getPost('claim_date');
        $claimAmount = $this->request->getPost('claim_amount');

        if (empty($claimDate) || ! is_numeric($claimAmount) || (float) $claimAmount <= 0) {
            return redirect()->back()->withInput()
                ->with('error', 'Tanggal kwitansi dan nominal klaim wajib diisi dengan benar.');
        }

        // ---- Simpan bukti pembayaran (opsional) ke public/uploads ----
        // Dipakai oleh kolom receipt_file, sama seperti data klaim yang sudah ada.
        $receiptFile = null;
        $proof       = $this->request->getFile('proof');

        if ($proof !== null && $proof->getError() !== UPLOAD_ERR_NO_FILE) {
            if (! $proof->isValid()) {
                return redirect()->back()->withInput()
                    ->with('error', 'Gagal mengunggah bukti pembayaran: ' . $proof->getErrorString());
            }

            if ($proof->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->withInput()
                    ->with('error', 'Ukuran bukti pembayaran maksimal 5 MB.');
            }

            if (! in_array(strtolower($proof->getExtension()), ['jpg', 'jpeg', 'png', 'pdf'], true)) {
                return redirect()->back()->withInput()
                    ->with('error', 'Format bukti pembayaran harus JPG, JPEG, PNG, atau PDF.');
            }

            $receiptFile = $proof->getRandomName();
            $proof->move(FCPATH . 'uploads', $receiptFile);
        }

        // ---- Simpan klaim. Status "PENGAJUAN" dipakai HRD & Admin sebagai klaim masuk ----
        $claimModel->insert([
            'employee_id'       => $employeeId,
            'dependent_id'      => $this->request->getPost('dependent_id') ?: null,
            'claim_date'        => $claimDate,
            'claim_amount'      => $claimAmount,
            'claim_description' => $this->request->getPost('claim_description'),
            'receipt_file'      => $receiptFile,
            'status'            => 'PENGAJUAN',
            'created_at'        => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('karyawan/dashboard'))->with('success', 'Klaim berhasil diajukan.');
    }

    public function ajukanPlafon()
    {
        $employeeId = session('employee_id');
        if (!$employeeId) return redirect()->to('/login');

        // Path disesuaikan ke sub-folder karyawan/ajukan_plafon.php
        return view('karyawan/karyawan/ajukan_plafon');
    }

    public function submitPlafon()
    {
        $employeeId = session('employee_id');
        if (!$employeeId) return redirect()->to('/login');

        $limitModel = new ClaimLimitModel();
        $year = date('Y');

        $existingLimit = $limitModel->where(['employee_id' => $employeeId, 'year' => $year])->first();

        if ($existingLimit) {
            return redirect()->back()->with('error', 'Plafon untuk tahun ' . $year . ' sudah ada.');
        }

        $totalLimit = $this->request->getPost('total_limit') ?: 10000000;

        $limitModel->insert([
            'employee_id'      => $employeeId,
            'year'             => $year,
            'max_claim_amount' => $totalLimit,
            'used_amount'      => 0,
            'created_at'       => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('karyawan/dashboard'))->with('success', 'Pengajuan plafon berhasil dikirim.');
    }
}