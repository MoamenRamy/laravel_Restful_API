# Laravel RESTful API

A RESTful API built with **Laravel 10** for managing users, lessons, and tags.

This project demonstrates how to build a structured REST API using Laravel with **Laravel Passport authentication, API Resources, Eloquent relationships, Policies, pagination, CRUD operations, and role-based authorization**.

---

## 🚀 Features

### 🔐 Authentication & Authorization

- Laravel Passport authentication
- HTTP Basic Authentication for login
- Personal Access Token generation
- Protected API endpoints
- Authentication middleware
- Authorization using Laravel Policies
- Role-based authorization
- Admin role support
- Password hashing
- Public read-only endpoints for selected resources

### 📚 Lesson Management

Complete CRUD operations for lessons:

- Create a lesson
- Retrieve all lessons
- Retrieve a single lesson
- Update a lesson
- Delete a lesson
- Pagination support
- Configurable pagination limit
- Maximum pagination limit of 50 records
- User-to-lesson relationship
- Authorization for update and delete operations

### 👤 User Management

Complete CRUD operations for users:

- Create users
- Retrieve all users
- Retrieve a single user
- Update users
- Delete users
- Password hashing
- Role support
- User-to-lesson relationship
- Authorization for protected operations
- Admin authorization for creating users

### 🏷️ Tag Management

Complete CRUD operations for tags:

- Create tags
- Retrieve all tags
- Retrieve a single tag
- Update tags
- Delete tags
- Many-to-many relationship with lessons

---

## 🔗 Eloquent Relationships

The project demonstrates different Laravel Eloquent relationships.

### User → Lessons

```text
User hasMany Lessons
Lesson belongsTo User

Lesson ↔ Tags

Lesson belongsToMany Tags
Tag belongsToMany Lessons

Relationship Endpoints

Method| Endpoint| Description
GET| "/api/v1/users/{id}/lessons"| Get lessons belonging to a user
GET| "/api/v1/lessons/{id}/tags"| Get tags belonging to a lesson
GET| "/api/v1/tags/{id}/lessons"| Get lessons belonging to a tag

---

📦 API Resources

Laravel API Resources are used to transform Eloquent models into structured JSON responses.

Resources are implemented for:

- Users
- Lessons
- Tags

This keeps API responses organized and separates the API representation from the database models.

---

📄 Pagination

The API supports pagination using the "limit" query parameter.

Example:

GET /api/v1/lessons?limit=10

The API limits the requested number of records to a maximum of 50.

Example:

GET /api/v1/users?limit=20

GET /api/v1/tags?limit=10

---

🔑 Authentication

Authentication is implemented using Laravel Passport.

The login endpoint uses HTTP Basic Authentication and returns a personal access token.

Login

GET /api/v1/login

Authentication:

HTTP Basic Authentication

The response contains:

{
    "User": {},
    "Access Token": "..."
}

The returned access token can then be used to access protected endpoints.

---

🔐 Authorization

Laravel Policies are used to control access to protected operations.

Lesson Authorization

Users can update or delete a lesson when:

- They own the lesson
- Or they have the "admin" role

User Authorization

Users can:

- Update their own account
- Delete their own account
- Admins can update or delete other users
- Only admins can create new users

Tag Authorization

Tag update and delete operations are protected using Laravel Policies.

---

🌐 API Endpoints

All API endpoints are versioned under:

/api/v1

---

🔐 Authentication

Method| Endpoint| Description
GET| "/api/v1/login"| Authenticate using HTTP Basic Authentication and generate an access token

---

📚 Lessons API

Method| Endpoint| Description
GET| "/api/v1/lessons"| Get all lessons
GET| "/api/v1/lessons/{id}"| Get a single lesson
POST| "/api/v1/lessons"| Create a lesson
PUT/PATCH| "/api/v1/lessons/{id}"| Update a lesson
DELETE| "/api/v1/lessons/{id}"| Delete a lesson

Get Lessons

GET /api/v1/lessons

Get Lessons With Pagination

GET /api/v1/lessons?limit=10

Get Single Lesson

GET /api/v1/lessons/1

Create Lesson

POST /api/v1/lessons

Example request:

{
    "user_id": 1,
    "title": "Laravel REST API",
    "body": "Building RESTful APIs with Laravel"
}

Update Lesson

PUT /api/v1/lessons/1

Example:

{
    "title": "Advanced Laravel REST API",
    "body": "Updated lesson content"
}

Delete Lesson

DELETE /api/v1/lessons/1

---

👤 Users API

Method| Endpoint| Description
GET| "/api/v1/users"| Get all users
GET| "/api/v1/users/{id}"| Get a single user
POST| "/api/v1/users"| Create a user
PUT/PATCH| "/api/v1/users/{id}"| Update a user
DELETE| "/api/v1/users/{id}"| Delete a user

Get Users

GET /api/v1/users

Get Users With Pagination

GET /api/v1/users?limit=10

Get Single User

GET /api/v1/users/1

Create User

POST /api/v1/users

Example request:

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password"
}

The password is hashed before being stored in the database.

Update User

PUT /api/v1/users/1

Example:

{
    "name": "John Updated",
    "email": "john.updated@example.com"
}

Delete User

DELETE /api/v1/users/1

---

🏷️ Tags API

Method| Endpoint| Description
GET| "/api/v1/tags"| Get all tags
GET| "/api/v1/tags/{id}"| Get a single tag
POST| "/api/v1/tags"| Create a tag
PUT/PATCH| "/api/v1/tags/{id}"| Update a tag
DELETE| "/api/v1/tags/{id}"| Delete a tag

Get Tags

GET /api/v1/tags

Get Tags With Pagination

GET /api/v1/tags?limit=10

Get Single Tag

GET /api/v1/tags/1

Create Tag

POST /api/v1/tags

Example request:

{
    "name": "Laravel"
}

Update Tag

PUT /api/v1/tags/1

Example:

{
    "name": "Laravel API"
}

Delete Tag

DELETE /api/v1/tags/1

---

🔗 Relationship API

Get User Lessons

GET /api/v1/users/{id}/lessons

Example:

GET /api/v1/users/1/lessons

Returns the lessons belonging to the specified user.

Get Lesson Tags

GET /api/v1/lessons/{id}/tags

Example:

GET /api/v1/lessons/1/tags

Returns the tags associated with the specified lesson.

Get Tag Lessons

GET /api/v1/tags/{id}/lessons

Example:

GET /api/v1/tags/1/lessons

Returns the lessons associated with the specified tag.

---

🧱 Project Architecture

laravel_Restful_API/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── API/
│   │   │       ├── LessonController.php
│   │   │       ├── LoginController.php
│   │   │       ├── RelationshipController.php
│   │   │       ├── TagController.php
│   │   │       └── UserController.php
│   │   │
│   │   └── Resources/
│   │       ├── Lesson.php
│   │       ├── Tag.php
│   │       └── User.php
│   │
│   ├── Models/
│   │   ├── Lesson.php
│   │   ├── Tag.php
│   │   └── User.php
│   │
│   └── Policies/
│       ├── LessonPolicy.php
│       ├── TagPolicy.php
│       └── UserPolicy.php
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│
├── routes/
│   ├── api.php
│   ├── web.php
│   └── console.php
│
├── tests/
│
├── config/
├── public/
├── storage/
│
├── composer.json
├── composer.lock
├── artisan
└── README.md

---

🛠️ Tech Stack

Technology| Purpose
PHP 8.1+| Backend programming language
Laravel 10| Backend framework
Laravel Passport| API authentication and access tokens
Laravel Sanctum| Authentication middleware support
Laravel Eloquent| ORM and database relationships
Laravel API Resources| API response transformation
MySQL| Database
PHPUnit| Automated testing
Laravel Sail| Development environment
Laravel Pint| Code formatting
Guzzle| HTTP client
Composer| PHP dependency management

---

⚙️ Installation

1. Clone the Repository

git clone https://github.com/MoamenRamy/laravel_Restful_API.git

Move into the project directory:

cd laravel_Restful_API

2. Install PHP Dependencies

composer install

3. Create Environment File

Linux / macOS

cp .env.example .env

Windows

copy .env.example .env

4. Generate Application Key

php artisan key:generate

5. Configure Database

Open the ".env" file and configure your database credentials.

Example:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_restful_api
DB_USERNAME=root
DB_PASSWORD=

6. Run Migrations

php artisan migrate

7. Install Passport

php artisan passport:install

8. Start the Development Server

php artisan serve

The API will be available at:

http://127.0.0.1:8000

---

🧪 Testing the API

You can test the API using:

- Postman
- Insomnia
- cURL
- Laravel automated tests

For authenticated requests, provide the generated Passport access token:

Authorization: Bearer YOUR_ACCESS_TOKEN

For JSON requests:

Accept: application/json
Content-Type: application/json

---

🧪 Running Tests

Run the Laravel test suite:

php artisan test

Or:

./vendor/bin/phpunit

---

🔄 RESTful API Design

The project follows Laravel's RESTful resource routing through "apiResource".

Example:

Route::apiResource('lessons', LessonController::class);

This automatically provides the standard CRUD routes:

GET       /lessons
POST      /lessons
GET       /lessons/{lesson}
PUT/PATCH /lessons/{lesson}
DELETE    /lessons/{lesson}

The same approach is used for:

users
tags

---

🔒 Protected Endpoints

The API uses authentication middleware to protect write operations.

Public operations include:

GET /api/v1/lessons
GET /api/v1/lessons/{id}

GET /api/v1/users
GET /api/v1/users/{id}

GET /api/v1/tags
GET /api/v1/tags/{id}

Write operations require authentication and, where applicable, authorization through Laravel Policies.

---

🧠 Laravel Concepts Demonstrated

This project demonstrates several important Laravel backend concepts:

- RESTful API architecture
- API versioning
- Resource Controllers
- CRUD operations
- Laravel API Resources
- Laravel Passport
- Authentication middleware
- HTTP Basic Authentication
- Personal Access Tokens
- Authorization
- Laravel Policies
- Role-based authorization
- Eloquent ORM
- One-to-Many relationships
- Many-to-Many relationships
- API Resource Collections
- Pagination
- Query parameters
- JSON responses
- HTTP status codes
- Mass assignment
- Password hashing
- Model relationships
- Database migrations
- Database factories
- Database seeders
- PHPUnit testing
- Laravel Sail
- Laravel Pint

---

📌 API Versioning

The API uses versioning through the "/v1" prefix:

/api/v1

This approach allows future versions of the API to be introduced without breaking existing clients.

Example:

/api/v1/lessons
/api/v2/lessons

---

📁 Main Controllers

LessonController

app/Http/Controllers/API/LessonController.php

Responsible for lesson CRUD operations.

UserController

app/Http/Controllers/API/UserController.php

Responsible for user CRUD operations.

TagController

app/Http/Controllers/API/TagController.php

Responsible for tag CRUD operations.

LoginController

app/Http/Controllers/API/LoginController.php

Responsible for authentication and access token generation.

RelationshipController

app/Http/Controllers/API/RelationshipController.php

Responsible for relationship-based endpoints.

---

📜 License

This project is open-sourced under the MIT License.

---

👨‍💻 Author

Moamen Ramy

PHP / Laravel Backend Developer

- GitHub: "MoamenRamy" (https://github.com/MoamenRamy)
- LinkedIn: "Moamen Ramy" (https://www.linkedin.com/in/moamen-ramy-492a8b212/)

---

⭐ Project Purpose

This project was created as a practical Laravel backend project to demonstrate the implementation of a RESTful API using Laravel.

It focuses on:

- Authentication
- Authorization
- API Resources
- Eloquent relationships
- CRUD operations
- Pagination
- API versioning
- RESTful API architecture
- Laravel Policies
- Laravel Passport
- Clean API structure
