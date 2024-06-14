<?php
namespace App\Models;

use CodeIgniter\Model;

class MappingStatusOrderModel extends Model
{
    protected $table = 'mapping_status';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'keterangan'];
}
