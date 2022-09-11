/*CREACION DE TABLA DE PROVEEDORES POR DAVE DELGADO*/
CREATE TABLE proveedores (
    Id int NOT NULL AUTO_INCREMENT,
    Descripcion varchar(255) NOT NULL,
    TiempoContrato int,
    TipoContrato char(1),
    AnioInicioContrato int,
    AnioFinContrato int,
    fechaIngreso date,
    PRIMARY KEY (Id)
);