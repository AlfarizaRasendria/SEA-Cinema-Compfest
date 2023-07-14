# SEA-Cinema

SEA-Cinema is a movie ticket booking website developed with Laravel. The platform enables users to conveniently order movie tickets for both desktop and mobile devices. This website allows users to order movie tickets to be screened easily due to various features such as order tickets, seat selection, cancel tickets, top up, withdraw, check balances.

### Technologies Used

-   Laravel framework for server-side application.
-   Bootstrap CSS for styling the components.
-   MySQL database for storing movie and user information.

### Features

There are two users on this website namely guest and user

#### Guest
    - Have the ability to view the landing page, which showcases several detailed photos of the cinema and
      provides the cinema address and admin contacts for easy communication.
    - Able to see a list of all movies scheduled to be shown by the cinema is available, including movie    
      details such as title, description, release date, poster, age rating, and ticket price.
    - The website provides a user-friendly login and registration system, enabling users to easily create  
      accounts and then navigate to the login page.

#### User
    - Access personalized dashboard displaying booked tickets, account balance, and total movies purchased.
    - Easily browse and reserve movies, selecting preferred seating positions (up to six seats). If balance   
      exceeds ticket price, successful reservation with balance deduction. Insufficient balance offers top-up or cancellation. 
      Ticket details shown after successful order.
    - View order history with ticket quantity, total price, order date, status, and "view detail" button.  
      Cancel tickets for refund.
    - Conveniently top up account balance.
    - Seamlessly withdraw funds from their account, specifying the withdrawal amount and preferred method.
    - Able to check real-time account balance at any moment with a simple click on sidebar.
    - Log out to end session.

### Installation

-   Clone This project

```bash
git clone https://github.com/AlfarizaRasendria/SEA-Cinema-Compfest.git
```

-   Go to the folder application using cd command on your cmd or terminal
-   Run composer install on your cmd or terminal
-   Open XAMPP Control Panel
-   Start Apache and MySQL
-   Click on Admin Button inline with MySQL
-   Create new Database name it with SEA_Cinema
-   Open project directory
-   Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command  
    prompt Windows or cp .env.example .env if using terminal, Ubuntu
-   Open your .env file and change the database name (DB_DATABASE) with SEA_Cinema
-   Open your cmd or terminal
-   Run php artisan key:generate
-   Run php artisan migrate
-   Run php artisan serve
-   Go to http://localhost:8000/
