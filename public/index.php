<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/feed" => "\Controller\Feed",
    "/explore" => "\Controller\Explore",
    "/post" => "\Controller\Post",
    "/signup" => "\Controller\Signup",
    
));
