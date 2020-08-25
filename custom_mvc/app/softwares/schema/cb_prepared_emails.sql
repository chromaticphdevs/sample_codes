create table cb_prepared_emails(
    id int(10) not null primary key auto_increment,
    account_id int(10) not null,
    subject varchar(100) ,
    body text,
    created_at timestamp default now()
);