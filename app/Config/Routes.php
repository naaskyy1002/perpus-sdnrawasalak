<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->set404Override(function(){ return view('404.php');});

// TAMPILAN AWAL SEBELUM LOGIN DILAKUKAN
$routes->get('/', 'Home::welcome');
$routes->get('login', 'Auth::login');
$routes->post('auth/valid-login', 'Auth::validLogin');
$routes->get('auth/logout', 'Auth::logout');

$routes->get('/tentang_kami', 'Home::tentang_kami');
$routes->get('/kontak', 'Home::kontak');

// ADMIN
$routes->group('admin',['filter' => 'isLoggedIn'], function($routes) {
    $routes->get('/', 'Admin::home');
    $routes->post('/', 'Admin::home');
    
    // BUKU LAYAK
    $routes->get('buku', 'Buku::buku_layak');
    $routes->post('buku', 'Buku::buku_layak');
    $routes->post('addBuku', 'Buku::addBuku');
    $routes->post('editBuku', 'Buku::editBuku');
    $routes->post('deleteBuku', 'Buku::deleteBuku');
    $routes->get('printBuku', 'Buku::printBuku');
    $routes->get('excelBuku', 'Buku::excelBuku');
    
    // BUKU RUSAK
    $routes->get('bukuRusak', 'Buku::buku_rusak');
    $routes->post('bukuRusak', 'Buku::buku_rusak');
    $routes->post('addBkr', 'Buku::addBkr');
    $routes->post('editBkr', 'Buku::editBkr');
    $routes->post('deleteBkr', 'Buku::deleteBkr');
    $routes->get('printBkr', 'Buku::printBkr');
    $routes->get('excelBkr', 'Buku::excelBkr');

    // TRANSAKSI
    $routes->get('peminjaman', 'Transaksi::peminjaman');
    $routes->post('peminjaman', 'Transaksi::peminjaman');
    $routes->post('addTransaksi', 'Transaksi::addTransaksi');
    $routes->post('deleteTransaksi', 'Transaksi::deleteTransaksi');
    $routes->get('excelPinjam', 'Transaksi::excelPinjam');
    $routes->get('printPinjam', 'Transaksi::printPinjam');

    $routes->get('pengembalian', 'Transaksi::pengembalian');
    $routes->post('pengembalian', 'Transaksi::selesai');
    $routes->post('deleteTransaksiKB', 'Transaksi::deleteTransaksiKB');
    $routes->get('printKembali', 'Transaksi::printKembali');
    $routes->get('excelKembali', 'Transaksi::excelKembali');


    // DATA ADMIN
    $routes->get('dataAdmin', 'Admin::data_admin');
    $routes->post('dataAdmin', 'Admin::data_admin');
    $routes->post('addAdmin', 'Admin::addAdmin');
    $routes->post('editAdmin', 'Admin::editAdmin');
    $routes->post('deleteAdmin', 'Admin::deleteAdmin');

    // DATA SISWA
    $routes->get('dataSiswa', 'Siswa::data_siswa');
    $routes->post('dataSiswa', 'Siswa::data_siswa');
    $routes->post('addSiswa', 'Siswa::addSiswa');
    $routes->post('editSiswa', 'Siswa::editSiswa');
    $routes->post('deleteSiswa', 'Siswa::deleteSiswa');
    
    // DAFTAR PENGUNJUNG
    $routes->get('daftarPengunjung', 'Visitor::index');
    $routes->post('daftarPengunjung', 'Visitor::index');
    $routes->post('visitor/addVisitor', 'Visitor::addVisitor');
    $routes->get('visitor/getSiswaByNISN', 'Visitor::getSiswaByNISN');

    // JADWAL KUNJUNGAN
    $routes->get('jadwalKunjungan', 'Jadwal::jadwal_kunjungan');
    $routes->post('editJadwal', 'Jadwal::editJadwal');
    $routes->get('profilAdmin', 'Admin::profil_admin');

    // SARANA PRASARANA
    // $routes->get('sapras', 'Sapras::sarana_prasarana');
    // $routes->post('sapras', 'Sapras::sarana_prasarana');
    // $routes->post('addSapras', 'Sapras::addSapras');
    // $routes->post('editSapras', 'Sapras::editSapras');
    // $routes->post('deleteSapras', 'Sapras::deleteSapras');
    // $routes->get('printSapras', 'Sapras::printSapras');
    // $routes->get('excelSapras', 'Sapras::excelSapras');
});


// SISWA
$routes->group('siswa',['filter' => 'isLoggedIn'], function($routes) {
    $routes->get('/', 'Page::beranda');
    $routes->post('/', 'Page::beranda');
    $routes->get('pinjaman', 'Page::pinjaman');
    $routes->get('riwayat', 'Page::riwayat');
    $routes->get('profilSiswa', 'Page::profil_user');
});
