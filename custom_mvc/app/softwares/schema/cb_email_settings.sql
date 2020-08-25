drop table cb_email_settings;

create table cb_email_settings(
    id int(10) not null primary key auto_increment,
    name varchar(50) ,
    reply_to varchar(50) ,
    account_id int(10) not null,
    created_at timestamp default now()
);