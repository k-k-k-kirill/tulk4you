[![Build Status](https://travis-ci.org/pixelshelsinki/pixels-starter-theme.svg?branch=master)](https://travis-ci.org/pixelshelsinki/pixels-starter-theme) [![This project is using Percy.io for visual regression testing.](https://percy.io/static/images/percy-badge.svg)](https://percy.io/Pixels-Helsinki-Oy/pixels)

# Pixels Starter Theme

This is the starter theme for Pixels website projects that are built on WordPress.
**Please use the [latest release](https://github.com/pixelshelsinki/pixels-starter-theme/releases/latest)**, not master.

## Updates

Minor updates and additions will added to the current major release as long as they don't break backwards compatibility, in accordance with semantic versioning.

Every 6 months a full check of the theme will be done, to update to new versions of dependencies etc.

## Issues, improvements and these instructions.

Please read the documentation below before using. **If things are not clear or you find a mistake, or simply a way to improve the theme, please submit an issue or pull request.**

## Tools and Technologies

This theme uses the following:

* Sass for stylesheets
* ES6 for Javascript
* Composer for PSR-4 autoloading and PHP dependencies
* [Webpack](https://webpack.github.io/) for compiling assets
* [Browsersync](http://www.browsersync.io/) for synchronised browser testing
* [Timber](https://timber.github.io/docs/) as a templating engine

## Requirements

To install this theme the server instance must have the following setup:

* [WordPress](https://wordpress.org/) >= 5.6
* [PHP](http://php.net/manual/en/install.php) >= 7.3

To develop this theme you must also have the following:

* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 14 (use nvm to switch on your local environment)
* [Yarn](https://yarnpkg.com/en/docs/install) >= 1.0

## Theme Installation

*Hopefully in a future update this will be automated in some way*

1. Download this repository as a ZIP (don't clone!).
2. Drop it into the theme folder of your WordPress installation and rename the folder to `<client or project name>-theme`.
3. Open the theme in your favourite text editor.
4. Search `tulk4you-theme`and replace with `<client or project>-theme` through the entire theme directory. This should be the same as the theme folder name name from step 2.
5. Update `Theme Name` and `Description` in `style.css`. Note don't call the theme '<Project name> theme', call it simply the name of the client or project.

## Theme Development

To start developing do the following:

1. Update `assets/config.js` settings:
  * `devUrl` should be your development URL.
2. In Terminal run `yarn` in the theme directory to install dependencies.

*It may be possible in the future to have a local config that allows you to have different devUrl if needed*

### Build Commands

* `yarn start` -- Compile assets when file changes are made, start Browsersync session
* `yarn build` -- Compile and optimize the files in your assets directory

### Lint Commands

Lint commands check that code is structured and written nicely. If the commands above return lint errors, run one of the following (based on the error) to get a more detailed explanation.

* `yarn lint` -- Checks JS and SCSS for errors, formatting and other issues.
* `yarn lint:scripts` -- Checks JS *only* for errors, formatting and other issues.
* `yarn lint:styles` -- Checks *SCSS* for errors, formatting and other issues.
* `composer test` -- Checks *PHP* for errors, formatting and other issues.

## Theme Structure

The theme structure is kept simple, sticking to a relatively familiar WordPress structure for the most part. However we try and follow a React Redux-style for components and views, so everything is kept in one package as much as possible.

```
pixels-starter-theme/                # -> Theme root folder
|-- assets/                          # -> Front-end assets
  |-- build/                         # -> Webpack and Lint config
  |-- fonts/                         # -> Theme fonts
  |-- images/                        # -> Theme images
  |-- scripts/                       # -> Theme JS
  |-- styles/                        # -> Theme general styles
  |-- config.js                      # -> Settings for compiled assets
|-- controllers/                     # -> WordPress template files, where data is setup.
  |-- index.php                      # -> The minimum required file.
|-- dist/                            # -> Compiled assets (never edit). Always reference assets from here (never assets/)
|-- languages/                       # -> Language files for the theme.
|-- lib/                             # -> Theme PHP
  |-- Admin/                         # -> Theme methods for WP-Admin
  |-- Controllers/                   # -> Twig Controller classes
  |-- Templates/                     # -> Templating related classes
  |-- Twig/                          # -> Classes related to Twig and Timber
  |-- Utils/.                        # -> General purpose theme classes
  |-- Assets.php                     # -> Handle theme assets
  |-- Config.php                     # -> Set up theme  
  |-- Hooks.php                      # -> Theme actions & filters (general purpose)
  |-- Images.php                     # -> Theme image size & method handling
  |-- Navigations.php                # -> Theme menus registration & custom logic
  |-- Share.php                      # -> Social share class
  |-- Widgets.php                    # -> Register and handle theme widgets & areas
|-- node_modules/                    # -> Node modules used for theme development (never edit)
|-- views/                           # -> Views used in the theme. All twig files live here.
  |-- layouts/                       # -> Layouts used in the theme
    |-- layout/                      # -> Type of layout
      |-- layout.scss                # -> SCSS file for a layout (if required)
      |-- layout.twig                # -> Twig template file for a layout (required)
  |-- components/                    # -> Components used in the theme
    |-- component/                   # -> Type of component
      |-- component.scss             # -> SCSS file for a component (if required)
        |-- component.twig           # -> Twig template file for a component (required)
        |-- component-variation.twig # -> Twig template file for a component variation. May extend the base component or be completely independent.
|-- vendor                           # -> Composer dependencies (never edit)
```

### assets/

`assets/` is where all global SCSS, JS, images and font files should live. From here files are compiled to the `dist/` directory.

Any references to assets (in particular font files and images) should be made via the `dist/` directory, **not** the `assets/` directory.

### components/ and views/

`views/components/` are where all reusable components live and `views/layouts/` where layouts live. Each broad component and view has its own directory, in which there is *at least* a twig template file, and optionally a SCSS file.

#### PHP files

PHP files are object oriented, namespaced and use Composer autoloading.

#### Twig files

Twig files should start with a DocBlock explaining what the component is, any link references (e.g. Bootstrap documentation), version and variables available (to be used when calling with `{% include 'file/file.twig' with { variable: value } %}`)

An additional block should be added with default values for when the file is auto-included in the Pattern Library.

See `input/input.twig` or `single/single.twig` for an example.

#### SCSS files

SCSS files should start with a CSS comment block with a simple heading.

SCSS files must be included explicitly in `assets/styles/main.scss`.

This theme uses a linter that will force certain styling of SCSS and JS. This is to ensure more consistent and better structured SCSS.

*in the future JS files will also be put here*

### dist/

`dist/`is where the assets are compiled to. As mentioned in `assets/`, any reference to asset files should be made via `dist/` and **not** `assets/`.

### lib/

`lib/` is where the PHP setup functionality related to the theme lives. To ensure a file in this directory loads, add it in the array at the end of the functions.php file.

## Design System

This starter theme comes with a basic, semi-automatic design system. To see the design system, create a page using the 'Design System' template. For each component you can create a <component>-data.json file, with an array of json objects. Each object in the top level array is different example that will be output, useful for if you need to output different configurations of the same component for viewing, or visual regression testing at a component level.