# Task Management Application

This is a simple Laravel web application for managing tasks. With this application, you can read, create, edit, delete, and reorder tasks using drag-and-drop functionality. Tasks can be associated with projects, and you can filter tasks by project.

## Features

- Show the tasks and projects
- Create, edit, and delete tasks
- Reorder tasks with drag-and-drop; priorities update automatically
- Tasks are saved to a MySQL database
- Project functionality: associate tasks with projects and filter tasks by project

## Requirements

- PHP >= 8.0
- Composer
- Node.js and npm
- MySQL

## Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/OneTechSavvy/task-management-app.git
   cd task-management-app

2. **Install PHP Dependencies:**

    Make sure you have PHP installed on your system. If not, download it from php.net and add it to your system's PATH.

    ```sh
    composer install
    ```

    This command installs all PHP dependencies defined in `composer.json`.

3. **Install JavaScript Dependencies:**

    Node.js and npm are required for managing JavaScript dependencies. Install them by running `npm install`.

4. **Set Up the Environment File:**

    `cp .env.example .env`

5. **Generate an Application Key:**

    `php artisan key:generate`

6. **Migrate and do seeding:**

    `php artisan migrate --seed`

7. **Compile the Front-end Assets by using Vite:**

    `npm run dev`

8. **Serve the application**

    `php artisan serve`

The application will be accessible at `http://127.0.0.1:8000`.

That's it!

*Here are the screenshots that show all the pages in this application.*

![alt text](public\images\image.png)
![alt text](public\images\image-6.png)
![alt text](public\images\image-7.png)
![alt text](public\images\image-8.png)
![alt text](public\images\image-1.png)
![alt text](public\images\image-2.png)
![alt text](public\images\image-3.png)
![alt text](public\images\image-4.png)
![alt text](public\images\image-5.png)
