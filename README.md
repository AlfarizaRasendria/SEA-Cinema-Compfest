SEA-Cinema

SEA-Cinema is a movie ticket booking website built with Laravel, allowing users to easily order tickets for currently playing movies. 



Technologies Used

Laravel framework for server-side application.
Bootstrap CSS for styling the components.
MySQL database for storing movie and user information.




Installation

- Clone This project
- Go to the folder application using cd command on your cmd or terminal
- Run composer install on your cmd or terminal
- Open XAMPP Control Panel
- Start Apache and MySQL 
- Click on Admin Button inline with MySQL
- Create new Database name it with SEA_Cinema
- Open project directory 
- Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command   
  prompt Windows or cp .env.example .env if using terminal, Ubuntu
- Open your .env file and change the database name (DB_DATABASE) with SEA_Cinema
- Open your cmd or terminal
- Run php artisan key:generate 
- Run php artisan migrate
- Run php artisan serve
- Go to http://localhost:8000/
