<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    public function reg_user($username, $password) {
        // dd($username, $password);
        return DB::insert("INSERT INTO users(username, password) VALUES (?, ?)", [$username, $password]);
    }

    public function check_acc($username, $password) {
        $hash_pass = hash('sha256', md5($password));
        return count(DB::select("SELECT * FROM users WHERE username=? AND password=?", [$username, $hash_pass]));
    }

    public function check_username($username) {
        return count(DB::select("SELECT * FROM users WHERE username=?", [$username]));
    }
}
