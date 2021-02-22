<?php

class Migration
{	
	public function __construct()
	{	
		
	}

	public $con;


	function Connect()
	{
		$this->con = new mysqli('localhost','root','','azmiunanistore');
		if (mysqli_connect_error())
		{
			echo "Failed To Connect With Database Server";
			return false;
		}
		else
			return $this->con;
	}

	function isAlreadyInserted($productName)
	{
		$query = "SELECT item_id FROM products WHERE product_name =?";
		$stmt = $this->con->prepare($query);
		$stmt->bind_param('s',$productName);
		$stmt->execute();
		$stmt->bind_result($itemId);
		$stmt->fetch();
		return ($itemId>0) ? true : false;
	}

	function makeToast()
	{
		echo "WElcome g";
	}

}
?>