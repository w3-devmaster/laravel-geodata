<?php

if(!function_exists('geo')) {
    function geo() {
        return app('geo');
    }
}

if(!function_exists('geographies')) {
    function geographies() {
        return app('geo')->geographies();
    }
}

if(!function_exists('provinces')) {
    function provinces() {
        return app('geo')->provinces();
    }
}

if(!function_exists('districts')) {
    function districts() {
        return app('geo')->districts();
    }
}

if(!function_exists('subDistricts')) {
    function subDistricts() {
        return app('geo')->subDistricts();
    }
}

if(!function_exists('geography')) {
    function geography(int $id = null) {
        return $id == null
        ? $id
        : (app('geo')->geographies()->whereId($id)->exists()
            ? app('geo')->geographies()->find($id)
            : null);
    }
}

if(!function_exists('province')) {
    function province(int $id = null) {
        return $id == null
        ? $id
        : (app('geo')->provinces()->whereId($id)->exists()
            ? app('geo')->provinces()->find($id)
            : null);
    }
}

if(!function_exists('district')) {
    function district(int $id = null) {
        return $id == null
        ? $id
        : (app('geo')->districts()->whereId($id)->exists()
            ? app('geo')->districts()->find($id)
            : null);
    }
}

if(!function_exists('subDistrict')) {
    function subDistrict(int $id = null) {
        return $id == null
        ? $id
        : (app('geo')->subDistricts()->whereId($id)->exists()
            ? app('geo')->subDistricts()->find($id)
            : null);
    }
}
