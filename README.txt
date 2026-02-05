1- Cloning the repository.
2- Creating new branch `feature-laravel-kusalw` from `main` for laravel related development.
3- Creating new branch `feature-laravel-initial_setup` for initial laravel envirnment setup.
4- Creating new laravel application.
5- Configuring the database and gitignore.
6- Commiting to the git as `feat(laravel): initial envirnment setup`.
7- Creating the `tours` migration and `Tours` model - `php artisan make:model Tours -m`.
8- Setting up fields/columns to migration n model.
9- Used uuid instead of id(bigincrement) as primary key for avoiding the guessing the tour id for any user - for security purpose and used the `HasUuids` trait in model instead of implementing the uuid generation from `Str` class.
10- Commiting to the git as `feat(laravel): feat(laravel): configuring the tours migration n model`.
11- Creating the `ToursSeeder` with dummy data - `feat(laravel): configuring the tours migration n model`.
12- Commiting to the git as `feat(laravel): configuring the tours seeder`.
13- Declaring the toursseeder clas with databaseseeder.
13- Running the seeder.
14- Creating the `TourRequest` for Tour validation from the backend with custom validation error messages.
15- Creating the `TourController` for CRUD operations.
16- Creating the `api.php` file for api endpoints and declaring the endpoints.
17- Adding `RouteServiceProvider` for bootstrapping the api endpoints.
18- Adding the functions for CRUD within TourController.
19- Adding tours api endpoints.
20- Implementing the function in Tourcontroller for generating the tour report.
21- Declaring the endpoint for tours/process-report in api.php.
22- Creating the `Algorithm Controller` for function of closest upcoming tour generation.
23- IMplementing the enndpoint for closest upcoming tour generation.