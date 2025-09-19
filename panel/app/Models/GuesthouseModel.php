<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class GuesthouseModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'm_guesthouse';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['name','address','contact_person','geo_location'];

    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

}