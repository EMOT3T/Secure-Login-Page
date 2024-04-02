/* Understand that this is just a simple model. Develop and model the code according to your needs. */

CREATE TABLE users (
  user_id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_fullname VARCHAR(502),
  user_email VARCHAR(128),
  user_password_hash VARCHAR(256),
  user_salt VARCHAR(128)
);
