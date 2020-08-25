create table accounts(
    id int(10) not null primary key auto_increment,
    fb_id varchar(50) not null,
    username varchar(50) not null,
    email varchar(100) not null,
    password varchar(200) not null,
    type enum('staff' , 'admin') default 'staff',
    is_activated boolean default false ,
    is_login boolean default false,
    created_at timestamp default now()
);


drop table account_logs;

create table account_logs(
    id int(10) not null primary key auto_increment,
    user_id int(10) not null,
    type enum('login' , 'logout') default 'login',
    log_time timestamp default now()
);



alter table accounts
    add column nick_name varchar(20),
    add column first_name varchar(20),
    add column last_name varchar(20);

alter table accounts
    add column profile text;

alter table accounts
    add column status enum('verified' , 'unverified') default 'unverified';

insert into accounts(
    first_name , last_name , nick_name , username , email , password , type
) 

VALUES(
    'Rowbenl', 'Gonzales', 'Administrator','admin' , 'admin@email.com' , '1111' , 'admin'
);