--DROP TABLE tbl_queries;
CREATE TABLE tbl_queries (
  id SERIAL PRIMARY KEY,
  user_id int NOT NULL references tbl_users(id),
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  provider varchar(128) NOT NULL,
  data varchar(256) NOT NULL,
  query text NOT NULL,
  lang varchar(128) NOT NULL
);

--DROP TABLE tbl_users;
CREATE TABLE tbl_users (
  id SERIAL PRIMARY KEY,
  username varchar(20) NOT NULL,
  password varchar(128) NOT NULL,
  email varchar(128) NOT NULL,
  activkey varchar(128) NOT NULL DEFAULT '',
  create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  lastvisit_at TIMESTAMP,
  superuser int NOT NULL DEFAULT '0',
  status int NOT NULL DEFAULT '0'
);

--DROP TABLE tbl_profiles;
CREATE TABLE tbl_profiles (
  user_id SERIAL PRIMARY KEY,
  lastname varchar(50) NOT NULL DEFAULT '',
  firstname varchar(50) NOT NULL DEFAULT ''
);

--DROP TABLE tbl_categories;
CREATE TABLE tbl_categories (
  id SERIAL PRIMARY KEY,
  name varchar(255) NOT NULL DEFAULT ''
);

--DROP TABLE tbl_services;
CREATE TABLE tbl_services (
  id SERIAL PRIMARY KEY,
  category_id int NOT NULL references tbl_categories(id),
  name varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT ''
);

--DROP TABLE tbl_whitelist;
CREATE TABLE tbl_whitelists (
  id SERIAL PRIMARY KEY,
  user_id int NOT NULL references tbl_users(id),
  domain varchar(255) NOT NULL DEFAULT '',
  service_id int references tbl_services(id),
  status boolean NOT NULL DEFAULT true,
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_threats;
CREATE TABLE tbl_threats (
  id SERIAL PRIMARY KEY,
  user_id int NOT NULL references tbl_users(id),
  service_id int NOT NULL references tbl_services(id),
  domain varchar(255) NOT NULL DEFAULT '',
  url text NOT NULL DEFAULT '',
  create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);


--DROP TABLE tbl_history;
CREATE TABLE tbl_history (
  id SERIAL PRIMARY KEY,
  user_id int NOT NULL references tbl_users(id),
  domain varchar(255) NOT NULL DEFAULT '',
  url text NOT NULL DEFAULT '',
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_queries_blacklist;
CREATE TABLE tbl_queries_blacklist (
  id SERIAL PRIMARY KEY,
  category varchar(255) NOT NULL DEFAULT '',
  word varchar(255) NOT NULL DEFAULT '',
  lang varchar(128) NOT NULL,
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

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

INSERT INTO tbl_users (username, password, email, activkey, superuser, status) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1, 1),
('demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 0, 1);

INSERT INTO tbl_profiles (lastname, firstname) VALUES
('Admin', 'Administrator'),
('Demo', 'Demo');

INSERT INTO tbl_categories (name) VALUES
('Disconnect'),
('Advertising');

INSERT INTO tbl_services (category_id, name, url) VALUES
(1, 'Twitter','https://twitter.com/'),
(1, 'Google','http://www.google.com/'),
(2, 'AddThis','http://www.addthis.com/');

INSERT INTO tbl_profiles_fields (varname, title, field_type, field_size, field_size_min, required, match, range, error_message, other_validator, default_value, widget, widgetparams, position, visible) VALUES
('lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
('firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);