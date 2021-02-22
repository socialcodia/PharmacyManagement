<?php

$con = new mysqli('localhost','root','','unanipharma');


getAllProuctName();


function getAllProuctName()
{
global $con;
$query = "SELECT product_name FROM products";
$run = mysqli_query($con,$query);
$count = 0;
while ($data = mysqli_fetch_assoc($run))
{
  echo "<p id='prdt".$count."'>".$data['product_name']."</p><button value='".$count."' onclick='giveToHandler(this.value)' id='".$count."'>INSERT</button>";
  $count++;
}
}

?>
  <script src="../js/jquery-3.4.1.min.js"></script>

<script type="text/javascript">

function giveToHandler(value)
{
  let tvProductName = document.getElementById('prdt'+value);
  let productName = tvProductName.innerText;
  let btn = document.getElementById(value);
  $.ajax({
        type:'post',
        url:'handler.php',
        data:{
          'productName':productName
        },
        success:(response)=>
        {
         console.log(response);
         btn.setAttribute('disabled','disabled');
        }
      });
}

</script>