<?php

$dir_name ='assets/hi';


if (!is_dir($dir_name)) {

mkdir($dir_name);
echo "Directory created";
}
?>