<!-- Rename this file to config.php -->

<?php

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

/* db */
CONST BD_NAME = 'tgd';
CONST BD_HOST = 'localhost';
CONST BD_USERNAME = 'user';
CONST BD_PASSWORD = '';
CONST BD_PORT=5432;

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

?>