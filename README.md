# Sistem Informasi Manajemen Sekolah

***

## Table of Content

- [Sistem Informasi Manajemen Sekolah](#sistem-informasi-manajemen-sekolah)
  - [Table of Content](#table-of-content)
  - [Third Party](#third-party)
    - [Front End](#front-end)
    - [Back End](#back-end)
  - [Installation](#installation)

## Third Party

### Front End

| Name      | Link                       |
| --------- | -------------------------- |
| Bootstrap | <https://getbootstrap.com> |
| Jquery    | <https://jquery.com>       |

### Back End

| Name                      | Link                                                        |
| ------------------------- | ----------------------------------------------------------- |
| Jetstream Livewire        | <https://jetstream.laravel.com/>                            |
| Spatie Laravel Permission | <https://spatie.be/docs/laravel-permission/v5/introduction> |
| DOMPDF                    | <https://github.com/barryvdh/laravel-dompdf>                |

## Installation

1. Clone Repo: `git clone https://github.com/GalehLudi/Sistem-Informasi-Manajemen-Sekolah.git`
2. Rename `env` file to `.env`
3. Run `composer update`
4. Run `php artisan key:generate`
5. Change `.env` file on `DB_DATABASE` to your database name
6. Check and change `DB_USERNAME` and `DB_PASSWORD` to your configuration database
7. Run `php artisan migrate` or `php artisan migrate:refresh`
8. Run `php artisan db:seed`
9. Run server using `php artisan serve`

Login :&#x20;
| Email             | Password |
| ----------------- | -------- |
| `admin@gmail.com` | Admin123 |

***
Sistem Informasi Manajemen Sekolah created by [Galeh Ludi](https://instagram/galehludi/)
