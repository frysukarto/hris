<?php

function parseDateTime($date){
    $data = array();

    $int = preg_match("/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/",$date,$match);
    if(!$int){
        return false;
    }

    $data['year'] = $match[1];
    $data['month'] = $match[2];
    $data['day'] = $match[3];
    $data['hour'] = $match[4];
    $data['minute'] = $match[5];
    $data['second'] = $match[6];
    $data['day_of_week'] = date("N",mktime(0,0,0,intval($data['month']),intval($data['day']),intval($data['year'])));
    $data['month_ind_name'] = getIndMonth(intval($data['month']));
    $data['day_ind_name'] = getIndDay($data['day_of_week']);

    return $data;
}

function parseDateTimeIndex($date){
    /*
      param : yyyy-mm-dd hh:ii:ss
     */

    $int = preg_match("/(\d{4})-(\d{2})-(\d{2})/",$date,$match);
    if(!$int) return false;
    $data['year'] = $match[1];
    $data['month'] = $match[2];
    $data['day'] = $match[3];
    $data['day_of_week'] = date("N",mktime(0,0,0,intval($data['month']),intval($data['day']),intval($data['year'])));
    $data['month_ind_name'] = getIndMonth(intval($data['month']));
    $data['day_ind_name'] = getIndDay($data['day_of_week']);
    return $data;
}

function getIndDay($int = "1"){
    switch($int){
        case "7":
            $strDay = "Minggu";
            break;
        case "6":
            $strDay = "Sabtu";
            break;
        case "5":
            $strDay = "Jum'at";
            break;
        case "4":
            $strDay = "Kamis";
            break;
        case "3":
            $strDay = "Rabu";
            break;
        case "2":
            $strDay = "Selasa";
            break;
        case "1":
        default:
            $strDay = "Senin";
            break;
    }
    return $strDay;
}

function getIndMonth($int = 1){
    $data[1] = "Januari";
    $data[2] = "Februari";
    $data[3] = "Maret";
    $data[4] = "April";
    $data[5] = "Mei";
    $data[6] = "Juni";
    $data[7] = "Juli";
    $data[8] = "Agustus";
    $data[9] = "September";
    $data[10] = "Oktober";
    $data[11] = "November";
    $data[12] = "Desember";
    $intint = intval($int);
    if($intint <= 12 && $intint >= 1) return $data[$intint];
    else return false;
}

function getNowTime(){
    $waktu = date('Y-m-d H:i:s',time());
    return $waktu;
}

function formatingNowTime(){
    $waktu = getNowTime();
    return parseDateTime($waktu);
}

function getSimpleIndonesianDate($date = null){

    $waktu = (($date == null )) ? formatingNowTime() : parseDateTime($date);

    return $waktu['day_ind_name'] . ", " . $waktu['day'] . "/" . $waktu['month'] . "/" . $waktu['year'];
}

function getNowYear(){
    $waktu = date('Y',time());
    return $waktu;
}

//2009-07-10T11:53:50Z

function convertGMTdate($string_date,$plus_hour = 7){

    $tmp1 = explode("T",$string_date);
    $ymd = $tmp1[0];
    $tmp2 = explode("Z",$tmp1[1]);
    $hms = $tmp2[0];
    //$string_date2    =$ymd." ".$hms; 

    $ymd2 = explode("-",$ymd);
    $y = $ymd2[0];
    $Mo = $ymd2[1];
    $d = $ymd2[2];

    $hms2 = explode(":",$hms);
    $h = $hms2[0];
    $m = $hms2[1];
    $s = $hms2[2];

    //echo "string_date :".$string_date;

    $dateID = mktime($h + $plus_hour,$m,$s,$Mo,$d,$y);

    $string_date2 = date('Y-m-d H:i:s',$dateID);
    $result = parseDateTime($string_date2);
    //echo "<pre>";
    //print_r($result);
    //echo "</pre>";	
    return $result;
}

function convert_date_to_path($string_date,$delimiter = ''){
    //echo "string date".$string_date;
    $dateB = explode(" ",trim($string_date));
    $ymd = explode("-",$dateB[0]);
    $y = $ymd[0];
    $m = $ymd[1];
    $d = $ymd[2];
    return $y . $delimiter . $m . $delimiter . $d;
}

function time_difference($date){
    if(!empty($date)){
        $time = strtotime($date);
        $seconds = (int) (time() - $time);
        $how_many = null;
        $of_what = null;

        // less than 1 minute
        if($seconds <= 60){
            $how_many = "1";
            $of_what = "menit yang lalu";
            // between one minute and one hour
        }elseif($seconds > 60 && $seconds < 3600){
            $how_many = floor($seconds / 60);
            if($how_many == 1){
                $of_what = "menit yang lalu";
            }else{
                $of_what = "menit yang lalu";
            }
            // between one hour and 24 hours
        }elseif($seconds > 3600 && $seconds < 86400){
            $how_many = floor($seconds / 3600);
            if($how_many == 1){
                $of_what = "jam yang lalu";
            }else{
                $of_what = "jam yang lalu";
            }
            // between 1 day and 1 week (7 days)
        }elseif($seconds > 86400 && $seconds < 604800){
            $how_many = floor($seconds / 86400);
            if($how_many == 1){
                $of_what = "hari yang lalu";
            }else{
                $of_what = "hari yang lalu";
            }
            // betwen 1 week and 1 month approximately
            // taking there are 31,556,926 seconds in a year
            // divided by 12 months
        }elseif($seconds > 604800 && $seconds < 2629743){
            $how_many = floor($seconds / 604800);
            if($how_many == 1){
                $of_what = "minggu yang lalu";
            }else{
                $of_what = "minggu yang lalu";
            }
            // betwen 1 month and 1 year (24 months)
        }elseif($seconds > 2629743 && $seconds < 31556926){
            $how_many = floor($seconds / 2629743);
            if($how_many == 1){
                $of_what = "bulan yang lalu";
            }else{
                $of_what = "bulan yang lalu";
            }
            // from 1 year upwards
        }elseif($seconds > 31556926){
            $how_many = floor($seconds / 31556926);
            if($how_many == 1){
                $of_what = "tahun yang lalu";
            }else{
                $of_what = "tahun yang lalu";
            }
        }else{
            $how_many = '';
            $of_what = "beberapa waktu yang lalu";
        }

        return $how_many . ' ' . $of_what;
    }
}
function tanggalindo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $waktu = (($date == null )) ? formatingNowTime() : parseDateTime($date);
        
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
        //return $waktu['day_ind_name'] . ", ".$tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
	return $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
return($result);}

function indonesian_date ($timestamp = '', $date_format = 'l, j F Y', $suffix = '') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','September',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
} 
function indonesian_dates ($timestamp = '', $date_format = 'l, j F Y - H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','September',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
} 

