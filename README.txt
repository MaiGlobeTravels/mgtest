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
24- Creating new branch for VUE related development.
26- 


API:
API Endpoints (Tours)
Note: tours use UUID as primary key in routes (e.g. /api/tours/3fa85f64-5717-4562-b3fc-2c963f66afa6)

1) List tours
- Method: GET
- Route: /api/tours
- Response 200:
{
    "data": [
        {
            "id": "uuid",
            "title": "Beach Escape",
            "description": "4-day beach package",
            "date": "2026-03-04",
            "price": 299.99,
            "created_at": "2026-02-01T10:00:00Z",
            "updated_at": "2026-02-01T10:00:00Z"
        }
    ]
}

2) Get tour details
- Method: GET
- Route: /api/tours/{id}
- Response 200:
{
    "data": {
        "id": "uuid",
        "title": "Beach Escape",
        "description": "...",
        "date": "2026-03-01",
        "price": 299.99,
        "created_at": "...",
        "updated_at": "..."
    }
}
- Response 404:
{
    "message": "Tour not found."
}

3) Create a tour
- Method: POST
- Route: /api/tours
- Request payload (application/json):
{
    "title": "Beach Escape",
    "description": "4-day beach package",
    "date": "2026-03-01",
    "price": 299.99,
}
- Success 201:
{
    "message": "Tour created.",
    "data": {
        "id": "uuid",
        "title": "...",
        ...
    }
}
- Validation 422:
{
    "message": "Validation failed.",
    "errors": {
        "title": ["The title field is required."],
        "date": ["The start date must be a date after or equal to today."]...
    }
}

4) Generate tours report
- Method: POST
- Route: /api/tours/process-report
- Purpose: produce report

- Response 200:
{
    "message": "Report generated.",
}


7) Closest upcoming tour(s)
- Method: GET
- Route: /api/tours/closest-upcoming
- Response 200:
{
    "data": [
        {
            "id": "uuid",
            "title": "Sunrise Hike",
        }
    ]
}
- 200 with empty array if none upcoming

Common validation error format (TourRequest)
- 422:
{
    "message": "Validation failed.",
    "errors": {
        "field_name": ["Error message 1", "Error message 2"]
    }
}

Common error format
- 500:
{
    "message": "An unexpected error occurred."
}
- 401 (if protected endpoints added):
{
    "message": "Unauthenticated."
}

Notes
- All payloads and responses are JSON.
- IDs are UUID strings.
- Dates use ISO 8601 (YYYY-MM-DD) for date-only fields.
- Use appropriate HTTP status codes: 200, 201, 204, 404, 422, 500.