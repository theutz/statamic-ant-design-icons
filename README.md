# Statamic Ant Design Icons

> Statamic Ant Design Icons is an addon that lets you include SVG icons from the
> Ant Design system in your templates using a tag.

## Features

This addon does:

- Provides a tag for including SVGs in Antlers templates.
- Provides an attribute for adding CSS classes to the inlined SVG.

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic
control panel and click **install**, or run the following command from your
project root:

```bash
composer require theutz/statamic-ant-design-icons
```

## How to Use

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
