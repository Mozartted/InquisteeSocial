# InquisteeSocial

![](https://img.shields.io/badge/mozartted-approved-blue.svg)
[![License](https://poser.pugx.org/unicodeveloper/laravel-wikipedia/license.svg)](LICENSE.md)
[![Fork](https://github.com/ntkme/github-buttons/fork)](https://github.com/Mozartted/InquisteeSocial#fork-destination-box)

> A Social Network Web Application Build of Laravel 5.3

# Table of Contents
- [Download](##Download)
- [Installation](##Installation)
- [Change Log](#Change-log)
- [Inspiration](#Inspiration)
- [Third-Party Libraries](#third-party-libraries)
- [How can I thank you](#How-can-I-thank-you?)
- [License](#License)
- [Security](#Security)

## Download

Download the project on github.com/Mozartted/InquisteeSocial or clone the project
```bash
git clone https://github.com/Mozartted/InquisteeSocial.git InquisteeSocial
```
this would create a folder InquisteeSocial and clone the project into the folder


## Installation

[PHP](https://php.net) 5.6+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

First, pull in the packages through Composer.

``` bash
$ composer update
```
In the storage directory create an sqlite file called inquistee.sqlite and the run the following command in console

```php
    $ php artisan migrate --path database/migrations/migration_main_set
		$ php artisan migrate --path database/migrations/migration_likes
		$ php artisan migrate --path database/migrations/migrations_pivot_tables
```
There are 4 sets of migrations namely
* migration_profile_set - this creates the main tables of the application
* migration_like - this creates the ables associated with like features
* migrations_pivot_tables - the pivot tables go here.

After these simply serve via artisan and you are good to go :smile:
```php
$	php artisan serve
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Inspiration

 * [Larasocial](https://github.com/msalom28/Larasocial)

## Thrid Party Libraries
The Following third party libraries were inlcuded in building this project aside those provided by the Laravel framework
- [Socialite](https://github.com/laravel/socialite) - A composer packaged library for OAuth Logins and requests
- [Croppie.js](https://github.com/Foliotek/Croppie) - A Javascript library for cropping images
- [Laravel Collective](https://github.com/LaravelCollective/laravelcollective.com) - A Laravel Package for html templating using blade

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/mozartted)!

Thanks!
Chibuike Emmanuel Osita.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Security

If you discover any security related issues, please email [mozart.osita@gmail.com](mozart.osita@gmail.com) instead of using the issue tracker.
