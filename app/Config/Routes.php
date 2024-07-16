<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::welcome');
$routes->get('login', 'Auth::login');
$routes->post('auth/valid-login', 'Auth::validLogin');
$routes->get('auth/logout', 'Auth::logout');

$routes->group('admin', function($routes) {
    $routes->get('', 'Admin::home');
    
    // BUKU LAYAK
    $routes->get('buku', 'Buku::buku_layak');
    $routes->post('addBuku', 'Buku::addBuku');
    $routes->post('editBuku', 'Buku::editBuku');
    $routes->post('deleteBuku', 'Buku::deleteBuku');
    
    // BUKU RUSAK
    $routes->get('bukuRusak', 'Buku::buku_rusak');
    $routes->post('addBkr', 'Buku::addBkr');
    $routes->post('editBkr', 'Buku::editBkr');
    $routes->post('deleteBkr', 'Buku::deleteBkr');

    // TRANSAKSI
    $routes->get('peminjaman', 'Admin::peminjaman');

    // DATA ADMIN
    $routes->get('dataAdmin', 'Admin::data_admin');
    $routes->post('addAdmin', 'Admin::addAdmin');
    $routes->post('editAdmin', 'Admin::editAdmin');
    $routes->post('deleteAdmin', 'Admin::deleteAdmin');
    $routes->get('dataGuru', 'Admin::data_guru');

    // DATA SISWA
    $routes->get('dataSiswa', 'Siswa::data_siswa');
    $routes->post('addSiswa', 'Siswa::addSiswa');
    $routes->post('editSiswa', 'Siswa::editSiswa');
    $routes->post('deleteSiswa', 'Siswa::deleteSiswa');
    
    // DAFTAR PENGUNJUNG
    
    $routes->get('daftarPengunjung', 'Visitor::index');
    $routes->post('addPengunjung', 'Visitor::addVisitor');
    $routes->get('admin/visitor/getSiswaByNISN/(:any)', 'Visitor::getSiswaByNISN/$1');


    $routes->get('jadwalKunjungan', 'Admin::jadwal_kunjungan');
    $routes->get('profilAdmin', 'Admin::profil_admin');
});

$routes->get('/tentang_kami', 'Home::tentang_kami');
$routes->get('/kontak', 'Home::kontak');

$routes->group('siswa', function($routes) {
    $routes->get('', 'Page::beranda');
    $routes->get('pinjaman', 'Page::pinjaman');
    $routes->get('riwayat', 'Page::riwayat');
    $routes->get('detail', 'Page::detail');
});
