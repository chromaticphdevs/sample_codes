create table cb_marketing_log_items(
    id int(10) not null primary key auto_increment,
    log_id int(10) not null comment 'marketing logs id',
    customer_id int(10) not null,
    email varchar(100) comment 'display error if in-correct email',
    mobile char(100) comment 'display error if in-correct mobile'
);

