<?php

include "db_config.php";

class Admin{

    protected $db;
    public function __construct(){
        $this->db = new DB_con();
        $this->db = $this->db->ret_obj();
    }

    /*** for login process ***/
    public function check_login($username, $password){

        $password = $password;
        $sql="SELECT aid FROM admin WHERE aname='$username' and apass='$password'";

        //checking if the username is available in the table
        $result = mysqli_query($this->db,$sql);
        $admin_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;

        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['aid'] = $admin_data['aid'];
            return true;
        }
        else{
            return false;
        }
    }

    /*** starting the session ***/
    public function get_session(){
        return $_SESSION['login'];
    }

    /*** ending the session ***/
    public function user_logout() {
	    $_SESSION['login'] = FALSE;
        unset($_SESSION);
	    session_destroy();
    }
}

?>
