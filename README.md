# silverstripe-gravatar
A very simple Gravatar integration. An extension that is automatically applied to `Member`

## Requirements
* silverstripe/framework: ^4

## Installation
```bash
$ composer require vulcandigital/silverstripe-gravatar
```

## Usage
```php
$me = Security::getCurrentUser();
$me->Avatar($size = 80);
```

Template:
```twig
<img src="$CurrentUser.Avatar(60')"/>
<img src="$CurrentUser.Avatar(80, 'mm')"/>
<img src="$CurrentUser.Avatar(120, 'monsterid')"/>
<img src="$CurrentUser.Avatar(140, 'wavatar')"/>
```