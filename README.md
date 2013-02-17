SarSportApplicationBundle
==============================

Introduction
------------

[![Build Status](https://secure.travis-ci.org/SarSport/SarSportApplicationBundle.png?branch=master)](http://travis-ci.org/SarSport/SarSportApplicationBundle)

Installation
------------

Using Composer (recommended)
----------------------------

To install SarSportApplicationBundle with Composer just add the following to your composer.json file:

```yml
// composer.json
{
    // ...
    require: {
        // ...
        "sarsport/sarsport-application-bundle": "1.0.0"
    }
}
```

Then, you can install the new dependencies by running Composer’s update command from the directory
where your composer.json file is located:

```bash
$ php composer.phar update
```

Composer will automatically download all required files, and install them for you.
All that is left to do is to update your AppKernel.php file, and register the new bundle:

```php
<?php
// in AppKernel::registerBundles()
$bundles = array(
    // ...
    new SarSport\Bundle\SarSportApplicationBundle\SarSportApplicationBundle(),
    // ...
);
```

Configuration
-------------

SarSportApplicationBundle requires no initial configuration to get you started.
