<?php

require_once(CLASSES_PATH . "/security/UserGroups.class.php");
require_once(CLASSES_PATH . "/security/users/AuthenticateUser.class.php");

/**
 * User class for system administrators.
 * 
 * @author  Naghashyan Solution, e-mail: info@naghashyan.com
 * @version 1.0
 * @package security.users
 */
class DentistUser extends AuthenticateUser {

    /**
     * Creates en instance of admin user class and
     * initializes class members necessary for validation. 
     * 
     * @param object $adminId
     * @return 
     */
    public function __construct($id) {
        parent::__construct($id);
        $this->setSessionParam("ut", UserGroups::$DENTIST);
    }

    /**
     * 
     * Validates user credentials 
     * 
     * @abstract  
     * @access
     * @param 
     * @return TRUE - if validation passed, and FALSE - otherwise
     */
    public function validate() {
        return true;
    }

}

?>