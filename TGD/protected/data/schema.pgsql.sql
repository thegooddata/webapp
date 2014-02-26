-- delete from tbl_adtracks;
-- delete from tbl_queries;
-- delete from tbl_browsing;

--- EVENTS DATA ---

--DROP TABLE tbl_events;
-- CREATE TABLE tbl_events (
--   id SERIAL PRIMARY KEY,
--   created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,

--   member_id int references tbl_members(id),
--   user_id varchar(128),

--   action (browse, search, share, like, threat_detect, threat_whitelist_add, threat_whitelist_remove, install, uninstall)

--   object (id -> dato )
--   type

--   source (chrome|safari|facebookapp)
  
--   --misce
--   value,
--   message,
--   status,
-- );


--- MEMBERS DATA ---

--DROP TABLE tbl_languages_support;
CREATE TABLE tbl_languages_support (
  id SERIAL PRIMARY KEY,
  lang varchar(128) NOT NULL,
  support boolean
);

INSERT INTO tbl_languages_support  (lang, support) VALUES
('en', true),
('es', false);

--DROP TABLE tbl_loans_countries;
CREATE TABLE tbl_countries (
  id SERIAL PRIMARY KEY,

  code varchar(255) DEFAULT '',
  
  name_en varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_countries (code, name_en) VALUES ('AF', 'Afghanistan');
INSERT INTO tbl_countries (code, name_en) VALUES ('AL', 'Albania');
INSERT INTO tbl_countries (code, name_en) VALUES ('DZ', 'Algeria');
INSERT INTO tbl_countries (code, name_en) VALUES ('AS', 'American Samoa');
INSERT INTO tbl_countries (code, name_en) VALUES ('AD', 'Andorra');
INSERT INTO tbl_countries (code, name_en) VALUES ('AO', 'Angola');
INSERT INTO tbl_countries (code, name_en) VALUES ('AI', 'Anguilla');
INSERT INTO tbl_countries (code, name_en) VALUES ('AQ', 'Antarctica');
INSERT INTO tbl_countries (code, name_en) VALUES ('AG', 'Antigua and Barbuda');
INSERT INTO tbl_countries (code, name_en) VALUES ('AR', 'Argentina');
INSERT INTO tbl_countries (code, name_en) VALUES ('AM', 'Armenia');
INSERT INTO tbl_countries (code, name_en) VALUES ('AW', 'Aruba');
INSERT INTO tbl_countries (code, name_en) VALUES ('AU', 'Australia');
INSERT INTO tbl_countries (code, name_en) VALUES ('AT', 'Austria');
INSERT INTO tbl_countries (code, name_en) VALUES ('AZ', 'Azerbaijan');
INSERT INTO tbl_countries (code, name_en) VALUES ('BS', 'Bahamas');
INSERT INTO tbl_countries (code, name_en) VALUES ('BH', 'Bahrain');
INSERT INTO tbl_countries (code, name_en) VALUES ('BD', 'Bangladesh');
INSERT INTO tbl_countries (code, name_en) VALUES ('BB', 'Barbados');
INSERT INTO tbl_countries (code, name_en) VALUES ('BY', 'Belarus');
INSERT INTO tbl_countries (code, name_en) VALUES ('BE', 'Belgium');
INSERT INTO tbl_countries (code, name_en) VALUES ('BZ', 'Belize');
INSERT INTO tbl_countries (code, name_en) VALUES ('BJ', 'Benin');
INSERT INTO tbl_countries (code, name_en) VALUES ('BM', 'Bermuda');
INSERT INTO tbl_countries (code, name_en) VALUES ('BT', 'Bhutan');
INSERT INTO tbl_countries (code, name_en) VALUES ('BO', 'Bolivia');
INSERT INTO tbl_countries (code, name_en) VALUES ('BA', 'Bosnia and Herzegovina');
INSERT INTO tbl_countries (code, name_en) VALUES ('BW', 'Botswana');
INSERT INTO tbl_countries (code, name_en) VALUES ('BV', 'Bouvet Island');
INSERT INTO tbl_countries (code, name_en) VALUES ('BR', 'Brazil');
INSERT INTO tbl_countries (code, name_en) VALUES ('BQ', 'British Antarctic Territory');
INSERT INTO tbl_countries (code, name_en) VALUES ('IO', 'British Indian Ocean Territory');
INSERT INTO tbl_countries (code, name_en) VALUES ('VG', 'British Virgin Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('BN', 'Brunei');
INSERT INTO tbl_countries (code, name_en) VALUES ('BG', 'Bulgaria');
INSERT INTO tbl_countries (code, name_en) VALUES ('BF', 'Burkina Faso');
INSERT INTO tbl_countries (code, name_en) VALUES ('BI', 'Burundi');
INSERT INTO tbl_countries (code, name_en) VALUES ('KH', 'Cambodia');
INSERT INTO tbl_countries (code, name_en) VALUES ('CM', 'Cameroon');
INSERT INTO tbl_countries (code, name_en) VALUES ('CA', 'Canada');
INSERT INTO tbl_countries (code, name_en) VALUES ('CT', 'Canton and Enderbury Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('CV', 'Cape Verde');
INSERT INTO tbl_countries (code, name_en) VALUES ('KY', 'Cayman Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('CF', 'Central African Republic');
INSERT INTO tbl_countries (code, name_en) VALUES ('TD', 'Chad');
INSERT INTO tbl_countries (code, name_en) VALUES ('CL', 'Chile');
INSERT INTO tbl_countries (code, name_en) VALUES ('CN', 'China');
INSERT INTO tbl_countries (code, name_en) VALUES ('CX', 'Christmas Island');
INSERT INTO tbl_countries (code, name_en) VALUES ('CC', 'Cocos [Keeling] Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('CO', 'Colombia');
INSERT INTO tbl_countries (code, name_en) VALUES ('KM', 'Comoros');
INSERT INTO tbl_countries (code, name_en) VALUES ('CG', 'Congo - Brazzaville');
INSERT INTO tbl_countries (code, name_en) VALUES ('CD', 'Congo - Kinshasa');
INSERT INTO tbl_countries (code, name_en) VALUES ('CK', 'Cook Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('CR', 'Costa Rica');
INSERT INTO tbl_countries (code, name_en) VALUES ('HR', 'Croatia');
INSERT INTO tbl_countries (code, name_en) VALUES ('CU', 'Cuba');
INSERT INTO tbl_countries (code, name_en) VALUES ('CY', 'Cyprus');
INSERT INTO tbl_countries (code, name_en) VALUES ('CZ', 'Czech Republic');
INSERT INTO tbl_countries (code, name_en) VALUES ('CI', 'Côte d’Ivoire');
INSERT INTO tbl_countries (code, name_en) VALUES ('DK', 'Denmark');
INSERT INTO tbl_countries (code, name_en) VALUES ('DJ', 'Djibouti');
INSERT INTO tbl_countries (code, name_en) VALUES ('DM', 'Dominica');
INSERT INTO tbl_countries (code, name_en) VALUES ('DO', 'Dominican Republic');
INSERT INTO tbl_countries (code, name_en) VALUES ('NQ', 'Dronning Maud Land');
INSERT INTO tbl_countries (code, name_en) VALUES ('DD', 'East Germany');
INSERT INTO tbl_countries (code, name_en) VALUES ('EC', 'Ecuador');
INSERT INTO tbl_countries (code, name_en) VALUES ('EG', 'Egypt');
INSERT INTO tbl_countries (code, name_en) VALUES ('SV', 'El Salvador');
INSERT INTO tbl_countries (code, name_en) VALUES ('GQ', 'Equatorial Guinea');
INSERT INTO tbl_countries (code, name_en) VALUES ('ER', 'Eritrea');
INSERT INTO tbl_countries (code, name_en) VALUES ('EE', 'Estonia');
INSERT INTO tbl_countries (code, name_en) VALUES ('ET', 'Ethiopia');
INSERT INTO tbl_countries (code, name_en) VALUES ('FK', 'Falkland Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('FO', 'Faroe Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('FJ', 'Fiji');
INSERT INTO tbl_countries (code, name_en) VALUES ('FI', 'Finland');
INSERT INTO tbl_countries (code, name_en) VALUES ('FR', 'France');
INSERT INTO tbl_countries (code, name_en) VALUES ('GF', 'French Guiana');
INSERT INTO tbl_countries (code, name_en) VALUES ('PF', 'French Polynesia');
INSERT INTO tbl_countries (code, name_en) VALUES ('TF', 'French Southern Territories');
INSERT INTO tbl_countries (code, name_en) VALUES ('FQ', 'French Southern and Antarctic Territories');
INSERT INTO tbl_countries (code, name_en) VALUES ('GA', 'Gabon');
INSERT INTO tbl_countries (code, name_en) VALUES ('GM', 'Gambia');
INSERT INTO tbl_countries (code, name_en) VALUES ('GE', 'Georgia');
INSERT INTO tbl_countries (code, name_en) VALUES ('DE', 'Germany');
INSERT INTO tbl_countries (code, name_en) VALUES ('GH', 'Ghana');
INSERT INTO tbl_countries (code, name_en) VALUES ('GI', 'Gibraltar');
INSERT INTO tbl_countries (code, name_en) VALUES ('GR', 'Greece');
INSERT INTO tbl_countries (code, name_en) VALUES ('GL', 'Greenland');
INSERT INTO tbl_countries (code, name_en) VALUES ('GD', 'Grenada');
INSERT INTO tbl_countries (code, name_en) VALUES ('GP', 'Guadeloupe');
INSERT INTO tbl_countries (code, name_en) VALUES ('GU', 'Guam');
INSERT INTO tbl_countries (code, name_en) VALUES ('GT', 'Guatemala');
INSERT INTO tbl_countries (code, name_en) VALUES ('GG', 'Guernsey');
INSERT INTO tbl_countries (code, name_en) VALUES ('GN', 'Guinea');
INSERT INTO tbl_countries (code, name_en) VALUES ('GW', 'Guinea-Bissau');
INSERT INTO tbl_countries (code, name_en) VALUES ('GY', 'Guyana');
INSERT INTO tbl_countries (code, name_en) VALUES ('HT', 'Haiti');
INSERT INTO tbl_countries (code, name_en) VALUES ('HM', 'Heard Island and McDonald Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('HN', 'Honduras');
INSERT INTO tbl_countries (code, name_en) VALUES ('HK', 'Hong Kong SAR China');
INSERT INTO tbl_countries (code, name_en) VALUES ('HU', 'Hungary');
INSERT INTO tbl_countries (code, name_en) VALUES ('IS', 'Iceland');
INSERT INTO tbl_countries (code, name_en) VALUES ('IN', 'India');
INSERT INTO tbl_countries (code, name_en) VALUES ('ID', 'Indonesia');
INSERT INTO tbl_countries (code, name_en) VALUES ('IR', 'Iran');
INSERT INTO tbl_countries (code, name_en) VALUES ('IQ', 'Iraq');
INSERT INTO tbl_countries (code, name_en) VALUES ('IE', 'Ireland');
INSERT INTO tbl_countries (code, name_en) VALUES ('IM', 'Isle of Man');
INSERT INTO tbl_countries (code, name_en) VALUES ('IL', 'Israel');
INSERT INTO tbl_countries (code, name_en) VALUES ('IT', 'Italy');
INSERT INTO tbl_countries (code, name_en) VALUES ('JM', 'Jamaica');
INSERT INTO tbl_countries (code, name_en) VALUES ('JP', 'Japan');
INSERT INTO tbl_countries (code, name_en) VALUES ('JE', 'Jersey');
INSERT INTO tbl_countries (code, name_en) VALUES ('JT', 'Johnston Island');
INSERT INTO tbl_countries (code, name_en) VALUES ('JO', 'Jordan');
INSERT INTO tbl_countries (code, name_en) VALUES ('KZ', 'Kazakhstan');
INSERT INTO tbl_countries (code, name_en) VALUES ('KE', 'Kenya');
INSERT INTO tbl_countries (code, name_en) VALUES ('KI', 'Kiribati');
INSERT INTO tbl_countries (code, name_en) VALUES ('KW', 'Kuwait');
INSERT INTO tbl_countries (code, name_en) VALUES ('KG', 'Kyrgyzstan');
INSERT INTO tbl_countries (code, name_en) VALUES ('LA', 'Laos');
INSERT INTO tbl_countries (code, name_en) VALUES ('LV', 'Latvia');
INSERT INTO tbl_countries (code, name_en) VALUES ('LB', 'Lebanon');
INSERT INTO tbl_countries (code, name_en) VALUES ('LS', 'Lesotho');
INSERT INTO tbl_countries (code, name_en) VALUES ('LR', 'Liberia');
INSERT INTO tbl_countries (code, name_en) VALUES ('LY', 'Libya');
INSERT INTO tbl_countries (code, name_en) VALUES ('LI', 'Liechtenstein');
INSERT INTO tbl_countries (code, name_en) VALUES ('LT', 'Lithuania');
INSERT INTO tbl_countries (code, name_en) VALUES ('LU', 'Luxembourg');
INSERT INTO tbl_countries (code, name_en) VALUES ('MO', 'Macau SAR China');
INSERT INTO tbl_countries (code, name_en) VALUES ('MK', 'Macedonia');
INSERT INTO tbl_countries (code, name_en) VALUES ('MG', 'Madagascar');
INSERT INTO tbl_countries (code, name_en) VALUES ('MW', 'Malawi');
INSERT INTO tbl_countries (code, name_en) VALUES ('MY', 'Malaysia');
INSERT INTO tbl_countries (code, name_en) VALUES ('MV', 'Maldives');
INSERT INTO tbl_countries (code, name_en) VALUES ('ML', 'Mali');
INSERT INTO tbl_countries (code, name_en) VALUES ('MT', 'Malta');
INSERT INTO tbl_countries (code, name_en) VALUES ('MH', 'Marshall Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('MQ', 'Martinique');
INSERT INTO tbl_countries (code, name_en) VALUES ('MR', 'Mauritania');
INSERT INTO tbl_countries (code, name_en) VALUES ('MU', 'Mauritius');
INSERT INTO tbl_countries (code, name_en) VALUES ('YT', 'Mayotte');
INSERT INTO tbl_countries (code, name_en) VALUES ('FX', 'Metropolitan France');
INSERT INTO tbl_countries (code, name_en) VALUES ('MX', 'Mexico');
INSERT INTO tbl_countries (code, name_en) VALUES ('FM', 'Micronesia');
INSERT INTO tbl_countries (code, name_en) VALUES ('MI', 'Midway Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('MD', 'Moldova');
INSERT INTO tbl_countries (code, name_en) VALUES ('MC', 'Monaco');
INSERT INTO tbl_countries (code, name_en) VALUES ('MN', 'Mongolia');
INSERT INTO tbl_countries (code, name_en) VALUES ('ME', 'Montenegro');
INSERT INTO tbl_countries (code, name_en) VALUES ('MS', 'Montserrat');
INSERT INTO tbl_countries (code, name_en) VALUES ('MA', 'Morocco');
INSERT INTO tbl_countries (code, name_en) VALUES ('MZ', 'Mozambique');
INSERT INTO tbl_countries (code, name_en) VALUES ('MM', 'Myanmar [Burma]');
INSERT INTO tbl_countries (code, name_en) VALUES ('NA', 'Namibia');
INSERT INTO tbl_countries (code, name_en) VALUES ('NR', 'Nauru');
INSERT INTO tbl_countries (code, name_en) VALUES ('NP', 'Nepal');
INSERT INTO tbl_countries (code, name_en) VALUES ('NL', 'Netherlands');
INSERT INTO tbl_countries (code, name_en) VALUES ('AN', 'Netherlands Antilles');
INSERT INTO tbl_countries (code, name_en) VALUES ('NT', 'Neutral Zone');
INSERT INTO tbl_countries (code, name_en) VALUES ('NC', 'New Caledonia');
INSERT INTO tbl_countries (code, name_en) VALUES ('NZ', 'New Zealand');
INSERT INTO tbl_countries (code, name_en) VALUES ('NI', 'Nicaragua');
INSERT INTO tbl_countries (code, name_en) VALUES ('NE', 'Niger');
INSERT INTO tbl_countries (code, name_en) VALUES ('NG', 'Nigeria');
INSERT INTO tbl_countries (code, name_en) VALUES ('NU', 'Niue');
INSERT INTO tbl_countries (code, name_en) VALUES ('NF', 'Norfolk Island');
INSERT INTO tbl_countries (code, name_en) VALUES ('KP', 'North Korea');
INSERT INTO tbl_countries (code, name_en) VALUES ('VD', 'North Vietnam');
INSERT INTO tbl_countries (code, name_en) VALUES ('MP', 'Northern Mariana Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('NO', 'Norway');
INSERT INTO tbl_countries (code, name_en) VALUES ('OM', 'Oman');
INSERT INTO tbl_countries (code, name_en) VALUES ('PC', 'Pacific Islands Trust Territory');
INSERT INTO tbl_countries (code, name_en) VALUES ('PK', 'Pakistan');
INSERT INTO tbl_countries (code, name_en) VALUES ('PW', 'Palau');
INSERT INTO tbl_countries (code, name_en) VALUES ('PS', 'Palestinian Territories');
INSERT INTO tbl_countries (code, name_en) VALUES ('PA', 'Panama');
INSERT INTO tbl_countries (code, name_en) VALUES ('PZ', 'Panama Canal Zone');
INSERT INTO tbl_countries (code, name_en) VALUES ('PG', 'Papua New Guinea');
INSERT INTO tbl_countries (code, name_en) VALUES ('PY', 'Paraguay');
INSERT INTO tbl_countries (code, name_en) VALUES ('PE', 'Peru');
INSERT INTO tbl_countries (code, name_en) VALUES ('PH', 'Philippines');
INSERT INTO tbl_countries (code, name_en) VALUES ('PN', 'Pitcairn Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('PL', 'Poland');
INSERT INTO tbl_countries (code, name_en) VALUES ('PT', 'Portugal');
INSERT INTO tbl_countries (code, name_en) VALUES ('PR', 'Puerto Rico');
INSERT INTO tbl_countries (code, name_en) VALUES ('QA', 'Qatar');
INSERT INTO tbl_countries (code, name_en) VALUES ('RO', 'Romania');
INSERT INTO tbl_countries (code, name_en) VALUES ('RU', 'Russia');
INSERT INTO tbl_countries (code, name_en) VALUES ('RW', 'Rwanda');
INSERT INTO tbl_countries (code, name_en) VALUES ('RE', 'Réunion');
INSERT INTO tbl_countries (code, name_en) VALUES ('BL', 'Saint Barthélemy');
INSERT INTO tbl_countries (code, name_en) VALUES ('SH', 'Saint Helena');
INSERT INTO tbl_countries (code, name_en) VALUES ('KN', 'Saint Kitts and Nevis');
INSERT INTO tbl_countries (code, name_en) VALUES ('LC', 'Saint Lucia');
INSERT INTO tbl_countries (code, name_en) VALUES ('MF', 'Saint Martin');
INSERT INTO tbl_countries (code, name_en) VALUES ('PM', 'Saint Pierre and Miquelon');
INSERT INTO tbl_countries (code, name_en) VALUES ('VC', 'Saint Vincent and the Grenadines');
INSERT INTO tbl_countries (code, name_en) VALUES ('WS', 'Samoa');
INSERT INTO tbl_countries (code, name_en) VALUES ('SM', 'San Marino');
INSERT INTO tbl_countries (code, name_en) VALUES ('SA', 'Saudi Arabia');
INSERT INTO tbl_countries (code, name_en) VALUES ('SN', 'Senegal');
INSERT INTO tbl_countries (code, name_en) VALUES ('RS', 'Serbia');
INSERT INTO tbl_countries (code, name_en) VALUES ('CS', 'Serbia and Montenegro');
INSERT INTO tbl_countries (code, name_en) VALUES ('SC', 'Seychelles');
INSERT INTO tbl_countries (code, name_en) VALUES ('SL', 'Sierra Leone');
INSERT INTO tbl_countries (code, name_en) VALUES ('SG', 'Singapore');
INSERT INTO tbl_countries (code, name_en) VALUES ('SK', 'Slovakia');
INSERT INTO tbl_countries (code, name_en) VALUES ('SI', 'Slovenia');
INSERT INTO tbl_countries (code, name_en) VALUES ('SB', 'Solomon Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('SO', 'Somalia');
INSERT INTO tbl_countries (code, name_en) VALUES ('ZA', 'South Africa');
INSERT INTO tbl_countries (code, name_en) VALUES ('GS', 'South Georgia and the South Sandwich Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('KR', 'South Korea');
INSERT INTO tbl_countries (code, name_en) VALUES ('ES', 'Spain');
INSERT INTO tbl_countries (code, name_en) VALUES ('LK', 'Sri Lanka');
INSERT INTO tbl_countries (code, name_en) VALUES ('SD', 'Sudan');
INSERT INTO tbl_countries (code, name_en) VALUES ('SR', 'Suriname');
INSERT INTO tbl_countries (code, name_en) VALUES ('SJ', 'Svalbard and Jan Mayen');
INSERT INTO tbl_countries (code, name_en) VALUES ('SZ', 'Swaziland');
INSERT INTO tbl_countries (code, name_en) VALUES ('SE', 'Sweden');
INSERT INTO tbl_countries (code, name_en) VALUES ('CH', 'Switzerland');
INSERT INTO tbl_countries (code, name_en) VALUES ('SY', 'Syria');
INSERT INTO tbl_countries (code, name_en) VALUES ('ST', 'São Tomé and Príncipe');
INSERT INTO tbl_countries (code, name_en) VALUES ('TW', 'Taiwan');
INSERT INTO tbl_countries (code, name_en) VALUES ('TJ', 'Tajikistan');
INSERT INTO tbl_countries (code, name_en) VALUES ('TZ', 'Tanzania');
INSERT INTO tbl_countries (code, name_en) VALUES ('TH', 'Thailand');
INSERT INTO tbl_countries (code, name_en) VALUES ('TL', 'Timor-Leste');
INSERT INTO tbl_countries (code, name_en) VALUES ('TG', 'Togo');
INSERT INTO tbl_countries (code, name_en) VALUES ('TK', 'Tokelau');
INSERT INTO tbl_countries (code, name_en) VALUES ('TO', 'Tonga');
INSERT INTO tbl_countries (code, name_en) VALUES ('TT', 'Trinidad and Tobago');
INSERT INTO tbl_countries (code, name_en) VALUES ('TN', 'Tunisia');
INSERT INTO tbl_countries (code, name_en) VALUES ('TR', 'Turkey');
INSERT INTO tbl_countries (code, name_en) VALUES ('TM', 'Turkmenistan');
INSERT INTO tbl_countries (code, name_en) VALUES ('TC', 'Turks and Caicos Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('TV', 'Tuvalu');
INSERT INTO tbl_countries (code, name_en) VALUES ('UM', 'U.S. Minor Outlying Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('PU', 'U.S. Miscellaneous Pacific Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('VI', 'U.S. Virgin Islands');
INSERT INTO tbl_countries (code, name_en) VALUES ('UG', 'Uganda');
INSERT INTO tbl_countries (code, name_en) VALUES ('UA', 'Ukraine');
INSERT INTO tbl_countries (code, name_en) VALUES ('SU', 'Union of Soviet Socialist Republics');
INSERT INTO tbl_countries (code, name_en) VALUES ('AE', 'United Arab Emirates');
INSERT INTO tbl_countries (code, name_en) VALUES ('GB', 'United Kingdom');
INSERT INTO tbl_countries (code, name_en) VALUES ('US', 'United States');
INSERT INTO tbl_countries (code, name_en) VALUES ('ZZ', 'Unknown or Invalid Region');
INSERT INTO tbl_countries (code, name_en) VALUES ('UY', 'Uruguay');
INSERT INTO tbl_countries (code, name_en) VALUES ('UZ', 'Uzbekistan');
INSERT INTO tbl_countries (code, name_en) VALUES ('VU', 'Vanuatu');
INSERT INTO tbl_countries (code, name_en) VALUES ('VA', 'Vatican City');
INSERT INTO tbl_countries (code, name_en) VALUES ('VE', 'Venezuela');
INSERT INTO tbl_countries (code, name_en) VALUES ('VN', 'Vietnam');
INSERT INTO tbl_countries (code, name_en) VALUES ('WK', 'Wake Island');
INSERT INTO tbl_countries (code, name_en) VALUES ('WF', 'Wallis and Futuna');
INSERT INTO tbl_countries (code, name_en) VALUES ('EH', 'Western Sahara');
INSERT INTO tbl_countries (code, name_en) VALUES ('YE', 'Yemen');
INSERT INTO tbl_countries (code, name_en) VALUES ('ZM', 'Zambia');
INSERT INTO tbl_countries (code, name_en) VALUES ('ZW', 'Zimbabwe');
INSERT INTO tbl_countries (code, name_en) VALUES ('AX', 'Åland Islands');

--DROP TABLE tbl_currencies;
CREATE TABLE tbl_currencies (
  id SERIAL PRIMARY KEY,

  code varchar(255) DEFAULT '',
  
  name_en varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_currencies  (code, name_en,name_es) VALUES
('USD', 'Dollar', 'Dolar'),
('EURO', 'Euro', 'Euro');


--DROP TABLE tbl_members_pii;
CREATE TABLE tbl_members_pii (
  id SERIAL PRIMARY KEY,

  firstname varchar(128) NOT NULL,
  surname varchar(128) NOT NULL,
  streetnumber varchar(128) NOT NULL,
  street varchar(128) NOT NULL,
  streetdetails varchar(128) NOT NULL,
  city varchar(128) NOT NULL,
  state varchar(128) NOT NULL,
  zipcode varchar(128) NOT NULL,
  id_countries int NOT NULL references tbl_countries(id),
  email varchar(128) NOT NULL,
  birthdate date NOT NULL,
  agreerules boolean NOT NULL,

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);


--DROP TABLE tbl_members;
CREATE TABLE tbl_members (
  id SERIAL PRIMARY KEY,

  username varchar(20) NOT NULL,
  password varchar(128) NOT NULL,
  email varchar(128),
  activkey varchar(128) NOT NULL DEFAULT '',
  lastvisit_at TIMESTAMP with time zone,
  superuser int NOT NULL DEFAULT '0',
  status int NOT NULL DEFAULT '0',

  key text DEFAULT '',

  created_at TIMESTAMP with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tbl_members (username, password, email, activkey, superuser, status) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1, 1);

--DROP TABLE tbl_profiles;
CREATE TABLE tbl_profiles (
  user_id SERIAL PRIMARY KEY,
  lastname varchar(50) NOT NULL DEFAULT '',
  firstname varchar(50) NOT NULL DEFAULT ''
);

INSERT INTO tbl_profiles (lastname, firstname) VALUES
('Admin', 'Administrator');

--DROP TABLE tbl_profiles_fields;
CREATE TABLE tbl_profiles_fields (
  id SERIAL PRIMARY KEY,

  varname varchar(50) NOT NULL,
  title varchar(255) NOT NULL,
  field_type varchar(50) NOT NULL,
  field_size varchar(15) NOT NULL DEFAULT '0',
  field_size_min varchar(15) NOT NULL DEFAULT '0',
  required int NOT NULL DEFAULT '0',
  match varchar(255) NOT NULL DEFAULT '',
  range varchar(255) NOT NULL DEFAULT '',
  error_message varchar(255) NOT NULL DEFAULT '',
  other_validator varchar(5000) NOT NULL DEFAULT '',
  default_value varchar(255) NOT NULL DEFAULT '',
  widget varchar(255) NOT NULL DEFAULT '',
  widgetparams varchar(5000) NOT NULL DEFAULT '',
  position int NOT NULL DEFAULT '0',
  visible int NOT NULL DEFAULT '0'
);

-- INSERT INTO tbl_profiles_fields (varname, title, field_type, field_size, field_size_min, required, match, range, error_message, other_validator, default_value, widget, widgetparams, position, visible) VALUES
-- ('lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
-- ('firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

--- ADTHREATS DATA ---

--DROP TABLE tbl_adtracks_types;
CREATE TABLE tbl_adtracks_types (
  id SERIAL PRIMARY KEY,

  name varchar(255) NOT NULL DEFAULT ''
);

INSERT INTO tbl_adtracks_types (name) VALUES
('Others'),
('Advertising'),
('Analytics'),
('Social');

--DROP TABLE tbl_adtracks_sources;
CREATE TABLE tbl_adtracks_sources (
  id SERIAL PRIMARY KEY,

  adtrack_type_id int NOT NULL references tbl_adtracks_types(id),
  name varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT '',

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tbl_adtracks_sources (adtrack_type_id,name,url) VALUES
(4,'*','');



--DROP TABLE tbl_adtracks;
CREATE TABLE tbl_adtracks (
  id SERIAL PRIMARY KEY,

  user_id varchar(255) DEFAULT '',
  member_id int,
  adtracks_sources_id int NOT NULL references tbl_adtracks_sources(id),
  domain varchar(255) NOT NULL DEFAULT '',
  url text NOT NULL DEFAULT '',
  usertime TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,  
  status varchar(255) NOT NULL DEFAULT '',
  languages_support varchar(255) NOT NULL DEFAULT '',

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_whitelists;
CREATE TABLE tbl_whitelists (
  id SERIAL PRIMARY KEY,

  user_id varchar(255) DEFAULT '',
  member_id int,
  domain varchar(255) NOT NULL DEFAULT '',
  adtracks_sources_id int NOT NULL references tbl_adtracks_sources(id),
  status boolean NOT NULL DEFAULT true,

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--- BROWSING DATA ---

--DROP TABLE tbl_browsing;
CREATE TABLE tbl_browsing (
  id SERIAL PRIMARY KEY,

  member_id int,
  user_id varchar(255) DEFAULT '',
  domain varchar(255) NOT NULL DEFAULT '',
  url text NOT NULL DEFAULT '',
  usertime TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--- QUERIES DATA ---

--DROP TABLE tbl_queries;
CREATE TABLE tbl_queries (
  id SERIAL PRIMARY KEY,

  member_id int,
  user_id varchar(255) DEFAULT '',
  provider varchar(128) NOT NULL,
  data varchar(256) NOT NULL,
  query text NOT NULL,
  lang varchar(128) NOT NULL,
  share varchar(128) DEFAULT 'true', 
  usertime TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_queries_blacklist;
CREATE TABLE tbl_queries_blacklist (
  id SERIAL PRIMARY KEY,

  lang varchar(128) NOT NULL,
  category varchar(255) NOT NULL DEFAULT '',
  -- topic varchar(255) NOT NULL DEFAULT '',
  -- search_term varchar(255) NOT NULL DEFAULT '',
  headword varchar(255) NOT NULL DEFAULT '',
  midword varchar(255) NOT NULL DEFAULT '',
  action varchar(255) NOT NULL DEFAULT 'use',
  
  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

-- INSERT INTO tbl_queries_blacklist (category, headword,lang) VALUES
-- ('sex', 'sex','en'),
-- ('sex', 'sex','es');

--- GOOD DATA ---

--DROP TABLE tbl_loans_status;
CREATE TABLE tbl_loans_status (
  id SERIAL PRIMARY KEY,

  name_en varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);


INSERT INTO tbl_loans_status (id,name_en, name_es) VALUES
(1,'fundraising', 'Recaudación de fondos'),
(2,'Funded', 'Financiado'),
(3,'Paying Back', 'Reembolsando'),
(4,'Paid', 'Pagado'),
(5,'At Loss', 'Perdido');

--DROP TABLE tbl_loans_activities;
CREATE TABLE tbl_loans_activities (
  id SERIAL PRIMARY KEY,

  name_en varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_loans_activities (name_en, name_es) VALUES
('Agriculture', 'Agricultura'),
('Health', 'Salud');

--DROP TABLE tbl_achievements_types;
CREATE TABLE tbl_achievements_types (
  id SERIAL PRIMARY KEY,

  name_en varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT '',

  icon varchar(255) DEFAULT ''
);

INSERT INTO tbl_achievements_types  (name_en, name_es,icon) VALUES
('Users news', 'Noticias de usuarios','news.png'),
('Incomes', 'Ingresos','money.png');


--DROP TABLE tbl_achievements;
CREATE TABLE tbl_achievements (
  id varchar(255) PRIMARY KEY,

  achievement_type_id int references tbl_achievements_types(id),

  link_en varchar(255) DEFAULT '',
  link_es varchar(255) DEFAULT '',

  text_en text DEFAULT '',
  text_es text DEFAULT '',

  achievements_start TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  achievements_finish TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tbl_achievements  (id,achievement_type_id, link_en,text_en,achievements_start,achievements_finish) VALUES
(1, 1, 'http://www.thegooddata.org','This a sample achievement with two lines. I hope it fill the extension content.','01/01/2014','01/01/2015');

--DROP TABLE tbl_achievements_types;
CREATE TABLE tbl_incomes_types (
  id SERIAL PRIMARY KEY,

  name_en varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_incomes_types  (name_en, name_es) VALUES
('Donations', 'Donaciones'),
('Data trade', 'Data trade');

--DROP TABLE tbl_incomes;
CREATE TABLE tbl_incomes (
  id SERIAL PRIMARY KEY,

  type int NOT NULL references tbl_incomes_types(id),
  source_name varchar(255) DEFAULT '',
  gross_amount numeric DEFAULT '0',
  expenses numeric DEFAULT '0',
  income_date TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  currency int NOT NULL references tbl_currencies(id),
  xrate_USD_spot numeric DEFAULT '0', 
  loan_reserved numeric DEFAULT '50',

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_loans_countries;
CREATE TABLE tbl_loans_leaders (
  id SERIAL PRIMARY KEY,

  name_en varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_loans_leaders  (name_en, name_es) VALUES
('Kiva', 'Kiva');

--DROP TABLE tbl_loans;
CREATE TABLE tbl_loans (
  id SERIAL PRIMARY KEY,

  loan_identifier varchar(255) DEFAULT '',
  
  leader int NOT NULL references tbl_loans_leaders(id),
  loan_url varchar(255) DEFAULT '',

  title_en varchar(255) DEFAULT '',
  title_es varchar(255) DEFAULT '',
  
  id_loans_activity int NOT NULL references tbl_loans_activities(id),
  id_countries int NOT NULL references tbl_countries(id),

  partner varchar(255) DEFAULT '',
  amount real DEFAULT '0',

  currency int NOT NULL references tbl_currencies(id),
  term int DEFAULT '0',
  contribution real DEFAULT '0',

  loan_date TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  loan_update TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,

  paidback real DEFAULT '0',
  loss real DEFAULT '0',

  id_loans_status int NOT NULL references tbl_loans_status(id),

  image varchar(255) DEFAULT '',

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);


--FUNCTION
CREATE OR REPLACE FUNCTION _getRiskMember (i integer)
RETURNS float AS $total$
declare
  total float;
BEGIN
  total:=0;
  SELECT ( (select SUM(adtracks) from view_adtracks_members where member_id= i) / (select SUM(visited) from view_browsing_members where member_id= i) ) as ratio
   into total FROM tbl_adtracks;
   RETURN total;
END;
$total$ LANGUAGE plpgsql;



CREATE OR REPLACE FUNCTION _getRiskTotal ()
RETURNS float AS $total$
declare
  total float;
BEGIN
  SELECT ( (select SUM(adtracks) from view_adtracks_members) / (select SUM(visited) from view_browsing_members) ) as ratio
   into total FROM tbl_adtracks;
   RETURN total;
END;
$total$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION _getRiskRatioMember (i integer)
RETURNS float AS $total$
declare
  block float;
  allow float;
  total float;
BEGIN
  total:=0;
  select count(*) into block from tbl_adtracks where member_id= i and status='blocked';
  select count(*) into allow from tbl_adtracks where member_id= i and status='allowed';

  if ( allow <> 0 and  block <>0) THEN
  total:=100-allow/block * 100;
  END IF; 

  RETURN total;
   
END;
$total$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION _getRiskRatioTotal ()
RETURNS float AS $total$
declare
  block float;
  allow float;
  total float;
BEGIN
  total:=0;
  select count(*) into block from tbl_adtracks where status='blocked';
  select count(*) into allow from tbl_adtracks where status='allowed';

  total:=100-allow/block * 100;
  
   RETURN total;
END;
$total$ LANGUAGE plpgsql;

--VIEWS

CREATE OR REPLACE VIEW view_loans_countries AS 
select count(*) as total from tbl_loans group by id_countries;

CREATE OR REPLACE VIEW view_adtracks_sources_members AS 
select a.member_id,t.name, count(*) 
  from tbl_adtracks a,tbl_adtracks_sources s,tbl_adtracks_types t
  where a.adtracks_sources_id = s.id and s.adtrack_type_id = t.id
  group by t.name,a.member_id
  order by t.name;


CREATE OR REPLACE VIEW view_adtracks_sources_total AS 
select t.name, count(*) 
  from tbl_adtracks a,tbl_adtracks_sources s,tbl_adtracks_types t
  where a.adtracks_sources_id = s.id and s.adtrack_type_id = t.id
  group by t.name
  order by t.name;

CREATE OR REPLACE VIEW view_adtracks_members AS 
 select member_id,domain,count(*) as adtracks from tbl_adtracks group by domain,member_id order by adtracks desc;

CREATE OR REPLACE VIEW view_browsing_members AS 
 select member_id,domain,count(*) as visited from tbl_browsing group by member_id,domain order by visited desc;

CREATE OR REPLACE VIEW view_queries AS 
 SELECT tbl_queries.user_id, 
    tbl_queries.member_id, 
    count(*) AS queries
   FROM tbl_members, 
    tbl_queries
  GROUP BY tbl_queries.user_id, tbl_queries.member_id;

CREATE OR REPLACE VIEW view_queries_members AS 
 SELECT tbl_queries.member_id, 
    count(*) AS queries
   FROM tbl_members, 
    tbl_queries
  WHERE tbl_queries.member_id IS NOT NULL
  GROUP BY tbl_queries.member_id;

CREATE OR REPLACE VIEW view_queries_members_percentil AS 
 SELECT a.member_id, 
    round(100.0 * (( SELECT count(*) AS count
           FROM view_queries_members b
          WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) AS percentile, 
    a.queries
   FROM view_queries_members a
  CROSS JOIN ( SELECT count(*) AS cnt
           FROM view_queries_members) total
  ORDER BY round(100.0 * (( SELECT count(*) AS count
      FROM view_queries_members b
     WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) DESC;

CREATE OR REPLACE VIEW view_queries_users AS 
 SELECT tbl_queries.user_id, 
    count(*) AS queries
   FROM tbl_members, 
    tbl_queries
  GROUP BY tbl_queries.user_id;

CREATE OR REPLACE VIEW view_adtracks_users AS 
SELECT tbl_adtracks.member_id, 
    count(*) AS queries
   FROM tbl_members, 
    tbl_adtracks
  GROUP BY tbl_adtracks.member_id;

CREATE OR REPLACE VIEW view_adtracks_year_users AS 
SELECT member_id, count(*) AS queries FROM tbl_adtracks where created_at between date_trunc('year', NOW())::date and date_trunc('month', date_trunc('year', NOW()) + '1 year'::interval) - '1 seconds'::interval GROUP BY member_id;


CREATE OR REPLACE VIEW view_adtracks_month_users AS 
SELECT member_id, count(*) AS queries FROM tbl_adtracks where created_at between date_trunc('month', NOW())::date and date_trunc('month', date_trunc('month', NOW()) + '1 month'::interval) - '1 seconds'::interval GROUP BY member_id;


CREATE OR REPLACE VIEW view_adtracks_week_users AS 
SELECT member_id, count(*) AS queries FROM tbl_adtracks where created_at between date_trunc('week', NOW())::date and date_trunc('week', NOW()) + '6 days'::interval GROUP BY member_id;

CREATE OR REPLACE VIEW view_adtracks_year_users_percentil AS 
 SELECT a.member_id, 
    round(100.0 * (( SELECT count(*) AS count
           FROM view_adtracks_year_users b
          WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) AS percentile, 
    a.queries
   FROM view_adtracks_year_users a
  CROSS JOIN ( SELECT count(*) AS cnt
           FROM view_adtracks_year_users) total
  ORDER BY round(100.0 * (( SELECT count(*) AS count
      FROM view_adtracks_year_users b
     WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) DESC;




CREATE OR REPLACE VIEW view_adtracks_month_users_percentil AS 
 SELECT a.member_id, 
    round(100.0 * (( SELECT count(*) AS count
           FROM view_adtracks_month_users b
          WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) AS percentile, 
    a.queries
   FROM view_adtracks_month_users a
  CROSS JOIN ( SELECT count(*) AS cnt
           FROM view_adtracks_month_users) total
  ORDER BY round(100.0 * (( SELECT count(*) AS count
      FROM view_adtracks_month_users b
     WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) DESC;




CREATE OR REPLACE VIEW view_adtracks_week_users_percentil AS 
 SELECT a.member_id, 
    round(100.0 * (( SELECT count(*) AS count
           FROM view_adtracks_week_users b
          WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) AS percentile, 
    a.queries
   FROM view_adtracks_week_users a
  CROSS JOIN ( SELECT count(*) AS cnt
           FROM view_adtracks_week_users) total
  ORDER BY round(100.0 * (( SELECT count(*) AS count
      FROM view_adtracks_week_users b
     WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) DESC;



CREATE OR REPLACE VIEW view_queries_users_percentil AS 
 SELECT a.user_id, 
    round(100.0 * (( SELECT count(*) AS count
           FROM view_queries_users b
          WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) AS percentile, 
    a.queries
   FROM view_queries_users a
  CROSS JOIN ( SELECT count(*) AS cnt
           FROM view_queries_users) total
  ORDER BY round(100.0 * (( SELECT count(*) AS count
      FROM view_queries_users b
     WHERE b.queries <= a.queries))::numeric / total.cnt::numeric, 1) DESC;




CREATE OR REPLACE VIEW view_members_month AS 
  select count(*) as total FROM tbl_members where lastvisit_at between date_trunc('month', NOW())::date and date_trunc('month', date_trunc('month', NOW()) + '1 month'::interval) - '1 seconds'::interval;

CREATE OR REPLACE VIEW view_queries_month AS 
  select count(*) as total  FROM tbl_queries where created_at between date_trunc('month', NOW())::date and date_trunc('month', date_trunc('month', NOW()) + '1 month'::interval) - '1 seconds'::interval;

CREATE OR REPLACE VIEW view_queries_trade_month AS 
  select count(*) as total  FROM tbl_queries where tbl_queries.share='true' and created_at between date_trunc('month', NOW())::date and date_trunc('month', date_trunc('month', NOW()) + '1 month'::interval) - '1 seconds'::interval;

