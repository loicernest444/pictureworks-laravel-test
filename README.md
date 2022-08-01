<h1 align="center"><b>Pictureworks Test</b></h1>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Deployment

## Prerequisites
- install composer
- install php 8
- install node 14
- install posgresql
- create \<pictureworksdb\> database
- add the \<USERNAME\> and the \<PASSWORD\> of your database in .env file after running commands below

To deploy the project, run commands below in the project root directory
```bash
$ composer install
```
```bash
$ npm install
```
```bash
$ cp .env.example .env
```
```php
$ php artisan key:generate
```
```php
$ php artisan migrate
```
```php
$ php artisan db:seed
```
```php
$ php artisan serve
```
```php
$ npm run dev
```

```php artisan db:seed``` command has seed your database with 10 users

**_Now your application is available on http://127.0.0.1:8000_**
# **Routes**
### **1. Web route http://127.0.0.1:8000/user/{id}**
This link is use to access the page which content the details of user with id is {id}. Details are the name, picture and comments


### **2. Web route http://127.0.0.1:8000/update-user**
This link is use to access the page which content the form for user updating. The right password is <b>720DF6C2482218518FA20FDC52D4DED7ECC043AB</b>

### **3. API route http://127.0.0.1:8000/api/update-user**
This api route is use to send user datas for updating
- Example :
```json
{
  "id": 2,
  "password": "720DF6C2482218518FA20FDC52D4DED7ECC043AB",
  "comments": "Json test"
}
```
# **Commands**
- There are command for update user comments. Test it by runing
```php
$ php artisan update:comments <id: The ID of the user> <comments: The new user comment>
```
# **Testing**
- User details fetching test is implement in **UserCrudTest** class. Test it by running
```php
$ php artisan test --filter UserCrudTest
```
- Test for updating user comments with console command is implement in **UpdateUserCommentsTest** class. Test it by running
```php
$ php artisan test --filter UpdateUserCommentsTest
```

- To make all tests at one time
```php
$ php artisan test
```