# Moon Light CMS

## Description
this is an admin dashboard build with [Laravel](https://laravel.com/) ,[Inertia JS](https://inertiajs.com/) , [Vue 3](https://vuejs.org/) and [AdminLTE](https://adminlte.io/themes/v3/index.html)

## features
- Login
- Register
- Auth Using `Google`
- Email Verification
- Password Reset
- User CRUD
- Roles and Permissions

## Requirements
- the same as [Laravel](https://laravel.com/docs/master/installation)
- [npm](https://nodejs.org/en/)


## Usage
- download the repo
```bash
git clone git@github.com:abdallhsamy/moon-light-cms.git
```
- add `configuration file` and edit `DB Credentials`
```bash
cp .env.example .env
```
- install dependencies
```bash
composer install
```
- run migrations
```bash
php artisan migrate --seed
```

## Commands
- add new Menu Item to sidebar
```bash
php artisan make:sidebar-item <item>
```
- add Index vue component to specific module
```bash
php artisan make:index-vue  <module>  {--force}
```
