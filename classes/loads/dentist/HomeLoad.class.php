<?php

require_once (CLASSES_PATH . "/loads/dentist/BaseDentistLoad.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class HomeLoad extends BaseDentistLoad {

    public function load() {   
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/dentist/home.tpl";
    }

}

?>