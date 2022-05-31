#SQL Reports"

## Features


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ composer require d4yii2/sqlreport "*"
```

or add

```
"d4yii2/sqlreport": "*"
```

to the `require` section of your `composer.json` file.

To config console migration add 
```php
 '@vendor/d4yii2/sqlreport/migrations',
 ```

To web config add to module section
```php
       'sqlreport' => [
            'class' => 'd4yii2\sqlreport\Module',
            'leftMenu' => 'admin'
        ], 
 ```
run migration


