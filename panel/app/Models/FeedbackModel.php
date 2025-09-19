<?php
namespace App\Models;
use CodeIgniter\Model;
class FeedbackModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'feedback';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = FALSE;
    protected $allowedFields = ['booking_no','front_desk','housekeeping','airconditioning','tv_viewing','electrical','any_other', 'created_at','plumbing']; 
}