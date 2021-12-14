# Student Registration System
This is the project of Database course, CPE, KMUTT. This web application can manage and register the class for the students in the university. We have 3 roles of user which is
1. Student: Can register/withdraw the class, pay the fee (mockup)
2. Professor: Can manage the students that registered to their class, also grading them.
3. Admin: Can manage and add advisor to each student, manage the registration, add new class, assign a class to the professor, also see the analysis of the data.

## Tools and implementation
- Laravel
- MySQL & phpmyadmin & xampp
- tailwindcss

## Group Members
- Krittin Srithong
- Thanasit Suwanposri
- Siriphorn Jarisu

## How to run this project. (macOS)
1. Clone this project in to your computer. 
2. Go to project directory, install dependencies and update composer if needed.
```zsh
$ cd cpe231_proj4
$ npm install
$ composer update
```
3. Create a new `.env` file at root directory. Copy everything from `.env.example` (Default port is 3306)
4. Generate the app key.
```zsh
php artisan key:generate
```
5. Go to `vendor/laravel/ui/auth-backend/RegisterUsers.php` and add `use Illuminate\Support\Facades\DB;` at the top, then replace this code in `showRegistrationForm()`
```php
$facLists = DB::table('facInfo')->get();

return view('auth.register', [
            'facLists' => $facLists
]);
```
5. Start xampp and import the Final_pj.sql to your phpmyadmin.
6. Start the developement server.
```zsh
php artisan serve
```