# Rabp99/cakephp-baker-plugin plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require rabp99/cakephp-baker-plugin
bin/cake plugin load Rabp99/Bake
```
## Usage

Add `--theme Rabp99/Bake` to your bake commands.

Bake all your controllers:

```console
bin/cake bake controller all --theme Rabp99/Bake
```

Bake a single controller:

```console
bin/cake bake controller {ControllerName} --theme Rabp99/Bake
```

Bake everything (theme only impacts controllers):

```console
bin/cake bake all --everything --theme Rabp99/Bake
```