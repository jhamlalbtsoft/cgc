<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class BookingModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tbl_booking';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['guesthouse_id','checkin_date','no_of_days','checkout_date','booking_for','room_type','no_of_rooms','room_charges','tol_amount','mobileno','emailid','department','designation','visitor_name','visitor_mobileno','purpose_for_visit','nationality','address','visitor_emailid','created_at','status','approved_dt','approved_by','reason','serial_no','booking_no','register_id'];

    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

}