<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'LoginController::index');
$routes->get('/register', 'RegisterController::index');
$routes->get('/aktivasyon', 'RegisterController::aktivasyon');
$routes->post('/aktivasyon/kontrol', 'RegisterController::kontrolAktivasyonKodu');
$routes->get('/anasayfa', 'DashboardController::index', ['filter' => ['auth', 'role']]);
$routes->post('/save', 'RegisterController::save');
$routes->post('/auth', 'LoginController::auth');
$routes->get('/logout', 'LogoutController::index');
$routes->get('/register/aktivasyonTekrarGonder/(:any)', 'RegisterController::aktivasyonTekrarGonder/$1');
$routes->get('/sifre_sifirla', 'SifremiUnuttumController::sifre_sifirla');
$routes->match(['get', 'post'], '/yeni_sifre/(:any)', 'SifremiUnuttumController::yeni_sifre/$1');
$routes->post('/sifremi_unuttum', 'SifremiUnuttumController::index');
$routes->get('/sifremi_unuttum', 'SifremiUnuttumController::index');

// Aidatlar routes
$routes->get('aidatlar', 'AidatlarController::index', ['filter' =>['auth','role']] );
$routes->post('aidatlar/store', 'AidatlarController::store');
$routes->get('aidatlar/edit/(:num)', 'AidatlarController::edit/$1');
$routes->get('aidatlar/delete/(:num)', 'AidatlarController::delete/$1');
$routes->post('aidatlar/update', 'AidatlarController::update');



// Giderler Routes
$routes->get('giderler', 'GiderlerController::index',  ['filter' =>['auth','role']]);
$routes->post('giderler/store', 'GiderlerController::store');
$routes->get('giderler/edit/(:num)', 'GiderlerController::edit/$1');
$routes->get('giderler/delete/(:num)', 'GiderlerController::delete/$1');
$routes->post('giderler/update', 'GiderlerController::update');

//giderler excel
$routes->get('excelForm', 'GiderlerController::excelForm');
$routes->post('excelUpload', 'GiderlerController::excelUpload');
$routes->get('download_template_excel','GiderlerController::download_template_excel');
//giderler kategori
$routes->post('giderler/kategori','GiderlerController::kategoriEkle');
$routes->get('giderler/giderkategorisil/(:num)','GiderlerController::giderKategoriSil/$1');



// Kasa Routes
$routes->get('kasa', 'KasaController::index',  ['filter' =>['auth','role']]);
$routes->post('kasa/store', 'KasaController::store');
$routes->get('kasa/edit/(:num)', 'KasaController::edit/$1');
$routes->get('kasa/delete/(:num)', 'KasaController::delete/$1');
$routes->post('kasa/update', 'KasaController::update');

// CrudTables Routes
$routes->get('hesaplar', 'HesaplarController::index',  ['filter' =>['auth','role']]);
$routes->post('hesaplar/store', 'HesaplarController::store');
$routes->get('hesaplar/edit/(:num)', 'HesaplarController::edit/$1');
$routes->get('hesaplar/delete/(:num)', 'HesaplarController::delete/$1');
$routes->post('hesaplar/update', 'HesaplarController::update');
$routes->get('profiller/(:num)', 'HesaplarController::profiller/$1');

// Daireler routes
$routes->get('daireler', 'DairelerController::index',  ['filter' =>['auth','role']]);
$routes->post('daireler/store', 'DairelerController::store');
$routes->get('daireler/edit/(:num)', 'DairelerController::edit/$1');
$routes->get('daireler/delete/(:num)', 'DairelerController::delete/$1');
$routes->post('daireler/update', 'DairelerController::update');

// Gelirler routes
$routes->get('gelirler', 'GelirlerController::index',  ['filter' =>['auth','role']]);
$routes->post('gelirler/store', 'GelirlerController::store');
$routes->get('gelirler/edit/(:num)', 'GelirlerController::edit/$1');
$routes->get('gelirler/delete/(:num)', 'GelirlerController::delete/$1');
$routes->post('gelirler/update', 'GelirlerController::update');

//sidebar auth

$routes->get('sidebar','SiteAyarlariController::sidebar',  ['filter' =>['auth','role']]);
// Site ayarlari routes


$routes->get('site_ayarlari', 'SiteAyarlariController::index');
$routes->post('site_ayarlari/update', 'SiteAyarlariController::update');

// Blok düzeni routes

$routes->get('blok_duzeni','BlokDuzeniController::index',  ['filter' =>['auth','role']]);
$routes->post('site_ayarlari/update', 'SiteAyarlariController::update');

// USER ROUTES

// Aidat Borçlarım routes
$routes->get('aidat_borclarim', 'AidatBorclarimController::index');
$routes->get('aidat_borclarim/odeme-yap/(:num)', 'AidatBorclarimController::odemeYap/$1');




$routes->get('k_giderler' , 'KGiderlerController::index');
// $routes->get('profiller/(:num)', 'ProfillerController::index/$1');
$routes->get('iletisim', 'IletisimController::index');


//excel

$routes->get('hesap_excel_form' , 'ExcelController::index');
$routes->post('hesap_excel_upload', 'ExcelController::hesap_excel_upload');

