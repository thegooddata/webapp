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
  support boolean,
  alias varchar(128) NOT NULL
);

INSERT INTO tbl_languages_support  (lang, alias,support ) VALUES
('en', 'en', true),
('en-US', 'en', true),
('es', 'es', false);

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
('admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1, 1),
('marcos', '01002abbbe2f5265c0edcde6c733906c', '', '7a2663c55b9980dfa13cefebba8e1fa1', 1, 1),
('tsunamix', 'e868e672a0b91a85bd404ba2c9c033dd', '', 'b3f6a426721ab658060a6afdb73781c4', 1, 1);


--DROP TABLE tbl_profiles;
CREATE TABLE tbl_profiles (
  user_id SERIAL PRIMARY KEY,
  lastname varchar(50) NOT NULL DEFAULT '',
  firstname varchar(50) NOT NULL DEFAULT ''
);

INSERT INTO tbl_profiles (lastname, firstname) VALUES
('Admin', 'Administrator'),
('', ''),
('', '');

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
('None'),
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
(1,'*','');



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
  language_support varchar(255) NOT NULL DEFAULT '',

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_queries_blacklist;
CREATE TABLE tbl_queries_blacklist (
  id SERIAL PRIMARY KEY,

  lang varchar(128) NOT NULL,
  category varchar(255) NOT NULL DEFAULT '',
  stem varchar(255) NOT NULL DEFAULT '',
  
  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tbl_queries_blacklist (lang,category,stem) VALUES 
('en','Sex','/b18onlygirls'),
('en','Sex','/b4tube'),
('en','Health','/baa/b'),
('en','Politics','/baaron schock'),
('en','Sex','/babbey brooks'),
('en','Sex','/babella anderson'),
('en','Politics','/babort'),
('en','Health','/babsces'),
('en','Religion','/babsolutio'),
('en','Politics','/babsolutis'),
('en','Finance','/bacas/b'),
('en','Finance','/baceelitecard/b'),
('en','Health','/bacid re'),
('en','Health','/bacne'),
('en','Health','/bacupre'),
('en','Health','/bacupun'),
('en','Finance','/bacxiom/b'),
('en','Politics','/badam kinzinger'),
('en','Politics','/badam schiff'),
('en','Politics','/badam smith'),
('en','Health','/baddera'),
('en','Health','/baddic'),
('en','Religion','/badhan'),
('en','Health','/badhd'),
('en','Religion','/badonai'),
('en','Sex','/badrenalynn'),
('en','Politics','/badrian m smith'),
('en','Sex','/badult'),
('en','Finance','/badvance america/b'),
('en','Sex','/baerisdies'),
('en','Finance','/baffordable care/b'),
('en','Politics','/bafgan'),
('en','Religion','/bagama'),
('en','Religion','/baggadah'),
('en','Health','/baging'),
('en','Sex','/bah me'),
('en','Health','/baids/b'),
('en','Politics','/bal franken'),
('en','Politics','/bal green'),
('en','Politics','/balan grayson'),
('en','Politics','/balan lowenthal'),
('en','Politics','/balan nunnelee'),
('en','Sex','/balanah rae'),
('en','Health','/balbin/b'),
('en','Politics','/balbio sires'),
('en','Health','/balbut'),
('en','Politics','/balcee hastings'),
('en','Health','/balcoholi'),
('en','Religion','/balef bet'),
('en','Religion','/baleinu'),
('en','Sex','/baletta ocean'),
('en','Politics','/balex salmond'),
('en','Sex','/balexis ford'),
('en','Sex','/balexis texas'),
('en','Religion','/baliyah'),
('en','Religion','/ballah'),
('en','Religion','/balleluia'),
('en','Health','/ballerg'),
('en','Politics','/ballyson schwartz'),
('en','Sex','/balt/b'),
('en','Health','/balzh'),
('en','Sex','/bamateuralbum'),
('en','Sex','/bamateurindex'),
('en','Sex','/bamber lynn'),
('en','Finance','/bamerican education services/b'),
('en','Politics','/bami bera'),
('en','Sex','/bamia miley'),
('en','Religion','/bamida'),
('en','Politics','/bamnesty'),
('en','Finance','/bamortization calculator'),
('en','Finance','/bamortization schedule'),
('en','Religion','/bamudah'),
('en','Politics','/bamy klobuchar'),
('en','Sex','/bamy reid'),
('en','Sex','/banal/b'),
('en','Sex','/banaling'),
('en','Religion','/bananda'),
('en','Health','/banatom'),
('en','Politics','/bander crenshaw'),
('en','Religion','/bandhra pradesh'),
('en','Politics','/bandre carson'),
('en','Politics','/bandrew cuomo'),
('en','Politics','/bandrew p harris'),
('en','Politics','/bandy barr'),
('en','Sex','/bandy san dimas'),
('en','Health','/banemi'),
('en','Health','/baneury'),
('en','Sex','/bangelina valentine'),
('en','Religion','/banglica'),
('en','Politics','/bangus king'),
('en','Religion','/banicca'),
('en','Sex','/banimephile'),
('en','Politics','/bann coulter'),
('en','Politics','/bann kirkpatrick'),
('en','Politics','/bann mclane kuster'),
('en','Politics','/bann wagner'),
('en','Politics','/banna eshoo'),
('en','Health','/banore'),
('en','Finance','/banthem blue cross/b'),
('en','Politics','/banthony foxx'),
('en','Sex','/banus/b'),
('en','Health','/banxie'),
('en','Sex','/bapina'),
('en','Health','/bapne'),
('en','Religion','/bapost'),
('en','Sex','/bapril o neil'),
('en','Religion','/baquinas'),
('en','Religion','/baramaic'),
('en','Religion','/barchbi'),
('en','Religion','/barhat'),
('en','Politics','/barne duncan'),
('en','Health','/barthr'),
('en','Sex','/basa akira'),
('en','Religion','/bashkenazi'),
('en','Sex','/bashley madison'),
('en','Religion','/bashtanga'),
('en','Sex','/basia carrera'),
('en','Sex','/baskjolene'),
('en','Health','/basperge'),
('en','Sex','/bass'),
('en','Health','/basthm'),
('en','Health','/bastigm'),
('en','Health','/bastm'),
('en','Religion','/bastral'),
('en','Religion','/bastrol'),
('en','Religion','/basuras'),
('en','Religion','/batheis'),
('en','Health','/batki'),
('en','Religion','/batman'),
('en','Sex','/baudrey bitoni'),
('en','Sex','/baudrey hollander'),
('en','Sex','/bauntie'),
('en','Sex','/baurora jolie'),
('en','Politics','/baustin scott'),
('en','Health','/bautis'),
('en','Health','/bautoim'),
('en','Sex','/bava addams'),
('en','Religion','/bavalokiteshvara'),
('en','Religion','/bavidya'),
('en','Sex','/bawsum'),
('en','Religion','/bayodhya'),
('en','Sex','/bbabelounge'),
('en','Sex','/bbabepedia'),
('en','Sex','/bbabes'),
('en','Health','/bback pain'),
('en','Sex','/bbadjojo'),
('en','Politics','/bbailout'),
('en','Sex','/bballsac'),
('en','Sex','/bbananabunny'),
('en','Sex','/bbangbros'),
('en','Religion','/bbaptis'),
('en','Religion','/bbar mitzvah'),
('en','Politics','/bbarack obama'),
('en','Politics','/bbarbara boxer'),
('en','Politics','/bbarbara lee'),
('en','Politics','/bbarbara mikulski'),
('en','Health','/bbariat'),
('en','Religion','/bbasmala'),
('en','Religion','/bbat mitzvah'),
('en','Sex','/bbatw'),
('en','Religion','/bbavikonda'),
('en','Finance','/bbbrt/b'),
('en','Sex','/bbbw'),
('en','Sex','/bbdsm'),
('en','Sex','/bbeaverbattle'),
('en','Sex','/bbeeg'),
('en','Religion','/bbeit knesset'),
('en','Religion','/bbeit midrash'),
('en','Religion','/bbeit tefilah'),
('en','Sex','/bbella moretti'),
('en','Politics','/bben cardin'),
('en','Politics','/bben r lujan'),
('en','Health','/bbenad'),
('en','Religion','/bbenedict'),
('en','Politics','/bbennie thompson'),
('en','Politics','/bbernanke'),
('en','Politics','/bbernie sanders'),
('en','Religion','/bbet din'),
('en','Sex','/bbethany benz'),
('en','Religion','/bbethlehem'),
('en','Politics','/bbeto o rourke'),
('en','Politics','/bbetty mccollum'),
('en','Religion','/bbhagavad-gita'),
('en','Religion','/bbhakti-marga'),
('en','Sex','/bbibi jones'),
('en','Religion','/bbible'),
('en','Sex','/bbigass'),
('en','Sex','/bbigcock'),
('en','Sex','/bbigtit'),
('en','Politics','/bbill cassidy'),
('en','Politics','/bbill flores'),
('en','Politics','/bbill foster'),
('en','Politics','/bbill haslam'),
('en','Politics','/bbill huizenga'),
('en','Politics','/bbill johnson'),
('en','Politics','/bbill nelson'),
('en','Politics','/bbill owens'),
('en','Politics','/bbill pascrell'),
('en','Politics','/bbill posey'),
('en','Politics','/bbill shuster'),
('en','Politics','/bbill young'),
('en','Politics','/bbilly long'),
('en','Religion','/bbinding of isaac'),
('en','Health','/bbipol'),
('en','Health','/bbirth co'),
('en','Religion','/bbishop'),
('en','Sex','/bbitch'),
('en','Sex','/bblack angelika'),
('en','Sex','/bblackgfs'),
('en','Politics','/bblaine luetkemeyer'),
('en','Politics','/bblake farenthold'),
('en','Health','/bbloati'),
('en','Health','/bblood cl'),
('en','Health','/bblood glu'),
('en','Health','/bblood pre'),
('en','Health','/bblood sug'),
('en','Sex','/bblow job'),
('en','Sex','/bblowjob'),
('en','Health','/bbmi/b'),
('en','Politics','/bbob brady'),
('en','Politics','/bbob casey'),
('en','Politics','/bbob corker'),
('en','Politics','/bbob gibbs'),
('en','Politics','/bbob goodlatte'),
('en','Politics','/bbob latta'),
('en','Politics','/bbob mcdonnell'),
('en','Politics','/bbob menendez'),
('en','Politics','/bbob rae'),
('en','Sex','/bbobbi starr'),
('en','Politics','/bbobby jindal'),
('en','Politics','/bbobby rush'),
('en','Politics','/bbobby scott'),
('en','Religion','/bbodh gaya'),
('en','Religion','/bbodhi'),
('en','Religion','/bbodhicitta'),
('en','Religion','/bbodhisattva'),
('en','Health','/bbody mass i'),
('en','Religion','/bbojjannakonda'),
('en','Sex','/bbolloc'),
('en','Sex','/bbondag'),
('en','Religion','/bbonpu'),
('en','Sex','/bboo by'),
('en','Sex','/bboob'),
('en','Finance','/bbooloo/b'),
('en','Sex','/bbooty'),
('en','Politics','/bborder'),
('en','Politics','/bboris johnson'),
('en','Sex','/bbosom'),
('en','Health','/bbotox'),
('en','Sex','/bbotto ms'),
('en','Health','/bbowel'),
('en','Health','/bbraces'),
('en','Politics','/bbrad schneider'),
('en','Politics','/bbrad sherman'),
('en','Politics','/bbrad wenstrup'),
('en','Religion','/bbrahamanas'),
('en','Religion','/bbrahma'),
('en','Sex','/bbrazzer'),
('en','Sex','/bbrdteengal'),
('en','Sex','/bbreanne benson'),
('en','Health','/bbreast au'),
('en','Health','/bbreatha'),
('en','Sex','/bbree olson'),
('en','Politics','/bbrett guthrie'),
('en','Religion','/bbreviar'),
('en','Politics','/bbrian higgins'),
('en','Sex','/bbrian pumper'),
('en','Politics','/bbrian sandoval'),
('en','Politics','/bbrian schatz'),
('en','Religion','/bbrit milah'),
('en','Health','/bbronch'),
('en','Politics','/bbruce braley'),
('en','Religion','/bbuddh'),
('en','Sex','/bbukkak'),
('en','Health','/bbuli'),
('en','Sex','/bbulktube'),
('en','Health','/bbumps o'),
('en','Sex','/bburningcamel'),
('en','Health','/bburns'),
('en','Sex','/bbustnow'),
('en','Sex','/bbustybay'),
('en','Politics','/bbutch otter'),
('en','Health','/bbutt/b'),
('en','Sex','/bbutthol'),
('en','Sex','/bbuttmun'),
('en','Health','/bbuttoc'),
('en','Sex','/bbuttplu'),
('en','Politics','/bc mcmorris rodgers'),
('en','Sex','/bc urvy'),
('en','Health','/bcaffei'),
('en','Religion','/bcaliph'),
('en','Health','/bcalorie'),
('en','Religion','/bcalvinis'),
('en','Sex','/bcamelto'),
('en','Sex','/bcams com'),
('en','Health','/bcancer'),
('en','Politics','/bcandice miller'),
('en','Sex','/bcandice nicole'),
('en','Health','/bcannab'),
('en','Religion','/bcanoni'),
('en','Politics','/bcapitol'),
('en','Finance','/bcapquest/b'),
('en','Sex','/bcapri anderson'),
('en','Sex','/bcapri cavalli'),
('en','Health','/bcarci'),
('en','Finance','/bcare one/b'),
('en','Politics','/bcarl levin'),
('en','Politics','/bcarol shea porter'),
('en','Politics','/bcarolyn b maloney'),
('en','Politics','/bcarolyn mccarthy'),
('en','Finance','/bcash advance'),
('en','Finance','/bcash plus/b'),
('en','Sex','/bcassandra cruz'),
('en','Sex','/bcastration'),
('en','Religion','/bcatech'),
('en','Religion','/bcathed'),
('en','Health','/bcathet'),
('en','Religion','/bcatho'),
('en','Health','/bcdc/b'),
('en','Politics','/bcedric richmond'),
('en','Health','/bceiling f'),
('en','Health','/bceliac'),
('en','Health','/bcelluli'),
('en','Politics','/bcensor'),
('en','Politics','/bcensur'),
('en','Health','/bcervix'),
('en','Religion','/bchabad'),
('en','Religion','/bchado'),
('en','Politics','/bchaka fattah'),
('en','Sex','/bchanel preston'),
('en','Religion','/bchanukkiah'),
('en','Politics','/bcharles b. rangel'),
('en','Politics','/bcharles boustany'),
('en','Politics','/bcharlie dent'),
('en','Sex','/bchasey lain'),
('en','Sex','/bchaturbate'),
('en','Sex','/bchayse evans'),
('en','Finance','/bcheck my file'),
('en','Finance','/bcheckmyfile'),
('en','Politics','/bchellie pingree'),
('en','Politics','/bcheney'),
('en','Politics','/bcheri bustos'),
('en','Sex','/bchester5000xyv'),
('en','Finance','/bchild benefit'),
('en','Health','/bchiropr'),
('en','Health','/bchlam'),
('en','Health','/bcholes'),
('en','Politics','/bchris christie'),
('en','Politics','/bchris collins'),
('en','Politics','/bchris coons'),
('en','Politics','/bchris gibson'),
('en','Politics','/bchris h smith'),
('en','Politics','/bchris murphy'),
('en','Politics','/bchris stewart'),
('en','Politics','/bchris van hollen'),
('en','Sex','/bchristia'),
('en','Politics','/bchuck fleischmann'),
('en','Politics','/bchuck grassley'),
('en','Politics','/bchuck hagel'),
('en','Politics','/bchuck schumer'),
('en','Religion','/bchukkim'),
('en','Religion','/bchuppah'),
('en','Religion','/bchutzpah'),
('en','Health','/bcialis'),
('en','Health','/bcigar'),
('en','Health','/bcircumcis'),
('en','Finance','/bciti prepaid/b'),
('en','Politics','/bcitizen'),
('en','Politics','/bcity council'),
('en','Politics','/bcity hall'),
('en','Politics','/bcivil/b'),
('en','Politics','/bclaire mccaskill'),
('en','Health','/bclenb'),
('en','Religion','/bclerg'),
('en','Health','/bcleveland cl'),
('en','Sex','/bclimax'),
('en','Sex','/bcliphunter'),
('en','Sex','/bclit/b'),
('en','Sex','/bclitor'),
('en','Health','/bclomi'),
('en','Health','/bcocai'),
('en','Health','/bcochl'),
('en','Sex','/bcoedcherry'),
('en','Sex','/bcoitus'),
('en','Politics','/bcolleen hanabusa'),
('en','Politics','/bcollin peterson'),
('en','Health','/bcolon'),
('en','Religion','/bcommunion'),
('en','Politics','/bcomunis'),
('en','Health','/bcondom'),
('en','Religion','/bconfess'),
('en','Religion','/bconfirmation'),
('en','Politics','/bcongress'),
('en','Health','/bconstip'),
('en','Health','/bcontact len'),
('en','Health','/bcontacts'),
('en','Health','/bcontagi'),
('en','Sex','/bcoomgirl'),
('en','Health','/bcopd/b'),
('en','Religion','/bcoptic'),
('en','Politics','/bcorrine brown'),
('en','Politics','/bcory gardner'),
('en','Religion','/bcosmoprof'),
('en','Health','/bcough'),
('en','Politics','/bcoulter'),
('en','Health','/bcoumad'),
('en','Politics','/bcouncil bluffs'),
('en','Religion','/bcounting of the omer'),
('en','Finance','/bcovered california/b'),
('en','Politics','/bcpi/b'),
('en','Health','/bcpr/b'),
('en','Sex','/bcreampie'),
('en','Finance','/bcredit'),
('en','Religion','/bcreed'),
('en','Sex','/bcrotchtime'),
('en','Religion','/bcrucif'),
('en','Religion','/bcrusad'),
('en','Politics','/bcuba'),
('en','Sex','/bcum/b'),
('en','Sex','/bcumloud'),
('en','Sex','/bcumm'),
('en','Sex','/bcumsh'),
('en','Sex','/bcunt'),
('en','Health','/bcure'),
('en','Health','/bcutic'),
('en','Health','/bcvs/b'),
('en','Health','/bcyalis'),
('en','Politics','/bcynthia lummis'),
('en','Health','/bcyst'),
('en','Politics','/bd wasserman schultz'),
('en','Religion','/bdaf yomi'),
('en','Politics','/bdaily beast'),
('en','Religion','/bdalai'),
('en','Sex','/bdale dabone'),
('en','Health','/bdallas isd'),
('en','Politics','/bdan benishek'),
('en','Politics','/bdan coats'),
('en','Politics','/bdan kildee'),
('en','Politics','/bdan lipinski'),
('en','Politics','/bdan maffei'),
('en','Politics','/bdan malloy'),
('en','Politics','/bdana rohrabacher'),
('en','Politics','/bdaniel webster'),
('en','Sex','/bdaniella rush'),
('en','Politics','/bdanny k davis'),
('en','Sex','/bdaredorm'),
('en','Politics','/bdarrell issa'),
('en','Sex','/bdatehook'),
('en','Politics','/bdave heineman'),
('en','Politics','/bdave reichert'),
('en','Politics','/bdavid cicilline'),
('en','Politics','/bdavid e price'),
('en','Politics','/bdavid joyce'),
('en','Politics','/bdavid l camp'),
('en','Politics','/bdavid loebsack'),
('en','Politics','/bdavid mckinley'),
('en','Politics','/bdavid schweikert'),
('en','Politics','/bdavid scott'),
('en','Politics','/bdavid valadao'),
('en','Politics','/bdavid vitter'),
('en','Health','/bdeaf/b'),
('en','Politics','/bdean heller'),
('en','Politics','/bdeath penalty'),
('en','Politics','/bdeb fischer'),
('en','Politics','/bdebat'),
('en','Politics','/bdebbie stabenow'),
('en','Finance','/bdebt/b'),
('en','Health','/bdeepthr'),
('en','Sex','/bdefinebabe'),
('en','Sex','/bdefinefetish'),
('en','Finance','/bdeft/b'),
('en','Health','/bdelta de'),
('en','Health','/bdemen'),
('en','Politics','/bdemocrat'),
('en','Politics','/bdenis mcdonough'),
('en','Politics','/bdennis a ross'),
('en','Politics','/bdennis daugaard'),
('en','Politics','/bdennis heck'),
('en','Health','/bdenta'),
('en','Health','/bdenti'),
('en','Health','/bdepres'),
('en','Politics','/bderek kilmer'),
('en','Health','/bderm'),
('en','Health','/bdetox'),
('en','Politics','/bdeval patrick'),
('en','Sex','/bdeviantclip'),
('en','Politics','/bdevin nunes'),
('en','Politics','/bdf/b'),
('en','Religion','/bdharanikota'),
('en','Religion','/bdharma'),
('en','Health','/bdht/b'),
('en','Religion','/bdhyan'),
('en','Health','/bdiabe'),
('en','Politics','/bdiana degette'),
('en','Politics','/bdiane black'),
('en','Politics','/bdianne feinstein'),
('en','Health','/bdiape'),
('en','Health','/bdiarr'),
('en','Religion','/bdiaspora'),
('en','Sex','/bdick/b'),
('en','Sex','/bdicks'),
('en','Health','/bdiet'),
('en','Sex','/bdigitalplayground'),
('en','Politics','/bdina titus'),
('en','Religion','/bdioces'),
('en','Religion','/bdios/b'),
('en','Religion','/bdipamkara'),
('en','Finance','/bdirect express/b'),
('en','Sex','/bdirtyrottenwhore'),
('en','Finance','/bdiscovercard'),
('en','Finance','/bdiscovercardcom/b'),
('en','Politics','/bdiscrimination'),
('en','Health','/bdisea'),
('en','Politics','/bdispensaries'),
('en','Politics','/bdispensary'),
('en','Sex','/bdlisted'),
('en','Politics','/bdnc/b'),
('en','Politics','/bdoc hastings'),
('en','Health','/bdoct'),
('en','Politics','/bdolan'),
('en','Politics','/bdomestic'),
('en','Politics','/bdon young'),
('en','Politics','/bdonald payne'),
('en','Sex','/bdonkey punch'),
('en','Sex','/bdonkeypu'),
('en','Politics','/bdonna edwards'),
('en','Health','/bdopin'),
('en','Politics','/bdoris matsui'),
('en','Health','/bdot phy'),
('en','Politics','/bdoug collins'),
('en','Politics','/bdoug lamalfa'),
('en','Politics','/bdoug lamborn'),
('en','Sex','/bdoujin'),
('en','Health','/bdown s'),
('en','Health','/bdr/b'),
('en','Sex','/bdrtuber'),
('en','Health','/bdrug'),
('en','Health','/bdsm/b'),
('en','Religion','/bduhkha'),
('en','Politics','/bduncan d hunter'),
('en','Politics','/bdutch ruppersberger'),
('en','Religion','/bdwarka'),
('en','Religion','/bdwayne'),
('en','Finance','/bdwp/b'),
('en','Sex','/bdyanna lauren'),
('en','Sex','/bdyke'),
('en','Sex','/bdylan ryder'),
('en','Health','/bdysle'),
('en','Health','/be cig'),
('en','Health','/bear in'),
('en','Health','/bear pa'),
('en','Health','/bear wa'),
('en','Politics','/bearl blumenauer'),
('en','Politics','/bearl ray tomblin'),
('en','Health','/beating d'),
('en','Health','/becig'),
('en','Finance','/becmc/b'),
('en','Religion','/becumen'),
('en','Health','/beczem'),
('en','Politics','/bed markey'),
('en','Politics','/bed pastor'),
('en','Politics','/bed perlmutter'),
('en','Politics','/bed royce'),
('en','Politics','/bed vaizey'),
('en','Politics','/bed whitfield'),
('en','Politics','/beddie b johnson'),
('en','Sex','/beffemin'),
('en','Sex','/befukt'),
('en','Sex','/begotastic'),
('en','Sex','/beharmony'),
('en','Sex','/bejacul'),
('en','Politics','/belection'),
('en','Health','/belectronic cig'),
('en','Religion','/belijah'),
('en','Politics','/beliot engel'),
('en','Politics','/belizabeth esty'),
('en','Politics','/belizabeth may'),
('en','Politics','/belizabeth warren'),
('en','Politics','/bemanuel cleaver'),
('en','Politics','/bemmett till'),
('en','Sex','/bempflix'),
('en','Finance','/bempower network/b'),
('en','Health','/benbre'),
('en','Health','/bendome'),
('en','Health','/benem'),
('en','Politics','/benvironment'),
('en','Health','/bepile'),
('en','Health','/berect'),
('en','Politics','/beric cantor'),
('en','Politics','/beric holder'),
('en','Politics','/beric shinseki'),
('en','Politics','/beric swalwell'),
('en','Politics','/berik paulsen'),
('en','Politics','/bernest moniz'),
('en','Sex','/bero love'),
('en','Sex','/berooups'),
('en','Sex','/berot'),
('en','Sex','/beroxia'),
('en','Sex','/besperanza gomez'),
('en','Religion','/beucha'),
('en','Sex','/beunuch'),
('en','Sex','/beva angelina'),
('en','Sex','/bevan seinfeld'),
('en','Sex','/bevanni solei'),
('en','Sex','/bevelyn lin'),
('en','Religion','/bexcommuni'),
('en','Sex','/bexgfpics com'),
('en','Sex','/bexhibitionis'),
('en','Sex','/bextratorrent'),
('en','Sex','/bextremetube'),
('en','Health','/beyeg'),
('en','Sex','/beyehandy'),
('en','Finance','/bfafsa/b'),
('en','Sex','/bfagg'),
('en','Sex','/bfakku'),
('en','Health','/bfamily med'),
('en','Sex','/bfantasti cc'),
('en','Sex','/bfapdu'),
('en','Politics','/bfascis'),
('en','Finance','/bfasfa/b'),
('en','Sex','/bfastjizz'),
('en','Health','/bfat gu'),
('en','Health','/bfatig'),
('en','Sex','/bfaye reagan'),
('en','Politics','/bfederal'),
('en','Sex','/bfellat'),
('en','Religion','/bfeng shui'),
('en','Health','/bfert'),
('en','Sex','/bfetish'),
('en','Finance','/bfha/b'),
('en','Health','/bfigur'),
('en','Politics','/bfilemon vela'),
('en','Health','/bfillin'),
('en','Finance','/bfinancial aid'),
('en','Finance','/bfinancial protection/b'),
('en','Sex','/bfindtubes'),
('en','Sex','/bfineartteens'),
('en','Politics','/bfiscal'),
('en','Sex','/bfisting'),
('en','Sex','/bflagellat'),
('en','Sex','/bflap/b'),
('en','Sex','/bfleshbot'),
('en','Sex','/bfleshflut'),
('en','Sex','/bfling'),
('en','Sex','/bflirt4free'),
('en','Health','/bflu s'),
('en','Politics','/bfmla'),
('en','Politics','/bfood bank'),
('en','Sex','/bfookgle'),
('en','Politics','/bforeign'),
('en','Health','/bforesk'),
('en','Sex','/bforte/b'),
('en','Sex','/bforumophilia'),
('en','Sex','/bfoxhq'),
('en','Health','/bfractu'),
('en','Religion','/bfrancis'),
('en','Politics','/bfrank d lucas'),
('en','Politics','/bfrank lobiondo'),
('en','Politics','/bfrank pallone'),
('en','Politics','/bfrank wolf'),
('en','Politics','/bfred upton'),
('en','Politics','/bfrederica wilson'),
('en','Sex','/bfree18'),
('en','Sex','/bfreeones'),
('en','Sex','/bfreudbox'),
('en','Sex','/bfritchy'),
('en','Finance','/bfsa/b'),
('en','Sex','/bftvgirls'),
('en','Sex','/bfuck'),
('en','Sex','/bfuskator'),
('en','Sex','/bfux/b'),
('en','Health','/bg spot'),
('en','Sex','/bgallerygalore'),
('en','Politics','/bgallup'),
('en','Religion','/bganesh'),
('en','Sex','/bgang ban'),
('en','Religion','/bganga'),
('en','Sex','/bgangban'),
('en','Politics','/bgary c peters'),
('en','Politics','/bgary herbert'),
('en','Politics','/bgary johnson'),
('en','Politics','/bgary miller'),
('en','Politics','/bgas price'),
('en','Health','/bgastri'),
('en','Health','/bgastroe'),
('en','Religion','/bgautama'),
('en','Sex','/bgay'),
('en','Sex','/bgelbooru'),
('en','Religion','/bgemara'),
('en','Politics','/bgene green'),
('en','Health','/bgenit'),
('en','Politics','/bgeorge holding'),
('en','Politics','/bgeorge k butterfield'),
('en','Politics','/bgeorge miller'),
('en','Politics','/bgeorge osborne'),
('en','Politics','/bgeorge zimmerman'),
('en','Politics','/bgerry connolly'),
('en','Sex','/bgetiton'),
('en','Religion','/bgezeirah'),
('en','Sex','/bgfrevenge'),
('en','Sex','/bgianna michaels'),
('en','Religion','/bgilgul'),
('en','Politics','/bgina mccarthy'),
('en','Health','/bginkg'),
('en','Sex','/bgirlscanner'),
('en','Sex','/bgive head'),
('en','Health','/bglasses'),
('en','Politics','/bglenn thompson'),
('en','Politics','/bgloria negrete mcleod'),
('en','Sex','/bglory hole'),
('en','Health','/bgluc'),
('en','Health','/bglut'),
('en','Health','/bgnc/b'),
('en','Religion','/bgod/b'),
('en','Religion','/bgodde'),
('en','Religion','/bgods'),
('en','Sex','/bgolden shower'),
('en','Sex','/bgonorr'),
('en','Religion','/bgospel'),
('en','Health','/bgout/b'),
('en','Politics','/bgovern'),
('en','Politics','/bgrace meng'),
('en','Politics','/bgrace napolitano'),
('en','Sex','/bgracie glam'),
('en','Finance','/bgrantland/b'),
('en','Politics','/bgreen card'),
('en','Finance','/bgreen dot/b'),
('en','Finance','/bgreen tree servicing/b'),
('en','Finance','/bgreendot/b'),
('en','Politics','/bgreg walden'),
('en','Politics','/bgregg harper'),
('en','Politics','/bgregory meeks'),
('en','Health','/bgrowth ho'),
('en','Politics','/bguns'),
('en','Politics','/bgus bilirakis'),
('en','Politics','/bgwen moore'),
('en','Sex','/bgymnastsnude'),
('en','Health','/bh1n/b'),
('en','Religion','/bhaftarah'),
('en','Health','/bhair te'),
('en','Religion','/bhajj/b'),
('en','Politics','/bhakeem jeffries'),
('en','Sex','/bhaken serbes'),
('en','Politics','/bhal rogers'),
('en','Religion','/bhalakhah'),
('en','Religion','/bhallel'),
('en','Sex','/bhand job'),
('en','Health','/bhandic'),
('en','Sex','/bhandjob'),
('en','Politics','/bhank johnson'),
('en','Religion','/bhanukkah'),
('en','Sex','/bhardcore'),
('en','Religion','/bharidwar'),
('en','Politics','/bharry reid'),
('en','Politics','/bharvey'),
('en','Religion','/bhashem'),
('en','Religion','/bhashkiveinu'),
('en','Religion','/bhatha yoga'),
('en','Religion','/bhaunted'),
('en','Sex','/bhavana ginger'),
('en','Sex','/bhbrowse'),
('en','Health','/bhcg/b'),
('en','Health','/bhdl/b'),
('en','Health','/bheada'),
('en','Health','/bhealin'),
('en','Health','/bhealth'),
('en','Health','/bheart a'),
('en','Health','/bheart fai'),
('en','Health','/bheartbu'),
('en','Sex','/bheather hunter'),
('en','Sex','/bheavy r'),
('en','Religion','/bhebron'),
('en','Religion','/bhechsher'),
('en','Politics','/bheidi heitkamp'),
('en','Religion','/bhell/b'),
('en','Sex','/bhellokiss'),
('en','Health','/bhemor'),
('en','Politics','/bhenry cuellar'),
('en','Politics','/bhenry waxman'),
('en','Sex','/bhentai'),
('en','Politics','/bheritage'),
('en','Health','/bherni'),
('en','Health','/bherp'),
('en','Sex','/bheshe'),
('en','Health','/bhgh/b'),
('en','Religion','/bhijira'),
('en','Politics','/bhillary clinton'),
('en','Religion','/bhillman'),
('en','Religion','/bhindu'),
('en','Health','/bhistol'),
('en','Health','/bhiv/b'),
('en','Health','/bhives'),
('en','Sex','/bhollywoodtuna'),
('en','Religion','/bholy'),
('en','Health','/bhome care'),
('en','Health','/bhome health'),
('en','Politics','/bhomeless'),
('en','Finance','/bhomepath/b'),
('en','Religion','/bhomily'),
('en','Health','/bhormo'),
('en','Sex','/bhorny'),
('en','Religion','/bhoroscop'),
('en','Health','/bhospic'),
('en','Health','/bhospit'),
('en','Health','/bhospit'),
('en','Health','/bhospit'),
('en','Sex','/bhotcelebs'),
('en','Sex','/bhottystop'),
('en','Politics','/bhoward coble'),
('en','Politics','/bhoward mckeon'),
('en','Health','/bhpv/b'),
('en','Sex','/bhq69'),
('en','Sex','/bhqcelebrity'),
('en','Sex','/bhqpdb'),
('en','Sex','/bhqtgp'),
('en','Politics','/bhrc/b'),
('en','Politics','/bhrw/b'),
('en','Religion','/bhubbard'),
('en','Politics','/bhuman'),
('en','Sex','/bhustler'),
('en','Health','/bhydrocod'),
('en','Health','/bhymen'),
('en','Health','/bhyperte'),
('en','Health','/bhypothy'),
('en','Health','/bhysterecto'),
('en','Religion','/bi chaim'),
('en','Health','/bibup'),
('en','Health','/bicd 9'),
('en','Politics','/bicu/b'),
('en','Religion','/bid al ddha'),
('en','Religion','/bid al fitr'),
('en','Finance','/bidentity theft/b'),
('en','Finance','/bidentity thie'),
('en','Religion','/bihram'),
('en','Politics','/bileana ros lehtinen'),
('en','Politics','/billegal'),
('en','Religion','/billuminati/b'),
('en','Sex','/bimagebam'),
('en','Sex','/bimagefap'),
('en','Sex','/bimagevenue'),
('en','Sex','/bimgur'),
('en','Sex','/bimlive'),
('en','Religion','/bimmaculate c'),
('en','Politics','/bimmigr'),
('en','Health','/bimplant'),
('en','Sex','/bimpoten'),
('en','Sex','/bincest'),
('en','Finance','/bindentured servants/b'),
('en','Sex','/bindia summer'),
('en','Sex','/bindigo augustine'),
('en','Religion','/bindulgenc'),
('en','Health','/binfec'),
('en','Health','/binfert'),
('en','Health','/binfluenz'),
('en','Health','/binject'),
('en','Health','/binjur'),
('en','Politics','/binnocent'),
('en','Finance','/binsolven'),
('en','Health','/binsom'),
('en','Health','/binsuli'),
('en','Sex','/bintercours'),
('en','Sex','/binterracial'),
('en','Health','/binvac'),
('en','Politics','/biran'),
('en','Politics','/biraq'),
('en','Finance','/birs/b'),
('en','Health','/bisage'),
('en','Sex','/bisis love'),
('en','Sex','/bisis taylor'),
('en','Religion','/bislam'),
('en','Health','/bitchy sk'),
('en','Health','/biud/b'),
('en','Finance','/biva/b'),
('en','Health','/bivf/b'),
('en','Politics','/bj herrera beutler'),
('en','Politics','/bjack dalrymple'),
('en','Politics','/bjack kingston'),
('en','Politics','/bjack lew'),
('en','Politics','/bjack markell'),
('en','Sex','/bjack off'),
('en','Politics','/bjack reed'),
('en','Politics','/bjackie speier'),
('en','Politics','/bjackie walorski'),
('en','Sex','/bjackoff'),
('en','Sex','/bjames deen'),
('en','Politics','/bjames langevin'),
('en','Politics','/bjames lankford'),
('en','Politics','/bjan brewer'),
('en','Politics','/bjan schakowsky'),
('en','Politics','/bjanice hahn'),
('en','Sex','/bjanine lindemulder'),
('en','Politics','/bjared huffman'),
('en','Politics','/bjared polis'),
('en','Politics','/bjason chaffetz'),
('en','Politics','/bjason furman'),
('en','Politics','/bjason kenney'),
('en','Politics','/bjason t. smith'),
('en','Politics','/bjay inslee'),
('en','Politics','/bjay nixon'),
('en','Politics','/bjay rockefeller'),
('en','Sex','/bjayden jaymes'),
('en','Sex','/bjdate'),
('en','Politics','/bjeanne hulit'),
('en','Politics','/bjeanne shaheen'),
('en','Politics','/bjeb hensarling'),
('en','Politics','/bjeff denham'),
('en','Politics','/bjeff duncan'),
('en','Politics','/bjeff flake'),
('en','Politics','/bjeff fortenberry'),
('en','Politics','/bjeff merkley'),
('en','Politics','/bjeff miller'),
('en','Politics','/bjeff sessions'),
('en','Politics','/bjeffrey chiesa'),
('en','Sex','/bjelena jensen'),
('en','Health','/bjelqi'),
('en','Sex','/bjenaveve jolie'),
('en','Sex','/bjenna brooks'),
('en','Sex','/bjenna haze'),
('en','Sex','/bjenna jameson'),
('en','Sex','/bjenna presley'),
('en','Sex','/bjennifer white'),
('en','Sex','/bjenny hendrix'),
('en','Politics','/bjeremy hunt'),
('en','Politics','/bjerrold nadler'),
('en','Politics','/bjerry brown'),
('en','Politics','/bjerry mcnerney'),
('en','Politics','/bjerry moran'),
('en','Religion','/bjerusal'),
('en','Sex','/bjesse jane'),
('en','Sex','/bjessica bangkok'),
('en','Sex','/bjessica drake'),
('en','Politics','/bjesuit'),
('en','Religion','/bjesus'),
('en','Religion','/bjewi'),
('en','Religion','/bjews'),
('en','Religion','/bjihad'),
('en','Politics','/bjim bridenstine'),
('en','Politics','/bjim clyburn'),
('en','Politics','/bjim cooper'),
('en','Politics','/bjim costa'),
('en','Politics','/bjim gerlach'),
('en','Politics','/bjim himes'),
('en','Politics','/bjim inhofe'),
('en','Politics','/bjim jordan'),
('en','Politics','/bjim matheson'),
('en','Politics','/bjim mcdermott'),
('en','Politics','/bjim mcgovern'),
('en','Politics','/bjim moran'),
('en','Politics','/bjim renacci'),
('en','Politics','/bjim risch'),
('en','Politics','/bjim sensenbrenner'),
('en','Politics','/bjimmy duncan'),
('en','Religion','/bjinn/b'),
('en','Religion','/bjizya'),
('en','Sex','/bjizz/b'),
('en','Religion','/bjnana marga'),
('en','Politics','/bjo bonner'),
('en','Politics','/bjoaquin castro'),
('en','Politics','/bjoe barton'),
('en','Politics','/bjoe biden'),
('en','Politics','/bjoe courtney'),
('en','Politics','/bjoe donnelly'),
('en','Politics','/bjoe garcia'),
('en','Politics','/bjoe heck'),
('en','Politics','/bjoe kennedy'),
('en','Politics','/bjoe manchin'),
('en','Politics','/bjoe pitts'),
('en','Politics','/bjoe wilson'),
('en','Politics','/bjohn b larson'),
('en','Politics','/bjohn baird'),
('en','Politics','/bjohn barrasso'),
('en','Politics','/bjohn barrow'),
('en','Politics','/bjohn boehner'),
('en','Politics','/bjohn boozman'),
('en','Politics','/bjohn bt campbell'),
('en','Politics','/bjohn c carney'),
('en','Politics','/bjohn c fleming'),
('en','Politics','/bjohn carter'),
('en','Politics','/bjohn conyers'),
('en','Politics','/bjohn cornyn'),
('en','Politics','/bjohn culberson'),
('en','Politics','/bjohn dingell'),
('en','Politics','/bjohn f tierney'),
('en','Politics','/bjohn garamendi'),
('en','Politics','/bjohn hickenlooper'),
('en','Politics','/bjohn hoeven'),
('en','Sex','/bjohn holmes'),
('en','Politics','/bjohn k delaney'),
('en','Politics','/bjohn kasich'),
('en','Politics','/bjohn kerry'),
('en','Politics','/bjohn kitzhaber'),
('en','Politics','/bjohn kline'),
('en','Politics','/bjohn mccain'),
('en','Politics','/bjohn mica'),
('en','Religion','/bjohn paul'),
('en','Politics','/bjohn r lewis'),
('en','Politics','/bjohn sarbanes'),
('en','Politics','/bjohn shimkus'),
('en','Politics','/bjohn thune'),
('en','Politics','/bjohn yarmuth'),
('en','Politics','/bjohnny isakson'),
('en','Politics','/bjon runyan'),
('en','Politics','/bjon tester'),
('en','Politics','/bjose serrano'),
('en','Politics','/bjoseph crowley'),
('en','Politics','/bjoyce beatty'),
('en','Politics','/bjuan vargas'),
('en','Politics','/bjudy chu'),
('en','Sex','/bjuelz ventura'),
('en','Sex','/bjulia ann'),
('en','Politics','/bjulia brownley'),
('en','Sex','/bjulia taylor'),
('en','Politics','/bjustin amash'),
('en','Politics','/bjustin trudeau'),
('en','Politics','/bjustine greening'),
('en','Sex','/bjustjared'),
('en','Sex','/bjynx maze'),
('en','Religion','/bka''ba'),
('en','Religion','/bkaddish'),
('en','Religion','/bkafir'),
('en','Sex','/bkagney linn karter'),
('en','Finance','/bkaiser permanente/b'),
('en','Religion','/bkanaganahalli'),
('en','Religion','/bkanchipuram'),
('en','Politics','/bkaren bass'),
('en','Religion','/bkarma'),
('en','Religion','/bkaruna'),
('en','Religion','/bkasher'),
('en','Religion','/bkashrut'),
('en','Politics','/bkathleen sebelius'),
('en','Politics','/bkathy castor'),
('en','Sex','/bkatie kox'),
('en','Sex','/bkatie morgan'),
('en','Sex','/bkatja kean'),
('en','Sex','/bkatsuni'),
('en','Politics','/bkay granger'),
('en','Politics','/bkay hagan'),
('en','Sex','/bkayden kross'),
('en','Sex','/bkaylani lei'),
('en','Religion','/bkedusha'),
('en','Sex','/bkeezmov'),
('en','Health','/bkegel'),
('en','Politics','/bkeith ellison'),
('en','Politics','/bkeith rothfus'),
('en','Politics','/bkeith vaz'),
('en','Politics','/bkelly ayotte'),
('en','Sex','/bkelly divine'),
('en','Politics','/bken calvert'),
('en','Politics','/bkennedy'),
('en','Politics','/bkenny marchant'),
('en','Religion','/bkerala'),
('en','Politics','/bkerry bentivolio'),
('en','Health','/bketipi'),
('en','Politics','/bkevin brady'),
('en','Politics','/bkevin cramer'),
('en','Politics','/bkevin mccarthy'),
('en','Politics','/bkevin yoder'),
('en','Religion','/bkhalif'),
('en','Religion','/bkhanda'),
('en','Religion','/bkhatib'),
('en','Religion','/bkhutbah'),
('en','Sex','/bkimberly kane'),
('en','Sex','/bkindgirl'),
('en','Sex','/bkinky'),
('en','Religion','/bkippah'),
('en','Politics','/bkirsten gillibrand'),
('en','Religion','/bkiswa'),
('en','Sex','/bkitnkay'),
('en','Health','/bklonop'),
('en','Sex','/bkobe tai'),
('en','Religion','/bkol nidre'),
('en','Politics','/bkony'),
('en','Religion','/bkosher'),
('en','Religion','/bkotturu dhanadibbalu'),
('en','Sex','/bkourtney kane'),
('en','Politics','/bkristi noem'),
('en','Sex','/bkristina rose'),
('en','Politics','/bkrugman'),
('en','Religion','/bkundalini'),
('en','Politics','/bkurt schrader'),
('en','Religion','/bkushinagar'),
('en','Politics','/bkyrsten sinema'),
('en','Sex','/blabatidora'),
('en','Health','/blabcorp'),
('en','Religion','/blama/b'),
('en','Politics','/blamar alexander'),
('en','Politics','/blamar s smith'),
('en','Health','/blap b'),
('en','Politics','/blarry bucshon'),
('en','Religion','/blashon kodesh'),
('en','Health','/blasik'),
('en','Health','/bldl/b'),
('en','Politics','/blee terry'),
('en','Sex','/blela star'),
('en','Health','/blens'),
('en','Politics','/bleonard lance'),
('en','Sex','/blesbi'),
('en','Religion','/blevine'),
('en','Health','/blexap'),
('en','Sex','/blexi belle'),
('en','Sex','/blexi diamond'),
('en','Finance','/blexington law/b'),
('en','Politics','/bliberal'),
('en','Politics','/blibert'),
('en','Sex','/blibid'),
('en','Sex','/blily carter'),
('en','Politics','/blimbaugh'),
('en','Politics','/blincoln chafee'),
('en','Politics','/blinda sanchez'),
('en','Politics','/blindsey graham'),
('en','Health','/bliposu'),
('en','Sex','/blisa ann'),
('en','Politics','/blisa murkowski'),
('en','Sex','/bliteroti'),
('en','Religion','/bliturg'),
('en','Sex','/blivejasmin'),
('en','Health','/bliver'),
('en','Sex','/bliza del sierra'),
('en','Sex','/blizz tayler'),
('en','Politics','/blloyd doggett'),
('en','Religion','/blo-han'),
('en','Finance','/bloan'),
('en','Politics','/blois capps'),
('en','Politics','/blois frankel'),
('en','Sex','/blondon keyes'),
('en','Politics','/bloretta sanchez'),
('en','Health','/blose w'),
('en','Politics','/blou barletta'),
('en','Sex','/blou charmelle'),
('en','Politics','/blouie gohmert'),
('en','Politics','/blouise mensch'),
('en','Politics','/blouise slaughter'),
('en','Health','/blpn/b'),
('en','Sex','/blubetube'),
('en','Health','/blucid'),
('en','Politics','/blucille roybal-allard'),
('en','Politics','/bluis gutiérrez'),
('en','Politics','/bluke messer'),
('en','Religion','/blulav'),
('en','Religion','/blumbini'),
('en','Health','/blungs'),
('en','Health','/blupu'),
('en','Sex','/bluscious'),
('en','Sex','/blushstor'),
('en','Sex','/blust'),
('en','Religion','/blutheran'),
('en','Health','/blyme/b'),
('en','Health','/blymp'),
('en','Politics','/blynn jenkins'),
('en','Sex','/blynn lemay'),
('en','Politics','/blynn westmoreland'),
('en','Politics','/bmac thornberry'),
('en','Sex','/bmaca/b'),
('en','Sex','/bmadelyn marie'),
('en','Sex','/bmadthumb'),
('en','Religion','/bmagga/b'),
('en','Politics','/bmaggie hassan'),
('en','Religion','/bmahabharata'),
('en','Religion','/bmahabhuta'),
('en','Religion','/bmahadeva'),
('en','Religion','/bmahavidyas'),
('en','Religion','/bmahayana'),
('en','Religion','/bmahesvara'),
('en','Religion','/bmahesvari'),
('en','Religion','/bmahinda'),
('en','Politics','/bmalcolm x'),
('en','Health','/bmale enhanc'),
('en','Religion','/bmandala'),
('en','Politics','/bmandela'),
('en','Health','/bmania'),
('en','Religion','/bmantra'),
('en','Religion','/bmara/b'),
('en','Politics','/bmarc garneau'),
('en','Politics','/bmarc veasey'),
('en','Politics','/bmarcia fudge'),
('en','Politics','/bmarco rubio'),
('en','Politics','/bmarcy kaptur'),
('en','Religion','/bmarga'),
('en','Politics','/bmaria cantwell'),
('en','Health','/bmariju'),
('en','Politics','/bmario diaz balart'),
('en','Politics','/bmark amodei'),
('en','Politics','/bmark begich'),
('en','Politics','/bmark dayton'),
('en','Politics','/bmark kirk'),
('en','Politics','/bmark meadows'),
('en','Politics','/bmark pocan'),
('en','Politics','/bmark pryor'),
('en','Politics','/bmark sanford'),
('en','Politics','/bmark takano'),
('en','Politics','/bmark udall'),
('en','Politics','/bmark warner'),
('en','Politics','/bmarkwayne mullin'),
('en','Politics','/bmarlin stutzman'),
('en','Politics','/bmarriage'),
('en','Politics','/bmarsha blackburn'),
('en','Politics','/bmartha roby'),
('en','Politics','/bmartin heinrich'),
('en','Politics','/bmartin o''malley'),
('en','Politics','/bmarxist'),
('en','Politics','/bmary fallin'),
('en','Politics','/bmary landrieu'),
('en','Religion','/bmashgiach'),
('en','Religion','/bmashhad'),
('en','Sex','/bmasoch'),
('en','Health','/bmassag'),
('en','Sex','/bmasterbat'),
('en','Religion','/bmasterson'),
('en','Health','/bmasturb'),
('en','Sex','/bmatch com'),
('en','Religion','/bmathura'),
('en','Politics','/bmatt cartwright'),
('en','Politics','/bmatt mead'),
('en','Politics','/bmatt salmon'),
('en','Religion','/bmatzah'),
('en','Politics','/bmax baucus'),
('en','Health','/bmaximuscl'),
('en','Politics','/bmaxine waters'),
('en','Politics','/bmayor'),
('en','Religion','/bmazel tov'),
('en','Politics','/bmazie hirono'),
('en','Health','/bmcat'),
('en','Sex','/bmcstories'),
('en','Sex','/bmeatbeerbab'),
('en','Religion','/bmecca'),
('en','Finance','/bmedco/b'),
('en','Health','/bmedic'),
('en','Religion','/bmedina'),
('en','Religion','/bmeditat'),
('en','Sex','/bmegan vaughn'),
('en','Politics','/bmel watt'),
('en','Health','/bmelanc'),
('en','Sex','/bmelanie rios'),
('en','Health','/bmelano'),
('en','Politics','/bmelissa etheridge'),
('en','Sex','/bmelody nakai'),
('en','Health','/bmemorial ho'),
('en','Sex','/bmenage'),
('en','Health','/bmening'),
('en','Health','/bmenop'),
('en','Religion','/bmenorah'),
('en','Health','/bmetab'),
('en','Sex','/bmetart'),
('en','Health','/bmetf'),
('en','Religion','/bmethodist'),
('en','Health','/bmethodist h'),
('en','Religion','/bmetta'),
('en','Religion','/bmezuzah'),
('en','Politics','/bmichael bennet'),
('en','Politics','/bmichael c burgess'),
('en','Politics','/bmichael f doyle'),
('en','Politics','/bmichael froman'),
('en','Politics','/bmichael gove'),
('en','Politics','/bmichael grimm'),
('en','Politics','/bmichael mccaul'),
('en','Politics','/bmichael quigley'),
('en','Politics','/bmichele bachmann'),
('en','Politics','/bmichelle lujan grisham'),
('en','Politics','/bmichelle obama'),
('en','Politics','/bmick mulvaney'),
('en','Health','/bmicrodermabra'),
('en','Religion','/bmidrash'),
('en','Health','/bmigrai'),
('en','Politics','/bmike beebe'),
('en','Politics','/bmike capuano'),
('en','Politics','/bmike coffman'),
('en','Politics','/bmike conaway'),
('en','Politics','/bmike crapo'),
('en','Politics','/bmike d rogers'),
('en','Politics','/bmike enzi'),
('en','Politics','/bmike fitzpatrick'),
('en','Politics','/bmike honda'),
('en','Politics','/bmike j rogers'),
('en','Politics','/bmike johanns'),
('en','Politics','/bmike kelly'),
('en','Politics','/bmike lee'),
('en','Politics','/bmike mcintyre'),
('en','Politics','/bmike michaud'),
('en','Politics','/bmike pence'),
('en','Politics','/bmike pompeo'),
('en','Politics','/bmike simpson'),
('en','Politics','/bmike thompson'),
('en','Politics','/bmike turner'),
('en','Religion','/bmikva'),
('en','Sex','/bmilf'),
('en','Politics','/bminimum wage'),
('en','Politics','/bminuteman'),
('en','Religion','/bminyan'),
('en','Health','/bmirena'),
('en','Health','/bmiscar'),
('en','Religion','/bmishnah'),
('en','Religion','/bmishneh torah'),
('en','Politics','/bmitch mcconnell'),
('en','Politics','/bmitt romney'),
('en','Religion','/bmitzvot'),
('en','Religion','/bmlecchas'),
('en','Politics','/bmo brooks'),
('en','Sex','/bmofosnetwork'),
('en','Religion','/bmohel'),
('en','Finance','/bmohela/b'),
('en','Religion','/bmoksa'),
('en','Religion','/bmonastr'),
('en','Finance','/bmoney tree/b'),
('en','Finance','/bmoneypak/b'),
('en','Sex','/bmonique alexander'),
('en','Health','/bmono sy'),
('en','Politics','/bmorgan griffith'),
('en','Religion','/bmormon'),
('en','Finance','/bmortgage'),
('en','Politics','/bmother teresa'),
('en','Sex','/bmotherless'),
('en','Religion','/bmount potalaka'),
('en','Sex','/bmoviesand'),
('en','Sex','/bmoviesguy'),
('en','Health','/bmri/b'),
('en','Health','/bmrsa/b'),
('en','Sex','/bmrsnake'),
('en','Health','/bmsds/b'),
('en','Health','/bmucu'),
('en','Religion','/bmuhammad'),
('en','Religion','/bmuharram'),
('en','Religion','/bmuslim'),
('en','Sex','/bmy18tube'),
('en','Health','/bmyasth'),
('en','Sex','/bmyfreecams'),
('en','Sex','/bmyhentai'),
('en','Sex','/bnacho vidal'),
('en','Politics','/bnadine dorries'),
('en','Religion','/bnagarjunakonda'),
('en','Sex','/bnaked'),
('en','Religion','/bnamaste'),
('en','Politics','/bnancy pelosi'),
('en','Sex','/bnasty'),
('en','Politics','/bnathan deal'),
('en','Politics','/bnational debt'),
('en','Religion','/bnazareth'),
('en','Finance','/bncr/b'),
('en','Finance','/bncsecu/b'),
('en','Politics','/bneil abercrombie'),
('en','Politics','/bnelson mandela'),
('en','Religion','/bnembutsu'),
('en','Health','/bneuro'),
('en','Religion','/bnevi im'),
('en','Religion','/bnew testament'),
('en','Politics','/bnewt gingrich'),
('en','Sex','/bnextdoor'),
('en','Health','/bnfpa/b'),
('en','Health','/bnhs/b'),
('en','Politics','/bnick rahall'),
('en','Sex','/bnicole aniston'),
('en','Health','/bnicot'),
('en','Sex','/bnifty'),
('en','Politics','/bnigg'),
('en','Health','/bnih/b'),
('en','Politics','/bniki tsongas'),
('en','Sex','/bnikki benz'),
('en','Politics','/bnikki haley'),
('en','Sex','/bnikki tyler'),
('en','Sex','/bnina hartley'),
('en','Sex','/bnina mercedez'),
('en','Religion','/bnirodha'),
('en','Politics','/bnita lowey'),
('en','Religion','/bnivarana'),
('en','Religion','/bniyama'),
('en','Politics','/bnorth korea'),
('en','Sex','/bns4w'),
('en','Sex','/bnsfw'),
('en','Sex','/bnubilefilms'),
('en','Politics','/bnuclear'),
('en','Sex','/bnude'),
('en','Politics','/bnuevo herald'),
('en','Sex','/bnurglesnymphs'),
('en','Health','/bnurse'),
('en','Health','/bnursi'),
('en','Health','/bnutrisy'),
('en','Health','/bnutrit'),
('en','Sex','/bnuvid'),
('en','Politics','/bnydia velazquez'),
('en','Health','/bob g'),
('en','Politics','/bobama'),
('en','Health','/bobes'),
('en','Health','/bobgy'),
('en','Health','/bocd/b'),
('en','Sex','/bokcupid'),
('en','Religion','/bolam ha ba'),
('en','Religion','/bold testament'),
('en','Sex','/bolivia del rio'),
('en','Sex','/bomegal'),
('en','Sex','/boneclickchick'),
('en','Health','/boptic'),
('en','Health','/boptome'),
('en','Religion','/boral torah'),
('en','Health','/borganic'),
('en','Sex','/borgies'),
('en','Sex','/borgy'),
('en','Politics','/borrin hatch'),
('en','Health','/borthodon'),
('en','Religion','/borthodox'),
('en','Health','/bosteo'),
('en','Finance','/boutstanding/b'),
('en','Health','/bovar'),
('en','Health','/boverdos'),
('en','Sex','/boverthumbs'),
('en','Health','/boxycod'),
('en','Health','/bpain'),
('en','Sex','/bpalevo'),
('en','Health','/bpanda expres'),
('en','Religion','/bpandora'),
('en','Religion','/bpansil'),
('en','Religion','/bparanormal'),
('en','Politics','/bparenthood'),
('en','Religion','/bpareve'),
('en','Finance','/bpari passu/b'),
('en','Religion','/bparitta'),
('en','Politics','/bparliament'),
('en','Health','/bpartner bp'),
('en','Health','/bpartner imps'),
('en','Health','/bparvo/b'),
('en','Politics','/bpassport'),
('en','Politics','/bpat mccrory'),
('en','Politics','/bpat meehan'),
('en','Politics','/bpat quinn'),
('en','Politics','/bpat roberts'),
('en','Politics','/bpat tiberi'),
('en','Politics','/bpat toomey'),
('en','Religion','/bpaticca samuppada'),
('en','Health','/bpatient'),
('en','Religion','/bpatriarch'),
('en','Politics','/bpatrick leahy'),
('en','Politics','/bpatrick mchenry'),
('en','Politics','/bpatrick murphy'),
('en','Politics','/bpatterson'),
('en','Politics','/bpatty murray'),
('en','Politics','/bpaul broun'),
('en','Politics','/bpaul cook'),
('en','Politics','/bpaul gosar'),
('en','Politics','/bpaul krugman'),
('en','Politics','/bpaul lepage'),
('en','Politics','/bpaul ryan'),
('en','Politics','/bpaul tonko'),
('en','Religion','/bpavurallakonda'),
('en','Finance','/bpawn shop'),
('en','Finance','/bpayday'),
('en','Finance','/bpayment calculator'),
('en','Finance','/bpayplanplus/b'),
('en','Sex','/bpeachyforum'),
('en','Sex','/bpederast'),
('en','Health','/bpediat'),
('en','Sex','/bpenetrat'),
('en','Sex','/bpenis'),
('en','Politics','/bpenny pritzker'),
('en','Health','/bpeony'),
('en','Sex','/bpeppermint'),
('en','Health','/bpercoc'),
('en','Sex','/bperezhilton'),
('en','Sex','/bperfectgirl'),
('en','Sex','/bperineum'),
('en','Sex','/bpersia pele'),
('en','Health','/bpersonality di'),
('en','Sex','/bperver'),
('en','Politics','/bpete gallego'),
('en','Politics','/bpete olson'),
('en','Politics','/bpete sessions'),
('en','Politics','/bpete visclosky'),
('en','Politics','/bpeter defazio'),
('en','Politics','/bpeter mackay'),
('en','Sex','/bpeter north'),
('en','Politics','/bpeter roskam'),
('en','Politics','/bpeter shumlin'),
('en','Politics','/bpeter t king'),
('en','Politics','/bpeter welch'),
('en','Religion','/bpetras'),
('en','Sex','/bphallus'),
('en','Health','/bpharm'),
('en','Politics','/bphil bryant'),
('en','Politics','/bphil gingrey'),
('en','Politics','/bphil roe'),
('en','Religion','/bphnom santuk'),
('en','Health','/bphob'),
('en','Sex','/bphun'),
('en','Health','/bphysiol'),
('en','Sex','/bpichunter'),
('en','Health','/bpill'),
('en','Health','/bpiloni'),
('en','Sex','/bpimpis'),
('en','Health','/bpimpl'),
('en','Sex','/bpingay'),
('en','Sex','/bpinkythekinky'),
('en','Sex','/bpinme'),
('en','Religion','/bpiprahwa'),
('en','Sex','/bpiss'),
('en','Health','/bplacen'),
('en','Sex','/bplanetsuzy'),
('en','Politics','/bplanned parent'),
('en','Health','/bplastic su'),
('en','Sex','/bplayboy'),
('en','Sex','/bplentyoffish'),
('en','Health','/bpneu'),
('en','Health','/bpodiatr'),
('en','Health','/bpoiso'),
('en','Politics','/bpolicy'),
('en','Politics','/bpoll/b'),
('en','Health','/bpollen'),
('en','Politics','/bpolls'),
('en','Religion','/bpope/b'),
('en','Religion','/bposon/b'),
('en','Sex','/bpostimage'),
('en','Religion','/bpoughkeepsie'),
('en','Politics','/bpoverty'),
('en','Sex','/bprana/b'),
('en','Religion','/bprayer'),
('en','Religion','/bprecept'),
('en','Health','/bprednison'),
('en','Health','/bpregn'),
('en','Religion','/bpresbyter'),
('en','Health','/bprescr'),
('en','Politics','/bpresident'),
('en','Health','/bpressure point'),
('en','Sex','/bprick/b'),
('en','Religion','/bpriest'),
('en','Politics','/bprime minist'),
('en','Sex','/bpriya rai'),
('en','Health','/bpro ana'),
('en','Health','/bprogeste'),
('en','Health','/bproprano'),
('en','Health','/bprosta'),
('en','Health','/bprosth'),
('en','Health','/bprotei'),
('en','Religion','/bprotestant'),
('en','Health','/bpsa/b'),
('en','Health','/bpsor'),
('en','Health','/bptsd'),
('en','Health','/bpuber'),
('en','Health','/bpulm'),
('en','Sex','/bpunchpin'),
('en','Religion','/bpurim'),
('en','Religion','/bqibla'),
('en','Religion','/bqom/b'),
('en','Health','/bquest d'),
('en','Health','/bqueti'),
('en','Sex','/bquickie'),
('en','Health','/bquit s'),
('en','Religion','/bqur an'),
('en','Religion','/bquran'),
('en','Religion','/bqurra'),
('en','Religion','/brabbi/b'),
('en','Sex','/brachel starr'),
('en','Politics','/bracial'),
('en','Politics','/bracis'),
('en','Health','/bradiati'),
('en','Health','/bradon t'),
('en','Religion','/brakan'),
('en','Politics','/bralph hall'),
('en','Religion','/bramadan'),
('en','Religion','/bramateertham'),
('en','Religion','/bramayana'),
('en','Religion','/brambam'),
('en','Politics','/brand beers'),
('en','Politics','/brand paul'),
('en','Politics','/brandy forbes'),
('en','Politics','/brandy hultgren'),
('en','Politics','/brandy neugebauer'),
('en','Politics','/brandy weber'),
('en','Sex','/brape'),
('en','Sex','/brapidhorny'),
('en','Sex','/brarbg'),
('en','Health','/brash'),
('en','Politics','/brasmussen'),
('en','Religion','/bratnakuta'),
('en','Religion','/bratnasambhava'),
('en','Politics','/braul grijalva'),
('en','Politics','/braul labrador'),
('en','Politics','/braul ruiz'),
('en','Sex','/braven alexis'),
('en','Sex','/braylene'),
('en','Sex','/brealitykings'),
('en','Sex','/brealteengirl'),
('en','Sex','/brebecca linares'),
('en','Sex','/brectum'),
('en','Sex','/bredhead'),
('en','Sex','/bredtube'),
('en','Finance','/bredundancy calculator'),
('en','Health','/breflexo'),
('en','Health','/breflu'),
('en','Health','/brehab'),
('en','Politics','/breid ribble'),
('en','Politics','/brelations'),
('en','Sex','/brenae cruz'),
('en','Politics','/brenee ellmers'),
('en','Finance','/brepayment'),
('en','Politics','/brepublic'),
('en','Health','/brespir'),
('en','Religion','/bresurrect'),
('en','Politics','/brevolut'),
('en','Health','/brheu'),
('en','Politics','/brich nugent'),
('en','Politics','/brichard blumenthal'),
('en','Politics','/brichard burr'),
('en','Religion','/brichard dawkins'),
('en','Politics','/brichard hudson'),
('en','Politics','/brichard l hanna'),
('en','Politics','/brichard neal'),
('en','Politics','/brichard shelby'),
('en','Politics','/brick crawford'),
('en','Politics','/brick larsen'),
('en','Politics','/brick nolan'),
('en','Politics','/brick perry'),
('en','Politics','/brick santorum'),
('en','Politics','/brick scott'),
('en','Politics','/brick snyder'),
('en','Politics','/brights'),
('en','Sex','/brihanna rimes'),
('en','Sex','/briley steele'),
('en','Sex','/brim jaw'),
('en','Sex','/brimjaw'),
('en','Sex','/brimmin'),
('en','Finance','/brisk disk/b'),
('en','Finance','/briskdisk/b'),
('en','Health','/brite a'),
('en','Sex','/bro89'),
('en','Politics','/brob andrews'),
('en','Politics','/brob bishop'),
('en','Politics','/brob portman'),
('en','Politics','/brob wittman'),
('en','Politics','/brob woodall'),
('en','Politics','/brobert aderholt'),
('en','Politics','/brobert bentley'),
('en','Politics','/brobert hurt'),
('en','Politics','/brobert pittenger'),
('en','Sex','/broberto malone'),
('en','Politics','/brobin kelly'),
('en','Sex','/brocco siffred'),
('en','Politics','/brodney alexander'),
('en','Politics','/brodney frelinghuysen'),
('en','Politics','/brodney l davis'),
('en','Politics','/broe v wade'),
('en','Politics','/broger wicker'),
('en','Politics','/broger williams'),
('en','Politics','/bromney'),
('en','Politics','/bron barber'),
('en','Politics','/bron desantis'),
('en','Religion','/bron hubbard'),
('en','Sex','/bron jeremy'),
('en','Politics','/bron johnson'),
('en','Politics','/bron kind'),
('en','Politics','/bron paul'),
('en','Politics','/bron wyden'),
('en','Politics','/brosa delauro'),
('en','Religion','/brosary'),
('en','Religion','/broshi/b'),
('en','Health','/brotator c'),
('en','Politics','/broy blunt'),
('en','Politics','/bruben hinojosa'),
('en','Sex','/brule34'),
('en','Politics','/brush d holt'),
('en','Religion','/bsa y/b'),
('en','Religion','/bsabarimala'),
('en','Religion','/bsacrament'),
('en','Religion','/bsadhu'),
('en','Sex','/bsadis'),
('en','Sex','/bsadomaso'),
('en','Sex','/bsaff/b'),
('en','Sex','/bsahadou'),
('en','Religion','/bsaint'),
('en','Religion','/bsaivism'),
('en','Religion','/bsakti'),
('en','Sex','/bsakuralive'),
('en','Religion','/bsakyamuni'),
('en','Finance','/bsalary calculator'),
('en','Religion','/bsalat'),
('en','Religion','/bsalihundam'),
('en','Politics','/bsally jewell'),
('en','Politics','/bsam brownback'),
('en','Politics','/bsam farr'),
('en','Politics','/bsam graves'),
('en','Politics','/bsam johnson'),
('en','Religion','/bsamadhi'),
('en','Politics','/bsamantha power'),
('en','Religion','/bsamsara'),
('en','Religion','/bsamu/b'),
('en','Religion','/bsamudaya'),
('en','Religion','/bsamyama'),
('en','Religion','/bsanatana dharma'),
('en','Religion','/bsandek'),
('en','Politics','/bsander m levin'),
('en','Politics','/bsanford bishop'),
('en','Sex','/bsankaku'),
('en','Sex','/bsarah vandella'),
('en','Health','/bsarcoi'),
('en','Religion','/bsarnath'),
('en','Sex','/bsasha grey'),
('en','Religion','/bsawm'),
('en','Politics','/bsaxby chambliss'),
('en','Sex','/bscanlover'),
('en','Health','/bschizo'),
('en','Finance','/bscholarship'),
('en','Religion','/bscientolog'),
('en','Health','/bsclero'),
('en','Politics','/bscott desjarlais'),
('en','Politics','/bscott garrett'),
('en','Sex','/bscott nails'),
('en','Politics','/bscott perry'),
('en','Politics','/bscott peters'),
('en','Politics','/bscott rigell'),
('en','Politics','/bscott tipton'),
('en','Politics','/bscott walker'),
('en','Sex','/bscrot'),
('en','Health','/bscrub'),
('en','Religion','/bse''udat mitzvot'),
('en','Politics','/bsean duffy'),
('en','Politics','/bsean parnell'),
('en','Politics','/bsean patrick maloney'),
('en','Politics','/bsecretar'),
('en','Politics','/bsecurity'),
('en','Health','/bseizu'),
('en','Sex','/bsemen'),
('en','Religion','/bseminary'),
('en','Politics','/bsenat'),
('en','Health','/bsenil'),
('en','Religion','/bsepardic'),
('en','Religion','/bsermon'),
('en','Health','/bseroq'),
('en','Religion','/bshahada'),
('en','Religion','/bshakti'),
('en','Religion','/bshalom'),
('en','Religion','/bshari a'),
('en','Politics','/bshaun donovan'),
('en','Sex','/bshazia sahari'),
('en','Politics','/bsheila jackson lee'),
('en','Religion','/bshekhinah'),
('en','Politics','/bsheldon whitehouse'),
('en','Politics','/bshelley m capito'),
('en','Sex','/bshemale'),
('en','Religion','/bshemot'),
('en','Religion','/bsheol'),
('en','Religion','/bshepard'),
('en','Politics','/bsherrod brown'),
('en','Health','/bshiat'),
('en','Religion','/bshiva'),
('en','Religion','/bshochet'),
('en','Sex','/bshufuni'),
('en','Sex','/bshuttur'),
('en','Sex','/bshyla stylez'),
('en','Religion','/bsiddur'),
('en','Health','/bside effect'),
('en','Health','/bside pa'),
('en','Sex','/bsienna west'),
('en','Religion','/bsilk road'),
('en','Religion','/bsimcha'),
('en','Sex','/bsingles'),
('en','Health','/bsinus'),
('en','Religion','/bskandha'),
('en','Sex','/bskin diamond'),
('en','Health','/bskin ra'),
('en','Health','/bskinny'),
('en','Finance','/bskyward/b'),
('en','Sex','/bslimythief'),
('en','Health','/bsmoki'),
('en','Religion','/bsmrti'),
('en','Sex','/bsmutty'),
('en','Sex','/bsnatchly'),
('en','Health','/bsnori'),
('en','Finance','/bsocial security benefit'),
('en','Politics','/bsocialist'),
('en','Sex','/bsodom'),
('en','Sex','/bsophia santi'),
('en','Sex','/bsophie dee'),
('en','Health','/bsore t'),
('en','Sex','/bspank'),
('en','Politics','/bspencer bachus'),
('en','Sex','/bsperm'),
('en','Health','/bspinal'),
('en','Health','/bspine'),
('en','Religion','/bspirit'),
('en','Sex','/bsquirt'),
('en','Finance','/bssi/b'),
('en','Health','/bstd/b'),
('en','Health','/bstem c'),
('en','Politics','/bsteny hoyer'),
('en','Finance','/bstep change/b'),
('en','Finance','/bstepchange/b'),
('en','Sex','/bstephanie swift'),
('en','Politics','/bstephen f lynch'),
('en','Politics','/bstephen fincher'),
('en','Politics','/bstephen harper'),
('en','Health','/bstero'),
('en','Health','/bstetho'),
('en','Politics','/bsteve beshear'),
('en','Politics','/bsteve bullock'),
('en','Politics','/bsteve chabot'),
('en','Politics','/bsteve cohen'),
('en','Politics','/bsteve daines'),
('en','Politics','/bsteve israel'),
('en','Politics','/bsteve king'),
('en','Politics','/bsteve pearce'),
('en','Politics','/bsteve scalise'),
('en','Politics','/bsteve southerland'),
('en','Politics','/bsteve stivers'),
('en','Politics','/bsteve stockman'),
('en','Politics','/bsteve womack'),
('en','Politics','/bsteven horsford'),
('en','Politics','/bsteven palazzo'),
('en','Health','/bstickle c'),
('en','Sex','/bstileproject'),
('en','Politics','/bstimulus'),
('en','Health','/bstomach p'),
('en','Sex','/bstooorage'),
('en','Sex','/bstoya'),
('en','Sex','/bstreamate'),
('en','Health','/bstrep'),
('en','Health','/bstres'),
('en','Sex','/bstrip'),
('en','Health','/bstrok'),
('en','Finance','/bstudent financ'),
('en','Religion','/bstupa'),
('en','Sex','/bsubimg'),
('en','Sex','/bsubmityourflicks'),
('en','Sex','/bsubmityourflix'),
('en','Health','/bsubox'),
('en','Religion','/bsukkot'),
('en','Religion','/bsunnah'),
('en','Religion','/bsunnis'),
('en','Sex','/bsunny leone'),
('en','Sex','/bsupertanga'),
('en','Health','/bsupplement'),
('en','Politics','/bsupreme court'),
('en','Religion','/bsurah'),
('en','Health','/bsurgeo'),
('en','Health','/bsurger'),
('en','Health','/bsurrog'),
('en','Politics','/bsusan a davis'),
('en','Politics','/bsusan brooks'),
('en','Politics','/bsusan collins'),
('en','Politics','/bsusana martinez'),
('en','Religion','/bsutra'),
('en','Politics','/bsuzan delbene'),
('en','Politics','/bsuzanne bonamici'),
('en','Finance','/bsuze orman/b'),
('en','Religion','/bsvarodaya'),
('en','Sex','/bswapsmut'),
('en','Sex','/bswing'),
('en','Politics','/bsylvia mathews burwell'),
('en','Health','/bsymp'),
('en','Religion','/bsynagogue'),
('en','Health','/bsyphi'),
('en','Health','/bsyrin'),
('en','Sex','/bt s s a'),
('en','Religion','/btafsir'),
('en','Religion','/btalbiya'),
('en','Religion','/btalmud'),
('en','Health','/btamif'),
('en','Politics','/btammy baldwin'),
('en','Politics','/btammy duckworth'),
('en','Religion','/btanakh'),
('en','Sex','/btanner mayes'),
('en','Religion','/btantric'),
('en','Religion','/btarot'),
('en','Religion','/btaryag mitzvot'),
('en','Sex','/btatw'),
('en','Politics','/btax'),
('en','Sex','/btdarkangel'),
('en','Politics','/bted cruz'),
('en','Politics','/bted deutch'),
('en','Politics','/bted poe'),
('en','Politics','/bted yoho'),
('en','Sex','/bteensin'),
('en','Health','/bteeth'),
('en','Religion','/btemple'),
('en','Sex','/btera patrick'),
('en','Religion','/bterayfa'),
('en','Politics','/bterri sewell'),
('en','Politics','/bterry branstad'),
('en','Religion','/bteshuvah'),
('en','Sex','/btesticle'),
('en','Health','/btestos'),
('en','Health','/btexas a&m'),
('en','Politics','/bthad cochran'),
('en','Politics','/bthatcher'),
('en','Politics','/bthe daily'),
('en','Sex','/bthenipslip'),
('en','Sex','/bthenude'),
('en','Sex','/bthepiratebay'),
('en','Religion','/btheravada'),
('en','Health','/bthermom'),
('en','Sex','/bthesuperficial'),
('en','Sex','/btheybf'),
('en','Sex','/bthisav'),
('en','Religion','/bthomas aquinas'),
('en','Politics','/bthomas massie'),
('en','Politics','/bthomas mulcair'),
('en','Politics','/bthomas perez'),
('en','Religion','/bthotlakonda'),
('en','Sex','/bthreesome'),
('en','Health','/bthyr'),
('en','Politics','/btibet'),
('en','Religion','/btikkun olan'),
('en','Politics','/btim bishop'),
('en','Politics','/btim huelskamp'),
('en','Politics','/btim johnson'),
('en','Politics','/btim kaine'),
('en','Politics','/btim ryan'),
('en','Politics','/btim scott'),
('en','Politics','/btim walberg'),
('en','Politics','/btim walz'),
('en','Politics','/btimothy f murphy'),
('en','Politics','/btimothy griffin'),
('en','Health','/btinct'),
('en','Religion','/btirupati'),
('en','Sex','/btits/b'),
('en','Sex','/btmz'),
('en','Sex','/btnaflix'),
('en','Politics','/btodd akin'),
('en','Politics','/btodd rokita'),
('en','Politics','/btodd young'),
('en','Sex','/btokyoteenies'),
('en','Politics','/btom carper'),
('en','Politics','/btom coburn'),
('en','Politics','/btom cole'),
('en','Politics','/btom corbett'),
('en','Politics','/btom cotton'),
('en','Politics','/btom graves'),
('en','Politics','/btom harkin'),
('en','Politics','/btom j rooney'),
('en','Politics','/btom latham'),
('en','Politics','/btom marino'),
('en','Politics','/btom mcclintock'),
('en','Politics','/btom petri'),
('en','Politics','/btom price'),
('en','Politics','/btom reed'),
('en','Politics','/btom rice'),
('en','Politics','/btom udall'),
('en','Politics','/btom vilsack'),
('en','Politics','/btony cardenas'),
('en','Finance','/btopcashback/b'),
('en','Religion','/btorah'),
('en','Sex','/btori black'),
('en','Sex','/btorsky'),
('en','Sex','/btosser'),
('en','Politics','/btotalitarian'),
('en','Sex','/btotallynsfw'),
('en','Health','/btrama'),
('en','Health','/btreatm'),
('en','Politics','/btrent franks'),
('en','Politics','/btrey gowdy'),
('en','Politics','/btrey radel'),
('en','Religion','/btreyf'),
('en','Religion','/btrimurti'),
('en','Religion','/btrinity'),
('en','Religion','/btripitaka'),
('en','Health','/btriso'),
('en','Finance','/btrw/b'),
('en','Health','/btrypo'),
('en','Health','/btsh'),
('en','Sex','/btubaholic'),
('en','Sex','/btube'),
('en','Politics','/btulsi gabbard'),
('en','Sex','/btush'),
('en','Sex','/btwat'),
('en','Sex','/btwistys'),
('en','Health','/btylen'),
('en','Sex','/bua teen'),
('en','Religion','/bufo/b'),
('en','Religion','/bufolog'),
('en','Religion','/bujjain'),
('en','Health','/bulc'),
('en','Health','/buncircum'),
('en','Politics','/bunited nations'),
('en','Religion','/bupanishads'),
('en','Health','/burgent care'),
('en','Health','/burina'),
('en','Politics','/bus debt'),
('en','Politics','/buscis'),
('en','Health','/busml'),
('en','Finance','/busury/b'),
('en','Health','/buter'),
('en','Health','/buti s'),
('en','Religion','/buttar pradesh'),
('en','Health','/bvacci'),
('en','Sex','/bvagin'),
('en','Religion','/bvaisnava'),
('en','Religion','/bvajra'),
('en','Sex','/bvamateur'),
('en','Religion','/bvaranasi'),
('en','Religion','/bvarnas'),
('en','Health','/bvasec'),
('en','Sex','/bve forum'),
('en','Religion','/bvedanta'),
('en','Religion','/bvedas'),
('en','Sex','/bveneral'),
('en','Politics','/bvern buchanan'),
('en','Sex','/bveronica rayne'),
('en','Health','/bvertig'),
('en','Religion','/bvestments'),
('en','Health','/bviagr'),
('en','Politics','/bvic toews'),
('en','Religion','/bvicar'),
('en','Politics','/bvicky hartzler'),
('en','Sex','/bvid2c'),
('en','Religion','/bvinaya'),
('en','Sex','/bvipfuck'),
('en','Health','/bvirgin'),
('en','Sex','/bviril'),
('en','Religion','/bvishnu'),
('en','Health','/bvitam'),
('en','Sex','/bvivid'),
('en','Religion','/bvoki/b'),
('en','Politics','/bvote'),
('en','Politics','/bvotin'),
('en','Sex','/bvoyeur'),
('en','Religion','/bwaldorf school'),
('en','Health','/bwalgr'),
('en','Politics','/bwalter b jones'),
('en','Health','/bware inj'),
('en','Health','/bwarts'),
('en','Sex','/bwatchersweb'),
('en','Health','/bwebmd'),
('en','Sex','/bwebop'),
('en','Health','/bweed'),
('en','Health','/bweight'),
('en','Health','/bwelln'),
('en','Health','/bwheelc'),
('en','Health','/bwhey'),
('en','Health','/bwhite disc'),
('en','Health','/bwhiten'),
('en','Sex','/bwhore'),
('en','Politics','/bwikileak'),
('en','Politics','/bwilliam enyart'),
('en','Politics','/bwilliam l clay'),
('en','Politics','/bwilliam r keating'),
('en','Health','/bwisdom t'),
('en','Finance','/bwoolwich/b'),
('en','Politics','/bworkers'),
('en','Sex','/bworldvoyeur'),
('en','Sex','/bx art'),
('en','Health','/bxana'),
('en','Politics','/bxavier becerra'),
('en','Health','/bxeroq'),
('en','Sex','/bxhamster'),
('en','Religion','/bxmas'),
('en','Sex','/bxnxx'),
('en','Sex','/bxogogo'),
('en','Sex','/bxossip'),
('en','Sex','/bxrate'),
('en','Sex','/bxtube'),
('en','Sex','/bxuk'),
('en','Sex','/bxvideos'),
('en','Religion','/byad/b'),
('en','Religion','/byahrzeit'),
('en','Religion','/byama'),
('en','Religion','/byarmulke'),
('en','Health','/byeas'),
('en','Religion','/byeshiva'),
('en','Religion','/byetzer hara'),
('en','Religion','/byetzer hatov'),
('en','Religion','/byhwh'),
('en','Religion','/byiddish'),
('en','Religion','/bymca'),
('en','Sex','/byobt'),
('en','Religion','/byoga'),
('en','Health','/byohim'),
('en','Sex','/byoujizz'),
('en','Sex','/byourlust'),
('en','Sex','/byurizan beltran'),
('en','Sex','/byuvutu'),
('en','Politics','/byvette clarke'),
('en','Religion','/bzakat'),
('en','Religion','/bzayn malik'),
('en','Religion','/bzazen'),
('en','Religion','/bzealots'),
('en','Religion','/bzemban'),
('en','Religion','/bzen/b'),
('en','Religion','/bzendo'),
('en','Health','/bzenni'),
('en','Politics','/bzimmerman'),
('en','Religion','/bzionism'),
('en','Religion','/bzodiac'),
('en','Politics','/bzoe lofgren'),
('en','Religion','/bzohar'),
('en','Sex','/bzoig/b'),
('en','Health','/bzolo/b'),
('en','Sex','/bzoosk'),
('en','Health','/bzyrt/b'),
('en','Sex','/cunil'),
('en','Politics','/nazi'),
('en','Religion','christ/b'),
('en','Religion','church'),
('en','Health','clinic'),
('en','Sex','cock/b'),
('en','Sex','orgasm'),
('en','Sex','porn'),
('en','Sex','pussies'),
('en','Sex','pussy'),
('en','Health','sex'),
('en','Sex','slut'),
('en','Health','therap'),
('en','Sex','xxx');

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
('Income', 'Ingresos','money.png');


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

