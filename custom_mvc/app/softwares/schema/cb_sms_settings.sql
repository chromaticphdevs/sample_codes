drop table cb_sms_settings;
create table cb_sms_settings(
    id int(10) not null primary key auto_increment,
    signature varchar(50) ,
    account_id int(10) not null,
    max_sent smallint default 10,
    type enum('basic' , 'professional' , 'business') default 'basic',
    changes smallint default 0,
    created_at timestamp default now()
);