<?php

//echo "<br><br><br><br>". FILTER_VALIDATE_EMAIL;
$Ename=  $Email=  $Phone=  $Sal=  $Dept= "1";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  
  require_once "Includ/DB.php";
  $MYDB =new DB();

  $Ename=  $Email=  $Phone=  $Sal=  $Dept= "";

  $Ename=$MYDB->Check_Input($_POST["Ename"]);
  $Email=$MYDB->Check_Input($_POST["Email"]);
  $Phone=$MYDB->Check_Input($_POST["Phone"]);
  $Sal=$MYDB->Check_Input($_POST["Sal"]);
  $Dept=$MYDB->Check_Input($_POST["Dept"]);


if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
{
  $sql = "INSERT INTO Emp (Ename, Email, Phone,Sal,Dept)
  VALUES ('$Ename', '$Email','$Phone','$Sal','$Dept')";

  $MYDB->Exec($sql) ;

}
else{
  echo  "<br><br><br>". $Ename . $Email. $Phone.  $Sal.  $Dept;
}
  

   


}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet"  href="Css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/Style.css">

  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

<br>

  <br>
  <br>
    <form  id="needs-validation" class="container Emp-Form" novalidate method="post" action="<?php echo  htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="Ename">Name</label>
            <input type="text" class="form-control" id="Ename" name="Ename" placeholder="Name"  value="<?php echo  $Ename?>"  required>
            <i class="fa fa-user fa-fw"></i>
            <div class="invalid-feedback">
                Please provide a valid Name.
              </div>
          </div>
          <div class="col-md-12 mb-3">
            <label for="Email"> Email</label>
            <input type="Email" class="form-control" id="Email"  name="Email" placeholder="Email"  value="<?php echo  $Email?>" required>
            <i class="fa fa-user fa-fw"></i>
            <div class="invalid-feedback">
                Please provide a valid Email.
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Phone">Phone</label>
            <input type="number" class="form-control" id="Phone"  name="Phone"  placeholder="Phone " value="<?php echo  $Phone?>" max="999999999999999" >
            <i class="fa fa-user fa-fw"></i>
            <div class="invalid-feedback">
              Please provide a valid Phone.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="Sal">Sal</label>
            <input type="number" class="form-control" id="Sal"   name="Sal" placeholder="Sal" max="10000" value="<?php echo  $Sal?>" required >
            <i class="fa fa-user fa-fw"></i>
            <div class="invalid-feedback">
              Please provide a valid Sal.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="Dept">Dept</label>
            <input list="DeptList" class="form-control" id="Dept"   name="Dept"  placeholder="Dept" value="<?php echo  $Dept?>" required>
            <i class="fa fa-user fa-fw"></i>
            <datalist id="DeptList">
                <option value="IT">
                <option value="HR">
                <option value="Testing">
            </datalist>
            <div class="invalid-feedback">
              Please provide a valid Dept.
            </div>
          </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
      </form>
      


      <hr>

      <footer>
        <p>&copy; Company 2017</p>
      </footer>
    </div> <!-- /container -->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js" ></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/index.js"></script>

  </body>
</html>