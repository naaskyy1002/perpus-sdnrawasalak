<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::welcome');
$routes->get('/home', 'Home::layout');
// $routes->get('/beranda', 'Home::body');
$routes->get('/buku_layak', 'Home::buku_layak');
$routes->get('/buku_rusak', 'Home::buku_rusak');
$routes->get('/peminjaman', 'Home::peminjaman');
$routes->get('/data_admin', 'Home::data_admin');
$routes->get('/data_guru', 'Home::data_guru');
$routes->get('/data_siswa', 'Home::data_siswa');
$routes->get('/daftar_pengunjung', 'Home::daftar_pengunjung');
$routes->get('/jadwal_kunjungan', 'Home::jadwal_kunjungan');
$routes->get('/profil_admin', 'Home::profil_admin');
$routes->get('/masuk', 'Home::masuk');
$routes->get('/welcome', 'Home::welcome');
$routes->get('/tentang_kami', 'Home::tentang_kami');
$routes->get('/kontak', 'Home::kontak');