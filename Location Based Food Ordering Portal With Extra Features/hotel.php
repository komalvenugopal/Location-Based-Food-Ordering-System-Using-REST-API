<?php
include("connection.php");
extract($_REQUEST);
session_start();
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $qq=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $qqr= mysqli_fetch_array($qq);
}
else
{
	$cust_id="";
}
$vid=$_POST["vendor"];
?>
<html>

<head>
    <title>Home</title>
    <!--bootstrap files-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--bootstrap files-->

    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">




    <style>
        #aboutus {
            background-image: url("img/main_spice2.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;

        }

        ul li {
            list-style: none;
        }

        ul li a {
            color: black;
            font-weight: bold;
        }

        ul li a:hover {
            text-decoration: none;
        }

    </style>
</head>


<body>


    <div id="result" style="position:fixed;top:100; right:50;z-index: 3000;width:350px;background:white;"></div>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">

        <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Food Hunt</span></a>
        <?php
	if(!empty($cust_id))
	{
	?>
        <a class="navbar-brand" style="color:white; text-decoratio:none;"><i class="far fa-user"><?php if(isset($cust_id)) { echo $qqr['fld_name']; }?></i></a>
        <?php
	}
	?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a href="index.php" style="color:white;" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="aboutus.php" style="color:white;" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="services.php" style="color:white;" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" style="color:white;" class="nav-link">Contact Us</a>
                </li>
                <?php
			if(empty($cust_id))
			{
			?>
                <li class="nav-item">
                    <a href="form/index.php?msg=you must be login first" class="nav-link"><span style="color:red;  font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:red;" id="cart" class="badge badge-light">0</span></i></span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link">
                        <form method="post"><button class="btn btn-outline-danger my-2 my-sm-0" name="login" type="submit">Log In</button></form>
                    </a>
                </li>
                <?php
			}
			else
			{
			?>
                <li class="nav-item">
                    <a href="form/cart.php" class="nav-link">
                        <form method="post"><span style=" color:green; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart" class="badge badge-light"><?php if(isset($re)) { echo $re; }?></span></i></span></form>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <form method="post"><button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button></form>
                    </a>
                </li>
                <?php
			}
      $vid=$_POST['vendor'];          
$query=mysqli_query($con,"select * from tblvendor where fldvendor_id='$vid'");
$row=mysqli_fetch_array($query);
			?>



            </ul>

        </div>

    </nav>
    <br><br><br><br>
    <!--menu ends-->
    <div class="container">
        <img src="img/five-points-proposed-hotel-2012.jpg" alt="no Pic Available" height="400px" width="100%">
    </div>
    <div class="container-fluid">
        <br><br>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h3 style="color:#01C699;text-transform:uppercase;"><?php echo $row['fld_name']; ?></h3><br><br>
                <span style="color:#A5A5A5;font-size:25px;text-transform:uppercase;"><i class="fas fa-home"></i></span>&nbsp;&nbsp;<span style="font-family: 'Tangerine', serif; font-weight:bold;font-size:25px; color:#ED2553;"><?php echo $row['fld_address']?></span><br><br>
                <span style="color:#A5A5A5;font-size:25px;"><i class="fas fa-phone"></i></span>&nbsp;&nbsp;<span style=" font-size:25px; color:#ED2553;"><?php echo $row['fld_phone']?></span><br><br>
                <span style="color:#A5A5A5;font-size:25px;"><i class="fa fa-mobile" aria-hidden="true"></i></span>&nbsp;&nbsp;<span style=" font-size:25px; color:#ED2553;"><?php echo $row['fld_mob']?></span><br><br>
                <span style="color:#A5A5A5;font-size:25px;"><i class="fas fa-at"></i></span>&nbsp;&nbsp;<span style=" font-size:25px; color:#ED2553;"><?php echo $row['fld_email']?></span><br><br>


            </div>

            <div class="col-sm-1"></div>
        </div>
    </div>



    <table class="table table-bordered">

        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">menu</th>
                <th scope="col">price</th>
                <th scope="col">cusine</th>
            </tr>
        </thead>
        <tbody>
            <?php  $sele="SELECT * FROM  tbfood WHERE fldvendor_id=$vid";
$result= mysqli_query($con, $sele) or die(mysqli_error($con));
                if(mysqli_num_rows($result) == 0){?>
            <tr>
                <td></td>
                <td> No one placed order </td>
                ?>

                <?php } else {
                    $counter=1;
                    $price=0;
   
                while($row=mysqli_fetch_array($result)){
?>
            <tr>
                <th scope="row" width="10%"><?php echo $counter++; ?></th>
                <td width="20%"><?php echo  $row['foodname']?></td>
                <td width="10%"><?php echo $row['cost']?></td>
                <td width="10%"><?php echo $row['cuisines']?></td>
                <td>
                    <form action="form/cart.php" method="get">
                        <input type="hidden" value=<?php echo  $row['food_id'] ?> name="product">
                        <input type="submit" style="background-color: #4CAF50; border: none;color:white;  display: inline-block;font-size: 26px;margin: 4px 2px;radius:10px;width:320px;border-radius: 2px;padding:20px;color:white;" value="add" />
                    </form>
                </td>
                <?php  }} ?>
            </tr>
        </tbody>

    </table>
    <!--footer primary-->
    <?php
		 include("footer.php");
		 ?>
</body>

</html>
