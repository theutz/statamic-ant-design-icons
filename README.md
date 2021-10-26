# Statamic Ant Design Icons

> Statamic Ant Design Icons is an addon that lets you include SVG icons from the
> Ant Design system in your templates using a tag.

## Features

This addon does:

- Provides a tag for including SVGs in Antlers templates.
- Provides an attribute for adding CSS classes to the inlined SVG.
- Publishes icons to your site to be used as assets (if you want)

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic
control panel and click **install**, or run the following command from your
project root:

```bash
composer require theutz/statamic-ant-design-icons
```

## How to Use

### `{{ antdesignicons }}` Tag

There are a number of ways to use the `{{ antdesignicons }}` tag in your
templates. The examples below all produce identical output.

```antlers
    {{ antdesignicons:check-circle:outlined }}

    <!-- You can use `anticon` as an alias -->

    {{ anticon:check-circle type="outlined" }}

    {{ anticon icon="check-circle" type="outlined" }}

    <!-- outlined is the default icon type, and can be excluded -->

    {{ anticon:check-circle }}
```

You can also pass a class attribute to be added to the inline SVG.

```antlers
    {{ antdesignicons:check-circle class="fill-current text-color-400" }}
```

### As Assets

To use the published icons as assets, do the following:

1. Create a new filesystem for the asset container

```php
// config/filesystems.php
return [
    // ...
    'disks' => [
        // ...
        'antdesignicons' => [
            'driver' => 'local',
            'root' => public_path('vendor/statamic-ant-design-icons'),
            'url' => env('APP_URL') . '/vendor/statamic-ant-design-icons',
            'visibility' => 'public'
        ]
    ],
];
```

2. Setup a new asset container for the icons

```yaml
# content/assets/ant_design_icons.yml
title: "Ant Design Icons"
disk: antdesignicons
allow_uploads: false
allow_downloading: true
allow_renaming: false
allow_moving: false
create_folders: false
```

3. Enjoy!
