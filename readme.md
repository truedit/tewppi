[![Build Status](http://jenkins.maned.com/buildStatus/icon?job=TruEdit_Github/tewppi/PR-11)](http://jenkins.maned.com/job/TruEdit_Github/tewppi/PR-11)

# Truedit Wordpress Plugin

The TruEdit WordPress Plugin allows users to deliver content from TruAuthor to a WordPress site as posts or pages. Multiple automations can be setup with different configurations for the individual use-cases.

## Wordpress Notes
- The plugin has been tested with Wordpress 4.7
- The plugin requires PHP 5.6 or higher
- Permalinks must be post type
- Access API via `/wp-json/{something}` e.g `wp-json/truedit/v1/job`

## Downloading and Installing the Plugin
You can download the latest release on the [TruEdit Releases](https://github.com/truedit/tewppi/releases) page. If you download the plugin from Github, you can upload and install it to your wordpress page in the same way you would any other Wordpress plugin as detailed in the [Wordpress Codex](https://codex.wordpress.org/Plugins_Add_New_Screen).

#### Installation and Configuration
1. Log into WordPress Admin
1. Install ZIP of TruEdit WordPress plugin
1. Activate TruEdit WordPress plugin
1. Navigate to TruEdit>Configuration page
1. Choose Host (This is the TruEdit server you log into)
1. Enter API Key (downloaded from TruEdit Web Client)
1. Enter the Application Key (provided by MEI for the TruEdit server you are accessing)
1. Click “Save and Verify”
1. TruEdit should confirm that it successfully connected to TruEdit and verify the Tenant it is connected to.
1. All plugin Requirements items shown should have a green checkmark in the state column.

#### Modifying Web Server to Allow Cross-Domain Requests
1. When running the WordPress automations, TruEdit Web Client loads a page from the TruEdit WordPress plugin. Since your WordPress server is not on the TruEdit domain, you will need to modify your web server to allow cross-domain requests from truedit.com or truedit.de.
2. For more information see: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options

#### Apache Example
You will need to modify the X-Frame-Options setting in HTTPD configuration to “ALLOW-FROM https://truedit.com” or “ALLOW-FROM https://truedit.de” as appropriate

## Using the TruEdit Wordpress Plugin

#### Configure an Automation
1. Navigate to TruEdit>Automations page
1. Click “Add Automation”
1. Give it a Name (Note: This name will be shown in the TruEdit web client and admin)
1. Choose the TruAuthor profile(s) to which you wantto have this automation configuration available
1. Choose your Publish Settings
Note: Prompt On Run will not have a default and will instead require you to make a choice prior to publishing.
  - Type – Prompt on Run, Post, or Page
  - Format- This will list all formats in your WordPress configuration. (Will be available if you choose “Post” for type.)
  - Title – This will choose what tag from your TruAuthor document will be read and used for the post/page title.
  - Visibility – Prompt on Run, Public, or Private
  - Status – Prompt on Run, Draft, Pending Review, or Public (Will be available if you choose Public)
  - Authors – Current User
1. Click Create

**Note**: You can create additional automations with different settings if desired.

Congratulations! Your automation is now setup and available in TruEdit.

#### Executing an Automation

1. Navigate to a TruAuthor document in the TruEdit Web Client
1. Click on the Job Menu
1. Click on the Automations sub-menu
1. Click on the Automation
1. A popup will appear with a web form served up by the TruEdit WordPress plugin
Note: If the window appears blank, please review the Cross-Domain request settings. You can also use a web inspector to see any errors returned for the page.
1. Complete the required information
1. Click Publish
1. Your post/page will be created in WordPress including all placed art.

###### Tips:
1. You can run the automation multiple times on a single article to update the previously created post/page.
1. If you have the TruAuthor window open, you can publish your changes without checking in the TruAuthor document. Simply save the document without checking it back in and then go to the Web Client to run the automation

## Building the Plugin
In order to build the plugin, you must first install dependencies using npm, composer and yarn.

1. Enter the `src` directory and run `composer install`
1. Enter the `spa` directory and run `npm install`
1. Still in the `spa` directory and run `yarn`
1. Run `cd ../src/web/app/plugins/truedit/ && composer install` to install Composer
   packages specific to the plugin.

Once you have all of the dependencies, you should be able to run `npm run build` in the root of the repository to produce a folder named `truedit` and a zip file named `truedit_wppi.zip` in the `dist/versionNumber/` folder.

## Contributing to Plugin Development
If you would like to contribute code to the TruEdit Wordpress Plugin, simply submit a pull request to this repository and it will be reviewed. If the code meets the standard outlined in the Coding Conventions section and meaningfully adds to the product, it will likely be merged into the codebase.

#### Coding Conventions

- We are using the Gitflow workflow for branches. Please refer to
  [this](https://bitbucket.org/snippets/qkservices/xRxRX) for full setup
  instructions.
- For backend PHP code, use the
  [PSR-2 Coding Style Guide](http://www.php-fig.org/psr/psr-2/)
- For frontend JavaScript code, use
  [JavaScript Standard Style](http://standardjs.com)

For new code this means:

- PHP: 4 spaces for indentation, no hard tabs
- JavaScript: 2 spaces for indentation, no hard tabs, no semicolons
- Aim for a line limit of 80 characters
- camelCase for variable and function names, snake_case for database field names

#### Repository Structure
- `spa` - Contains the admin interface for react which when `built` should be sent to the wordpress plugin folder
- `src` - Contains the entire wordpress built using composer
- `dist` - The final output folder for the plugin. This folder should contain a full working wordpress plugin
- `conf` - Contains any local configs

#### Export API Using Swagger
`npm run swagger-gen`
