<?php
namespace App\Libraries;

class YearGetter
{
    public function getFullYear($year)
    {
        switch ($year) {
            case '1':
                return '1st';
            case '2':
                return '2nd';
            case '3':
                return '3rd';
            case '4':
                return '4th';
            default:
                return 'Unknown';
        }
    }
}
?>