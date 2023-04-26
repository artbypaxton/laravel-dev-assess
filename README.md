## About This Project

This simple blog project was created using the Laravel framework. As a development candidate, it is important that you can look at an unfamilar codebase and be able to uncover how it functions. At Abenity, we utilize Laravel and PHP to power our applications. We have developed this simple starter project that contains development tasks for you to complete. Check out the installation instructions to get started!

___

## Installation Instructions

1. Clone the repository to your local machine. If you are a Windows user, you will need to clone this repo down into one of your WSL distributions. If you need assistance with this, please let us know.
2. Download and install Docker Desktop [here](https://www.docker.com/products/docker-desktop/). Once downloaded, open Docker Desktop and start the Docker Engine.
3. Open up a terminal and navigate to your project's root folder. \
`cd /path/to/project`
4. Copy the .env.example file to .env \
`cp .env.example .env`
5. Install composer dependencies
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
6. Boot up the website using docker \
`./vendor/bin/sail up` \
You can pass the `-d` flag to operate in detached mode to free up your terminal.
7. Generate an application key \
`./vendor/bin/sail artisan key:generate`
8. Run database migrations. \
`./vendor/bin/sail artisan migrate`
9. Run database seeder. \
`./vendor/bin/sail artisan db:seed`
10. Create the storage link. \
`./vendor/bin/sail artisan storage:link`
11. Install assets and run vite server. \
`./vendor/bin/sail npm install` \
`./vendor/bin/sail npm run dev`
12. Navigate to `localhost` in your browser of choice.
13. Before you begin, you'll need to register as a new user. The mail driver is set to 'log' so you'll need to use laravel.log for any emails.

___

## Completing Your Assessment

1. Create a new development branch of the repo using your first and last name as the branch name (_first-last_). You will do all development work on this branch.
2. Locate the `tasks` folder in the project root. This folder contains various markdown files with documented bugfixes, change requests, or new feature requests for this application that have been sent to you from other team members. Feel free to do as many tasks as you would like and to address them in any order you wish. The more tasks you do, the more of your skills we are able to see.
3. You should have 1 commit per task. The commit message should be the title of the task (found in the task markdown) with an appropriate description of what was done. If any data is needed for us to accurately check your work, be sure to include the necessary database seeders in your commits.
4. BONUS: Abenity strives to always make something 1% better - is there something you can add unique to your skill set that could make this blog 1% better?
5. Once you have completed all of the tasks that you wish to do, zip up the project folder and let us know in a followup email that you have completed the assessment. Be sure to include your zipped up project in the email.
6. At your followup technical interview, you will have the chance to walk through your application updates with the development team and explain the choices that you made.

___

## Helpful Links
- [Laravel Documentation](https://laravel.com/docs/10.x)
- [TailwindCSS Documentation](https://tailwindcss.com/docs)

Copyright Abenity, Inc. 2023

This repository is intended for private usage only. Please do not publish any copies publicly online.
