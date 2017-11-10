# DESCRIPTION
- Author : [Pieter Melis ](https://github.com/PieterMelis "Title")
- A fictional school project: A contest to win new volvo.
- The online version [version][id]. 



## Deploy this project
- Clone or download this repository
- Make database with phpmyadmin
- Create a .env file and add your database information
- Run `` "php artisan migrate" `` on command line
- Upload all the files to the server
- Upload the .htaccess 
- Run `` "composer install" `` on command line
- Run `` "crontab -e" `` on command line and add : ``* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&amp;1 ``
- Save the file

### Done !



[id]: https://volvo.pietermelis.be/  "Title"
