# Geo Data Library for Laravel (Thailand)

[![Latest Version](https://img.shields.io/github/release/w3-devmaster/laravel-geodata.svg?style=flat-square)](https://github.com/w3-devmaster/laravel-geodata/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/w3-devmaster/laravel-geodata.svg?style=flat-square)](https://packagist.org/packages/w3-devmaster/laravel-geodata)

## Installation

Install with composer : 

```bash
composer require w3-devmaster/laravel-geodata
```
Publish package files :

```bash
php artisan geodata:publish
```

Install package datas :

```bash
php artisan geodata:install
```

## Basic Use

Get geography datas :

```php
use W3Devmaster\GeoData\GeoData;

$geodata = new GeoData();
$geographies = $geodata->geographies();

// Or
$geographies = GeoData::geographies();

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
