# Instagram-MVC

Setup is the same as it was to setup the application we developed in the MVC-lecture

Setup:
Clone the repository and cd into it.
Install composer using:
> curl -s https://getcomposer.org/installer | php
> sudo mv composer.phar /usr/local/bin/composer
Install dependencies and dump-autoload:
> composer install
> composer dump-autoload
Copy config/sample.config.php as config/config.php and edit it accordingly:
> cp config/sample.config.php config/config.php
# Edit the file using your mysql database credentials
Import schema present in schema/schema.sql in your database.
Serve the public folder at any port (say 8000):
> cd public
> php -S localhost:8000

Features and usage of this webpage:
1. The "/" page opens up the home login page where users can login using their username and password. Password is hash
protected and is stored in the users table in the database. The username is unique for each user.
2. If you are not registered on this website still, then go register yourself, click on the signup button which redirects to
the "/signup" router. Here you can register yourself using unique username and unique email-id, enter your name and password.
3. Through logging in as existing user or through signing up, you will be directed to "/feed" router where the feeds of all the
users are listed with latest on the top.
4. You can comment and like each and every feed and the data will be stored in the database and shown to all the users. 
5. You can post feeds with captions using the camera icon in the navbar
6. Using the bar-line-graph icon you are directed to "/trending" router where all the trending feeds of all the users are
displayed with the feed with most number of likes on the top.
7. The compass icon redirects to "/explore" option which shows the data of all the users registered and gives option to 
follow and unfollow them from there.
8. The friends icon takes you to "/followPosts" where all only the feeds posted by people you follow are shown.
9. The last icon is the profile icon which takes you to "/profile" router. Here you can view your profile, edit your profile,
view your posts, your followers and people you follow.
10. You can logout using the logout option in the footer or using the logout option in conf button.
11. The story feature is not ready perfectly yet.. i am working on it but facing some script issues... it will be ready in a 
couple of days... so for the meantime please do ignore it... 
12. Please suggest improvements ranging from security vunerabilities to code structure, whatever anyone feels like. I would be 
more than happy to learn and resolve it.

Thanks for reading
