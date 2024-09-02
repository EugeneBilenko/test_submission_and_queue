# Laravel API Project

This project is a test Laravel app. It that provides an API endpoint for accepting and processing form submissions.
The submissions are processed asynchronously using Laravel jobs, and the data is stored in a `submissions` table.

## Setup Instructions

Follow these steps to set up the project locally.

1. Clone repository

git clone https://github.com/your-username/test_task.git


2. Go to project and run commands to complete instalation

cd test_task

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve

php artisan queue:work


3. Endpoint Details:

URL: /api/save
Method: POST
Payload: 
{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}

4. Expected response:

Success: Returns a 200 OK status with a success message.
Validation Error: Returns a 400 Bad Request status with error details if any required fields are missing.
Processing Error: If an error occurs during job processing, a 500 Internal Server Error status is returned


5. Run test:

php artisan test
