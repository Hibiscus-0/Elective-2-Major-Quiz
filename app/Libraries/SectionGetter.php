<?php
namespace App\Libraries;

class SectionGetter
{
    public function getFullSection($section)
    {
        switch ($section) {
            case 'A':
                return 'ACSAD';
            case 'B':
                return 'BCSAD';
            case 'C':
                return 'CCSAD';
            case 'D':
                return 'DCSAD';
            default:
                return 'Unknown';
        }
    }
}
?>