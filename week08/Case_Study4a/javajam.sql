create table sales
(
    name char(50) not null,
    category char(50),
    quantity int unsigned not null,
    price float(4, 2)
);

create table coffee
(   coffeeid int unsigned not null auto_increment primary key,
    name char(50) not null,
    price float(4, 2),
    is_double bit
);