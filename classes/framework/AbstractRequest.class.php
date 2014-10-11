<?php

require_once(CLASSES_PATH . "/framework/AbstractSessionManager.class.php");

/**
 * <p><b>AbstractRequest class</b> is a base class for all action classes.
 * The child of this class is <b>AbstractAction.class.php,AbstractLoad.class.php</b> files. </p>
 * 
 * @author  Naghashyan Solutions, e-mail: info@naghashyan.com
 * @version 1.0
 * @package framework
 */
abstract class AbstractRequest {

    protected $config;
    protected $args;
    protected $sessionManager;
    protected $loadMapper;
    protected $requestGroup;

    /**
     * Return a thing based on $sessionManager, $config, $loadMapper, $args parameters
     * @abstract  
     * @access
     * @param $sessionManager, $config, $loadMapper, $args
     * @return
     */
    public function initialize($sessionManager, $config, $loadMapper, $args) {
        $this->sessionManager = $sessionManager;
        $this->loadMapper = $loadMapper;
        $this->config = $config;
        $this->args = $args;
    }

    /**
     * Return a thing based on $requestGroup parameter
     * @abstract  
     * @access
     * @param $requestGroup 
     * @return
     */
    public function setRequestGroup($requestGroup) {
        $this->requestGroup = $requestGroup;
    }

    public function secure($var) {
        if (isset($var)) {
            return trim(htmlspecialchars(strip_tags($var)));
        } else {
            return null;
        }
    }

    /**
     * Return a thing based on $parameter
     * @abstract  
     * @access
     * @param $parameter 
     * @return
     */
    public function getRequestGroup() {
        return $this->requestGroup;
    }

    /**
     * Return a thing based on $dispatcher parameter
     * @abstract  
     * @access
     * @param $dispatcher 
     * @return object
     */
    public function setDispatcher($dispatcher) {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Return a thing based on $package, $load, $args, $statusCode parameters
     * @abstract  
     * @access
     * @param $package, $load, $args, $statusCode 
     * @return integer|babyclass
     */
    public function redirectToLoad($package, $load, $args, $statusCode = 200) {
        if ($statusCode > 200 && $statusCode < 300) {
            header("HTTP/1.1 $statusCode Exception");
        }
        $wrapperLoad = $this->getWrapperLoad();
        if ($wrapperLoad) {
            $loadArr = array();
            $loadArr["load"] = $this->dispatcher->loadsPackage . "/" . $package . "/" . $load . "Load";
            $loadArr["args"] = $args;
            $jsLoad = strtolower($load);
            $wrapperLoad->addParam($this->getNameSpace() . "Load", $jsLoad);
            $wrapperLoad->nest($this->getNameSpace(), $loadArr, false);
        } else {
            if (!$this->isMain()) {
                $jsLoad = strtolower($load);
                echo('<input type="hidden" id="redirectedLoad" name="redirectedLoad" value="' . $jsLoad . '"/>');
            }
            $this->dispatcher->loadPage($package, $load, $args);
            exit();
        }
    }

    /**
     * @abstract  
     * @access
     * @param 
     * @return false
     */
    public function isMain() {
        return true;
    }

    /**
     * @abstract  
     * @access
     * @param 
     * @return false
     */
    public function toCache() {
        return false;
    }

    /**
     * @abstract  
     * @access
     * @param  
     * @return
     */
    protected function cancel() {
        throw new NoAccessException("Load canceled request ");
    }

    /**
     * @abstract  
     * @access
     * @param  
     * @return false
     */
    public function onNoAccess() {
        return false;
    }

    /**
     * Return a thing based on $url, $isSecure parameters
     * @abstract  
     * @access
     * @param $url, $isSecure 
     * @return
     */
    protected function redirect($url, $isSecure = false) {
        $protocol = "http";
        if ($isSecure) {
            $protocol = "https";
        }
        header("location: " . $protocol . "://" . HTTP_HOST . "/$url");
        exit();
    }

    /**
     * Return a thing based on $config parameter
     * @abstract  
     * @access
     * @param $config 
     * @return
     */
    public static function notFoundHandler($config) {
        header("HTTP/1.0 404 Not Found");
    }

    /**
     * Return a thing based on $wrapperLoad parameter
     * @abstract  
     * @access
     * @param $wrapperLoad 
     * @return false
     */
    protected function getWrapperLoad() {
        return false;
    }

    protected function getUserLevel() {
        return $this->sessionManager->getUser()->getLevel();
    }

    protected function getUserId() {
        return $this->sessionManager->getUser()->getId();
    }

    protected function getUser() {
        return $this->sessionManager->getUser();
    }

    public function getCustomer() {
        if (!$this->customer) {
            if ($this->getUserLevel() != UserGroups::$GUEST) {
                $userId = $this->getUserId();
                if ($this->getUserLevel() == UserGroups::$DENTIST) {
                    $dentistsManager = new DentistsManager($this->config, $this->args);
                    $this->customer = $dentistsManager->selectByPK($userId);
                } else if ($this->getUserLevel() == UserGroups::$CLINIC) {
                    $clinicsManager = new ClinicsManager($this->config, $this->args);
                    $this->customer = $clinicsManager->selectByPK($userId);
                } else if ($this->getUserLevel() == UserGroups::$ADMIN) {
                    $adminsManager = new AdminsManager($this->config, $this->args);
                    $this->customer = $adminsManager->selectByPK($userId);
                }
            }
        }
        return $this->customer;
    }

}

?>