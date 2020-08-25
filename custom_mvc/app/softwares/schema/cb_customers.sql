drop table cb_customers;
create table cb_customers(
    id int(10) not null primary key auto_increment,
    status enum('lead' , 'prospect' , 'customer' , 'draft') default 'lead',
    account_id int(10) not null,
    first_name varchar(50) ,
    last_name varchar(50) ,
    address text,
    company_name varchar(100),
    industry varchar(100),
    notes text,
    created_at timestamp default now()
);


create table cb_customer_contacts(
    id int(10) not null primary key auto_increment,
    customer_id int(10) not null,
    type enum('email' , 'mobile' , 'tel' , 'website') default 'mobile',
    value varchar(50) ,
    created_at timestamp default now()
);

create table cb_customer_logs(
    id int(10) not null primary key auto_increment,
    customer_id int(10) not null,
    subject varchar(50) not null,
    message text,
    created_at timestamp default now
);


create table cb_customer_notes(
    id int(10) not null primary key auto_increment,
    customer_id int(10) not null,
    notes text,
    created_at timestamp default now()
);