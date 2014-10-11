<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");
require_once (CLASSES_PATH . "/managers/GroupsManager.class.php");

/**
 * @author Vahagn Sookiasian
 */
class ActivateGroupAction extends BaseAdminAction {

    public function service() {
        $group_id = intval($_REQUEST['group_id']);
        $active = intval($_REQUEST['active']);
        $groupManager = GroupsManager::getInstance($this->config, $this->args);
        $groupManager->updateNumericField($group_id, 'active', $active);
        $group = $groupManager->selectByPK($group_id);
        $this->ok(array('active'=>$active, 'group_name'=>$group ->getName()));
    }

}

?>