
<?php
//-- Rename this file to config.php 

/* debug file TODO: remove in production */
const DB_DEBUG_FILE = '/tmp/database_queries.log';

/* redoctober */
CONST REDOCTOBER_URL = 'https://localhost:8080';
CONST REDOCTOBER_PORT = '8080';
CONST REDOCTOBER_USERNAME = 'user';
CONST REDOCTOBER_PASSWORD = 'pass';
CONST REDOCTOBER_OWNERS = '"user1","user2"';
CONST REDOCTOBER_MIN = 2;
CONST REDOCTOBER_CERT = "/Users/you/Dev/redoctober/cert/server.crt";

/* openatrium */
const OPENATRIUM_HOST = 'https://collaborate.thegooddata.org';
const OPENATRIUM_ADMIN_LOGIN = 'tgdAdmin';
const OPENATRIUM_PASSWORD = '';

/* openatriumm single sign on token */
const OA_API_TOKEN='yayme';

/* cookie domain name */
const COOKIE_DOMAIN='.tgd.local';

/* session name */
const SESSION_NAME='TGDSESSID';

/* stripe */
const STRIPE_TEST=true;
const STRIPE_SK='';
const STRIPE_PK='';

/* PHPlist*/
// fill with your own config
const PHPLIST_ENABLED = true;
const PHPLIST_HOST = '';
const PHPLIST_DB = 'phplistdb';
const PHPLIST_LOGIN = 'phplist';
const PHPLIST_PASSWORD = '';

// fill with your own lists values
const PHPLIST_FIREFOX_LIST = 0;
const PHPLIST_SAFARI_LIST = 0;
const PHPLIST_APPLIED_LIST = 0;
const PHPLIST_PRE_ACCEPTED_LIST = 0;
const PHPLIST_ACCEPTED_LIST = 0;
const PHPLIST_PRE_ACCEPTED_OPTED_OUT_LIST = 0;
const PHPLIST_ACCEPTED_OPTED_OUT_LIST = 0;
const PHPLIST_DENIED_LIST = 0;
const PHPLIST_LEFT_LIST = 0;
const PHPLIST_EXPELLED_LIST = 0;

/* db */
CONST BD_NAME = 'tgd';
CONST BD_HOST = 'localhost';
CONST BD_USERNAME = 'user';
CONST BD_PASSWORD = '';
CONST BD_PORT=5432;
CONST BD_SSL_MODE='require'; // use 'require' or 'disable'

/* mailing */
const EMAIL_ADMIN = 'admin@thegooddata.com';

CONST EMAIL_MEMBERS_FROM_NAME = 'Members, TheGoodData';
CONST EMAIL_MEMBERS_FROM = 'members@thegooddata.org';

CONST EMAIL_MARCOS_FROM_NAME = 'Marcos Menendez, TheGoodData';
CONST EMAIL_MARCOS_FROM = 'marcos@thegooddata.org';

CONST EMAIL_GENERIC_FROM_NAME = 'Info, TheGoodData';
CONST EMAIL_GENERIC_FROM = 'info@thegooddata.org';
CONST EMAIL_GENERIC_HOST = "smtp.zoho.com";
CONST EMAIL_GENERIC_USERNAME = 'info@thegooddata.org';
CONST EMAIL_GENERIC_PASSWORD = 'password';
CONST EMAIL_GENERIC_PORT = '465';

CONST EMAIL_PERSONAL_FROM = 'you@thegooddata.org';
CONST EMAIL_PERSONAL_HOST = "smtp.zoho.com";
CONST EMAIL_PERSONAL_USERNAME = 'you@thegooddata.org';
CONST EMAIL_PERSONAL_PASSWORD = 'password';
CONST EMAIL_PERSONAL_PORT = '465';

/* enable slow_query log */
const SLOW_QUERY_LOG=false;

/* send errors by email */
const SEND_ERRORS_BY_MAIL=false;
const SEND_ERRORS_TO_EMAILS='info@thegooddata.org';

?>