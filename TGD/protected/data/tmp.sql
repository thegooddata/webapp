ALTER TABLE tbl_transactions
   ADD COLUMN amount_num numeric(12,2) NOT NULL DEFAULT 0;
UPDATE tbl_transactions SET amount_num=amount::numeric;
ALTER TABLE tbl_transactions DROP COLUMN amount;
ALTER TABLE tbl_transactions RENAME amount_num  TO amount;
