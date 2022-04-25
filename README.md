1.	Composer install
2.	cp .env.example .env
3.	php artisan key:generate
4.	create a database e.g  DB_DATABASE=pezeshadb
5.	Set .env from  QUEUE_CONNECTION=sync to QUEUE_CONNECTION=database
6.	php artisan migrate
7.	create a folder named pending-files inside resources directory
8.	php artisan queue:work
9.	Now upload csv file
