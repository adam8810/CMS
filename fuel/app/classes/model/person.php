<?php

/**
 * Part of the SmartChurch Church Management System
 *
 * @package    SmartChurch
 * @version    0.1
 * @author     Ryan Dawkins
 */

/**
 * Model_Person
 *
 * Model to handle data for the person entity
 *
 * @package   SmartChurch
 * @author    Ryan Dawkins
 */
class Model_Person extends Model_Crud {
    
    const TABLE = 'person';
    const COLUMN_PRIMARY_KEY = 'personid';
    const COLUMN_FIRST_NAME = 'firstName';
    const COLUMN_MIDDLE_NAME = 'middleName';
    const COLUMN_LAST_NAME = 'lastName';
    const COLUMN_HOME_ID = 'homeid';
    const COLUMN_GENDER = 'gender';
    const COLUMN_MARITAL_STATUS = 'maritalStatus';
    const COLUMN_BIRTH = 'birth';
    
    /**
     * Method to insert a person
     * 
     * @param   string $firstName
     * @param   string $middleName
     * @param   string $lastName
     * @param   int $homeid
     * @param   int $gender
     * @param   int $martialStatus
     * @param   date $birth
     * @return  array
     */
    public function create($firstName, $middleName, $lastName, $homeid, $gender, $maritalStatus, $birth){
        return DB::insert(self::TABLE)->set(array(
            self::COLUMN_FIRST_NAME => $firstName,
            self::COLUMN_MIDDLE_NAME => $middleName,
            self::COLUMN_LAST_NAME => $lastName,
            self::COLUMN_HOME_ID => $homeid,
            self::COLUMN_GENDER => $gender,
            self::COLUMN_MARITAL_STATUS => $maritalStatus,
            self::COLUMN_BIRTH => $birth
        ))->execute();
    }
    
    /**
     * Method to get a person by a given id
     * 
     * @param   type $personid
     * @return  array $this->data[0]
     */
    public function get($personid) {
        $result = DB::select('*')->from(self::TABLE)->where(self::PRIMARY_KEY, $personid)->execute();
        $count = 0;
        foreach($result as $i) {
            $this->data[$count] = $i;
        }
        if(isset($this->data[0])) {
            return $this->data[0];
        } else {
            return null;
        }
    }
    
    /**
     * Method to update a person by a given id
     * 
     * @param   int $personid
     * @param   string $firstName
     * @param   string $middleName
     * @param   string $lastName
     * @param   int $homeid
     * @param   int $gender
     * @param   int $martialStatus
     * @param   date $birth
     * @return  array
     */
    public function update($personid, $firstName, $middleName, $lastName, $homeid) {
        return DB::update(self::TABLE)->set(array(
            self::COLUMN_FIRST_NAME => $firstName,
            self::COLUMN_MIDDLE_NAME => $middleName,
            self::COLUMN_LAST_NAME => $lastName,
            self::COLUMN_HOME_ID => $homeid,
            self::COLUMN_GENDER => $gender,
            self::COLUMN_MARITAL_STATUS => $maritalStatus,
            self::COLUMN_BIRTH => $birth
        ))->where(self::COLUMN_PRIMARY_KEY, $personid)->execute();
    }
    
    /**
     * Method to delete a person by a given id
     * 
     * @param   int $personid
     * @return  array
     */
    public function delete($personid) {
        return DB::delete(self::TABLE)->where(self::COLUMN_PRIMARY_KEY, $personid)->execute();
    }
    
}