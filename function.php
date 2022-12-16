<?php

$koneksi = mysqli_connect("localhost","root","","flightplan");

//login
if(isset($_POST['login'])){
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    $cekuser = mysqli_query($koneksi,"select * from pembeli where username='$Username' and password='$Password'");
    $hitung = mysqli_num_rows($cekuser);

    if($hitung>0){
        $ambildatarole = mysqli_fetch_array($cekuser);
        $role = $ambildatarole['role'];

        if($role=='admin'){
            $_SESSION['login'] = 'Logged';
            $_SESSION['role'] = 'admin';
            header('location:admin.php');

        }else{
            $_SESSION['login'] = 'Logged';
            $_SESSION['role'] = 'user';
            header('location:user.php');  
        }

    } else {
        echo 'User atau Password salah';
}
};
?>