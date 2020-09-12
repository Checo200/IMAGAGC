# IMAGAGC theme

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/811d211a8f564649a073186b250b7c97)](https://app.codacy.com/manual/Checo200/IMAGAGC?utm_source=github.com&utm_medium=referral&utm_content=Checo200/IMAGAGC&utm_campaign=Badge_Grade_Settings)

IMAGAGC is a child theme for the Genesis Framework with a modern development workflow. The name IMAGAGC is a short for IMAGA Genesis Child (theme).

It's based and forked from Zen [Live Demo - Zen](https://beltramelli.app/zen/).

This starter them from beltramelli is used as a starter base to build upon.
All credits and big kudos to [beltramelli](https://twitter.com/NicBeltramelli).
Check the original repositorie @ [Zen](https://github.com/NicBeltramelli/zen).

Tested up to WordPress 5.5.1 and Genesis 3.3.0.

## Features

- Consume packages from npm registry
- Modern JavaScript
- SASS/SCSS for stylesheets
- Autoprefixer to make your CSS work with needed vendor prefixes
- Minify and bundle code with [Webpack](https://webpack.github.io/)
- Split large files and enqueue the generated parts
- Sync browser testing with [Browsersync](http://www.browsersync.io/)
- Automated accessibility tests with [pa11y](https://pa11y.org/) (coming soon)
- Automated frontend testing [BackstopJS](https://github.com/garris/BackstopJS) (coming soon)

## Requirements

Make sure all dependencies have been installed before moving on:

- [WordPress](https://wordpress.org/) >= 5.5
- [Genesis Framework](https://my.studiopress.com/themes/genesis/) >= 3.3.0
- [PHP](https://secure.php.net/manual/en/install.php) >= 7.3
- [Composer](https://getcomposer.org/download/)
- [Node.js](http://nodejs.org/) >= 14.0.0
- [Yarn](https://yarnpkg.com/en/docs/install) >= 1.22.5

## Extra

Using this setup with Local by Flywheel and WSL2.

- [Local by Flywheel](https://localwp.com/) >= Latest version
- [WSL2](https://docs.microsoft.com/en-us/windows/wsl/wsl2-index) >= Latest version

### Setup Local by flywheel [flywheel](https://localwp.com/) with WSL2 [WSL2](https://docs.microsoft.com/en-us/windows/wsl/wsl2-index)

To make this work out of the box, there are only a couple of extra steps we need to take.
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

Go to the Directory where [Local by Flywheel](https://localwp.com/) is installed by either using the Application or going to the right directory with explorer.

## Explorer path

_Example explorer path:_

```shell
C:\Users\$username\AppData\Roaming\Local\run\router\nginx\conf
```

Don't forget to change the `disk drive letter` where [Local by Flywheel](https://localwp.com/) is installed (`default on C:\` )and your windows username `$username` to your actual username.

## GUI

Open [Local by Flywheel](https://localwp.com/) GUI, go to the left corner, click on the hamburger menu to open settings.
In the hamburger menu, click on Reveal Local Router's log. This will open the directory we are looking for. In this directory you can see a map named "conf".
Double click on this map and find the configuration file or youre website, made by Local.

Write down the the port that [Local by Flywheel](https://localwp.com/) assigned your local website since we need it to configure our wpackio configuration.

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
host: undefined, # You can leave this unchanged. If for some reason wpackio can't find the ip address from WSL2, change the ip address to WSL2 ip address (We did this in the steps above).
// Your WordPress development server address
// This is super important
proxy: 'http://$your-own-theme.local', # The name of your local .local site (Example: your-own-theme.local) - if using https, don't forget to change http to https
// PORT on your localhost where you would want live server to hook
port: $local-by-flyhweel-portnumber, # The port you wrote down from the nginx settings in local (Example: 10034)
// UI passed directly to browsersync
ui: {
    port: 3001, # You can leave this default or change to an availalbe port (default 3001).
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
distPublicPath: '/wp-content/themes/$your-own-theme/dist/', # After theme, type in $your-own-theme name created earlier with composer
};
```

Now we need to update the WSL2 host config file. We can do that with the following command:

```shell
# Feel free to use any editor of choice (vim, nano etc)
# If you would like to use nano type $ sudo apt install nano
sudo nano /etc/hosts
```

In here, add the name from local (somename.local) + add the ip address from your Windows10 machine.

Note: This instruction is especially written down for nano (different editors might have different shortcuts).
Save the file by clicking ctrl+x and type y (enter).

Once this is done, we can startup our wpackio with Yarn (`yarn start`)

Make sure to update the ip adresses if your local ip changed.

## Theme installation

Install IMAGAGC using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

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

1. Edit `style.css` to define your theme meta information (name, URI, description, version, author)
2. Edit `wpackio.server.js` that handles the development server:

- `proxy` should reflect your local development URL, e.g. `http://your-address.local`
- `distPublicPath` should reflect the absolute URL path of your dist folder, e.g. `/wp-content/themes/your-theme-name/dist/`
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

- `composer phpcs` — Runs WordPress coding standards checks
- `composer phpcbf` — Fix php sniff violations automatically

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

- [wpack.io](https://github.com/swashata/wp-webpack-script)

## Front-end dependencies

- [Animate.css](https://github.com/daneden/animate.css)
- [Headroom.js](https://github.com/WickyNilliams/headroom.js)
- [normalize-scss](https://github.com/JohnAlbin/normalize-scss)
- [sass-mq](https://github.com/sass-mq/sass-mq)
