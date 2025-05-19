<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'login_creds';
    protected $allowedFields = ['Username', 'Password'];
}
