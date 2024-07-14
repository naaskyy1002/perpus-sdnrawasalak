<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::welcome');
$routes->get('login', 'Auth::login');
$routes->post('auth/valid-login', 'Auth::validLogin');
$routes->get('auth/logout', 'Auth::logout');

$routes->group('admin', function($routes){
    $routes->get('', 'Admin::home');
    $routes->get('buku', 'Buku::buku_layak');
    // $routes->get('buku/addBuku', 'Buku::addBuku');
    $routes->post('addBuku', 'Buku::addBuku');
    $routes->post('editBuku', 'Buku::editBuku');
    $routes->post('deleteBuku', 'Buku::deleteBuku');
    $routes->get('bukuRusak', 'Buku::buku_rusak');
    $routes->get('peminjaman', 'Admin::peminjaman');
    $routes->get('dataAdmin', 'Admin::data_admin');
    $routes->get('dataGuru', 'Admin::data_guru');
    $routes->get('dataSiswa', 'Admin::data_siswa');
    $routes->get('daftarPengunjung', 'Admin::daftar_pengunjung');
    $routes->get('jadwalKunjungan', 'Admin::jadwal_kunjungan');
    $routes->get('profilAdmin', 'Admin::profil_admin');
});

$routes->get('/tentang_kami', 'Home::tentang_kami');
$routes->get('/kontak', 'Home::kontak');

$routes->group('user', function($routes){
    // route ke halaman user (siswa)
    $routes->get('', 'User::beranda');
    $routes->get('pinjaman', 'User::pinjaman');
    $routes->get('riwayat', 'User::riwayat');
    $routes->get('detail', 'User::detail');
});
