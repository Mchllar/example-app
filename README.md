[School of Graduate Studies System]

--------------------Installation Instructions------------------

Clone the project repository
git clone git@github.com:Mchllar/SGS.git 

cd SGS

Install project dependencies
composer update

Copy the project environment variables
copy .env.example .env

Generate Project Key
php artisan key:generate

Link storage folder with the public folder
php artisan storage:link

Run migrations to populate the database
php artisan migrate:fresh

Run the seeders to populate the tables with seeded data
php artisan db:seed --class=StudentMTableSeeder
php artisan db:seed --class=StudentzMTableSeeder
php artisan db:seed --class=SupervisorMTableSeeder
php artisan db:seed --class=SupervisorAllocationSeeder
php artisan db:seed --class=SpecificUserSeeder (Add your name and details in this seeder to access the system as an admin)

Run the queue worker
php artisan queue:work

Run project locally
php artisan serve

Security Vulnerabilities
If you discover a security vulnerability within this application, please send a report peter.aringo@strathmore.edu/ michelle.guya@strathmore.edu 

License
This project is an open-sourced software licensed under the Apache license.