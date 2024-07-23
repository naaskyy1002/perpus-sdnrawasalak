<?php
function userLogin(){
    $db = \Config\Database::connect();
    return $db->table('admin')->where('id', session('id'))->get()->getRow();
}
?>