create table cb_mailer_messages(
  id int(10) not null primary key auto_increment,
  subject varchar(100),
  header varchar(100),
  contact varchar(50),
  email varchar(50),
  body text,
  created_at timestamp default now()
);
