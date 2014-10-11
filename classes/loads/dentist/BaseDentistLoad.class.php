<?php

require_once (CLASSES_PATH . "/loads/BaseValidLoad.class.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SendchatLoad
 *
 * @author Administrator
 */
abstract class BaseDentistLoad extends BaseValidLoad {

    public function onNoAccess() {
        $this->redirect('dentist/login');
    }

    public function getRequestGroup() {
        return RequestGroups::$dentistRequest;
    }

}

?>