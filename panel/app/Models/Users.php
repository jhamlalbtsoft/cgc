<?php
namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';       // Table name
    protected $primaryKey       = 'UserId';     // Primary Key
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';      // Return results as array
    protected $useSoftDeletes   = false;        // No soft delete field present

    protected $allowedFields    = [
        'UserTypeId',
        'LoginName',
        'Password',
        'AdminStatus',
        'CreatedBy',
        'UpdateBy',
        'CreationDate',
        'UpdationDate',
        'DeletedStatus',
        'first_name',
        'last_name',
        'email',
        'reset_password_code',
        'reset_password_code_until',
        'TraderTypeId',
        'InstituteId'
    ];

    // Timestamps (disable, since you have custom datetime columns)
    protected $useTimestamps = false;

    // Optional Validation Rules (if you want)
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
}
