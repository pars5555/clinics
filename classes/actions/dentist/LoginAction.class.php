<?php

require_once(CLASSES_PATH . "/framework/AbstractAction.class.php");
require_once(CLASSES_PATH . "/managers/DentistsManager.class.php");
require_once(CLASSES_PATH . "/managers/SessionManager.class.php");

/**
 * @author Karen Manukyan
 */
class LoginAction extends AbstractAction {

    public function service() {

        $username = $this->secure($_REQUEST['username']);
        $password = $this->secure($_REQUEST['password']);
        
        $dentistsManager = DentistsManager::getInstance($this->config, $this->args);
        $dentistDto = $dentistsManager->getByLoginPassword($username, $password);        
        if ($dentistDto) {
            $dentist = new DentistUser($dentistDto->getId());            
            $this->sessionManager->setUser($dentist, true, true);
        } else {
            $_SESSION['error_message'] = 'Wrong Login/Password!';
        }
        $this->redirect('dentist');
    }

    public function getRequestGroup() {
        return RequestGroups::$guestRequest;
    }

}

?>