<?php

require_once (CLASSES_PATH . "/loads/admin/BaseAdminLoad.class.php");
require_once (CLASSES_PATH . "/managers/AdminManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class AdminsLoad extends BaseAdminLoad {

    private $visibleFields = array('name', 'email', 'username');

    public function load() {
        $adminManager = AdminManager::getInstance($this->config, $this->args);
        $allAdmins = $adminManager->selectAll();
        $this->addParam('allAdmins', $allAdmins);
        $this->addParam('visibleFields', $this->visibleFields);
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/admins.tpl";
    }

}

?>