<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\EmployeeModel;
use App\Models\MedicalClaimModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel     = new UserModel();
        $employeeModel = new EmployeeModel();
        $claimModel    = new MedicalClaimModel();

        /* ===============================
           USER STATISTIC
        =============================== */
        $totalUsers      = $userModel->countAllUsers();
        $activeUsers     = $userModel->countActiveUsers();
        $inactiveUsers   = $userModel->countInactiveUsers();
        $usersByRole     = $userModel->countByRole();

        /* ===============================
           EMPLOYEE
        =============================== */
        $totalEmployees  = $employeeModel->countAll();

        /* ===============================
           CLAIM STATISTIC
        =============================== */
        $pendingClaims  = $claimModel->where('status', 'PENGAJUAN')->countAllResults();
        $approvedClaims = $claimModel->whereIn('status', [
            'DISETUJUI_HRD',
            'DIBAYARKAN_KEUANGAN'
        ])->countAllResults();
        $rejectedClaims = $claimModel->where('status', 'DITOLAK_HRD')->countAllResults();

        /* ===============================
           CHART (AMAN DULU)
        =============================== */
        $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
        $chartData   = [0, 0, 0, 0, 0, 0];

        return view('admin/dashboard', [
            // user
            'totalUsers'    => $totalUsers,
            'activeUsers'   => $activeUsers,
            'inactiveUsers' => $inactiveUsers,
            'usersByRole'   => $usersByRole,

            // employee
            'totalEmployees' => $totalEmployees,

            // claim
            'pendingClaims'  => $pendingClaims,
            'approvedClaims' => $approvedClaims,
            'rejectedClaims' => $rejectedClaims,

            // chart
            'chartLabels' => $chartLabels,
            'chartData'   => $chartData,
        ]);
    }
}
