<?php

class Mkandidat extends CI_Model {

    function input_kandidat($nama_lengkap, $no_sim, $no_hp, $no_ktp, $no_tlp, $alamat, $agama, $suku, $kewarganegaraan, $tempat_lahir, $gender, $tempat_tinggal, $email, $gol_darah, $tinggi_badan, $berat_badan, $hobby, $pengalaman_memimpin,$tgl_lahir,$ktp_expired_date,$sim_expired_date,$pas_foto_file,$ktp_scan_file,$cv_file,$pendidikan_level,$lamaranfile,$ijazah_file,$age) {
       $time = date("Y-m-d");
       $sql = "INSERT INTO td_kandidat(nama_lengkap,no_sim,no_hp,no_ktp,no_tlp,alamat,agama,suku,kewarganegaraan,tempat_lahir,	create_time,gender, tempat_tinggal, email,gol_darah,tinggi_badan,berat_badan,hobby,pengalaman_memimpin,tgl_lahir,ktp_expired_date,sim_expired_date,pas_foto_file,ktp_scan_file,cv_file,status_kandidat,pendidikan_level,lamaran_file,ijazah_file,edit_caller_status,age)VALUES
       ('$nama_lengkap','$no_sim','$no_hp','$no_ktp','$no_tlp','$alamat','$agama','$suku','$kewarganegaraan','$tempat_lahir','$time','$gender','$tempat_tinggal','$email','$gol_darah','$tinggi_badan','$berat_badan','$hobby','$pengalaman_memimpin','".$tgl_lahir."','".$ktp_expired_date."','".$sim_expired_date."','$pas_foto_file','$ktp_scan_file','$cv_file','1','$pendidikan_level','$lamaranfile','$ijazah_file',0,$age)";
       $this->db->query($sql);
       return TRUE;
    }   
    
    function check_email_availablity()  {
        $email = $this->input->post('email');
        $query = $this->db->query('SELECT email FROM td_kandidat WHERE email = "'.$email.'"');      
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function check_ktp_availablity(){
        $ktp = $this->input->post('no_ktp');
        $query = $this->db->query('SELECT no_ktp FROM td_kandidat WHERE no_ktp = "'.$ktp.'"');      
        $data = array();
        if (
             $query !== FALSE && $query->num_rows() > 0) {
             $data = $query->result_array();
        }
        return $data;
    }
    
    
   
    
    function input_darurat_call($nama_lengkap_d, $no_telp_rumah_d, $no_hp_d, $hubungan_d, $alamat_d) {
        $id = $this->auto_id_kandidat();
        $juma = count($id);
        for($s = 0; $s < $juma; $s++) {
             $x = $id[$s]['AUTO_INCREMENT'];
        }
        $sql = "INSERT INTO td_darurat_call(id_kandidat,nama_lengkap_d,no_telp_rumah_d,no_hp_d,hubungan_d,alamat_d)VALUES('$x','$nama_lengkap_d','$no_telp_rumah_d','$no_hp_d','$hubungan_d','$alamat_d')";
        $this->db->query($sql);
        return TRUE;
    }

    function input_keterangan_lainnya($penyakit, $pidana, $gaji_diharapkan, $mulai_kerja, $orang_dalam, $kelemahan, $kelebihan, $id_kandidat,$ket_penyakit,$ket_kriminal,$ket_orangdalam) {
        $id = $this->auto_id_kandidat();
        $juma = count($id);
        for ($s = 0; $s < $juma; $s++) {
             $x = $id[$s]['AUTO_INCREMENT'];
        }
        $sql = "INSERT INTO td_keterangan_lain(penyakit,pidana,gaji_diharapkan,mulai_kerja,orang_dalam,kelemahan,kelebihan,id_kandidat,ket_penyakit,ket_kriminal,ket_orangdalam)VALUES('$penyakit','$pidana','$gaji_diharapkan','$mulai_kerja','$orang_dalam','$kelemahan','$kelebihan','$x','$ket_penyakit','$ket_kriminal','$ket_orangdalam')";
        $this->db->query($sql);
        return TRUE;
    }
    
    function input_organisasi($nama_organisasi, $jenis_organisasi, $tahun, $jabatan) {

        $data =$this->input->post('nama_organisasi');
        $count = count($data);
        $id = $this->auto_id_kandidat();
        $juma = count($id);
        for ($s = 0; $s < $juma; $s++) {
             $x = $id[$s]['AUTO_INCREMENT'];
        }
        
        for($i = 0; $i < $count; $i++){
                $da[]= array(
                    'nama_organisasi'=>$nama_organisasi[$i],
                    'jenis_organisasi'=>$jenis_organisasi[$i],
                    'tahun'=>date('Y-m-d', strtotime(strtr($tahun[$i], '/', '-'))),
                    'jabatan'=>$jabatan[$i],
                    'id_kandidat'=>$x);
        }
        $this->db->insert_batch('td_organisasi',  $da);      
    }  
    
    function input_posisi_penempatan($posisi, $prov, $kota) {
        $id = $this->auto_id_kandidat();
        $juma = count($id);
        for ($s = 0; $s < $juma; $s++) {
             $x = $id[$s]['AUTO_INCREMENT'];
        }
        $sql = "INSERT INTO td_kandidat_posisi_penempatan(posisi, provinsi_id, kota_id, id_kandidat)VALUES('$posisi', '$prov', '$kota','$x')";
        $this->db->query($sql);
        return TRUE;
    }
    
    function auto_id_kandidat() 
    {
        $sql = 'SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = "pasopati" AND TABLE_NAME = "td_kandidat" ';
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    
    function input_keluarga($nama_k,$gender_k,$usia_k,$pendidikan_k,$pekerjaan_k,$jenis_keluarga) {
        $data =$this->input->post('nama_k');
        $count = count($data);
        $id = $this->auto_id_kandidat();
        $juma = count($id);
        for ($s = 0; $s < $juma; $s++) {
             $x = $id[$s]['AUTO_INCREMENT'];
        }
        for($i = 0; $i<$count; $i++){
                $da[]= array(
                    'nama_k'=>$nama_k[$i],
                    'gender_k'=>$gender_k[$i],
                    'pendidikan_k'=>$pendidikan_k[$i],
                    'pekerjaan_k'=>$pekerjaan_k[$i],
                    'jenis_keluarga'=>$jenis_keluarga[$i],
                    'usia_k'=>$usia_k[$i],
                    'id_kandidat'=>$x);
        }
        $this->db->insert_batch('td_keluarga',$da);      
        }
        
        function input_pengelamankerja($nama_perusahaan,$alamat_perusahaan,$jabatan_terkahir,$gaji,$tahun_masuk,$tahun_keluar,$tugas_tanggung_jawab,$alasan_keluar) {
        $data =$this->input->post('nama_perusahaan');
        $count = count($data);
        
        $id = $this->auto_id_kandidat();
        $juma = count($id);
        for ($s = 0; $s < $juma; $s++) {
             $x = $id[$s]['AUTO_INCREMENT'];
        }
        for($i = 0; $i<$count; $i++){
            
                $da[]= array(
                    'nama_perusahaan'=>$nama_perusahaan[$i],
                    'alamat_perusahaan'=>$alamat_perusahaan[$i],
                    'jabatan_terkahir'=>$jabatan_terkahir[$i],
                    'gaji'=>$gaji[$i],
                    'tahun_masuk'=>date('Y-m-d', strtotime(strtr($tahun_masuk[$i], '/', '-'))),
                    'tahun_keluar'=>$tahun_keluar[$i] == "" ? "Sekarang" : date('Y-m-d', strtotime(strtr($tahun_keluar[$i], '/', '-'))),
                    'tugas_tanggung_jawab'=>$tugas_tanggung_jawab[$i],
                    'alasan_keluar'=>$alasan_keluar[$i],
                    'id_kandidat'=>$x);
        }
        //var_dump($tahun_keluar)."<br>";
        //var_dump($tahun_kel);
        //var_dump($da);
       
        $this->db->insert_batch('td_pengalaman_kerja',$da); 
                 
        }

        function input_referensikerja($nama_lengkap_ref,$perusahaan_ref,$hubungan_ref,$telp_ref,$alamat_ref,$informasi_dari) {
        $data =$this->input->post('nama_lengkap_ref');
        $count = count($data);
        $id = $this->auto_id_kandidat();
        $juma = count($id);
        for ($s = 0; $s < $juma; $s++) {
             $x = $id[$s]['AUTO_INCREMENT'];
        }
        for($i = 0; $i<$count; $i++){
                $da[]= array(
                    'nama_lengkap_ref'=>$nama_lengkap_ref[$i],
                    'perusahaan_ref'=>$perusahaan_ref[$i],
                    'hubungan_ref'=>$hubungan_ref[$i],
                    'telp_ref'=>$telp_ref[$i],
                    'alamat_ref'=>$alamat_ref[$i],
                    'informasi_dari'=>$informasi_dari[$i],
                    'id_kandidat'=>$x);
        }
       
        $this->db->insert_batch('td_referensi',$da);      
        }
        
    function input_pendidikan_formal($nama_sekolah,$tempat_sekolah,$tanggal_masuk,$tanggal_lulus,$tingkat_sekolah) {
    $id = $this->auto_id_kandidat();
    $juma = count($id);
    for ($s = 0; $s < $juma; $s++) {
         $x = $id[$s]['AUTO_INCREMENT'];
    }
    for($i = 0; $i<5; $i++){
            $da[]= array(
                'nama_sekolah'=>$nama_sekolah[$i],
                'tempat_sekolah'=>$tempat_sekolah[$i],
                'tanggal_masuk'=>date('Y-m-d', strtotime(strtr($tanggal_masuk[$i], '/', '-'))),
                'tanggal_lulus'=>date('Y-m-d', strtotime(strtr($tanggal_lulus[$i], '/', '-'))),
                'tingkat_sekolah'=>$tingkat_sekolah[$i],
                'id_kandidat'=>$x);
    }
    $this->db->insert_batch('td_pendidikan_formal',$da);      
    }
    
    function input_kursus($jenis_kursus,$tahun_kursus,$lama_kursus,$penyelenggara) {
    $id = $this->auto_id_kandidat();
    $juma = count($id);
    for ($s = 0; $s < $juma; $s++) {
         $x = $id[$s]['AUTO_INCREMENT'];
    }
    for($i = 0; $i<2; $i++){
            $da[]= array(
                'jenis_kursus'=>$jenis_kursus[$i],
                'tahun_kursus'=>date('Y-m-d', strtotime(strtr($tahun_kursus[$i], '/', '-'))),
                'lama_kursus'=>$lama_kursus[$i],
                'penyelenggara'=>$penyelenggara[$i],
                'id_kandidat'=>$x);
    }
     
    $this->db->insert_batch('td_kursus',$da);      
    }
     
    function input_bahasa_asing($bahasa,$membaca,$menulis,$berbicara,$mendengar) {
    $id = $this->auto_id_kandidat();
    $juma = count($id);
    for ($s = 0; $s < $juma; $s++) {
         $x = $id[$s]['AUTO_INCREMENT'];
    }
    for($i = 0; $i<2; $i++){
            $da[]= array(
                'bahasa'=>$bahasa[$i],
                'membaca'=>$membaca[$i],
                'menulis'=>$menulis[$i],
                'berbicara'=>$berbicara[$i],
                'mendengar'=>$mendengar[$i],
                'id_kandidat'=>$x);
    }
    $this->db->insert_batch('td_kemampuan_bahasa',$da);      
    }
    
    function input_kemampuan_komputer($level_skill,$jenis_program) {
    $id = $this->auto_id_kandidat();
    $juma = count($id);
    for ($s = 0; $s < $juma; $s++) {
         $x = $id[$s]['AUTO_INCREMENT'];
    }
    for($i = 0; $i<2; $i++){
            $da[]= array(
                'jenis_program'=>$jenis_program[$i],
                'level_skill'=>$level_skill[$i],
                'id_kandidat'=>$x);
    }
    $this->db->insert_batch('td_kemampuan_komputer',$da);      
    }
    
    function get_kandidat_username($username) {
        $sql = "SELECT username FROM td_kandidat WHERE username =".$username;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
        
    function get_kandidat_list() {
        $sql = "SELECT * FROM td_kandidat";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    

    function auto_id() {
        $sql = 'SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = "pasopati" AND TABLE_NAME = "td_kandidat" ';
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function delete_kandidat($kandidat_id) {
        $sql = "DELETE FROM td_kandidat WHERE id_kandidat = " . $kandidat_id;
        $this->db->query($sql);
        return TRUE;
    }
    
    
    /*DETAIL KANDIDAT*/
    function get_kandidat_list_byid($id) {
        $sql = "SELECT * FROM td_kandidat 
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
     function get_keterangan_lain_byid($id) {
        $sql = "SELECT * FROM td_keterangan_lain 
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_darurat_byid($id) {
        $sql = "SELECT * FROM td_darurat_call 
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
   function get_organisasi_byid($id) {
        $sql = "SELECT * FROM td_organisasi 
                WHERE id_kandidat = ".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_pengalaman_kerja_byid($id) {
        $sql = "SELECT * FROM td_pengalaman_kerja 
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_referensi_byid($id) {
        $sql = "SELECT * FROM td_referensi 
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_keluarga_byid($id) {
        $sql = "SELECT * FROM td_keluarga 
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
     function get_kemampuan_komputer_byid($id) {
        $sql = "SELECT * FROM td_kemampuan_komputer
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
     function get_kemampuan_bahasa_byid($id) {
        $sql = "SELECT * FROM td_kemampuan_bahasa
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
     function get_kursus_byid($id) {
        $sql = "SELECT * FROM td_kursus 
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
     function get_pendidikan_formal_byid($id) {
        $sql = "SELECT * FROM td_pendidikan_formal 
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    function get_posisi_penempatan($id) {
        $sql = "SELECT a.*,b.*,c.*,d.* FROM td_kandidat_posisi_penempatan AS a 
                INNER JOIN td_kandidat AS b ON a.id_kandidat = b.id_kandidat
                INNER JOIN master_area AS c ON a.id_area = c.id_area
                INNER JOIN master_cabang AS d ON a.id_cabang = d.id_cabang 
                WHERE b.id_kandidat = ".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_hasil_psikotes_byid($id) {
        $sql = "SELECT * FROM td_modul_psikotes_result 
                WHERE id_kandidat =".$id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function get_sorching()
    {
        $sql = "SELECT * FROM td_modul_sorching_setting";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
        
    }
    /*DETAIL KANDIDAT END*/
    
    /*UPDATE KANDIDAT START*/
    function update_pass_foto_kandidat($pass_foto,$id_kandidat) {
        $sql = "UPDATE td_kandidat SET pas_foto_file = '$pass_foto' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
    function delete_pass_foto_kandidat($id_kandidat) {
        $sql = "UPDATE td_kandidat SET pas_foto_file = '' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
    
    function update_cv_kandidat($cv,$id_kandidat) {
        $sql = "UPDATE td_kandidat SET cv_file = '$cv' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
    function delete_cv_kandidat($id_kandidat) {
        $sql = "UPDATE td_kandidat SET cv_file = '' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
    function update_ktp_scan_kandidat($ktp,$id_kandidat) {
        $sql = "UPDATE td_kandidat SET ktp_scan_file = '$ktp' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
     function delete_ktp_scan_kandidat($id_kandidat) {
        $sql = "UPDATE td_kandidat SET ktp_scan_file = '' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
    function update_lamaran_kandidat($lamaran_file,$id_kandidat) {
        $sql = "UPDATE td_kandidat SET lamaran_file = '$lamaran_file' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
     function delete_lamaran_kandidat($id_kandidat) {
        $sql = "UPDATE td_kandidat SET lamaran_file = '' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
    function update_ijazah_kandidat($ijazah,$id_kandidat) {
        $sql = "UPDATE td_kandidat SET ijazah_file = '$ijazah' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
     function delete_ijazah_kandidat($id_kandidat) {
        $sql = "UPDATE td_kandidat SET ijazah_file = '' WHERE id_kandidat =".$id_kandidat;
        $this->db->query($sql);
        $this->db->close();
        return TRUE;
    }
    /*UPDATE KANDIDAT END*/
    
    /*KANDIDAT PRINT START*/
     function export_kandidat_list_by_date($date1 ,$date2) {
        $sql = "SELECT * FROM td_kandidat WHERE create_time >= '$date1' AND create_time <= '$date2' ORDER BY create_time DESC";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    /*KANDIDAT PRINT START END*/
    
    /*KANDIDAT VIEW DELETE START*/
    function delete_view_organisasi($id_organisasi) {
        $sql = "DELETE FROM td_organisasi WHERE id_organisasi =".$id_organisasi;
        $this->db->query($sql);
        return TRUE;
    }
    function delete_view_referensi($id_referensi) {
        $sql = "DELETE FROM td_referensi WHERE id_referensi =".$id_referensi;
        $this->db->query($sql);
        return TRUE;
    }
    function delete_view_keluarga($id_keluarga) {
        $sql = "DELETE FROM td_keluarga WHERE id_keluarga =".$id_keluarga;
        $this->db->query($sql);
        return TRUE;
    }
    function delete_view_pendidikan($id_pendidikan_formal) {
        $sql = "DELETE FROM td_pendidikan_formal WHERE id_pendidikan_formal =".$id_pendidikan_formal;
        $this->db->query($sql);
        return TRUE;
    }
    function delete_view_pengalaman($id_pengalaman_kerja) {
        $sql = "DELETE FROM td_pengalaman_kerja WHERE id_pengalaman_kerja =".$id_pengalaman_kerja;
        $this->db->query($sql);
        return TRUE;
    }
    function delete_view_kemkomputer($id_kemampuan_komputer) {
        $sql = "DELETE FROM td_kemampuan_komputer WHERE id_kemampuan_komputer =".$id_kemampuan_komputer;
        $this->db->query($sql);
        return TRUE;
    }
    function delete_view_kembahasa($id_kemampuan_bahasa) {
        $sql = "DELETE FROM td_kemampuan_bahasa WHERE id_kemampuan_bahasa =".$id_kemampuan_bahasa;
        $this->db->query($sql);
        return TRUE;
    }function delete_view_kursus($id_kursus) {
        $sql = "DELETE FROM td_kursus WHERE id_kursus =".$id_kursus;
        $this->db->query($sql);
        return TRUE;
    }
    
    /*KANDIDAT VIEW DELETE END*/
    
    /*CLEAN EMPTY DATA*/
    function delete_empty_pendidikan() {
        $sql = "DELETE FROM td_pendidikan_formal WHERE nama_sekolah IS NULL OR nama_sekolah ='' ";
        $this->db->query($sql);
        return TRUE;
    }
    function delete_empty_pengalaman_kerja() {
        $sql = "DELETE FROM td_pengalaman_kerja WHERE nama_perusahaan IS NULL OR nama_perusahaan ='' ";
        $this->db->query($sql);
        return TRUE;
    }
    function delete_empty_keluarga() {
        $sql = "DELETE FROM td_keluarga WHERE nama_k IS NULL OR nama_k ='' ";
        $this->db->query($sql);
        return TRUE;
    }
    function delete_empty_kemampuan_bahasa() {
        $sql = "DELETE FROM td_kemampuan_bahasa WHERE bahasa IS NULL OR bahasa ='' ";
        $this->db->query($sql);
        return TRUE;
    }
    function delete_empty_kemampuan_komputer() {
        $sql = "DELETE FROM td_kemampuan_komputer WHERE jenis_program IS NULL OR jenis_program ='' ";
        $this->db->query($sql);
        return TRUE;
    }
    function delete_empty_kursus() {
        $sql = "DELETE FROM td_kursus WHERE jenis_kursus IS NULL OR jenis_kursus ='' ";
        $this->db->query($sql);
        return TRUE;
    }
    function delete_empty_organisasi() {
        $sql = "DELETE FROM td_organisasi WHERE nama_organisasi IS NULL OR nama_organisasi ='' ";
        $this->db->query($sql);
        return TRUE;
    }
    function delete_empty_referensi() {
        $sql = "DELETE FROM td_referensi WHERE nama_lengkap_ref IS NULL OR nama_lengkap_ref ='' ";
        $this->db->query($sql);
        return TRUE;
    }
    
    /*CLEAN EMPTY DATA END*/
    
    
   /*AJAX PROV/DAERAH DROPDOWN*/
    
    function cms_list_prov() {
        $sql = "SELECT provinsi_id,provinsi_nama FROM
                       master_provinsi ORDER BY provinsi_id ASC";
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }

    function cms_list_kokab($prov_id) {
        $sql = "SELECT kota_id, kokab_nama FROM master_kokab WHERE provinsi_id =".$prov_id;
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function cms_list_all_kokab() {
        $sql = "SELECT kota_id, kokab_nama FROM master_kokab ORDER BY kota_id ASC";
       $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
    
    function cms_list_subcat($parent_id) {
        $sql = "SELECT a.*, b.* FROM td_sub_cat AS a INNER JOIN td_par_cat AS b ON b.par_cat_id = a.par_cat_id WHERE a.par_cat_id =$parent_id";  
        $query = $this->db->query($sql);
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        return $data;
    }
   /*AJAX PROV DAERAH END*/
}