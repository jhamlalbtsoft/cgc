<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class BookingSubModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tbl_booking_sub';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['booking_id','guestname','guestage','guestgender'];

    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

}