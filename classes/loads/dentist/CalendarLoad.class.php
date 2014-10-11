<?php

require_once (CLASSES_PATH . "/loads/dentist/BaseDentistLoad.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class CalendarLoad extends BaseDentistLoad {

    public function load() {        
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/dentist/calendar.tpl";
    }

}

?>