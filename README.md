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
