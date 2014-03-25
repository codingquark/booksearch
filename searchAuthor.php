<?php

require('includes/configuration/prepend.inc.php');

class Author extends QForm
{

	protected $objDbResult;
    protected $result;
	protected $input;
	protected $objDatabase;

	protected function Form_Create()
    {
        $this->input = $_GET['query'];

        $this->objDatabase = GaimsBooks::GetDatabase();

        $this->executeQuery();
    }
	
	protected function executeQuery()
    {
		$query = "SELECT * FROM `GAIMS_BOOKS` WHERE `Author` REGEXP '$this->input' ";
		
		$this->objDbResult = $this->objDatabase->Query($query);
        $this->result = GaimsBooks::InstantiateDbResult($this->objDbResult);
	}
}

Author::Run('Author');

?>