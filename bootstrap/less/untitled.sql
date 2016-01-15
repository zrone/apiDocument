-- 控制器-方法

create table `options`(
	`id` int(11) not null auto_increment,
	`controller_id` int(11) not null comment '所有控制器',
	`name` varchar(64) not null comment '名称',
	primary key(`id`),
	key `index_controller_id` (`controller_id`)
) engine=Innodb auto_increment=0 default charset=utf8;