<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");
require_once (CLASSES_PATH . "/managers/UserManager.class.php");

/**
 * @author Vahagn Sookiasian
 */
class AddDentistAction extends BaseAdminAction {

    public function service() {
        $email = $this->secure($_REQUEST['dentist_email']);
        $username = $this->secure($_REQUEST['dentist_username']);
        $password = $this->secure($_REQUEST['dentist_password']);
        $name = $this->secure($_REQUEST['dentist_name']);
        $phone = $this->secure($_REQUEST['dentist_phone']);
        $this->validateFields($email, $username, $name);
        $dentistsManager = DentistsManager::getInstance($this->config, $this->args);
        $dto = $dentistsManager->createDto();
        $dto->setEmail($email);
        $dto->setUsername($username);
        $dto->setName($name);
        $dto->setPassword($password);
        $dentistsManager->insertDto($dto);
        $this->ok();
    }

    public function validateFields($email, $username, $name, $password) {
        //$this->error(array('message'=>'error message'));
    }

}

?>