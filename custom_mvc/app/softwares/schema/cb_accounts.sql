create table cb_accounts(
    id int(10) not null primary key auto_increment,
    first_name varchar(50),
    last_name varchar(50),
    user_name varchar(12) not null,
    email varchar(100) not null,
    password varchar(200) not null,
    is_verified int(10) not null,
    created_on timestamp default now()
);

drop table cb_account_verifications;
create table cb_account_verifications(
    id int(10) not null primary key auto_increment,
    code char(4) not null,
    account_id int(10) not null ,
    token varchar(100),
    expiry timestamp,
    is_verified boolean default false
);
