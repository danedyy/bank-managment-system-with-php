<?php

function con_str()
{
   $str = mysqli_connect('localhost','root','','adobese');
   return $str;
}