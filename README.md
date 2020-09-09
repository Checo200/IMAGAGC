# Zen theme

[![Packagist](https://img.shields.io/packagist/v/nicbeltramelli/zen.svg?style=for-the-badge)](https://packagist.org/packages/nicbeltramelli/zen)
[![Codacy Badge](https://img.shields.io/codacy/grade/b6b22681b33c46c0bef7cd8d25bf21d1?style=for-the-badge)](https://app.codacy.com/manual/NicBeltramelli/zen)
[![Build Status](https://img.shields.io/travis/NicBeltramelli/zen.svg?style=for-the-badge)](https://travis-ci.org/NicBeltramelli/zen)

Zen is a child theme for the Genesis Framework with a modern development workflow. [Live Demo](https://beltramelli.app/zen/)

Tested up to WordPress 5.3.2 and Genesis 3.3.0.

## Features

* Consume packages from npm registry
* Modern JavaScript
* SASS/SCSS for stylesheets
* Autoprefixer to make your CSS work with needed vendor prefixes
* Minify and bundle code with [Webpack](https://webpack.github.io/)
* Split large files and enqueue the generated parts
* Synch browser testing with [Browsersync](http://www.browsersync.io/)

## Requirements

Make sure all dependencies have been installed before moving on:

* [WordPress](https://wordpress.org/) >= 5.5
* [Genesis Framework](https://my.studiopress.com/themes/genesis/) >= 3.3.0
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.3
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 14.0.0
* [Yarn](https://yarnpkg.com/en/docs/install) >= 1.22.5

## Extra

Using this setup with Local by Flywheel and WSL2.

* [flywheel](https://localwp.com/) >= Latest version
* [WSL2](https://docs.microsoft.com/en-us/windows/wsl/wsl2-index) >= Latest version

### Setup Local by flywheel [flywheel](https://localwp.com/) with WSL2 [WSL2](https://docs.microsoft.com/en-us/windows/wsl/wsl2-index)

There are a couple of extra steps when making this setup work. This will guide you through those steps.
First make sure you know the ip adress of you Windows10 machine and the ip adress of your WSL2 setup.

Find ip address for Windows10:

Open command prompt (cmd) > start > search "cmd"

Or use the shortcut:

Windows-key + r > type in: cmd

```shell
ipconfig /all
```

Write down your ip adress from Windows 10

Find ip address for WSL2:

Open up WSL2 and use either the ifconfig or ip adress command:

```shell
# if not installed: $ sudo apt install net-tools
ifconfig

# Or use $ ip address
$ ip address
```

Write down ip address from WSL2.

Once we figured out the ip adresses from both machines, its time to setup Local by Flywheel + our wpackio.

First we will change the proxy settings from Flywheel. NOTE: This may give errors in the Flywheel by local GUI (Graphic User Interface).

Go to the Directory where Local by Flywheel is installed by either using the Application or going to the right directory with explorer.

Explorer path:

```shell
C:\Users\$username\AppData\Roaming\Local\run\router\nginx\conf
```

Don't forget to change the $username to your actual username.

GUI:

Open Local by Flywheel GUI, go to the left corner, click on the hamburger menu to open settings.
In the hamburger menu, click on Reveal Local Router's log. This will open the directory we are looking for. In this directory you can see a map named "conf".
Double click on this map and find the configuration file or youre website, made by Local.

Change the proxy from 127.0.0.1 to the WSL2 ip adress we wrote down earlier. In my case this was 172.27.45.111.

```shell
# Example: what to change (change both locations ip addresses in this file).
location / {
    proxy_pass http://$ip-address-WSL2:10047;
    include location-block.conf;
```

Also note that there is a port number behind the ip address, write this also down since we need it configure our wpackio.

Next we fill in our wpackio dev server configuration:

```shell
module.exports = {
// Your LAN IP or host where you would want the live server
// Override this if you know your correct external IP (LAN)
// Otherwise, the system will always use localhost and will not
// work for external IP.
// This will also create some issues with file watching because for
// some reason, service-worker doesn't work on localhost?
// https://github.com/BrowserSync/browser-sync/issues/1295
// So it is recommended to change this to your LAN IP.
// If you intend to access it from your LAN (probably do?)
// If you keep null, then wpackio-scripts will try to determine your LAN IP
// on it's own, which might not always be satisfying. But it is in most cases.
host: '172.27.45.111', # Change to WSL2 ip address
// Your WordPress development server address
// This is super important
proxy: 'http://sander.local', # The name of your local .local site
// PORT on your localhost where you would want live server to hook
port: 10047, # The port you wrote down from the nginx settings in local
// UI passed directly to browsersync
ui: {
    port: 3001, # You can leave this default or change to an availalbe port.
},
// Whether to show the "BrowserSync Connected"
notify: true,
// Open the local URL, set to false to disable
open: true,
// BrowserSync ghostMode, set to false to completely disable
ghostMode: {
    clicks: true,
    scroll: true,
    forms: true,
},
// Override system calculated public path of the `dist` directory
// This must have forward slash, otherwise it will not work.
distPublicPath: '/wp-content/themes/sander/dist/', # After theme, type in your-own-theme name created earlier with composer
};
```

The only thing left to do is updating the WSL2 host config file. We can do that with the following command:

```shell
sudo nano /etc/hosts
```

In here, add the name from local (somename.local) + add the ip address from your Windows10 machine
Save the file by clicking ctrl+x and type y (enter).

Once this is done, we can startup our wpackio with Yarn

Make sure to change this whenever your ip addresses changed, otherwise it won't work.
This is a workaround, since i didn't find any other workable way to make this work.

## Theme installation

Install Zen using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
# initialize the theme
$ composer create-project nicbeltramelli/zen your-theme-name

# install dependencies
$ yarn

# bootstrap project
$ yarn bootstrap

# install php dependencies
$ composer install

```

## Theme setup

1. Edit `style.css` to define your theme meta information (name, URI, description, version, author)
2. Edit `wpackio.server.js` that handles the development server:

* `proxy` should reflect your local development URL, e.g. `http://your-address.local`
* `distPublicPath` should reflect the absolute URL path of your dist folder, e.g. `/wp-content/themes/your-theme-name/dist/`
**You must add a forward slash at the end otherwise it will not work.**

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

* `composer phpcs` — Runs WordPress coding standards checks
* `composer phpcbf` — Fix php sniff violations automatically

## Theme structure

```shell
themes/your-theme-name/  # → Root of your child theme
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

* [wpack.io](https://github.com/swashata/wp-webpack-script)

## Front-end dependencies

* [Animate.css](https://github.com/daneden/animate.css)
* [Headroom.js](https://github.com/WickyNilliams/headroom.js)
* [normalize-scss](https://github.com/JohnAlbin/normalize-scss)
* [sass-mq](https://github.com/sass-mq/sass-mq)
