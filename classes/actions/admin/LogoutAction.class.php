<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");

/**
 * @author Levon Naghashyan
 */
class LogoutAction extends BaseAdminAction {

    public function service() {
        $user = $this->getSessionUser();
        $this->sessionManager->removeUser($user, true);
        $this->redirect('admin');
        exit;
    }
}

?>