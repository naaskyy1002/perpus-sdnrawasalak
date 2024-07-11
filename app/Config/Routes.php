<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



$routes->get('/', 'Home::welcome');
$routes->get('login', 'Home::pagelogin');

$routes->get('login', 'Auth::login');
$routes->post('auth/valid-login', 'Auth::validLogin');
$routes->get('auth/logout', 'Auth::logout');

$routes->group('admin', function($routes){
    $routes->get('', 'Admin::home');
    $routes->get('buku_layak', 'Admin::buku_layak');
    $routes->get('buku_rusak', 'Admin::buku_rusak');
    $routes->get('peminjaman', 'Admin::peminjaman');
    $routes->get('data_admin', 'Admin::data_admin');
    $routes->get('data_guru', 'Admin::data_guru');
    $routes->get('data_siswa', 'Admin::data_siswa');
    $routes->get('daftar_pengunjung', 'Admin::daftar_pengunjung');
    $routes->get('jadwal_kunjungan', 'Admin::jadwal_kunjungan');
    $routes->get('profil_admin', 'Admin::profil_admin');

});

$routes->get('/tentang_kami', 'Home::tentang_kami');
$routes->get('/kontak', 'Home::kontak');

// route ke halaman user (siswa)
$routes->get('/beranda', 'Page::beranda');
$routes->get('/buku', 'Page::buku');
$routes->get('/pinjaman', 'Page::pinjaman');
$routes->get('/sejarah', 'Page::sejarah');
$routes->get('/detail', 'Page::detail');