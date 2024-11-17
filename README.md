<style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1, h2 {
            font-size: 2.5em;
            text-align: center;
            padding: 10px;
            color: #ffffff;
            border-bottom: 6px solid #00b2ff;
            padding-bottom: 10px;
            margin-bottom: 20px;
            background-image: linear-gradient(to right, #00b2ff, #000000);

        }
        p {
            font-size: 1.2em;
            color: #34495e;
            margin-top: 20px;
        }
        ul {
            list-style-type: square;
            margin-left: 20px;
        }
        code {
            background-color: #eaeaea;
            color: #03962a;
            padding: 2px 4px;
            border-radius: 4px;
        }
        pre {
            background: #ecf0f1;
            border: 1px solid #bdc3c7;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .highlight {
            background-color: #ffffcc;
            padding: 5px;
            border-radius: 4px;
        }
</style>


# Learning Notes Application

This Application allows users to create, categorize, and filter notes. Each note can be associated with categories, resource types, and completion status. The application includes powerful filtering and search features to enhance user experience.

## Features

**User Authentication:** User registration and login.

**Notes Management:** Create, edit, delete, and categorize notes.

**Category Management:** Users can create unique categories for themselves(categories are unique only per user).

**Resource Types:** Associate each note with a specific resource type (video, article, book, etc.).

**Completion Status:** Mark notes as completed or in progress.

**Filtering:** Filter notes by categories, resource types, and status.

**Search:** Search notes by title and description.
**Pagination:** Notes are paginated for easier navigation.

## Installation

### Prerequisites

* PHP >= 8.2
* Composer
* Laravel
* Node.js & npm

### Steps

1. Clone the repository

* ```git clone https://github.com/Volodymyr0587/laravel-learning-notes```

* ```cd laravel-learning-notes```

2. Install dependencies

* ```composer install```

* ```npm install```

* ```npm run dev```

3. Set up the environment

* ```cp .env.example .env```

* ```php artisan key:generate```

4. Database

* ```use sqlite for simplicity```

5. Run migrations 

* ```php artisan migrate```

6. Create a symbolic link

* ```php artisan storage:link```

7. Serve the application

* ```php artisan serve```

## Usage
Register a new user. Enjoy :) 

Optionally, you can populate the database with test data:

```php artisan migrate:fresh --seed ```

 and log in with the following credentials:

```email: test@example.com```

```password: password123```
