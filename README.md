# DoctrineActions Bundle

[![Latest Version](https://img.shields.io/github/release/ThrusterIO/doctrine-actions-bundle.svg?style=flat-square)]
(https://github.com/ThrusterIO/doctrine-actions-bundle/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)]
(LICENSE)
[![Build Status](https://img.shields.io/travis/ThrusterIO/doctrine-actions-bundle.svg?style=flat-square)]
(https://travis-ci.org/ThrusterIO/doctrine-actions-bundle)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/ThrusterIO/doctrine-actions-bundle.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/ThrusterIO/doctrine-actions-bundle)
[![Quality Score](https://img.shields.io/scrutinizer/g/ThrusterIO/doctrine-actions-bundle.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/ThrusterIO/doctrine-actions-bundle)
[![Total Downloads](https://img.shields.io/packagist/dt/thruster/doctrine-actions-bundle.svg?style=flat-square)]
(https://packagist.org/packages/thruster/doctrine-actions-bundle)

[![Email](https://img.shields.io/badge/email-team@thruster.io-blue.svg?style=flat-square)]
(mailto:team@thruster.io)

The Thruster DoctrineActions Bundle.


## Install

Via Composer

``` bash
$ composer require thruster/doctrine-actions-bundle
```


## Usage

```php
new Thruster\Bundle\DoctrineActionsBundle\ThrusterDoctrineActionsBundle()
```

```php
// Default entityManager
$executor->execute(new DoctrinePersistAction($object));

// Custom entityManager
$executor->execute(new DoctrinePersistAction('default', $object));
```


## Testing

``` bash
$ composer test
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.


## License

Please see [License File](LICENSE) for more information.
