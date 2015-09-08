# TheGoodData

TheGoodData is a service that helps users regain and enjoy ownership of their own data. Currently it helps users harvest, secure, process and trade their browsing data and use it for a good cause. It is expected to cover in the future additional types of data besides browsing.

TheGoodData is more than a technology or a service, but a new way to approach data ownership issues in a truly open and collaborative way. In order to achieve it, ownership of TheGoodData company is vested in its users.

For more info about TheGoodData, please visit our site and FAQs

## Dev HOWTO

0. Fork this repository.
1. Switch to your working directory of choice.
2. Clone the development repo:
3. git clone git@github.com:thegooddata/webapp.git

## Local Installation of webapp

0. After cloning the repository, install PostgreSQL (9.1.13 v).
Optionally you could also install PgAdmin tool if you want to be able to manage the database visually: http://www.pgadmin.org/ 
1. Create the new database named "tgd" and create a database user named "tgd".
2. Import the database dump:
	pg_restore -U <username> -d <dbname> -1 -f <filename>.dump
	For access to the dump file, contact one of the developers.
3. Set bytea_output to your database: ALTER DATABASE tgd SET bytea_output = 'escape' .
4. Create a virtual host in Apache/Nginx named "www.tgd.local" that points to the directoy: /path/to/tgd-webapp/TGD.
5. Download Yii framework and place it somewhere outside the project from where you can include it later:
https://github.com/yiisoft/yii/releases/download/1.1.16/yii-1.1.16.bca042.zip. 
6. Create /path/to/tgd-webapp/TGD/assets and /path/to/tgd-webapp/TGD/protected/runtime directories, there are not display because in the git repo add to .gitignore.
7. Copy /tgd-webapp/TGD/protected/config/config.sample.php to /config.php and change it according to your data.
8. Create /tgd-webapp/TGD/protected/config/local_config.php with the following contents and adjust path to Yii framework.
		<?php

		return array(
		  'yiiFrameworkPath' => dirname(__FILE__) . '/../../../../yii-1.1.16.bca042/framework',
		  'YII_DEBUG' => false
			);
		?>

Now you should be able to run the website locally at:
	http://www.tgd.local/
		AND
	http://www.tgd.local/index-test.php

This version loads a different config file that disables some production-features such as the minifying of assets, or enables sql debugging, etc, but both should work. Preferably for development, let's use this url.


## Local Installation of extension

0. Go to Chrome Extensions tab

1. First, recommended but not mandatory, you can disable the real extension to avoid having them both running at the same time

2. Then, Select “Load unpacked extension”

3. Choose tgd-extension\chrome directory

4. Changing the extension environment and the API url
	Now your browser loaded the local extension, but it will still communicate with the production server API.
	To make the extension work with the local webapp API, open the chrome debug console for the extension and run:
	localStorage.TGD_ENV='dev'
	You can use the values: 
	'dev' - works with http://www.tgd.local/
	'pre' - works with https://pre.thegooddata.org/
	'prod' - works with https://www.thegooddata.org/

5. Debugging extension locally
	In the file tgd-extension/chrome/scripts/config.js you can find the following part.
		// set debug settings --------------------------------------------------------------

		var log_categories={
		    adtrack: false,
		    adtrack_batch: true,
		    query: false,
		    browsing: false,
		    login: false,
		    saveUserSettings: false,
		    jsCache: false,
		    achievements: false
		};

		var CONST_DEBUG;

		switch (TGD_ENV) {
		  case "dev": {
		      CONST_DEBUG = true;
		      log_categories.adtrack=false;
		      log_categories.adtrack_batch=false;
		      log_categories.query=true;
		      log_categories.browsing=false;
		      log_categories.jsCache=false;
		      log_categories.achievements=false;
		      break;
		  }
		  default: {
		      CONST_DEBUG = false;
		  }
		}
		const DEBUG=CONST_DEBUG;

## How extension works

0. There are log categories
1. There is a function similar to console.log, named log_if_enabled("<message>", "<log_category>");
2. In the dev environment you can enable/disable the log categories as you wish and only keep those that matter to the feature you're developing or testing.

## Software used

These libraries are bundled with the project and needn’t be updated manually:

0. Yii Framework
1. jQuery

## Deployment HOWTO

Check the [Deployment Guide](DEPLOY.md)

## License

Copyright 2014 The Good Data Cooperative, Ltd.

Copyright 2010–2014 Disconnect, Inc.

This program is free software, excluding the brand features and third-party portions of the program identified in the “Exceptions” below: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
Exceptions

TheGoodData logos, trademarks, domain names and other brand features or design elements used in this program cannot be reused without express written permission and no license is granted thereto.

Further, the following third-party portions of the program and any use thereof are subject to their own license terms as set forth below:

0. Proxima Nova Soft replaces system fonts and is the valuable copyrighted property of MyFonts, and/or their suppliers. You may not attempt to copy, install, redistribute, convert, modify, or reverse engineer this font software. Please contact MyFonts with any questions. Proxima Nova Soft can be removed and will be replaced with a system font.

