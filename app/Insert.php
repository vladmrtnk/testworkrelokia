<?php

namespace App;

class Insert
{
    public static function InsertTitlesToFile($titles = [])
    {

        $fp = fopen('public/base.csv', 'w');

        fputcsv($fp, $titles);

        fclose($fp);
    }

    public static function InsertValuesToFile($values = [])
    {

        $fp = fopen('public/base.csv', 'a');

        fputcsv($fp, $values);

        fclose($fp);
    }
}