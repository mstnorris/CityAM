# City A.M. Developer Technical Test

## Contents

1. [City A.M. Repository](https://github.com/mstnorris/CityAM)
2. [readme](readme.md)
3. [Installation](installation.md)
4. [Instructions](instructions.md)
5. [Report](report.md)

## Installation

I hope I haven't forgotten any steps, no doubt I've missed one or two. But here goes...

1. Clone this repository

    ```
    git clone https://github.com/mstnorris/CityAM cityam
    ```

2. Install dependencies

    ```
    composer install
    npm install
    ```

3. Compile Assets

    ```
    gulp
    ```

4. Create an environment file and edit your database setup

    ```
    cp .env.example .env
    ```
    
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=cityam
    DB_USERNAME=username
    DB_PASSWORD=password
    ```

5. Generate Application Key

    ```
    php artisan key:generate
    ```

6. Run the database migrations

    ```
    php artisan migrate
    ```

7. Set up the scheduler to run cron jobs

8. Edit your `/etc/hosts` file and re-provision your local server

9. Visit the domain you provided in the above step in your browser and access the '/news' route.