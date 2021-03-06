<?php
require_once (CLASSES_PATH . "/framework/AbstractManager.class.php");
require_once (CLASSES_PATH . "/dal/mappers/DentistsMapper.class.php");

class DentistsManager extends AbstractManager  {

    /**
     * @var app config
     */
    private $config;
    /**
     * @var passed arguemnts
     */
    private $args;

    /**
     * @var singleton instance of class
     */
    private static $instance = null;

    /**
     * Initializes DB mappers
     *
     * @param object $config
     * @param object $args
     * @return
     */
    function __construct($config, $args) {
            $this -> mapper = DentistsMapper::getInstance();
            $this -> config = $config;
            $this -> args = $args;
    }

    /**
     * Returns an singleton instance of this class
     *
     * @param object $config
     * @param object $args
     * @return
     */
    public static function getInstance($config, $args) {

        if (self::$instance == null) {
                self::$instance = new DentistsManager($config, $args);
        }
        return self::$instance;
    }
	
    public function getByLoginPassword($login, $password) {        
        return $this->mapper->getByUsernamePassword($login, $password);
    }
    
}

?>