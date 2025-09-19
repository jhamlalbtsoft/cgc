<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class LanguageModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'm_language';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['name'];

    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

}