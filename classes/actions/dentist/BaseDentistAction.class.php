<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");

/**
 * General parent action for all AdminAction classes.
 *
 */
abstract class BaseDentistAction extends BaseAction {

    public function getRequestGroup() {
        return RequestGroups::$dentistRequest;
    }
    
     public function onNoAccess() {
        $this->redirect('dentist/login');
    }

    

}

?>