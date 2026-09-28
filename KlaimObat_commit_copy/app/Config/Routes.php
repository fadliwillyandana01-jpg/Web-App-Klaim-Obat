<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==========================================
// 1. PUBLIC & AUTH ROUTES
// ==========================================
$routes->get('/', 'Home::index');

$routes->get('login', 'Auth::login');
// Form login (app/Views/auth/login.php & app/Views/karyawan/auth/login.php)
// mengirim POST ke /login, jadi route POST-nya harus terdaftar di sini.
$routes->post('login', 'Auth::process');
// Alias lama: tetap dipertahankan supaya form/tautan lama tidak kena 404.
$routes->post('login/process', 'Auth::process');
$routes->get('logout', 'Auth::logout');

// ==========================================
// 2. LOGGED-IN USERS (FILTER: AUTH)
// ==========================================
$routes->group('', ['filter' => 'auth'], function ($routes) {

    // Global Pages
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('profile', 'ProfileController::index');
    $routes->post('profile/change-password', 'ProfileController::changePassword');

    // --------------------------------------
    // A. MODUL ADMIN
    // --------------------------------------
    $routes->group('', ['filter' => 'admin'], function ($routes) {
        // Users
        $routes->get('users', 'Users::index');
        $routes->get('users/create', 'Users::create');
        $routes->post('users/store', 'Users::store');
        $routes->get('users/edit/(:num)', 'Users::edit/$1');
        $routes->post('users/update/(:num)', 'Users::update/$1');
        $routes->get('users/delete/(:num)', 'Users::delete/$1');
        $routes->get('users/reset-password/(:num)', 'Users::resetPassword/$1');
        $routes->post('users/toggle-status', 'Users::toggleStatus');

        // Employees
        $routes->get('employees', 'Employees::index');
        $routes->get('employees/create', 'Employees::create');
        $routes->post('employees/store', 'Employees::store');

        // Claims & Reports
        $routes->get('claims', 'MedicalClaims::index');
        $routes->get('claims/history', 'MedicalClaims::history');
        $routes->get('reports', 'Reports::index');
        $routes->get('reports/filter', 'Reports::filter');
        $routes->get('reports/export-pdf', 'Reports::exportPdf');
        $routes->get('reports/export-excel', 'Reports::exportExcel');
    });

    // --------------------------------------
    // B. MODUL HRD
    // --------------------------------------
    $routes->group('hrd', ['filter' => 'hrd'], function ($routes) {
        $routes->get('dashboard', 'Hrd\HrdController::index');
        $routes->get('history', 'Hrd\HrdController::history');
        $routes->get('approve/(:num)', 'Hrd\HrdController::process/approve/$1');
        $routes->get('reject/(:num)', 'Hrd\HrdController::process/reject/$1');
        $routes->get('process/(:any)/(:num)', 'Hrd\HrdController::process/$1/$2');
    });

    // --------------------------------------
    // C. MODUL KARYAWAN
    // --------------------------------------
    $routes->group('karyawan', ['namespace' => 'App\Controllers\Karyawan'], function ($routes) {
        // Dashboard
        $routes->get('/', 'MedicalClaimController::index');
        $routes->get('dashboard', 'MedicalClaimController::index');

        // Klaim Medis
        $routes->get('medical-claim', 'MedicalClaimController::create');
        $routes->post('medical-claim/submit', 'MedicalClaimController::submitClaim');

        // Pengajuan Plafon (URL perbaikan: /karyawan/ajukan-plafon & /karyawan/submit-plafon)
        $routes->get('ajukan-plafon', 'MedicalClaimController::ajukanPlafon');
        $routes->post('submit-plafon', 'MedicalClaimController::submitPlafon');

        // Profil & Password Karyawan
        $routes->get('profile', 'ProfileController::index');
        $routes->post('profile/update', 'ProfileController::update');
        $routes->get('change-password', 'ProfileController::changePasswordView');
        $routes->post('change-password/update', 'ProfileController::updatePassword');
    });

    // --------------------------------------
    // D. MODUL KEUANGAN
    // --------------------------------------
    $routes->group('keuangan', ['filter' => 'keuangan'], function ($routes) {
        $routes->get('/', 'Keuangan\Keuangan::index');
        $routes->get('dashboard', 'Keuangan\Keuangan::index');

        $routes->get('klaim', 'Keuangan\Keuangan::klaim');
        $routes->get('riwayat', 'Keuangan\Keuangan::riwayat');

        $routes->post('bayar/(:num)', 'Keuangan\Keuangan::bayar/$1');
        $routes->post('tolak/(:num)', 'Keuangan\Keuangan::tolak/$1');

        $routes->get('export-pdf', 'Keuangan\Keuangan::exportPdf');
        $routes->get('exportPdf', 'Keuangan\Keuangan::exportPdf');
    });

});