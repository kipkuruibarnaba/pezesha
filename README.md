clone the app from git 

1.	Composer install
2.	cp .env.example .env
3.	php artisan key:generate
4.	Configure env variables, MARVEL_ENDPOINT, API_KEY and PRIVATE_KEY are got from marvel created account
       •	create a database e.g  DB_DATABASE=pezeshadb
       •	change QUEUE_CONNECTION=sync to QUEUE_CONNECTION=database
       •	MARVEL_ENDPOINT= 
       •	API_KEY=
       •	PRIVATE_KEY= 
5.	php artisan migrate
6.	create a folder named pending-files inside resources directory
7.	php artisan queue:work
8.	Now upload csv file

