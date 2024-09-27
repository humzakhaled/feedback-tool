# Product feedback tool

## Introduction

Product Feedback Tool facilitates users in submitting, viewing, and commenting on feedbacks, with added functionality for mentioning other users in comments.

## Technical Requirements

### User Authentication
1. Implement user authentication.
2. Users should be able to register, log in, and log out.

### Feedback Submission
1. Create a user-friendly form for submitting feedback.
2. Feedback should include a title, description, and a category (e.g., bug report, feature request, improvement, etc.).
3. Implement validation to ensure required fields are filled out.

### Feedback Listing
1. Display feedback items in a paginated list.
2. Each feedback item should display its title, category, and the user who submitted it.

### Commenting System
1. Enable users to leave comments on feedback items.
2. Comments should include the user's name, date, and content.
3. Implement basic formatting options (e.g., bold, italic, code blocks) for comments.

### Bonus (Mandatory for Seniors)
1. Allow users to mention other users in comments using the "@" symbol.

## User Experience (UX) Requirements
1. Ensure the tool is responsive and works well on both desktop and mobile devices.
2. Create an intuitive and user-friendly interface for users to navigate and interact with the tool.


## Installation

To run this project locally, follow these steps:

1. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

2. Create a copy of the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

3. Generate an application key:

    ```bash
    php artisan key:generate
    ```

4. Set up database connection in the `.env` file. You may use the database name 'test'.

5. Run database migrations and seed the database:
    ```bash
    php artisan migrate:fresh --seed
    ```

## Usage

To start the Laravel development server, run the following command:

```bash
php artisan serve
```
