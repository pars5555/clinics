<?php

require_once (CLASSES_PATH . "/actions/dentist/BaseDentistAction.class.php");

/**
 * @author Levon Naghashyan
 */
class LogoutAction extends BaseDentistAction {

    public function service() {
        $user = $this->getUser();
        $this->sessionManager->removeUser($user, true);
        $this->redirect('dentist');
        exit;
    }
}

?>