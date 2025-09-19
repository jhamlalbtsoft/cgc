<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class ModelContact extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tbl_contact';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['name', 'email', 'phone_number','msg_subject','message','cdatetime'];

    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

}