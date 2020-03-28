CREATE TABLE Movies (
    mid varchar(30) not null,
    title varchar(200) not null,
    poster varchar(700),
    releaseDate int(10),
    duration varchar(30),
    plot varchar(700),
    production varchar(50),
    IMDbVotes int(10),
    primary key (mid)
);

CREATE TABLE Stars (
    sname varchar(30) not null,
    sex varchar(30),
    age int(3),
    nationality varchar(30),
    primary key (sname)
);

CREATE TABLE Acts (
    sname varchar(30) not null,
    mid varchar(30) not null,
    primary key (sname, mid),
    foreign key (mid) references Movies(mid),
    foreign key (sname) references Stars(sname)
);

CREATE TABLE Directors (
    dname varchar(30) not null,
    movieCount int(5),
    primary key (dname)
);

CREATE TABLE Directs (
    dname varchar(30) not null,
    mid varchar(30) not null,
    location varchar(700),
    primary key (dname, mid),
    foreign key (mid) references Movies(mid),
    foreign key (dname) references Directors(dname)
);

CREATE TABLE Categories (
    cname varchar(30) not null,
    primary key (cname)
);

CREATE TABLE Type (
    cname varchar(30) not null,
    mid varchar(30) not null,
    primary key (cname, mid),
    foreign key (mid) references Movies(mid),
    foreign key (cname) references Categories(cname)
);

CREATE TABLE Writers (
    wname varchar(30) not null,
    address varchar(700),
    primary key (wname)
);

CREATE TABLE Writes (
    wname varchar(30) not null,
    mid varchar(30) not null,
    primary key (wname, mid),
    foreign key (mid) references Movies(mid),
    foreign key (wname) references Writers(wname)
);


CREATE TABLE Got_AwardsAndNominations (
    name varchar(700) not null,
    mid varchar(30),
    primary key (name, mid),
    foreign key (mid) references Movies(mid)
);

CREATE TABLE Platform (
    type varchar(10),
    primary key (type)
);

CREATE TABLE Scored (
    mid varchar(30),
    type varchar(10),
    score varchar(10),
    primary key (mid, type),
    foreign key (type) references Platform(type),
    foreign key (mid) references Movies(mid)
);
