<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");

/**
 * @author Vahagn Sookiasian
 */
class SetDentistPictureAction extends BaseAdminAction {

    public function service() {

        $file_name = $_FILES['picture']['name'];
        $tmp_name = $_FILES['picture']['tmp_name'];
        $dentistId = intval($_REQUEST['dentist_id']);
        $pictureExt = explode(".", $file_name);
        $pictureExt = strtolower(end($pictureExt));
        $supported_file_formats = explode(',', 'jpg,png,gif,jpeg');

        if (!in_array(strtolower($pictureExt), $supported_file_formats)) {
            $_SESSION['error_message'] = 'Not supported picture format!';
            $this->redirect('admin/dentists');
        }
        $dir = IMG_ROOT_DIR . "/dentists";
        if (!is_dir($dir)) {
            mkdir($dir, 0777);
        }
        $pictureFullName = $dir . '/dentist_' . $dentistId . '.' . $pictureExt;
        move_uploaded_file($tmp_name, $pictureFullName);
        $this->redirect('admin/dentists');
    }

}

?>