# apitask
FIRST CLONE THIS CODE FROM REPO 
Clone your project
Go to the folder application using cd command on your cmd or terminal
Run composer install on your cmd or terminal
Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows 
Open your .env file and change the database name (apitask) 
By default, the username is root and you can leave the password field empty.
Run php artisan key:generate
Run php artisan migrate
Run php artisan serve
Go to localhost:8000

register a new user with its credentials 

FIRST LOGIN VIA JWT :
POST REQUEST
enter email and password.
localhost/apitask/public/api/login

a token will be generated,save that and now visit all CRUD Api one by one:
1)     GET REQUEST ,TO GET ALL CARS 
USE bearer token you got after login
   localhost/apitask/public/api/cars
2)   POST REQUEST use bearer token ,TO ADD A NEW CAR
localhost/apitask/public/api/car/add
3) DELETE A CAR,DELETE REQUEST use bearer token for auth,
localhost/apitask/public/api/car/delete
4) POST REQUEST ,UPDATE CAR FEATURES  use bearer token here as well.
localhost/apitask/public/api/car/edit.
 
