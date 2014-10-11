<?php

require_once (CLASSES_PATH . "/framework/AbstractSessionManager.class.php");
require_once (CLASSES_PATH . "/security/RequestGroups.class.php");
require_once (CLASSES_PATH . "/framework/exceptions/RedirectException.class.php");

require_once (CLASSES_PATH . "/security/UserGroups.class.php");
require_once (CLASSES_PATH . "/security/users/GuestUser.class.php");
require_once (CLASSES_PATH . "/security/users/AuthenticateUser.class.php");
require_once (CLASSES_PATH . "/security/users/AdminUser.class.php");
require_once (CLASSES_PATH . "/security/users/DentistUser.class.php");
require_once (CLASSES_PATH . "/security/users/ClinicUser.class.php");

/**
 *
 * @author  Naghashyan Solutions, e-mail: info@naghashyan.com
 * @version 1.0
 * @package framework
 *
 */
class SessionManager extends AbstractSessionManager {

    private $user = null;
    private $config;

    public function __construct($config) {
        session_set_cookie_params(3600000);
        session_start();
        $this->config = $config;
    }

    /**
     * @abstract
     * @access
     * @return object for $this->user
     */
    public function getUser() {

        if ($this->user != null) {
            return $this->user;
        }
        $this->user = new GuestUser();

        try {
            if (isset($_SESSION["ut"]) && $_SESSION["ud"]) {
                if ($_SESSION["ut"] == UserGroups::$ADMIN) {
                    $user = new AdminUser($_SESSION["ud"]);
                }
                if ($_SESSION["ut"] == UserGroups::$DENTIST) {
                    $user = new DentistUser($_SESSION["ud"]);
                }
                if ($_SESSION["ut"] == UserGroups::$CLINIC) {
                    $user = new ClinicUser($_SESSION["ud"]);
                }
            }
        } catch (InvalidUserException $ex) {
            
        }

        if (isset($user) && $user->validate()) {
            $this->user = $user;
        }

        return $this->user;
    }

    /**
     * Return a thing based on $request, $user parameters
     * @abstract
     * @access
     * @param $request, $user
     * @return true
     */
    public function validateRequest($request, $user) {
        if ($request->getRequestGroup() == RequestGroups::$adminRequest && $user->getLevel() == UserGroups::$ADMIN) {
            return true;
        }
        if ($request->getRequestGroup() == RequestGroups::$dentistRequest && $user->getLevel() == UserGroups::$DENTIST) {
            return true;
        }
        if ($request->getRequestGroup() == RequestGroups::$clinicRequest && $user->getLevel() == UserGroups::$CLINIC) {
            return true;
        }
        if ($request->getRequestGroup() == RequestGroups::$guestRequest) {
            return true;
        }
        return false;
    }

}

?>