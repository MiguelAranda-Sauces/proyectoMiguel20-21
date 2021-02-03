/**
 * Author:  daw2
 * Created: 25 nov. 2020
 */

-- Base de datos a usar
--USE (Nombre base de datos);--

-- Introduccion de datos dentro de la tabla creada
--INSERT INTO (Nombre tabla)((Nombre columna),(Nombre columna)) VALUES
  --('(valor fila)', '(valor fila)'),
  --('(valor fila)', '(valor fila)'),
  --('(valor fila)', '(valor fila)'),
  --('(valor fila)', '(valor fila)'),
  --('(valor fila)', '(valor fila)');

-- La contraseña de los usuarios es la concatenación del nombre del usuario y el password
-- Base de datos a usar
USE db771560945;

-- Añadimos los departamentos
INSERT INTO T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio) VALUES
    ('INF', 'Departamento de informatica',null,3),
    ('VEN', 'Departamento de ventas',null,1),
    ('CON', 'Departamento de contabilidad',null,2),
    ('PET', 'Departamento de pertenencias',null,4),
    ('CFI', 'Departamento de Ciencia Ficcion',null,20);

-- Añadimos los usuarios , todas las password estan codificacadas en SHA2 256
INSERT INTO T01_Usuario(T01_CodUsuario, T01_DescUsuario, T01_Password) VALUES
    ('nereaa','NereaA',SHA2('nereaApaso',256)),
    ('miguel','Miguel Angel Aranda Garcia',SHA2('miguelpaso',256)),
    ('bea','Bea',SHA2('beapaso',256)),
    ('nerean','NereaN',SHA2('nereaNpaso',256)),
    ('cristinam','CristinaM',SHA2('cristinaMpaso',256)),
    ('susana','Susana',SHA2('susanapaso',256)),
    ('sonia','Sonia',SHA2('soniapaso',256)),
    ('elena','Elena',SHA2('elenapaso',256)),
    ('nacho','Nacho',SHA2('nachopaso',256)),
    ('raul','Raul',SHA2('raulpaso',256)),
    ('luis','Luis',SHA2('luispaso',256)),
    ('arkaitz','Arkaitz',SHA2('arkaitzpaso',256)),
    ('rodrigo','Rodrigo',SHA2('rodrigopaso',256)),
    ('javier','Javier',SHA2('javierpaso',256)),
    ('cristinan','CristinaN',SHA2('cristinaNpaso',256)),
    ('heraclio','Heraclio',SHA2('heracliopaso',256)),
    ('amor','Amor',SHA2('amorpaso',256)),
    ('antonio','Antonio',SHA2('antoniopaso',256)),
    ('leticia','Leticia',SHA2('leticiapaso',256));

-- Creamos el administrador
INSERT INTO T01_Usuario(T01_CodUsuario, T01_DescUsuario, T01_Password, T01_Perfil) VALUES ('admin','admin',SHA2('adminpaso',256), 'administrador');