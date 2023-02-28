<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Laravel Calculator
This is a simple calculator built with Laravel that can perform basic and complex arithmetic operations. Follow the instructions below to install and run the calculator.

## Prerequisites
Before you can run the calculator, you'll need to make sure you have the following software installed:

- PHP >= 7.3
- Composer
- MySQL
- Docker (optional)
## Installation
- Clone this repository to your local machine.
- Open a terminal and navigate to the project directory.
- Run composer install to install the project dependencies.
- If you're using Docker, run ./vendor/bin/sail up -d to start the Docker containers. If you're not using Docker, make sure you have a local web server (such as Apache or Nginx) configured to serve the project.
- Run php artisan migrate --seed to create the database tables and seed some test data.
## Usage
Once the installation is complete, you can use the calculator by navigating to the project URL in your web browser. If you're using Docker, the URL should be http://localhost. If you're not using Docker, the URL will depend on how you have your local web server configured.

When you open the calculator, you'll see a single input field where you can enter a mathematical expression. The expression can include addition (+), subtraction (-), multiplication (*), and division (/). You can also use parentheses to group expressions.

If the expression is a simple calculation, such as 2 + 2, the result will be displayed immediately. If the expression is more complex, such as (2 + 2) * 3, you'll need to press the "Calculate" button to see the result.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Credits
This project was created by Bekim Sylqa.
