<?php

require_once (CLASSES_PATH . "/loads/clinic/BaseClinicLoad.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class HomeLoad extends BaseClinicLoad {

    public function load() {   
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/clinic/home.tpl";
    }

}

?>