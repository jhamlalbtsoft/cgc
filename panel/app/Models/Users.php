<?php
namespace App\Models;
use CodeIgniter\Model;
class Users extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'm_user';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = FALSE;
    protected $allowedFields = ['name','username','password','last_login','active','usertype','mobileno', 'otp', 'sidebar']; 
}