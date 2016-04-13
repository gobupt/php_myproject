create database house;
use house;
create table house_admin(
	id int unsigned auto_increment key not null,
	username varchar(20) not null unique key,
	password varchar(20) not null,
	name varchar(10) not null,
	sex  varchar(2) ,
	email varchar(60)
	);
create table house_vip(
	id int unsigned auto_increment key not null,
	username varchar(20) not null unique key,
	password varchar(20) not null,
	name varchar(10) not null,
	sex  varchar(2) not null,
	email varchar(60) not null,
	id_card char(18) not null,
	phone varchar(20) not null,
	address varchar(60) not null
	);
create table house_board(
	id int unsigned auto_increment key not null,
	question varchar(255) not null,
	answer varchar(255) ,
	vid int unsigned not null,
	aid int unsigned 
	);
create table house_news(
	id int unsigned auto_increment key not null,
	title varchar(50) not null,
	source varchar(10) not null,
	pubtime int unsigned not null,
	content text not null
	);
create table house_album(
	id int unsigned auto_increment key not null,
	hid int unsigned not null,
	albumpath varchar(50) not null
	);
	
	
	
	
	