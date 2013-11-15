--- EVENTS DATA ---

--DROP TABLE tbl_events;
CREATE TABLE tbl_events (
  id SERIAL PRIMARY KEY,
  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,

  member_id int references tbl_members(id),
  user_id varchar(128),

  action (browse, search, share, like, threat_detect, threat_whitelist_add, threat_whitelist_remove, install, uninstall)

  object (id -> dato )
  type

  source (chrome|safari|facebookapp)
  
  --misce
  value,
  message,
  status,
);


--- MEMBERS DATA ---

--DROP TABLE tbl_members;
CREATE TABLE tbl_members (
  id SERIAL PRIMARY KEY,
  username varchar(20) NOT NULL,
  password varchar(128) NOT NULL,
  email varchar(128) NOT NULL,
  activkey varchar(128) NOT NULL DEFAULT '',
  created_at TIMESTAMP with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
  lastvisit_at TIMESTAMP with time zone,
  superuser int NOT NULL DEFAULT '0',
  status int NOT NULL DEFAULT '0'
);

--DROP TABLE tbl_profiles;
CREATE TABLE tbl_profiles (
  user_id SERIAL PRIMARY KEY,
  lastname varchar(50) NOT NULL DEFAULT '',
  firstname varchar(50) NOT NULL DEFAULT ''
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

--- ADTHREATS DATA ---

--DROP TABLE tbl_adtracks_types;
CREATE TABLE tbl_adtracks_types (
  id SERIAL PRIMARY KEY,
  name varchar(255) NOT NULL DEFAULT ''
);

--DROP TABLE tbl_adtracks_sources;
CREATE TABLE tbl_adtracks_sources (
  id SERIAL PRIMARY KEY,
  category_id int NOT NULL references tbl_adtracks_types(id),
  name varchar(255) NOT NULL DEFAULT '',
  url varchar(255) NOT NULL DEFAULT ''
);

--DROP TABLE tbl_adtracks;
CREATE TABLE tbl_adtracks (
  id SERIAL PRIMARY KEY,
  member_id int NOT NULL references tbl_members(id),
  adtracks_sources_id int NOT NULL references tbl_adtracks_sources(id),
  domain varchar(255) NOT NULL DEFAULT '',
  url text NOT NULL DEFAULT '',
  created_at TIMESTAMP with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_whitelists;
CREATE TABLE tbl_whitelists (
  id SERIAL PRIMARY KEY,
  member_id int NOT NULL references tbl_members(id),
  domain varchar(255) NOT NULL DEFAULT '',
  adtracks_sources_id int NOT NULL references tbl_adtracks_sources(id),
  status boolean NOT NULL DEFAULT true,
  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--- BROWSING DATA ---

--DROP TABLE tbl_browsing;
CREATE TABLE tbl_browsing (
  id SERIAL PRIMARY KEY,
  member_id int NOT NULL references tbl_members(id),
  domain varchar(255) NOT NULL DEFAULT '',
  url text NOT NULL DEFAULT '',
  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);


--- QUERIES DATA ---

--DROP TABLE tbl_queries;
CREATE TABLE tbl_queries (
  id SERIAL PRIMARY KEY,
  member_id int NOT NULL references tbl_members(id),
  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  provider varchar(128) NOT NULL,
  data varchar(256) NOT NULL,
  query text NOT NULL,
  lang varchar(128) NOT NULL
);

--DROP TABLE tbl_queries_blacklist;
CREATE TABLE tbl_queries_blacklist (
  id SERIAL PRIMARY KEY,
  category varchar(255) NOT NULL DEFAULT '',
  headword varchar(255) NOT NULL DEFAULT '',
  lang varchar(128) NOT NULL,
  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);



INSERT INTO tbl_members (username, password, email, activkey, superuser, status) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1, 1),
('demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 0, 1),
('tsunamix','be3100b2dc0330f2df69a539fdd0c798','danielgarciagomez@gmail.com','9e52e0092a845c445d86b13e0e8e7b50',0,1);

INSERT INTO tbl_queries_blacklist (category, headword,lang) VALUES
('sex', 'sex','en'),
('sex', 'sex','es');

INSERT INTO tbl_profiles (lastname, firstname) VALUES
('Admin', 'Administrator'),
('Demo', 'Demo');

INSERT INTO tbl_adtracks_types (name) VALUES
('Disconnect'),
('Advertising'),
('Analytics'),
('Social');

INSERT INTO tbl_profiles_fields (varname, title, field_type, field_size, field_size_min, required, match, range, error_message, other_validator, default_value, widget, widgetparams, position, visible) VALUES
('lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
('firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);