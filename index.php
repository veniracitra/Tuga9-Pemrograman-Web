<?php
include("koneksi.inc.php");

$elogin="";
if (isset($_POST["login"])) {
    $uname = $_POST["uname"];
    $pass  = $_POST["pw-user"];

    $hasil = mysqli_query($conn,"SELECT * FROM pengguna WHERE uname='$uname'");

    //cek username
    if (mysqli_num_rows($hasil) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($hasil);
        if ($pass = $row["pass"]) {
            header("location: cetak.php");
            exit;
        }
    }
    $error = true;
}
    if (isset($error)) {
        $elogin = "Username atau Password salah";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROGRAM KONTAK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .container{
            width: 30%;
            margin-top: 9pc;
            box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        #btn-login{
            color: white;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: grid;
            place-items: center;
        }
    </style>
</head>
<body>
<div class="container">
          <h4 class="text-center fst-bold">LOGIN</h4>
          <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
              <div class="form-group">
                  <label for="">Username</label>
                  <div class="input-group">
                    <input type="text" name="uname" id="#" class="form-control" placeholder="Masukkan Username">
                  </div>
              </div>
              <div class="form-group mt-3">
                <label for="">Password</label>
                <div class="input-group">
                    <input type="password" name="pw-user" id="#" class="form-control" placeholder="Masukkan Password"> 
                </div>
                <small class="fst-italic text-danger <?php echo($elogin !="" ? "is-invalid" : ""); ?>"><?php echo $elogin?></small>
            </div>
            <div class="form-group mt-3">
                <button type="submit" id="btn-login" name="login" class="btn btn-success w-50 p-2 mt-1 mx-auto">LOGIN</button>
            </div>
          </form>
      </div>
</body>
</html>
