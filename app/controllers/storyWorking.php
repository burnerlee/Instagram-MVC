<?php

namespace Controller;

class StoryWorking
{
    public function post()
    {
        $username = $_POST["username"];
        echo \View\Loader::make()->render("templates/storyContainer.twig", array(
            "items" => \Model\Story::get_all($username),
            "user" => \Model\User::getUserData($username),
        ));
    }
}
