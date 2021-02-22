<?php

$con = new mysqli('localhost','root','','unanipharma');

$productName = $_POST['productName'];

updateItemIdIntoProducts($productName);

function updateItemIdIntoProducts($productName)
{
	global $con;
	$id = addItem($productName);
	if ($id!=0)
	{
		$query = "UPDATE products SET item_id = $id , product_name ='' WHERE product_name = '$productName'";
		$run = mysqli_query($con,$query);
		echo $productName.' Has Been Added';
		return ($run) ? 'true' : 'false';
	}
	else
		return 'false';
}

function addItem($itemName)
{
	if (!isAlreadyAdded($itemName))
	{
		$itemName = strtoupper($itemName);
		global $con;
		$query = "INSERT into items (itemName) VALUES ('$itemName')";
		$run = mysqli_query($con,$query);
		if ($run)
		{
			return mysqli_insert_id($con);
		}
		else
		{
			echo "add item false";
			return 0;
		}
	}
	else
	{
		echo "Item Alredy Added";
		return false;
	}
}


function isAlreadyAdded($productName)
{
	global $con;
	$query = "SELECT itemId FROM items WHERE itemName = '$productName'";
	$run = mysqli_query($con,$query);
	$row = mysqli_num_rows($run);
	if ($row>0)
	{
		return true;
	}
	else
	{
		return false;
	}

}

?>