#SQL Reports"

## Features

- Saved SQL reports are shown as a table (`sqlreport/main/view`).
- `SELECT` / `WITH` SQL is checked with `EXPLAIN` on save; syntax errors are shown on the form.
- If a saved report's SQL fails when opened, the database error is shown as a message instead of an error page.


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


