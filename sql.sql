alter table sql_ucenter_member add column (
	c_name varchar(50) not null,
	c_range char(50) not null,
	industry char(50),
	property char(10),
	step char(10),
	c_label varchar(20) not null,
	corporation char(10),
	linkman char(20) not null,
	c_place varchar(20) not null,
	c_place_detail varchar(50),
	intro text,
	link varchar(50),
	c_link varchar(50),
	c_email varchar(50),
	c_qq char(12),
	licence int(11),
	identity_x int(11),
	identity_y int(11),
	grade int(5)
);

create table sql_c_executive (
	id int(11) primary key AUTO_INCREMENT not null,
	cid int(10) not null default 0,
	name char(10) not null,
	e_pos char(10) not null,
	content text,
	pic_id int(11)
)ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='高管介绍';

create table sql_c_product (
	id int(11) primary key AUTO_INCREMENT not null,
	cid int(10) not null default 0,
	name char(10) not null,
	content text,
	pic_id int(11)
)ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='产品介绍';

create table sql_c_like (
	id int(11) primary key AUTO_INCREMENT not null,
	cid int(10) not null,
	uid int(10) not null,
	jian_id int(10) not null,
	create_time int(10) not null,
	type tinyint(3) not null default 0 
)ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='企业关注表';

create table sql_c_jian (
	id int(11) primary key AUTO_INCREMENT not null,
	cid int(10) not null,
	uid int(10) not null,
	jian_id int(10) not null,
	jid int(11),
	create_time int(10) not null,
	is_read tinyint(3) not null default 0 
)ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='企业收到的简历';

create table sql_c_comment (
	id int(11) primary key AUTO_INCREMENT not null,
	uid int(10) not null,
	jid int(11),
	comment varchar(100),
	create_time int(10) not null,
	good tinyint(3) default 0 
)ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='职位评论';


create table sql_skill (
	id int(11) primary key AUTO_INCREMENT not null,
	pid int(10) not null default 0,
	level char(10),
	name char(15)
)ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='技能表';

create table sql_center_user (
	id int(11) primary key AUTO_INCREMENT not null,
	`username` char(16) NOT NULL DEFAULT '' COMMENT '用户名',
	password char(32) not null,
	email varchar(50) not null default '',
	phone int(11) not null,
	driver char(5),
	u_qq char(12) not null default '',
	u_weibo char(20) not null default '',
	u_weixin char(20) not null default '',
	uname char(16) not null default '',
	sex tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
	`birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
	nationality char(10) not null default '中国',
	identity char(18) not null default '',
	present_addr varchar(20),
	signature varchar(50) not null default '',
	ulabel varchar(50),
	max_edu char(5) not null default '0',
	overseas tinyint(2) not null default 0,
	politics char(5) not null default '13',
	self varchar(150) not null default '',
	now_status char(5) not null,
	moren int(11),
	jian_num int(2) not null default 0,
	attach_num int(2) not null default 0,
	pro_num int(2) not null default 0,
	edu_num int(2) not null default 0,
	certificate_num int(2) not null default 0,
	lan_num int(2) not null default 0,
	skill_num int(2) not null default 0,
	read_num int(2) not null default 0,
	send_num int(2) not null default 0,
	collect_num int(5) not null default 0,
	`reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
	`reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
	`last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  	`last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  	unique key `username` (`username`)
)ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='前台用户中心';

alter table sql_center_user add column(
	skill char(50) not null
);

create table sql_user(
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(10) NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '会员状态',
  PRIMARY KEY (`uid`),
  KEY `status` (`status`)
)ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='前台用户表';


create table sql_u_base (
	id int(11) primary key AUTO_INCREMENT not null,
	uid int(10) not null,
	status tinyint(3) not null default 0,
	display tinyint(3) not null default 0 
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='简历基础表';

create table sql_u_work (
	id int(11) primary key AUTO_INCREMENT not null,
	uid int(10) not null,
	company char(30) not null default '',
	industy char(5) not null default '',
	u_pos char(20) not null default '',
	department char(30) not null default '',
	continue_time char(50) not null default '',
	work_content text
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='工作经历表';

create table sql_u_edu (
	id int(11) primary key AUTO_INCREMENT not null,
	uid int(10) not null,
	school char(30) not null default '',
	major char(30) not null default '',
	academic char(5) not null default '0',
	continue_time char(50) not null default '',
	school_exp text
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教育经历';

create table sql_u_project (
	id int(11) primary key AUTO_INCREMENT not null,
	uid int(10) not null,
	pro_name char(30) not null default '',
	pro_url char(100) not null default '',
	pro_pos char(20) not null default '',
	pro_desc text
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='项目经验';

create table sql_u_certificate (
	id int(11) primary key AUTO_INCREMENT not null,
	uid int(10) not null,
	cer_name char(50) not null default '',
	time int(10) not null,
	cer_desc text
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='证书';

create table sql_u_langeage (
	id int(11) primary key AUTO_INCREMENT not null,
	uid int(10) not null,
	lan_type char(20) not null default '',
	degree char(5) not null default ''
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='语言能力';

create table sql_u_skill (
	id int(11) primary key AUTO_INCREMENT not null,
	uid int(10) not null,
	Skill_name char(20) not null default '',
	degree char(5) not null default ''
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专业技能';

create table sql_slide (
	 `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
	  `name` varchar(225) NOT NULL DEFAULT '' COMMENT '标志',
	  `title` varchar(225) NOT NULL DEFAULT '' COMMENT '标题',
	  `url` varchar(225) NOT NULL DEFAULT '' COMMENT '链接',
	  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
	  `link_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '外链',
	  `place` tinyint(30) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许发布内容',
	  `display` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '可见性',
	  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
	  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '数据状态',
	  `icon` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类图标',
	  `pid` int(10) unsigned NOT NULL DEFAULT '0',
	  PRIMARY KEY (`id`)
	 )ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='幻灯片';

create table sql_ad(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(225) NOT NULL DEFAULT '' COMMENT '标志',
  `title` varchar(225) NOT NULL DEFAULT '' COMMENT '标题',
  `url` varchar(225) NOT NULL DEFAULT '' COMMENT '金额',
  `partner` varchar(255) NOT NULL DEFAULT '' COMMENT '关联商品',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `meta_title` varchar(225) NOT NULL DEFAULT '',
  `place` varchar(225) NOT NULL DEFAULT '' COMMENT '位置',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '可见性',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(2) DEFAULT '1' COMMENT '数据状态',
  `icon` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类图标',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
   PRIMARY KEY (`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告';