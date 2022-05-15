<?php

namespace App\Traits;

use DateTime;
use DateTimeZone;

trait FormatDate {

    public function getFormattedDate(string $type = 'created_at') {
        $timezone = new DateTimeZone('Europe/Brussels');
        $datetime = new Datetime($this->created_at, $timezone);

        if ($type != 'created_at') {
            $datetime = new Datetime($this->$type, $timezone);
        }

        if (\App::currentLocale() == 'fr') {
            $formatted = $datetime->format('d F Y à H\hi');
            $formatted = $this->translateMonthsInFrench($formatted);
        } else {
            $formatted = $datetime->format('F d, Y \a\t H:i');
        }

        return $formatted;
    }

    private function translateMonthsInFrench(String $date){
        $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $frenchMonths = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
        return str_replace($englishMonths, $frenchMonths, $date);
    }

}
