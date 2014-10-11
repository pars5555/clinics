<?php

require_once(CLASSES_PATH . "/framework/AbstractAction.class.php");
require_once(CLASSES_PATH . "/managers/ClinicsManager.class.php");

/**
 * @author Karen Manukyan
 */
class LoginAction extends AbstractAction {

    public function service() {

        $username = $this->secure($_REQUEST['username']);
        $password = $this->secure($_REQUEST['password']);

        $clinicsManager = ClinicsManager::getInstance($this->config, $this->args);
        $clinicDto = $clinicsManager->getByLoginPassword($username, $password);
        if ($clinicDto) {
            $clinicUser = new ClinicUser($clinicDto->getId());
            $this->sessionManager->setUser($clinicUser, true, true);
        } else {
            $_SESSION['error_message'] = 'Wrong Login/Password!';
        }
        $this->redirect('clinic');
    }

    public function getRequestGroup() {
        return RequestGroups::$guestRequest;
    }

}

?>