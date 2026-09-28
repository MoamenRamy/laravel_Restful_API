# Laravel RESTful API

A RESTful API built with Laravel for managing users, lessons, and tags with authentication, authorization, API Resources, pagination, and Eloquent relationships.

## 🚀 Features

### 🔐 Authentication & Authorization

- API authentication using Laravel Passport
- HTTP Basic Authentication for API login
- Personal access token generation
- Protected API endpoints using authentication middleware
- Authorization using Laravel Policies
- Role support for users
- Public access to selected read-only endpoints

### 📚 Lesson Management

- Complete CRUD operations for lessons
- Create new lessons
- Retrieve all lessons
- Retrieve a single lesson
- Update existing lessons
- Delete lessons
- Pagination support
- Configurable pagination limit
- Maximum pagination limit of 50 records
- User-to-lesson relationship

### 👤 User Management

- Complete CRUD operations for users
- Create users with hashed passwords
- Retrieve users
- Retrieve a single user
- Update users
- Delete users
- User-to-lesson relationship
- Authorization for protected user operations

### 🏷️ Tag Management

- Complete CRUD operations for tags
- Create tags
- Retrieve tags
- Retrieve a single tag
- Update tags
- Delete tags
- Many-to-many relationship with lessons

### 🔗 Eloquent Relationships

The project demonstrates multiple Eloquent relationships:

- `User hasMany Lessons`
- `Lesson belongsTo User`
- `Lesson belongsToMany Tags`
- `Tag belongsToMany Lessons`

### 📦 API Resources

Laravel API Resources are used to transform Eloquent models into structured JSON responses.

Resources are available for:

- Users
- Lessons
- Tags

### 📄 Pagination

The API supports pagination through the `limit` query parameter.

Example:

GET /api/v1/lessons?limit=10

The requested limit is restricted to a maximum of 50 records.

---

## 🛠️ Tech Stack

| Technology | Purpose |
|---|---|
| PHP 8.1+ | Backend programming language |
| Laravel 10 | Backend framework |
| Laravel Passport | API authentication and access tokens |
| Laravel Sanctum | API authentication middleware |
| Laravel Eloquent | ORM and database relationships |
| Laravel API Resources | API response transformation |
| MySQL | Database |
| PHPUnit | Automated testing |
| Laravel Sail | Development environment |
| Laravel Pint | Code formatting |
| Guzzle | HTTP client |

---

## 🏗️ Project Architecture

```text
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
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── routes/
│   ├── api.php
│   ├── web.php
│   └── console.php
│
├── resources/
├── tests/
├── config/
├── public/
├── storage/
├── composer.json
└── artisan
