<?php

/**
 * <p><b>AbstractManager class</b> is a base class for all manager classes.</p>
 * 
 * @author  Naghashyan Solutions, e-mail: info@naghashyan.com
 * @version 1.0
 * @package framework
 */
abstract class AbstractManager {

    /**
     * @abstract  
     * @access
     * @param 
     * @return
     */
    public function __construct() {
        
    }

    /**
     * Return a thing based on $dataObject, $paramsArray parameters
     * @abstract  
     * @access
     * @param $dataObject, $paramsArray
     * @return true
     */
    public function validateMustBeParameters($dataObject, $paramsArray) {
        foreach ($paramsArray as $param) {
            $functionName = "get" . ucfirst($param);
            $paramValue = $dataObject->$functionName();
            if ($paramValue == null || $paramValue == "") {
                throw new Exception("The parameter " . $param . " is missing.");
            }
        }
        return true;
    }

    public function getMapper() {
        return $this->mapper;
    }

    public function selectByField($fieldName, $fieldValue) {
        return $this->mapper->selectByField($fieldName, $fieldValue);
    }

    public function deleteByField($fieldName, $fieldValue) {
        return $this->mapper->deleteByField($fieldName, $fieldValue);
    }

    public function selectByPK($pk) {
        return $this->mapper->selectByPK($pk);
    }

    public function selectByPKs($pks) {
        return $this->mapper->selectByPKs($pks);
    }

    public function createDto() {
        return $this->mapper->createDto();
    }

    public function insertDto($dto) {
        return $this->mapper->insertDto($dto);
    }

    public function updateByPk($dto) {
        return $this->mapper->updateByPk($dto);
    }

    public function updateTextField($id, $fieldName, $fieldValue, $esc = true) {
        return $this->mapper->updateTextField($id, $fieldName, $fieldValue, $esc);
    }

    public function updateNumericField($id, $fieldName, $fieldValue) {
        return $this->mapper->updateNumericField($id, $fieldName, $fieldValue);
    }

    public function deleteByPK($id) {
        return $this->mapper->deleteByPK($id);
    }

    public function selectAll() {
        return $this->mapper->selectAll();
    }

}

?>