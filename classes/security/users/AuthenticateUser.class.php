<?php

require_once(CLASSES_PATH . "/framework/AbstractUser.class.php");

/**
 * This class is a template for all authorized user classes.
 * 
 * @author  Naghashyan Solutions, e-mail: info@naghashyan.com
 * @version 1.0
 * @package security.users
 */
abstract class AuthenticateUser extends AbstractUser {

    /**
     * @var - unique identifier per session
     */
    protected $uniqueId;

    /**
     * @var - user's invariant identifier
     */
    protected $id;

    /**
     * Each authorized user should have a identifier, 
     * which will be passed to constructor when creating instance.
     * 
     * Return a thing based on $id parameter
     * @abstract  
     * @access
     * @param object $id - user identifier
     * @return
     */
    public function __construct($id) {
        $this->setId($id);
    }

    /**
     * Set permanent identifier
     * 
     * Return a thing based on $id parameter
     * @abstract  
     * @access
     * @param object $id
     * @return
     */
    public function setId($id) {
        $this->setSessionParam("ud", $id);
    }

    /**
     * Returns permanent identifier 
     * 
     * @abstract  
     * @access
     * @param object $id
     * @return
     */
    public function getId() {
        return $this->getSessionParam("ud");
    }

    /**
     * Returns ADMIN level.
     * 
     * @return int
     */
    public function getLevel() {
        return $this->getSessionParam("ut");
    }

}

?>