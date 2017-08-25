<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['dashboard'] = 'dashboard';
$route['logout'] = 'login/logout';

$route['kandidat'] = 'kandidat/list_kandidat';
$route['kandidat-add'] = 'kandidat/add_kandidat';
$route['view/(.*)'] = 'kandidat/view_all_kandidat/index/$1';
$route['create-pdf-list'] = 'kandidat/list_kandidat/create_pdf';
$route['delete-kandidat/(.*)'] = "kandidat/list_kandidat/delete_kandidat/index/$1";
$route['kandidat-edit/(.*)'] = "kandidat/view_all_kandidat/edit_data_Pribadi/index/$1";

$route['admin'] = 'admin/admin';
$route['menu-add'] = 'admin/add_menu';
$route['group-add'] = 'admin/add_group';
$route['change-password'] = 'admin/ganti_password';
$route['group-menu'] = 'admin/admin_akses_menu';
$route['group-menu-set/(.*)'] = 'admin/admin_akses_set/index/$1';
$route['delete-menu-set/(.*)'] = 'admin/admin_akses_set/delete_menu_set/index/$1';

$route['new-entry'] = 'modul/buku_tahunan';
$route['caller'] = 'kandidat/caller';
$route['caller-history/(.*)'] = 'kandidat/caller/caller_history/index/$1';
$route['filter'] = 'kandidat/caller/filter';
$route['interviewer'] = 'kandidat/interviewer';
$route['psikotes'] = 'kandidat/psikotes';
$route['view-jadwal/(.*)'] = 'kandidat/interviewer/lihat_jadwal/index/$1';

$route['delete-pass-foto/(.*)'] = "kandidat/view_all_kandidat/delete_pass_foto/index/$1";
$route['delete-cv/(.*)'] = "kandidat/view_all_kandidat/delete_cv/index/$1";
$route['delete-ktp/(.*)'] = "kandidat/view_all_kandidat/delete_ktp/index/$1";
$route['delete-lamaran/(.*)'] = "kandidat/view_all_kandidat/delete_lamaran/index/$1";
$route['delete-ijazah/(.*)'] = "kandidat/view_all_kandidat/delete_ijazah/index/$1";

/*ADMIN VIEW DELETE START*/
$route['delete-organisasi/(.*)'] = "kandidat/delete_view_kandidat/delete_view_organisasi/index/$1";
$route['delete-referensi/(.*)'] = "kandidat/delete_view_kandidat/delete_view_referensi/index/$1";
$route['delete-keluarga/(.*)'] = "kandidat/delete_view_kandidat/delete_view_keluarga/index/$1";
$route['delete-pendidikan/(.*)'] = "kandidat/delete_view_kandidat/delete_view_pendidikan/index/$1";
$route['delete-pengalaman/(.*)'] = "kandidat/delete_view_kandidat/delete_view_pengalaman/index/$1";
$route['delete-kemkomputer/(.*)'] = "kandidat/delete_view_kandidat/delete_view_kemkomputer/index/$1";
$route['delete-kembahasa/(.*)'] = "kandidat/delete_view_kandidat/delete_view_kembahasa/index/$1";
$route['delete-kursus/(.*)'] = "kandidat/delete_view_kandidat/delete_view_kursus/index/$1";
/*ADMIN VIEW DELETE END*/

/*MODUL ROUTES*/
$route['mod-interviewer'] = 'modul/interviewer';
$route['view-interviewer-performance/(.*)'] = 'modul/interviewer/detail_interviewer_performance/index/$1';
$route['mod-client'] = 'modul/client';
$route['mod-posisi'] = 'modul/posisi';
$route['mod-pipeline'] = 'modul/pipeline';
$route['mod-psikotes'] = 'modul/psikotes';

$route['mod-area'] = 'modul/area';
$route['mod-cabang'] = 'modul/cabang';

$route['mod-database'] = 'modul/hrd';
$route['mod-bidang-usaha'] = 'modul/bidang_usaha';
$route['mod-sorching'] = 'modul/sorching';
$route['typing-tes'] = 'modul/psikotes/typingtest';
$route['mod-psikotes-online/(.*)'] = 'modul/psikotes/modul_jawab_soal_psikotes';
$route['mod-psikotes-ist-online-sma/(.*)'] = 'modul/psikotes/modul_jawab_soal_ist_psikotes_sma';
$route['mod-psikotes-ist-online/(.*)'] = 'modul/psikotes/modul_jawab_soal_ist_psikotes';
$route['mod-psikotes-papi-online/(.*)'] = 'modul/psikotes/modul_jawab_soal_papi_psikotes';
$route['mod-soal-psikotes/(.*)'] = 'modul/psikotes/modul_soal_psikotes/index/$1';
$route['mod-addsoal-ist-psikotes/(.*)'] = 'modul/psikotes/add_ist_psikotes/index/$1';
$route['terimakasih'] = 'modul/psikotes/thankyoupage';
$route['instruksi-psikotes/(.*)'] = 'modul/psikotes/instruksi_ist/index/$1';
$route['lowongan'] = 'modul/lowongan';

$route['uploads'] = 'upload';
/*MODUL ROUTES END*/

/**/
$route['entry-data'] = 'kandidat/add_kandidat_public';
//$route['view-edit/(.*)'] = 'view_all_kandidat_/view_all_kandidat/index/$1';
$route['thanks-pages'] = 'kandidat/thankyou_page_kandidat_public';
/**/

$route['jobs'] = 'jobs/list_jobs';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*ADMIN LOG*/
$route['admin-log/(.*)'] = 'admin/admin/view_admin_detail/index/$1';
/*ADMIN LOG*/