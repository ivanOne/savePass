CREATE TABLE users (
  id int not null AUTO_INCREMENT,
  name varchar(100) not null,
  login text,
  password text,
  PRIMARY KEY(id)
)ENGINE = InnoDB;

CREATE TABLE info(
  id int(11) not null AUTO_INCREMENT,
  name varchar(255) not null,
  info text,
  password text,
  user int(11),
  PRIMARY KEY(id)
 )ENGINE = InnoDB;
