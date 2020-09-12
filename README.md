# IMAGAGC theme

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/811d211a8f564649a073186b250b7c97)](https://app.codacy.com/manual/Checo200/IMAGAGC?utm_source=github.com&utm_medium=referral&utm_content=Checo200/IMAGAGC&utm_campaign=Badge_Grade_Settings)
[![Build Status](https://travis-ci.com/Checo200/IMAGAGC.svg?branch=master)](https://travis-ci.com/Checo200/IMAGAGC)
[![deepcode](https://www.deepcode.ai/api/gh/badge?key=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwbGF0Zm9ybTEiOiJnaCIsIm93bmVyMSI6IkNoZWNvMjAwIiwicmVwbzEiOiJJTUFHQUdDIiwiaW5jbHVkZUxpbnQiOmZhbHNlLCJhdXRob3JJZCI6MTI2MjMsImlhdCI6MTU5OTkzMDI2Nn0.s7SwUlNM_uLfHxpXQeXIC9MmZ7wDAPRJ-PaLyUCnEBE)](https://www.deepcode.ai/app/gh/Checo200/IMAGAGC/_/dashboard?utm_content=gh%2FCheco200%2FIMAGAGC)

IMAGAGC is a child theme for the Genesis Framework with a modern development workflow. The name IMAGAGC is a short for IMAGA Genesis Child (theme).

It's based on Zen [Live Demo - Zen](https://beltramelli.app/zen/).

This starter them from beltramelli is used as a starter base to build upon.
All credits and big kudos to [beltramelli](https://twitter.com/NicBeltramelli).
Check the original repositorie @[Zen](https://github.com/NicBeltramelli/zen).

Tested up to WordPress 5.5.1 and Genesis 3.3.0.

## Features

- Consume packages from npm registry
- Modern JavaScript
- SASS/SCSS for stylesheets
- Autoprefixer to make CSS work with needed vendor prefixes
- Minify and bundle code with [Webpack](https://webpack.github.io/)
- Split large files and enqueue the generated parts
- Sync browser testing with [Browsersync](http://www.browsersync.io/)
- Automated accessibility tests with [pa11y](https://pa11y.org/) (**coming soon**)
- Automated frontend testing [BackstopJS](https://github.com/garris/BackstopJS) (**coming soon**)

## Requirements

Make sure all dependencies have been installed before moving on:

- [WordPress](https://wordpress.org/) >= 5.5
- [Genesis Framework](https://my.studiopress.com/themes/genesis/) >= 3.3.0
- [PHP](https://secure.php.net/manual/en/install.php) >= 7.3
- [Composer](https://getcomposer.org/download/)
- [Node.js](http://nodejs.org/) >= 14.0.0
- [Yarn](https://yarnpkg.com/en/docs/install) >= 1.22.5

## Optional

- [Local by Flywheel](https://localwp.com/) >= Latest version
- [WSL2](https://docs.microsoft.com/en-us/windows/wsl/wsl2-index) >= Latest version

## Using Optional configuration - quick setup

Create a site with [Local by Flywheel](https://localwp.com/) - Check the [documentation](https://localwp.com/help-docs) for more info and go to the directory where the site is created.

The setup with [Local by Flywheel](https://localwp.com/) and [WSL2](https://docs.microsoft.com/en-us/windows/wsl/wsl2-index) should work out of the box

If this is not the case, check out the quick fix down below - [quickfix](#Quickfix WSL2).

## Theme installation

Install IMAGAGC using Composer from the WordPress themes directory (replace `your-theme-name` below with the name of the theme):

```shell
# initialize the theme
$ composer create-project imaga/imagagc your-theme-name

# install dependencies
$ yarn

# bootstrap project
$ yarn bootstrap

# install php dependencies
$ composer install
```

## Theme setup

1. Edit `style.css` to define the theme meta information (name, URI, description, version, author)
2. Edit `wpackio.server.js` that handles the development server:

- `proxy` should reflect the local development URL, e.g. `http://some-name.local`
- `distPublicPath` should reflect the absolute URL path of the dist folder, e.g. `/wp-content/themes/your-theme-name/dist/`
  **Add a forward slash at the end otherwise it will not work.**

## Theme development

```shell
# start development server
$ yarn start

# create production build
$ yarn build

# create distribution package
$ yarn archive
```

### WordPress coding standard

- `composer phpcs` — Runs WordPress coding standards checks
- `composer phpcbf` — Fix php sniff violations automatically

## Theme structure

```shell
themes/your-theme-name/  # → Root of the child theme
├── src/                 # → Front-end assets
│   ├── scripts/         # → Theme JS
│   └── styles/          # → Theme stylesheets
├── config/              # → Theme configuration data
├── dist/                # → Built theme assets (never edit)
├── lib/                 # → Theme PHP library
│   ├── blocks/          # → Add support for Gutenberg blocks
│   ├── structure/       # → Theme structure
│   ├── woocommerce/     # → WooCommerce PHP library
│   ├── admin.php        # → Adds the admin dashboard setting
│   ├── assets.php       # → Enqueue assets
│   ├── body-classes.php # → Adds consistent classes to the body tag
│   ├── customize.php    # → Adds the Customizer addition
│   ├── defaults.php     # → Configures the default theme settings
│   ├── errors.php       # → Displays error messages
│   ├── extras.php       # → Custom functions
│   ├── helpers.php      # → Adds the required helper functions
│   ├── output.php       # → Adds the required CSS to the front-end
│   └── setup.php        # → Defines theme constants and features
├── node_modules/        # → Node.js packages (never edit)
├── page-templates/      # → Custom page templates
├── vendor/              # → Composer packages (never edit)
├── composer.json        # → Composer dependencies and scripts
├── composer.lock        # → Composer lock file (never edit)
├── front-page.php       # → Front page template
├── function.php         # → Includes the theme PHP library
├── package.json         # → Node.js dependencies and scripts
├── search.php           # → Search template
├── style.css            # → Theme meta informations
├── wpackio.project.js   # → Project configuration
├── wpackio.server.js    # → Dev server configuration
└── yarn.lock            # → Yarn lock file (never edit)
```

## Dev dependencies

- [wpack.io](https://github.com/swashata/wp-webpack-script)

## Front-end dependencies

- [Animate.css](https://github.com/daneden/animate.css)
- [Headroom.js](https://github.com/WickyNilliams/headroom.js)
- [normalize-scss](https://github.com/JohnAlbin/normalize-scss)
- [sass-mq](https://github.com/sass-mq/sass-mq)

## Quickfix WSL2

If there are any problems with starting up yarn (`yarn start`), most likely WSL2 <\$IP Address> is not properly configured, which will result in network connection errors.
To fix this try the following:

### Find <\$IP Address> from Windows 10

- **Open command prompt** (cmd): start >> search `cmd`
- **Use shortcut (keys)**: Windows-key + r >> type in: `cmd`

```shell
ipconfig /all
```

1. Find the <$IP Address> from the Adapter: LAN (Local Area Network). Write down or Copy the <$IP Address and \$IP6 Address> and continue to step 2.

2. Update the WSL2 host file.

**In WSL 2 use the following commando to open the hostfile from WSL2:**

```shell
# Use any editor of choice (vim, nano etc) - using for this example: nano
# To use nano when it isn't available, use this commando: $ sudo apt install nano
sudo nano /etc/hosts
```

In here, add the name that was generated from [Local by Flywheel](https://localwp.com/) example: `some-name.local`. Type behind the some-name.local the <\$IP Address> that was copied in the steps before.

**Example:**

```shell
some-name.local 192.168.0.5
some-name.local <$IP6 Address>
```

**NOTE:** _Make sure to update (change) the <$IP Address> if the Windows 10 hostmachine changed the local <$IP Address> (from Windows 10)._
