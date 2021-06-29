* Change directory inside the project
$cd Talabat

* Run this command to install composer package
$composer install
	
* Run this command to update composer packages
$composer update

* Create a copy of your .env file
$cp .env.example .env

* Generate an app encryption key
$php artisan key:generate

* Create an empty database for our application in your DBMS

* In the .env file, add database information to allow Laravel to connect to the database

* Migrate the database
$php artisan migrate

* To create 3 roles of the application 
$php artisan permission:create-role admin
$php artisan permission:create-role vendor
$php artisan permission:create-role customer

* To seed admin 
$php artisan db:seed --class=UserSeeder

* Run command to adjust admin role 
$php artisan tinker 
>> DB::table("model_has_roles")
      ->insert(["role_id"=>"1", "model_type"=>"App\Models\User" , "model_id"=>"1"]);
           
* Navigate to http://127.0.0.1:8000/login to go to admin login form 
  email: admin@admin.com
  password: admin123

* Create from the interface at least 3 cuisines   

Contributors :
Maryem Mohamed Sherif-
Rewan Mohammed Naguib (Team Leader)-
Sara Ramadan El Shater-
Somaia Bahaa El Din Hussein-
Toka Mohamed Attiah-


Deployment Link :
https://blooming-atoll-60288.herokuapp.com





![erd2](https://user-images.githubusercontent.com/79705893/123463779-3ac63b00-d5ec-11eb-990a-4683eb548ff7.PNG)

