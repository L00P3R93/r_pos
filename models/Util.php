<?php


namespace POS\Util;
use DateTime;
use POS\Db\Db;

class Util{
    const format = "Y-m-d";

    /**
     * Encrypts given value
     * @param $id
     * @return float|int
     */
    public static function encurl($id){
        return $id * POS_NO;
    }

    /**
     * decrypts given value
     * @param $id
     * @return float|int
     */
    public static function decurl($id){
        return $id / POS_NO;
    }

    /**
     * Checks if two values match and return given value
     * @param $value1
     * @param $value2
     * @param $return
     * @return string
     */
    public static function selected($value1, $value2, $return){
        return $value1 == $value2 ? $return : "";
    }

    /**
     * Capitalizes the first letter of given string
     * @param $string
     * @return string
     */
    public static function uni_name($string){
        return ucwords(strtolower($string));
    }

    /**
     * Generates encrypted password using SHA256 algorithm
     * @param $pass
     * @return string
     */
    public static function passencrypt($pass){
        $oursalt = self::crazyString(32);
        $longpass = $oursalt . $pass;
        $hash = hash('SHA256', $longpass);
        return $hash . $oursalt;
    }

    /**
     * Generates a random string
     * @param $length
     * @return string
     */
    public static function generateRandomString($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Generates a random String to be used as salt
     * @param $length
     * @return string
     */
    public static function crazyString($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#%^*()_+-~{}[];:|.<>';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Checks if value given is empty or not
     * @param $x
     * @return int
     */
    public static function input_available($x){
        return !empty(rtrim($x)) ? 1 : 0;
    }

    /**
     * Checks the length of given value
     * @param $x
     * @param $l
     * @return int
     */
    public static function input_length($x, $l){
        return strlen(rtrim($x)) < $l ? 0 : 1;
    }

    /**
     * Validates phone number given
     * Ensures format is 2547XX XXX XXX
     * @param $phone
     * @return int
     */
    public static function validate_phone($phone){
        return (strlen($phone) == 12 and substr($phone, 0, 3) == "254") ? 1 : 0;
    }

    /**
     * Validates a given date whether it is in format of Y-m-d
     * @param $date
     * @return int
     */
    public static function validate_date($date){
        return date(self::format, strtotime($date)) == date($date) ? 1 : 0;
    }

    /**
     * Validates a given email
     * @param $email
     * @return int
     */
    public static function validate_email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? 1 : 0;
    }

    /**
     * Finds the time passed from now
     * @param $time
     * @param null $end
     * @return string
     * @throws \Exception
     */
    public static function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    /**
     * Adds a date from the given year, month or day
     * @param $date
     * @param $year
     * @param $months
     * @param $days
     * @return false|string
     */
    public static function date_add($date, $year, $months, $days){
        return date('Y-m-d', strtotime($date." + $year years + $months months + $days days"));
    }

    /**
     * Subtracts a date from the given year, month or day
     * @param $date
     * @param $year
     * @param $months
     * @param $days
     * @return false|string
     */
    public static function date_sub($date, $year, $months, $days){
        return date('Y-m-d', strtotime($date." - $year years - $months months - $days days"));
    }

    /**
     * Validates a given file type according to search array given
     * @param $file_name
     * @param $search_array
     * @return int
     */
    public static function file_type($file_name, $search_array){
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        return in_array("$ext", $search_array) ? 1: 0;
    }

    /**
     * Uploads a file and gives the uploaded file a new encrypted name
     * @param $file_name
     * @param $temp_name
     * @param $upload_dir
     * @return int|string
     */
    public static function upload_file($file_name, $temp_name, $upload_dir){
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = self::generateRandomString(10).".$ext";
        $file_path = $upload_dir.$new_file_name;
        return move_uploaded_file($temp_name, $file_path) ? $new_file_name : 0;
    }

    /**
     * Returns a error alert
     * @param $x
     * @return string
     */
    public static function error($x){
        return "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
    }

    /**
     * Returns a success alert
     * @param $x
     * @return string
     */
    public static function success($x){
        return "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
    }

    /**
     * Returns an info alert
     * @param $x
     * @return string
     */
    public static function notice($x){
        return "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
    }

    /**
     * Returns a Warning alert
     * @param $x
     * @return string
     */
    public static function warning($x){
        return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
    }

    /**
     * Returns the group name for the given group id
     * @param $group_id
     * @return mixed|string
     */
    public static function userGroups($group_id){
        return Db::get_value('r_user_groups', "uid='$group_id'", 'group_name');
    }

    public static function get_customer_names($customer_id){
        $customer = Db::get('r_customers',"uid='$customer_id'","first_name, second_name, last_name");
        return "$customer[first_name] $customer[second_name] $customer[last_name]";
    }

    /**
     * Return the branch name for the given branch id
     * @param $section_id
     * @return mixed|string
     */
    public static function section_name($section_id){
        return Db::get_value('r_user_sections', "uid='$section_id'", "section_name");
    }

    /**
     * Returns the status badge of the given state
     * @param $state
     * @return string
     */
    public static function admin_status($state){
        switch ($state){
            case 0:
                $status = "<span class='badge badge-default'>Inactive</span>";
                break;
            case 1:
                $status = "<span class='badge badge-success'>Active</span>";
                break;
            case 2:
                $status = "<span class='badge badge-danger'>Blocked</span>";
                break;
            case 3:
                $status = "<span class='badge badge-secondary'>Former</span>";
                break;
            default:
                $status = "----";
                break;
        }
        return $status;
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param bool $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source https://gravatar.com/site/implement/images/php/
     */
    public static function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

    public static function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && self::in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
        return false;
    }

}