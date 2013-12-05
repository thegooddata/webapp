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

--DROP TABLE tbl_loans_countries;
CREATE TABLE tbl_countries (
  id SERIAL PRIMARY KEY,

  name_en_us varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_countries  (name_en_us, name_es) VALUES
('United Kingdom', 'Reino Unido'),
('Spain', 'España'),
('France', 'Francia');

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
('demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 0, 1),
('tsunamix','be3100b2dc0330f2df69a539fdd0c798','danielgarciagomez@gmail.com','9e52e0092a845c445d86b13e0e8e7b50',0,1);

--DROP TABLE tbl_profiles;
CREATE TABLE tbl_profiles (
  user_id SERIAL PRIMARY KEY,
  lastname varchar(50) NOT NULL DEFAULT '',
  firstname varchar(50) NOT NULL DEFAULT ''
);

INSERT INTO tbl_profiles (lastname, firstname) VALUES
('Admin', 'Administrator'),
('Demo', 'Demo');

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
('Disconnect'),
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
(4,'Twitter','http://www.twitter.com'),
(4,'Facebook','http://www.facebook.com');



--DROP TABLE tbl_adtracks;
CREATE TABLE tbl_adtracks (
  id SERIAL PRIMARY KEY,

  user_id varchar(255) DEFAULT '',
  member_id int references tbl_members(id),
  adtracks_sources_id int NOT NULL references tbl_adtracks_sources(id),
  domain varchar(255) NOT NULL DEFAULT '',
  url text NOT NULL DEFAULT '',
  usertime TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,  

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_whitelists;
CREATE TABLE tbl_whitelists (
  id SERIAL PRIMARY KEY,

  user_id varchar(255) DEFAULT '',
  member_id int references tbl_members(id),
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

  member_id int references tbl_members(id),
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

  member_id int references tbl_members(id),
  user_id varchar(255) DEFAULT '',
  provider varchar(128) NOT NULL,
  data varchar(256) NOT NULL,
  query text NOT NULL,
  lang varchar(128) NOT NULL,
  usertime TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_queries_blacklist;
CREATE TABLE tbl_queries_blacklist (
  id SERIAL PRIMARY KEY,

  category varchar(255) NOT NULL DEFAULT '',
  headword varchar(255) NOT NULL DEFAULT '',
  lang varchar(128) NOT NULL,

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tbl_queries_blacklist (category, headword,lang) VALUES
('sex', 'sex','en'),
('sex', 'sex','es');

--- GOOD DATA ---

--DROP TABLE tbl_loans_status;
CREATE TABLE tbl_loans_status (
  id SERIAL PRIMARY KEY,

  name_en_us varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_loans_status (name_en_us, name_es) VALUES
('Fundraising', 'Recaudación de fondos'),
('Funded', 'Financiado');

--DROP TABLE tbl_loans_activities;
CREATE TABLE tbl_loans_activities (
  id SERIAL PRIMARY KEY,

  name_en_us varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_loans_activities (name_en_us, name_es) VALUES
('Agriculture', 'Agricultura'),
('Health', 'Salud');

--DROP TABLE tbl_achievements_types;
CREATE TABLE tbl_achievements_types (
  id SERIAL PRIMARY KEY,

  name_en_us varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT '',

  icon varchar(255) DEFAULT ''
);

INSERT INTO tbl_achievements_types  (name_en_us, name_es,icon) VALUES
('Users news', 'Noticias de usuarios','news.png'),
('Incomes', 'Ingresos','money.png');


--DROP TABLE tbl_achievements;
CREATE TABLE tbl_achievements (
  id varchar(255) PRIMARY KEY,

  achievement_type_id int references tbl_achievements_types(id),

  title_en_us varchar(255) DEFAULT '',
  title_es varchar(255) DEFAULT '',

  link_en_us varchar(255) DEFAULT '',
  link_es varchar(255) DEFAULT '',

  text_en_us text DEFAULT '',
  text_es text DEFAULT '',

  achievements_start TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  achievements_finish TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_incomes;
CREATE TABLE tbl_incomes (
  id varchar(255) PRIMARY KEY,

  source_type varchar(255) DEFAULT '',
  source_name varchar(255) DEFAULT '',
  gross_amount numeric DEFAULT '0',
  expenses numeric DEFAULT '0',
  income_date TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  currency varchar(255) DEFAULT 'USD', 
  xrate_USD_spot numeric DEFAULT '0', 
  loan_reserved numeric DEFAULT '50',

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

--DROP TABLE tbl_loans;
CREATE TABLE tbl_loans (
  id varchar(255) PRIMARY KEY,

  leader varchar(255) DEFAULT '',
  currency varchar(255) DEFAULT 'USD',
  
  title_en_us varchar(255) DEFAULT '',
  title_es varchar(255) DEFAULT '',
  
  id_loans_activity int NOT NULL references tbl_loans_activities(id),
  image varchar(255) DEFAULT '',
  id_countries int NOT NULL references tbl_countries(id),
  partner varchar(255) DEFAULT '',
  amount numeric DEFAULT '0',
  term int DEFAULT '0',
  contribution numeric DEFAULT '0',
  loan_date TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  loan_update TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  id_loans_status int NOT NULL references tbl_loans_status(id),
  paidback numeric DEFAULT '0',
  loss_currency numeric DEFAULT '0',
  loss_defaut numeric DEFAULT '0',

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);