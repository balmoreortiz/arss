/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/9/2021 14:52:18                           */
/*==============================================================*/


drop table if exists REPUESTO;

drop table if exists ROL;

drop table if exists SERVICIO;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: REPUESTO                                              */
/*==============================================================*/
create table REPUESTO
(
   NOM_REP              varchar(100) not null,
   DESC_REP             varchar(255) not null,
   PREC_REP             float,
   EXIS_REP             int,
   ID_REP               int not null,
   primary key (ID_REP)
);

/*==============================================================*/
/* Table: ROL                                                   */
/*==============================================================*/
create table ROL
(
   ID_ROL               int not null,
   NOM_ROL              varchar(20) not null,
   DESC_ROL             varchar(255) not null,
   primary key (ID_ROL)
);

/*==============================================================*/
/* Table: SERVICIO                                              */
/*==============================================================*/
create table SERVICIO
(
   NOM_SERV             varchar(100) not null,
   DESC_SERV            varchar(255) not null,
   PREC_SERV            float,
   ID_SERV              int not null,
   primary key (ID_SERV)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   NOM_USR              varchar(100) not null,
   PASSWORD             varchar(100) not null,
   DIR                  varchar(255),
   ID_USR               int not null,
   ID_ROL               int,
   primary key (ID_USR)
);

alter table USUARIO add constraint FK_RELATIONSHIP_1 foreign key (ID_ROL)
      references ROL (ID_ROL) on delete restrict on update restrict;

