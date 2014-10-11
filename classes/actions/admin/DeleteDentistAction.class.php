<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");
require_once (CLASSES_PATH . "/managers/DentistsManager.class.php");

/**
 * @author Vahagn Sookiasian
 */
class DeleteDentistAction extends BaseAdminAction {

    public function service() {
        $dentist_id = intval($_REQUEST['dentist_id']);
        $dentistsManager = DentistsManager::getInstance($this->config, $this->args);
        $$dentistsManager->deleteByPK($dentist_id);
        $this->redirect('admin/dentists');
    }

}

?>