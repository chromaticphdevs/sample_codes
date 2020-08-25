create table prepared_texts(
    id int(10) not null primary key auto_increment,
    account_id int(10) not null,
    message text,
    created_at timestamp default now()
);