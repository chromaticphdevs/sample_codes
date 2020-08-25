create table cb_marketing_logs(
    id int(10) not null primary key auto_increment,
    account_id int(10),
    email text,
    sms text,
    created_at timestamp default now()
);


