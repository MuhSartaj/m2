# Mage2 Module Sartaj KeyValue

    ``sartaj/module-keyvalue``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [REST](#markdown-header-attributes)


## Main Functionalities
Test module

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Sartaj`
 - Enable the module by running `php bin/magento module:enable Sartaj_KeyValue`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require sartaj/module-keyvalue`
 - enable the module by running `php bin/magento module:enable Sartaj_KeyValue`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration
 - No configuration required.



## REST

- Add data
 rest/default/V1/keyvalue/ POST

 param: {"code" : "hello", "value" : "bye"} JSON type

- Fetch list ( get all list )
 rest/default/V1/keyvalue/ GET

- Fetch by {code}
 rest/default/V1/keyvalue/{code} GET

- Delete by code
rest/default/V1/keyvalue/{code} DELETE