<!DOCTYPE html>
<?php

/*
* Write next steps here.
*/


require('includes/configuration/prepend.inc.php');

class search extends QForm
{
    protected $input;
    protected $lblQuery;
    protected $objProject;
    protected $objDatabase;
    protected $objDbResult;
    protected $result;
    protected $formstr = NULL;
    protected $formSub;
    protected $count;

    protected function Form_Create()
    {
        $this->input = $_GET['query'];

        $this->formateString();

        $this->objDatabase = GaimsBooks::GetDatabase();

        $this->executeQuery();
    }

    protected function executeQuery()
    {
        $str1 = trim($this->formstr[0]);
        
        if($this->count == 1 ){
            $query = "SELECT * FROM `GAIMS_BOOKS` WHERE `Title` REGEXP '$str1' ";
        }

        elseif($this->count == 2) {
            $str2 = trim($this->formstr[1]);
            $query = "SELECT * FROM `GAIMS_BOOKS` WHERE `Title` REGEXP '$str1' AND `Author` REGEXP '$str2' ";
        }

        elseif ($this->count == 3) {
            $str2 = trim($this->formSub[0]);
            $str3 = trim($this->formSub[1]);
            $query = "SELECT * FROM `GAIMS_BOOKS` WHERE `Title` REGEXP '$str1' AND `Author` REGEXP '$str2' AND `Sub` REGEXP '$str3' ";
        }

        elseif ($this->count == 4) {
            $str2 = trim($this->formstr[1]);
            $query = "SELECT * FROM `GAIMS_BOOKS` WHERE `Title` REGEXP '$str1' AND `Sub` REGEXP '$str2' ";
        }

        $this->objDbResult = $this->objDatabase->Query($query);
        $this->result = GaimsBooks::InstantiateDbResult($this->objDbResult);
    }

    protected function formateString()
    {	
        $this->formstr = explode(" by ", $this->input);
        $this->count = count($this->formstr);

        if(count($this->formstr) == 1) {
            $this->formstr = explode(" in ", $this->input);
            if(count($this->formstr) >= 2)
                $this->count = 4;
        }

        elseif ($this->count >= 2) {
            $this->formSub = explode(" in ", $this->formstr[1]);
            $this->count += count($this->formSub) - 1;
        }
    }    
}

Search::Run('search');

?>