# Sistem Data Karyawan
Simple CRUD data staff using laravel 10 and more.

## Requirements 
    1. [PHP](https://www.php.net) version 8 or higher
    2. Any browser(recommended using [Google Chrome](https://www.google.com/chrome))
    3. RDBMS [MySQL](https://www.mysql.com)(You can change it to any other RDBMS such as SQLite, PostgreSQL, etc but you have to cofigure it by your self in ENV)
    4. [Laravel](https://github.com/laravel) version 10
    5. [Yajra Datatables](https://yajrabox.com/docs/laravel-datatables/10.0/introduction) version 10
    6. [Yoeunes Toastr](https://github.com/yoeunes/toastr) version 2.3
    7. [Bootstrap](https://getbootstrap.com) version 5
    8. [SweetAlert2](https://sweetalert2.github.io/) version 11
    9. [Laravel Breeze](https://github.com/laravel/breeze) version 1.29
    10. [Jquery](https://jquery.com/) version 3.7.1
    11. [Node Js](https://nodejs.org/en/download/prebuilt-installer) version 20.13.1
    12. [Npm](https://www.npmjs.com) version 10.5.2

## Preparation
    1. Clone this repository to local directory
    2. You must update your vendor using composer
        ```sh 
            composer update
        ```
    3. After update your vendor, you must generate key for the application using artisan command
        ```sh 
            php artisan key:generate
        ```
    4. Next, you must create a database and table or simply you can create it using artisan command too
        ```sh 
            php artisan migrate
        ```
    5. After migrating the database and tables, you can insert a data or you can seed it using artisan command
        ```sh 
            php artisan db:seed
        ```
    6. Make sure you have [Node Js](https://nodejs.org/en/download/prebuilt-installer) on your PC
    7. You should install npm inside the project
        ```sh 
            npm install
        ```
    8. After installation, build the component using npm
        ```sh 
            npm run build
        ```
    9. Last, you can run the project via artisan
        ```sh 
            php artisan serve
        ```
    10. I already created default account inside the application, so you can login by just visiting login page and use these credential : 

        *Email = administrator@gmail.com
        *Password = admin

        or

        *Email = afif.al.fakri@gmail.com
        *Password = developer
    
        or you can just visiting register page and make your own account.

Good Luck ^_^