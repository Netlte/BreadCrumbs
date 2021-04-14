# Netlte > BreadCrumbs

## Install

```
composer require netlte/breadcrumbs
```

## Tests

Check code quality and run tests
```
composer build
```

or separately

```
composer cs
composer analyse
composer tests
```

## Structure
Navigation have easy structure which should fill most use-cases.
* **Bread** - GUI components which holds all nodes
  * **BreadCrumb** - Simple entity with needed data
  
![Visualized structure](screen.png)

## Usage

### Bread

[`\Netlte\BreadCrumbs\Bread`](../src/Bread.php) is standard `Nette\Application\UI\Control` extended by `Netlte\UI\AbstractControl`.
You can set icon by `setIcon()` method and add nodes by `addBreadCrumb()`

### Template
Default template supports `Nette\Localization\Translator` for translating captions and can be overridden for global scope by changing static template path in `\Netlte\BreadCrumbs\Bread::$DEFAULT_TEMPLATE` or dynamically in runtime by
```php
/** @var \Netlte\BreadCrumbs\Bread $bread */
$bread->setTemplateFile('/path/to/yours/template.latte');
```

#### Example
This example create instance of [`\Netlte\BreadCrumbs\Bread`](../src/Bread.php) and add some nodes
```php
<?php

$bread = new \Netlte\BreadCrumbs\Bread();

$bread->addBreadCrumb('Widgets', 'Widgets:default');
$bread->addBreadCrumb('Detail', 'Widgets:detail');
// Result is "Widgets -> Detail"
```

#### Properties
##### Icon
You can set leading icon by `setIcon()`. Default is `dashboard` and default icon's preffix is `fa fa-` for use icon family FontAwesome.
You can globally override default icon preffix by changing `\Netlte\BreadCrumbs\Bread::$ICON_PREFIX`.

##### Nodes
Nodes are simple entities holding link and title information. They are instances of [`\Netlte\BreadCrumbs\IBreadCrumb`](../src/IBreadCrumb.php) OR [`\Netlte\BreadCrumbs\BreadCrumb`](../src/BreadCrumb.php).
You can add new one by `addBreadCrumb()` method. Link is in Nette presenter link format(with third parameter as argument)

## Development

More examples are in [tests](../tests/) or in [sandbox](https://github.com/Netlte/Sandbox) project app.
