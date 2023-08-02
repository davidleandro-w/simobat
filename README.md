# INSTALASI
1. run this command
   ```
   1. git clone https://github.com/davidleandro-w/simobat.git
   2. composer install
   3. cp .env.example .env
   4. php artisan key:generate
   ```
2. change database name in .env
   ```
    DB_DATABASE=simobat
    DB_USERNAME={sesuaikan}
    DB_PASSWORD={sesuaikan}
   ```
3. run this command
    ```
    1. php artisan migrate
    2. php artisan db:seed
    3. php artisan serve
    ```
4. Login dengan
   ```
   username=superadmin
   password=superadmin
   ```