<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class BookedRoomModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tbl_booked_rooms';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['guesthouse_id','room_id','booking_date','booking_id'];

    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

}