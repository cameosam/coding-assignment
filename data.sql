CREATE TABLE airsuite_interview (
  id INT PRIMARY KEY AUTO_INCREMENT,
  value_key VARCHAR(6) NOT NULL,
  value_data VARCHAR(120),
  CHECK_VALUE_KEY_6 int AS (CASE WHEN LENGTH(value_key)=6 THEN 1 ELSE NULL END) NOT NULL
);

INSERT INTO airsuite_interview (value_key) VALUES ('FIRSTK');
INSERT INTO airsuite_interview (value_key, value_data) VALUES ('SECOND','This is the second entry');
INSERT INTO airsuite_interview (value_key, value_data) VALUES ('THIRDK','THIS is THE third ENTRY');