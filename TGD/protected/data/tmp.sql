ALTER TABLE tbl_transactions
   ADD COLUMN amount_num numeric(12,2) NOT NULL DEFAULT 0;
UPDATE tbl_transactions SET amount_num=amount::numeric;
ALTER TABLE tbl_transactions DROP COLUMN amount;
ALTER TABLE tbl_transactions RENAME amount_num  TO amount;


-- month
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

ALTER TABLE view_adtracks_month_users_percentil
  OWNER TO tgd;


-- year
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

ALTER TABLE view_adtracks_year_users_percentil
  OWNER TO tgd;







CREATE OR REPLACE VIEW view_adtracks_month_users AS 
 SELECT tbl_adtracks.member_id,
    count(*) AS queries
   FROM tbl_adtracks
  WHERE tbl_adtracks.created_at >= date_trunc('month'::text, now())::date AND tbl_adtracks.created_at <= (date_trunc('month'::text, date_trunc('month'::text, now()) + '1 mon'::interval) - '00:00:01'::interval)
  GROUP BY tbl_adtracks.member_id;

ALTER TABLE view_adtracks_month_users
  OWNER TO tgd;


CREATE OR REPLACE VIEW view_adtracks_year_users AS 
 SELECT tbl_adtracks.member_id,
    count(*) AS queries
   FROM tbl_adtracks
  WHERE tbl_adtracks.created_at >= date_trunc('year'::text, now())::date AND tbl_adtracks.created_at <= (date_trunc('month'::text, date_trunc('year'::text, now()) + '1 year'::interval) - '00:00:01'::interval)
  GROUP BY tbl_adtracks.member_id;

ALTER TABLE view_adtracks_year_users
  OWNER TO tgd;