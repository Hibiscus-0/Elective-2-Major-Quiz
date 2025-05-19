<?php 
namespace App\Models;
use CodeIgniter\Model;

class StudentRecordModel extends Model
{
    protected $table = 'student_records';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'StudentID',
        'FirstName',
        'LastName',
        'Year',
        'Section',
        'PROJMAN',
        'SOFTENG2',
        'ELECTIVE2',
        'NETCOM',
        'PROLANG'
    ];
}
?>