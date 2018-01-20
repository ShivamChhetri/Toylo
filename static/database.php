<?php
// define('host','localhost');
// define('user','root');
// define('password','8791493489');
// define('database','feed');

$connection= mysqli_connect('localhost','root','8791493489','feed');

if(mysqli_connect_errno()){
echo 'failed to connect'.mysqli_connect_erno();
}