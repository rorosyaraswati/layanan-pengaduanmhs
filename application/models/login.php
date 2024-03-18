<?php
class login extends CI_Model
{
    public function checkLogin($username, $password)
    {
        // Lakukan validasi login di sini (misalnya dengan memeriksa database)
        // ...
        // Contoh sederhana untuk keperluan demonstrasi
        if ($username === 'admin' && $password === 'admin123') {
            return true; // Login berhasil
        } else {
            return false; // Login gagal
        }
    }
}
