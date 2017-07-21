<?php

function textlimit($string_text,$number_limit){
    $tmp = ((strlen($string_text) > $number_limit)) ? (substr($string_text,0,$number_limit - 4) . " ...") : $string_text;
    return $tmp;
}

function climiter($str,$n = 500,$end_char = '...'){
    $len = strlen(trim($str)); //length of original string
    if(strlen($str) < $n){
        return $str;
    }
    $str = preg_replace("/\s+/",' ',preg_replace("/(\r\n|\r|\n)/"," ",$str));
    if(strlen($str) <= $n){
        return $str;
    }
    $out = "";
    foreach(explode(' ',trim($str)) as $val){
        $out .= $val . ' ';
        if(strlen(trim($out)) == $len){ 
            return trim($out);
        }elseif(strlen($out) >= $n){
            return trim($out) . $end_char;
        }
    }
}

function cleanHTML($htmltext){
    $patt = array('@<script[^>]*?>.*?</script>@si','@<[\\/\\!]*?[^<>]*?>@si','@<style[^>]*?>.*?</style>@siU','@<![\\s\\S]*?--[ \\t\\n\\r]*>@');
    $text = preg_replace($patt,'',$htmltext);

    $char = array('\'','\"');
    $replace_char = str_replace($char,'',html_entity_decode($text));
    $out = preg_replace('/[^A-Za-z0-9]/',' ',$replace_char);

    $strout = trim($out);

    return $strout;
}

function cleanWords($str){    
    $filter = strip_tags(stripslashes($str),'<em>');
    $output = trim(preg_replace("/[^a-zA-Z0-9 \.\(\,\)\:\'\/\<\>\#\@\|\?\!\%\&\*\-]/", "", $filter));
    return $output;
}


function newsStandFilter($input,$alt){
    $article_content = preg_replace('/data:image([^"]*)/'," ",$input);
    $first = preg_replace('/\<[\/]{0,1}div[^\>]*\>/i','<br />',$article_content);
    $second = str_replace('/\<img [^>]*src=\"([^\"]+)\"[^>]*>/','/<figure><img [^>]*src=\"([^\"]+)\"[^>]*><\/figure>/',$first);
    $third = str_replace('<iframe','<figure><center><iframe',$second);
    $fourth = str_replace('iframe>','iframe></center></figure>',$third);
    $five = str_replace('alt=""','alt="' . cleanHTML($alt) . '"',$fourth);
    $six = str_replace('&nbsp;','',$five);

    $explode_content = explode('<br />',$six);
    $filteredarray = array_values(array_filter($explode_content,create_function('$a','return preg_match("#\S#", $a);')));

    $combine = implode('</p><p>',$filteredarray);
    return $combine;
}

function contentFilter($input,$alt){
    $article_content = trim(preg_replace('/data:image([^"]*)/'," ",$input));
    //$first = str_replace('<p>','',$article_content);
    $second = trim(str_replace('<br />','<br>',$article_content));
    $thirdA = trim(str_replace('<br><br><br>','<br>',$second));
    $thirdB = trim(str_replace('<br><br><br>','<br><br>',$thirdA));
    //$third = str_replace("</p>","<br>",$second);
    //$four = trim(preg_replace('/(<?)[ ]?target="_blank"(.*?)/','',$second));
    //$five = trim(preg_replace('/\<[\/]{0,1}div[^\>]*\>/i','<br>',$second));
    $six = trim(str_replace('<iframe','<div class="v-youtube"><iframe',$thirdB));
    $seven = trim(str_replace('iframe>','iframe></div>',$six));
    $eight = trim(str_replace('alt=""','alt="' . cleanHTML($alt) . '"',$seven));
    //$msword_remove = trim(preg_replace('/<!--\[if[^\]]*]>.*?<!\[endif\]-->/i', '', $eight));
    //$style_remove = trim(preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $msword_remove));
    $output = trim(stripslashes($eight));

    return $output;
}

function ampFilter($input,$alt){
    $article_content = trim(preg_replace('/data:image([^"]*)/'," ",$input));
    $first = preg_replace('/<img (.*?)>/','<amp-img layout="responsive" $1></amp-img>',$article_content);
    $second = trim(str_replace('<br />','<br>',$first));
    $thirdA = trim(str_replace('<br><br><br>','<br>',$second));
    $thirdB = trim(str_replace('<br><br><br>','<br><br>',$thirdA));
    $four = trim(preg_replace('/(<?)[ ]?target="_blank"(.*?)/','',$thirdB));
    $five = trim(preg_replace('/\<[\/]{0,1}div[^\>]*\>/i','<br>',$four));
    $six = trim(str_replace('<iframe','<div class="v-youtube"><iframe',$five));
    $seven = trim(str_replace('iframe>','iframe></div>',$six));
    $eight = trim(str_replace('alt=""','alt="' . cleanHTML($alt) . '"',$seven));
    $msword_remove = trim(preg_replace('/<!--\[if[^\]]*]>.*?<!\[endif\]-->/i', '', $eight));
    $style_remove = trim(preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $msword_remove));
    $output = trim(stripslashes($style_remove));

    return $output;
}

function clearMeta($str){
    $char = array('-');
    $out = str_replace($char,'',cleanHTML($str));
    $output = preg_replace("/[^0-9a-zA-Z-]/",',',$out);

    return $output;
}

function clearDesc($str){
    $start = strip_tags($str);
    $string = preg_replace("/[^A-Za-z]/"," ",$start);

    $char = array('\'','"');
    $a = str_replace($char,'',$string);
    $b = climiter($a,160,'.');

    $output = trim($b);

    return $output;
}

function seo_title($text){
    $str = strip_tags(cleanWords($text));
    if(strlen($str) > 60){
        $title = climiter($str,50,'...');
    }else{
        $title = $str;
    }

    return trim($title);
}

function seo_description($text){
    $str = strip_tags(cleanWords($text));
    if(strlen($str) > 160){
        $title = climiter($str,150,'...');
    }else{
        $title = $str;
    }

    return trim($title);
}

function seo_keywords($string,$numWords = 2,$limit = 3){
    // make case-insensitive
    $string = xwords($string);

    // get all words. Assume any 1 or more letter, number or ' in a row is a word 
    preg_match_all('~[a-z\']+~',$string,$words);
    $words = $words[0];
    //$words = array_diff($words,$xwords);
    //$words = array_filter($words);
    // foreach word...
    foreach($words as $k => $v){
        // remove single quotes that are by themselves or wrapped around the word
        $words[$k] = trim($words[$k],"'");
    } // end foreach $words
    // remove any empty elements produced from ' trimming
    $words = array_filter($words);
    // reset array keys
    $words = array_values($words);
    // foreach word...  	
    foreach($words as $k => $word){
        // if there are enough words after the current word to make a $numWords length phrase... 
        if(isset($words[$k + $numWords])){
            // add the phrase to list of phrases
            $phrases[] = implode(' ',array_slice($words,$k,$numWords));
        } // end if isset
    } // end foreach $words
    // create an array of phrases => count
    $x = array_count_values($phrases);
    // reverse sort it (preserving keys, since the keys are the phrases
    arsort($x);
    // if limit is specified, return only $limit phrases. otherwise, return all of them
    $a = ($limit > 0) ? array_slice($x,0,$limit) : $x;
    $b = array_keys($a);
    $c = implode(',',$b);

    return $c;
}

function xDebug($str){
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

function xwords($string){
    $xwords = array(
        'pt','rp','juta','milyar','ada','adalah','adanya','adapun','agak','agaknya','agar','akan','akankah','akhir','akhiri',
        'akhirnya','aku','akulah','amat','amatlah','anda','andalah','antar','antara','antaranya','apa',
        'apaan','apabila','apakah','apalagi','apatah','artinya','asal','asalkan','atas','atau','ataukah',
        'ataupun','awal','awalnya','bagai','bagaikan','bagaimana','bagaimanakah','bagaimanapun','bagi',
        'bagian','bahkan','bahwa','bahwasanya','baik','bakal','bakalan','balik','banyak','bapak','baru',
        'bawah','beberapa','begini','beginian','beginikah','beginilah','begitu','begitukah','begitulah',
        'begitupun','bekerja','belakang','belakangan','belum','belumlah','benar','benarkah','benarlah',
        'berada','berakhir','berakhirlah','berakhirnya','berapa','berapakah','berapalah','berapapun',
        'berarti','berawal','berbagai','berdatangan','beri','berikan','berikut','berikutnya','berjumlah',
        'berkali-kali','berkata','berkehendak','berkeinginan','berkenaan','berlainan','berlalu',
        'berlangsung','berlebihan','bermacam','bermacam-macam','bermaksud','bermula','bersama',
        'bersama-sama','bersiap','bersiap-siap','bertanya','bertanya-tanya','berturut','berturut-turut',
        'bertutur','berujar','berupa','besar','betul','betulkah','biasa','biasanya','bila','bilakah',
        'bisa','bisakah','boleh','bolehkah','bolehlah','buat','bukan','bukankah','bukanlah','bukannya',
        'bulan','bung','cara','caranya','cukup','cukupkah','cukuplah','cuma','dahulu','dalam','dan','dapat',
        'dari','daripada','datang','dekat','demi','demikian','demikianlah','dengan','depan','di','dia',
        'diakhiri','diakhirinya','dialah','diantara','diantaranya','diberi','diberikan','diberikannya',
        'dibuat','dibuatnya','didapat','didatangkan','digunakan','diibaratkan','diibaratkannya','diingat',
        'diingatkan','diinginkan','dijawab','dijelaskan','dijelaskannya','dikarenakan','dikatakan',
        'dikatakannya','dikerjakan','diketahui','diketahuinya','dikira','dilakukan','dilalui','dilihat',
        'dimaksud','dimaksudkan','dimaksudkannya','dimaksudnya','diminta','dimintai','dimisalkan',
        'dimulai','dimulailah','dimulainya','dimungkinkan','dini','dipastikan','diperbuat','diperbuatnya',
        'dipergunakan','diperkirakan','diperlihatkan','diperlukan','diperlukannya','dipersoalkan',
        'dipertanyakan','dipunyai','diri','dirinya','disampaikan','disebut','disebutkan','disebutkannya',
        'disini','disinilah','ditambahkan','ditandaskan','ditanya','ditanyai','ditanyakan','ditegaskan',
        'ditujukan','ditunjuk','ditunjuki','ditunjukkan','ditunjukkannya','ditunjuknya','dituturkan',
        'dituturkannya','diucapkan','diucapkannya','diungkapkan','dong','dua','dulu','empat','enggak',
        'enggaknya','entah','entahlah','guna','gunakan','hal','hampir','hanya','hanyalah','hari',
        'harus','haruslah','harusnya','hendak','hendaklah','hendaknya','hingga','ia','ialah',
        'ibarat','ibaratkan','ibaratnya','ibu','ikut','ingat','ingat-ingat','ingin','inginkah',
        'inginkan','ini','inikah','inilah','itu','itukah','itulah','jadi','jadilah','jadinya','jangan',
        'jangankan','janganlah','jauh','jawab','jawaban','jawabnya','jelas','jelaskan','jelaslah',
        'jelasnya','jika','jikalau','juga','jumlah','jumlahnya','justru','kala','kalau','kalaulah',
        'kalaupun','kalian','kami','kamilah','kamu','kamulah','kan','kapan','kapankah','kapanpun',
        'karena','karenanya','kasus','kata','katakan','katakanlah','katanya','ke','keadaan','kebetulan',
        'kecil','kedua','keduanya','keinginan','kelamaan','kelihatan','kelihatannya','kelima','keluar',
        'kembali','kemudian','kemungkinan','kemungkinannya','kenapa','kepada','kepadanya','kesampaian',
        'keseluruhan','keseluruhannya','keterlaluan','ketika','khususnya','kini','kinilah','kira',
        'kira-kira','kiranya','kita','kitalah','kok','kurang','lagi','lagian','lah','lain','lainnya',
        'lalu','lama','lamanya','lanjut','lanjutnya','lebih','lewat','lima','luar','macam','maka',
        'makanya','makin','malah','malahan','mampu','mampukah','mana','manakala','manalagi','masa',
        'masalah','masalahnya','masih','masihkah','masing','masing-masing','mau','maupun','melainkan',
        'melakukan','melalui','melihat','melihatnya','memang','memastikan','memberi','memberikan',
        'membuat','memerlukan','memihak','meminta','memintakan','memisalkan','memperbuat','mempergunakan',
        'memperkirakan','memperlihatkan','mempersiapkan','mempersoalkan','mempertanyakan','mempunyai',
        'memulai','memungkinkan','menaiki','menambahkan','menandaskan','menanti','menanti-nanti',
        'menantikan','menanya','menanyai','menanyakan','mendapat','mendapatkan','mendatang',
        'mendatangi','mendatangkan','menegaskan','mengakhiri','mengapa','mengatakan','mengatakannya',
        'mengenai','mengerjakan','mengetahui','menggunakan','menghendaki','mengibaratkan','mengibaratkannya',
        'mengingat','mengingatkan','menginginkan','mengira','mengucapkan','mengucapkannya','mengungkapkan',
        'menjadi','menjawab','menjelaskan','menuju','menunjuk','menunjuki','menunjukkan','menunjuknya',
        'menurut','menuturkan','menyampaikan','menyangkut','menyatakan','menyebutkan','menyeluruh',
        'menyiapkan','merasa','mereka','merekalah','merupakan','meski','meskipun','meyakini','meyakinkan',
        'minta','mirip','misal','misalkan','misalnya','mula','mulai','mulailah','mulanya','mungkin',
        'mungkinkah','nah','naik','namun','nanti','nantinya','nyaris','nyatanya','oleh','olehnya','pada',
        'padahal','padanya','pak','paling','panjang','pantas','para','pasti','pastilah','penting',
        'pentingnya','per','percuma','perlu','perlukah','perlunya','pernah','persoalan','pertama',
        'pertama-tama','pertanyaan','pertanyakan','pihak','pihaknya','pukul','pula','pun','punya','rasa',
        'rasanya','rata','rupanya','saat','saatnya','saja','sajalah','saling','sama','sama-sama','sambil',
        'sampai','sampai-sampai','sampaikan','sana','sangat','sangatlah','satu','saya','sayalah','se',
        'sebab','sebabnya','sebagai','sebagaimana','sebagainya','sebagian','sebaik','sebaik-baiknya',
        'sebaiknya','sebaliknya','sebanyak','sebegini','sebegitu','sebelum','sebelumnya','sebenarnya',
        'seberapa','sebesar','sebetulnya','sebisanya','sebuah','sebut','sebutlah','sebutnya','secara',
        'secukupnya','sedang','sedangkan','sedemikian','sedikit','sedikitnya','seenaknya','segala',
        'segalanya','segera','seharusnya','sehingga','seingat','sejak','sejauh','sejenak','sejumlah',
        'sekadar','sekadarnya','sekali','sekali-kali','sekalian','sekaligus','sekalipun','sekarang',
        'sekarang','sekecil','seketika','sekiranya','sekitar','sekitarnya','sekurang-kurangnya',
        'sekurangnya','sela','selain','selaku','selalu','selama','selama-lamanya','selamanya','selanjutnya',
        'seluruh','seluruhnya','semacam','semakin','semampu','semampunya','semasa','semasih','semata',
        'semata-mata','semaunya','sementara','semisal','semisalnya','sempat','semua','semuanya','semula',
        'sendiri','sendirian','sendirinya','seolah','seolah-olah','seorang','sepanjang','sepantasnya',
        'sepantasnyalah','seperlunya','seperti','sepertinya','sepihak','sering','seringnya','serta',
        'serupa','sesaat','sesama','sesampai','sesegera','sesekali','seseorang','sesuatu','sesuatunya',
        'sesudah','sesudahnya','setelah','setempat','setengah','seterusnya','setiap','setiba','setibanya',
        'setidak-tidaknya','setidaknya','setinggi','seusai','sewaktu','siap','siapa','siapakah',
        'siapapun','sini','sinilah','soal','soalnya','suatu','sudah','sudahkah','sudahlah','supaya',
        'tadi','tadinya','tahu','tahun','tak','tambah','tambahnya','tampak','tampaknya','tandas',
        'tandasnya','tanpa','tanya','tanyakan','tanyanya','tapi','tegas','tegasnya','telah','tempat',
        'tengah','tentang','tentu','tentulah','tentunya','tepat','terakhir','terasa','terbanyak',
        'terdahulu','terdapat','terdiri','terhadap','terhadapnya','teringat','teringat-ingat','terjadi',
        'terjadilah','terjadinya','terkira','terlalu','terlebih','terlihat','termasuk','ternyata',
        'tersampaikan','tersebut','tersebutlah','tertentu','tertuju','terus','terutama','tetap',
        'tetapi','tiap','tiba','tiba-tiba','tidak','tidakkah','tidaklah','tiga','tinggi','toh',
        'tunjuk','turut','tutur','tuturnya','ucap','ucapnya','ujar','ujarnya','umum','umumnya',
        'ungkap','ungkapnya','untuk','usah','usai','waduh','wah','dan','atau','tetapi','tapi',
        'akantetapi','jika','kalau','karena','walau','walaupun','juga','jadi','maka','sehingga',
        'supaya','agar','hanya','lagi','lagipula','lalu','sambil','melainkan','namun','padahal',
        'sedangkan','demi','untuk','apabila','bilamana','sebab','sebabitu','karenaitu','bilamana',
        'asalkan','meskipun','biarpun','biar','seperti','daripada','bahkan','apalagi','yakni','adalah',
        'yaitu','ialah','bahwa','bahwasannya','kecuali','selain','misalnya','untukituwahai','waktu',
        'waktunya','walau','walaupun','wong','yaitu','yakin','yakni','yang','saya','kami','mereka',
        'kamu','anda','kita','aku','dia','kalian','engkau','kau'
    );

    $stepone = strtolower($string);
    $steptwo = strip_tags($stepone);
    $stepthree = preg_replace('/[^A-Za-z0-9?! ]/','',$steptwo);
    $explode = explode(' ',$stepthree);
    $compare = array_filter(array_diff($explode,$xwords));
    $implode = implode(' ',$compare);

    return $implode;
}