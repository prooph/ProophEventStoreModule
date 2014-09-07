ProophEventStoreModule
======================

Zend Framework 2 Module for [ProophEventStore](https://github.com/prooph/event-store)

[![Build Status](https://travis-ci.org/prooph/ProophEventStoreModule.svg?branch=master)](https://travis-ci.org/prooph/ProophEventStoreModule)
[![Coverage Status](https://img.shields.io/coveralls/prooph/ProophEventStoreModule.svg)](https://coveralls.io/r/prooph/ProophEventStoreModule?branch=master)

Installation
------------

You can install ProophEventStoreModule via composer by adding `"prooph/prooph-event-store-module": "~0.3"` as requirement to your composer.json.

#### Post installation

Enabling it in your `application.config.php`file.

```php
<?php
return array(
    'modules' => array(
        // ...
        'ProophEventStoreModule',
    ),
    // ...
);
```

Configuration
-------------

### DB Configuration

Copy the [prooph.eventstore.db.local.php](https://github.com/prooph/ProophEventStoreModule/blob/master/config/prooph.eventstore.db.local.php) to your
`config/autoload` directory and adjust the config to meet your needs. This config has the `.local.php` cause it requests you to configure
a database connection (if you do not use the application wide configured Zend\Db\Adapter\Adapter) and should not be included in version control.

### EventStore Configuration

Copy the [prooph.eventstore.global.php](https://github.com/prooph/ProophEventStoreModule/blob/master/config/prooph.eventstore.global.php) to your
`config/autoload` directory and adjust the config to meet your needs.

Retrieve ProophEventStore
-------------------------

The ProophEventStore can be retrieved from ServiceManager by using the alias `prooph.event_store`

```php
$eventStore = $services->get('prooph.event_store');
```
