<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> -->

## ABOUT PROJECT

This project is the result of a collaboration between ON Digital Solution and StarfitIDN, who have jointly developed a web application specifically designed for event management. This application offers various features that simplify the management of events, from planning to execution. All copyrights and licensing of this application are under the ownership of ON Digital Solution, ensuring the quality and security of the application in use.

## INSTALL PROJECT ON LOCAL DEVELOPMENT

### Clone Repository

```
git clone https://github.com/seno21/starfitidn.git
cd starfitidn
```

### Run Composer Install & Update

```
composer install
composer update
```

### Config .env File

```
cp .env.example .env
```

Change database configuration using `mysql`, setting port, database name, user and password.
\nChange `FILESYSTEM_DISK` from `local` to `public` or disable using comment `# FILESYSTEM_DISK`.

### Migrate Database and Seeder

```
php artisan migrate:refresh
```

Migrate seeder for default data in table database, in below example using `UserSeeder`

```
php artisan db:seed --class=UserSeeder
```

### Link Storage to Public Folder

```
php artisan storage:link
```

### Ser Laravel Encrypt

```
php artisan key:generate
```

### Run Project (Development)

```
php artisan config:cache
php artisan serve
```
