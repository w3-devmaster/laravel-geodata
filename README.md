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

[Optional] Add `Geo` facades to the `aliases` array in your `config/app.php` for use `Geo::class`:

```php
'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
        ...,
        'Geo' => W3Devmaster\GeoData\Facades\Geo::class,
])->toArray(),

```

## Basic Use

Get geography datas :

```php
use W3Devmaster\GeoData\GeoData;

$geodata = new GeoData();
$geographies = $geodata->geographies();
$provinces = $geodata->provinces();
$districts = $geodata->districts();
$subDistricts = $geodata->subDistricts();

// Or use static method
$geographies = GeoData::geographies();
$provinces = GeoData::provinces();
$districts = GeoData::districts();
$subDistricts = GeoData::subDistricts();

```

Get relate data :

```php
use W3Devmaster\GeoData\GeoData;

$province = GeoData::provinces()->first();

$districts = $province->districts;

```

Get parent data :

```php
use W3Devmaster\GeoData\GeoData;

$province = GeoData::provinces()->first();

$geography = $province->geography;

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
