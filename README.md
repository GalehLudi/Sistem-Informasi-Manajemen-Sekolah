# Sistem Informasi Manajemen Sekolah

## Table of Content

- [Sistem Informasi Manajemen Sekolah](#sistem-informasi-manajemen-sekolah)
  - [Table of Content](#table-of-content)
  - [Third Party](#third-party)
    - [Front End](#front-end)
    - [Back End](#back-end)
  - [Installation](#installation)
    - [Composer](#composer)
    - [Node Js](#node-js)
    - [Laravel](#laravel)
    - [User Login](#user-login)

## Third Party

### Front End

| Name      | Link                        |
| --------- | --------------------------- |
| Bootstrap | <https://getbootstrap.com/> |
| Jquery    | <https://jquery.com/>       |

### Back End

| Name                      | Link                                                        |
| ------------------------- | ----------------------------------------------------------- |
| Jetstream Livewire        | <https://jetstream.laravel.com/>                            |
| Spatie Laravel Permission | <https://spatie.be/docs/laravel-permission/v5/introduction> |
| DOMPDF                    | <https://github.com/barryvdh/laravel-dompdf>                |

## Installation

### Composer

Before run `composer update`

- Install [composer](https://getcomposer.org/) first if you don't have it in your machine

### Node Js

Before run `npm install` and `npm run build`

- Install [Node Js](https://nodejs.org/en/) first if you don't have it in your machine

### Laravel

1. Clone Repo: `git clone https://github.com/GalehLudi/Sistem-Informasi-Manajemen-Sekolah.git`
2. Rename `env` file to `.env`
3. Run `composer update`
4. Run `php artisan key:generate`
5. Change `.env` file on `DB_DATABASE` to your database name
6. Check and change `DB_USERNAME` and `DB_PASSWORD` to your configuration database
7. Run `npm install`
8. Run `npm run build`
9. Run `php artisan migrate` or `php artisan migrate:refresh`
10. Run `php artisan db:seed`
11. Run server using `php artisan serve`

### User Login

| Email              | Password  | Level       |
| ------------------ | --------- | ----------- |
| `admin@gmail.com`  | Admin123  | Super Admin |
| `admin2@gmail.com` | Admin123  | Admin       |
| `publik@gmail.com` | Publik123 | Publik      |

## Update

```text
> Fix error (03-11-2022)
> Change logo url & add db seed (05-12-2022)
```

***

Sistem Informasi Manajemen Sekolah created by [Galeh Ludi](https://instagram/galehludi/)
