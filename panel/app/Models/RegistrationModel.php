<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class RegistrationModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'register';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['otp', 'name', 'password','gender','age','mobileno','emailid','address','city','guestid','guesttype','guestidfile'];

    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

}