create table cb_transactions(

  id int(10) not null primary key auto_increment,
  customer_id int(10) not null,
  user_id int(10) not null,
  title varchar(122),
  description text,
  date date,
  is_removed boolean default false,
  created_at timestamp default now()
);
