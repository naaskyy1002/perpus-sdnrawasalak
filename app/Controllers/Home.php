<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function welcome()
    {
        $data = [
            'title' => 'PERPUSTAKAAN SDN RAWASALAK'
        ]; 
        return view('pages/welcome', $data);
    }

    public function tentang_kami()
    {
        $data = [
            'title' => 'Tentang Kami | PERPUSTAKAAN SDN RAWASALAK'
        ]; 
        return view('pages/tentang_kami' , $data);
    }

    public function kontak()
    {
        $data = [
            'title' => 'Kontak | PERPUSTAKAAN SDN RAWASALAK'
        ]; 
        return view('pages/kontak', $data);
    }
}
