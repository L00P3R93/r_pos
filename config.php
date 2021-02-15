<?php
session_start();
date_default_timezone_set('Africa/Nairobi');
use POS\Db\Db;
use POS\SKU\SKU;
use POS\Staff\Staff;
use POS\Util\Util;
use POS\Cart\Cart;
use POS\Order\Order;
use POS\Product\Product;

define('POS_NAMESPACE','POS');
define('POS_DIR_ROOT', dirname(__FILE__));
define('POS_DIR_COMPONENTS', POS_DIR_ROOT.'/components');
define('POS_DIR_CONTROLLERS',POS_DIR_ROOT.'/controllers');
define('POS_DIR_LIBRARIES', POS_DIR_ROOT.'/libraries');
define('POS_DIR_MODELS', POS_DIR_ROOT.'/models');
define('POS_DIR_UPLOADS', POS_DIR_ROOT.'/uploads');

require POS_DIR_MODELS.'/Db.php';
require POS_DIR_MODELS.'/Util.php';
require POS_DIR_MODELS.'/Staff.php';
require POS_DIR_MODELS.'/SKU.php';
require POS_DIR_MODELS.'/Cart.php';
require POS_DIR_MODELS.'/Order.php';
require POS_DIR_MODELS.'/Product.php';


$config = array(
    'database_name'=>'r_pos',
    'database_host'=>'localhost',
    'database_user'=>'root',
    'database_password'=>'',
    'cors'=>[
        'enabled'=>true,
        'origin'=>'*',
        'headers'=>[
            'Access-Control-Allow-Headers'=>'Origin, X-Requested-With, Authorization, Cache-Control, Content-Type, Access-Control-Allow-Origin',
            'Access-Control-Allow-Credentials'=>'true',
            'Access-Control-Allow-Methods'=>'GET,PUT,POST,DELETE,OPTIONS,PATCH'
        ]
    ]
);

define('_DB_SERVER_', $config['database_host']);
define('_DB_NAME_', $config['database_name']);
define('_DB_USER_', $config['database_user']);
define('_DB_PASSWD_', $config['database_password']);
define('POS_NO', 1192);
define('ADMIN_MAIL', 'admin@your-server.com');
define('FULL_DATE', date('Y-m-d H:i:s'));
define('NOW_', date('Y-m-d H:i:s'));
define('DATE_', date('Y-m-d'));
define('YEAR_', date('Y'));
define('MONTH_', date('m'));
define('DAY_', date('d'));

$DB = new Db();
$UT = new Util();
$ST = new Staff();
$SKU = new SKU();
$cart = new Cart();
$order = new Order();
$prod = new Product();
