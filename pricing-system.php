<?php

// Include Database
include('_db_config.php');

$action = $_GET['action'];

$id = $_GET['id'];

if(!isset($action) && !isset($id)) { ?>
    <div class="container">
        <h2>Unit pricing System
         <a href="admin.php?page=pricing-system.php&action=add">Add Product</a></h2>
    </div>

    <?php $unit_pricing_unit = mysqli_query($db, "SELECT * FROM `unit_pricing_system`"); ?>

    <table>
        <thead>
            <tr>
                <td>Product ID</td>
                <td>Product Name</td>
                <td>Edit Product</td>
                <td>Delete Product</td>
            </tr>
        </thead>

        <tbody>
            <?php while($row = mysqli_fetch_array($unit_pricing_unit)): ?>
                 <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name'] ?></td>
                    <td><a href="admin.php?page=pricing-system.php&action=edit&id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="admin.php?page=pricing-system.php&action=delete&id=<?php echo $row['id']; ?>">Delete</a></td> 
                 </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php 
        mysqli_close($db);
      } else if(isset($action) && $action == 'edit') {
         // Pull out info 
         $unit_pricing_unit_data = mysqli_query($db, "SELECT * FROM `unit_pricing_system` WHERE id=$id LIMIT 1");

         $data = mysqli_fetch_array($unit_pricing_unit_data);

         extract($row);

         $title = 'Edit Event - ' . $product_title;

         mysqli_close($db);
     } else if(isset($action) && $action == 'add') {
        /// Only change the title
        $title = 'Add Product';
     } else if(isset($action) && $action = 'update') {
        $product_id      = $_POST['product_id'];
        $unit_min        = $_POST['unit_min'];
        $unit_max        = $_POST['unit_max'];
        $price_per_unit  = $_POST['price_per_unit'];

        mysqli_query($db, "UPDATE `unit_pricing_system` SET 
            unit_min='$unit_min',
            unit_max='$unit_max',
            price_per_unit='$price_per_unit' WHERE id='$id'
        ");
       ?>

     <script type="text/javascript">
         Jquery(function() {
            location.href = "admin.php?page=pricing-system.php";
         });
     </script>

  <?php 

  exit;
}  else if(isset($action) && $action == 'create') {
    $product_id      = $_POST['product_id'];
    $product_name    = $_POST['product_name'];
    $unit_min        = $_POST['unit_min'];
    $unit_max        = $_POST['unit_max'];
    $price_per_unit  = $_POST['price_per_unit'];

    $insert_query = mysqli_query($db, "INSERT INTO unit_pricing_system (`product_id`,`product_name`,`unit_min`,`unit_max`,`price_per_unit`) VALUES('$product_id','$product_name','$unit_min','$unit_max','$price_per_unit') ");
?>

 <script type="text/javascript">
      Jquery(function() {
            location.href = "admin.php?page=pricing-system.php";
         });
 </script>

 <?php 
exit; } else if(isset($action) && $action == 'delete') {

 mysqli_query($db, "DELETE FROM `unit_pricing_system` WHERE id=$id");

?>

<script type="text/javascript">
    Jquery(function() {
        location.href = "admin.php?page=pricing-system.php";
    });
</script>

<?php exit; } ?>

<style type="text/css">
    
label{
width:300px;
float:left
}

input,select{
width:300px;
}

button{
vertical-align:baseline;
background:none repeat scroll 0 0 #2EA2CC;
border-color:#0074A2;
box-shadow:0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
color: #FFFFFF;
text-decoration:none;
-moz-box-sizing:border-box;
border-radius:3px;
border-style:solid;
border-width:1px;
cursor:pointer;
display:inline-block;
font-size:13px;
height:28px;
line-height:26px;
margin:0;
padding:0 10px 1px;
text-decoration: none;
white-space: nowrap;
margin-left:303px;
}

table{
background:#FFFFFF;
width:100%;
text-align:center;
margin-top:20px;
border:1px solid #666;
border-collapse:collapse;
line-height:30px;
}

form.seating button{
vertical-align:baseline;
background:none repeat scroll 0 0 #2EA2CC;
border-color:#0074A2;
box-shadow:0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
color: #FFFFFF;
text-decoration:none;
-moz-box-sizing:border-box;
border-radius:3px;
border-style:solid;
border-width:1px;
cursor:pointer;
display:inline-block;
font-size:13px;
height:28px;
line-height:26px;
margin:0;
padding:0 10px 1px;
text-decoration: none;
white-space: nowrap;
margin-left:25px;
}

.seats{
width:12.5%;
float:left;
display:inline;
height:950px;
overflow:hidden;
}

div.seat{
width:100%;
float:left;
}

div.seat span{
width:50%;
text-align:center;
padding:5px 0;
float:left;
}

div.seat input{
float:left;
padding:0;
margin:0;
}

div.seat div{
border:4px solid #009900;
float:left;
margin:0;
padding:0;
}

div.seat div.booked{
border:4px solid #FF0000;
float:left;
margin:0;
padding:0;
}

div.seat div.waiting{
border:4px solid #FF9900;
float:left;
margin:0;
padding:0;
}

.seats:first-child{
display:none;
}
table.seating tr td{
width:50%;
float:left;
display:inline;
text-align:center;
}

form.seating label{
width:230px;
float:left;
margin-left:30px;
margin-top:5px;
}

#standingcount{
width:50px;
padding:5px;
float:left;
text-align:center;
}

form.seating div.full a{
padding:5px;
text-decoration:none;
width:20px;
background:#ccc;
color:#000;
text-align:center;
float:left;
}

tr,td{
margin:0;
padding:0;
border:0;
}

thead{
font-weight:bold;
background:#333333;
color:#fff;
}

.edit{
text-decoration:none;
color:#007eff;
}

.delete{
text-decoration:none;
color:#FF0000;
}

.line{
float:left;
width:100%;
padding:15px 0;
}

</style>

<div class="wrap">
        <h2><?php echo $title; ?></h2>
        <br clear="clear">
        <hr />

<?php if(isset($action) && $action == 'edit') { ?>
        <form method="post" action="">
            
        </form>
<?php } ?>

<?php if(isset($action) && $action == 'add') { ?>
    <form method="post" action="admin.php?page=pricing-system.php&action=create">
        <label>Product Name</label>
        <input type="text" name="product_name">
        <br class="clear">

        <label>Product Unit Min</label>
        <input type="text" name="unit_min">
        <br class="clear">

        <label>Product Unit Max</label>
        <input type="text" name="unit_max">
        <br class="clear">

        <label>Price Per Unit</label>
        <input type="text" name="price_per_unit">
        <br class="clear">

        <input type="hidden" name="product_id" value="10">

        <button type="submit">Add</button>
    </form>
<?php } ?>
</div>