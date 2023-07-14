# SEA-Cinema

SEA-Cinema is a movie ticket booking website built with Laravel, allowing users to easily order tickets for currently playing movies. 



### Technologies Used

- Laravel framework for server-side application.
- Bootstrap CSS for styling the components.
- MySQL database for storing movie and user information.

### Features
There are two users on this website namely guest and user

    ### Guest
    - Have the ability to view the landing page, which showcases several detailed photos of the cinema and 
    provides the cinema address and admin contacts for easy communication.
    - Able to see a list of all movies scheduled to be shown by the cinema is available, including movie details 
    such as title, description, release date, poster, age rating, and ticket price.
    - The website provides a user-friendly login and registration system, enabling users to easily create accounts 
    and then navigate to the login page.

    #### User
    - Able to access a personalized dashboard page that displays the number of tickets they have booked, their 
    account balance, and the total number of movies they have purchased.
    - Easily browse the complete list of movies and make reservations for their desired films. After selecting 
    a movie, User can choose their preferred seating positions, with a maximum limit of six seats. Upon proceeding with the reservation, if the user's balance exceeds the total ticket price, the reservation is successfully processed, and the balance is deducted accordingly. However, if the balance is insufficient, the system offers options to top up the balance or cancel the order. Once an order is successful, the ticket details are displayed.
    - Can view their order history, which presents a table containing information such as the ticket     
    quantity, total price, order date, order status, and a "view detail" button to display the complete ticket details. In the ticket details, User can cancel a ticket by pressing the cancel button associated with the respective ticket. The refund for the canceled ticket will be added to the user's balance.
    - Enhance their account balance by conveniently topping up with the desired amount and chosen method.
    - Seamlessly withdraw funds from their account, specifying the withdrawal amount and preferred method.
    - Able to check real-time account balance at any moment with a simple click on sidebar.
    - User can log out to end their session.



### Installation

- Clone This project
``` bash 
git clone https://github.com/AlfarizaRasendria/SEA-Cinema-Compfest.git
```
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
