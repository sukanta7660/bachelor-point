<?php

    function money($amount){
        return 'Tk '.number_format($amount, 2);
    }

    function money_c($amount){
        return number_format($amount, 2);
    }

    function money_abs($amount){
        $amount1 = abs($amount);
        return 'Tk '.number_format($amount1, 2);
    }

    function pub_date($date){
        if($date == ''){
            return '';
        }else{
            return date("d/m/Y", strtotime(str_replace("/", "-",  $date)));
        }
    }

    function get_month($date){
        if($date == ''){
            return '';
        }else{
            return date("m", strtotime(str_replace("/", "-",  $date)));
        }
    }

    function get_year($date){
        if($date == ''){
            return '';
        }else{
            return date("Y", strtotime(str_replace("/", "-",  $date)));
        }
    }

function pub_month($date){
    if($date == ''){
        return '';
    }else{
        return date("F, Y", strtotime(str_replace("/", "-",  $date)));
    }
}

    function invoice_n($numbers){
        return str_pad($numbers, 5, '0', STR_PAD_LEFT);
    }

     function ac_type($accountNumber){
         $strs = str_split($accountNumber,3);

         $output = '';
         foreach ($strs as $val){
             $output .= $val.'-';
         }

         return rtrim($output, "-");
     }

    function date_range($dateRange){
         $date_range = explode(' - ', $dateRange);
         $start_date = date("Y-m-d", strtotime(str_replace("/", "-",  $date_range[0])));
         $end_date = date("Y-m-d", strtotime(str_replace("/", "-",  $date_range[1])));

         return [$start_date, $end_date];
    }

    function date_time_range($dateRange){
        $date_range = explode(' - ', $dateRange);
        $start_date = date("Y-m-d H:i:s", strtotime(str_replace("/", "-",  $date_range[0]).' 00:00:00'));
        $end_date = date("Y-m-d H:i:s", strtotime(str_replace("/", "-",  $date_range[1]).' 23:59:59'));

        return [$start_date, $end_date];
    }

    function gn_date($month, $year){
        $dates = [];
        if($month != ''){

            $total_day = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            $st_date = date('Y-m-d', strtotime($year.'-'.$month.'-01'));
            $st_date = strtotime($st_date);

            for ($i = 1; $i <= $total_day; $i++){
                $dates[] = date('d/m/Y', $st_date);
                $st_date = strtotime('+1 day', $st_date);
            }
        }
        return $dates;
    }







if (! function_exists('db_date')) {
    function db_date($date){
        if($date == '' || $date == null){
            return null;
        }else{
            return date("Y-m-d", strtotime(str_replace("/", "-",  $date)));
        }
    }
}

function remain_time($date){

    $date_time = date("Y-m-d H:i:s", strtotime(str_replace("/", "-",  $date)));

    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $date_time);
    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', date('Y-m-d H:i:s'));

    $diff_in_days = $from->diffForHumans($to);

    return $diff_in_days;
}





function ck_file($disk, $path, $file_name)
{
    $exists = Storage::disk($disk)->exists($file_name);

    $file = $path.'/'.$file_name;

    if($exists){
        return asset($file);
    }else{
        return asset('public/no_img.jpg');
    }

}





function in_word($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words).' taka only.';
}


