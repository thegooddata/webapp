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

  code varchar(255) DEFAULT '',
  
  name_en_us varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_countries  (name_en_us, name_es) VALUES
('United Kingdom', 'Reino Unido'),
('Spain', 'España'),
('France', 'Francia');

--DROP TABLE tbl_currencies;
CREATE TABLE tbl_currencies (
  id SERIAL PRIMARY KEY,

  code varchar(255) DEFAULT '',
  
  name_en_us varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_currencies  (code, name_en_us,name_es) VALUES
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

  name_en_us varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);


INSERT INTO tbl_loans_status (id,name_en_us, name_es) VALUES
(1,'fundraising', 'Recaudación de fondos'),
(2,'Funded', 'Financiado'),
(3,'Paying Back', 'Reembolsando'),
(4,'Paid', 'Pagado'),
(5,'At Loss', 'Perdido');

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

  link_en_us varchar(255) DEFAULT '',
  link_es varchar(255) DEFAULT '',

  text_en_us text DEFAULT '',
  text_es text DEFAULT '',

  achievements_start TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  achievements_finish TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,

  created_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP with time zone DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tbl_achievements  (id,achievement_type_id, title_en_us,link_en_us,text_en_us,achievements_start,achievements_finish) VALUES
(1, 1, 'This a sample achievement with two lines. I hope it fills the extension content.','http://www.thegooddata.org','This a sample achievement with two lines. I hope it fill the extension content.','01/01/2014','01/01/2015');

--DROP TABLE tbl_incomes;
CREATE TABLE tbl_incomes (
  id SERIAL PRIMARY KEY,

  source_type varchar(255) DEFAULT '',
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

  name_en_us varchar(255) DEFAULT '',
  name_es varchar(255) DEFAULT ''
);

INSERT INTO tbl_loans_leaders  (name_en_us, name_es) VALUES
('Kiva', 'Kiva');

--DROP TABLE tbl_loans;
CREATE TABLE tbl_loans (
  id SERIAL PRIMARY KEY,

  loan_identifier varchar(255) DEFAULT '',
  
  leader int NOT NULL references tbl_loans_leaders(id),
  loan_url varchar(255) DEFAULT '',

  title_en_us varchar(255) DEFAULT '',
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

