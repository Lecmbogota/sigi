DELETE t1 FROM ee_carga t1 INNER JOIN ee_carga t2 WHERE t1.id_carga > t2.id_carga AND t1.ee_id = t2.ee_id and t1.ee_estudio = t2.ee_estudio;
UPDATE ee_carga INNER JOIN usuarios ON ee_carga.ee_encuestador = usuarios.usr_rotator SET ee_carga.ee_encuestador = CONCAT(usuarios.nombre," ",usuarios.apellidos);
INSERT INTO productividad(agente_prod,estudio_prod,fecha_prod,enc_realizadas_prod) SELECT ee_encuestador,ee_estudio,ee_fecha, SUM(ee_estatus) FROM ee_carga WHERE ee_estatus = 1 GROUP BY ee_estudio, ee_encuestador, ee_fecha;
UPDATE productividad SET productividad.total_horas_trabajadas_prod = (SELECT (TIMEDIFF(`hora_fin_prod`,`hora_ini_prod`)/10000)) WHERE  hora_fin_prod >  "00:00:00";
UPDATE productividad INNER JOIN asignacionestudio ON productividad.agente_prod = asignacionestudio.agente_asig AND productividad.fecha_prod = asignacionestudio.fecha_asig SET productividad.hora_ini_prod = asignacionestudio.hora_asig;
UPDATE productividad INNER JOIN asignacionestudio ON productividad.agente_prod = asignacionestudio.agente_asig AND productividad.fecha_prod = asignacionestudio.fecha_asig SET productividad.hora_fin_prod = asignacionestudio.hora_fin_asig;
UPDATE productividad SET `total_horas_trabajadas_prod`= (SELECT (FORMAT(`total_horas_trabajadas_prod`, 1)));
UPDATE productividad INNER JOIN estudios ON productividad.estudio_prod = estudios.Estudio SET productividad.meta_prod = estudios.TME*productividad.total_horas_trabajadas_prod, productividad.porcentaje_prod = ((productividad.enc_realizadas_prod/productividad.meta_prod)*100);
UPDATE productividad SET porcentaje_prod= (SELECT (FORMAT(porcentaje_prod, 0)));
DELETE t1 FROM productividad t1 INNER JOIN productividad t2 WHERE t1.id_productividad  > t2.id_productividad AND t1.estudio_prod = t2.estudio_prod and t1.fecha_prod = t2.fecha_prod AND t1.agente_prod = t2.agente_prod;


DELIMITER //

CREATE EVENT Actualizar_Productividad_1_Segundo
ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 MINUTE
DO
BEGIN
DELETE t1 FROM ee_carga t1 INNER JOIN ee_carga t2 WHERE t1.id_carga > t2.id_carga AND t1.ee_id = t2.ee_id and t1.ee_estudio = t2.ee_estudio;
UPDATE ee_carga INNER JOIN usuarios ON ee_carga.ee_encuestador = usuarios.usr_rotator SET ee_carga.ee_encuestador = CONCAT(usuarios.nombre," ",usuarios.apellidos);
INSERT INTO productividad(agente_prod,estudio_prod,fecha_prod,enc_realizadas_prod) SELECT ee_encuestador,ee_estudio,ee_fecha, SUM(ee_estatus) FROM ee_carga WHERE ee_estatus = 1 GROUP BY ee_estudio, ee_encuestador, ee_fecha;
UPDATE productividad SET productividad.total_horas_trabajadas_prod = (SELECT (TIMEDIFF(`hora_fin_prod`,`hora_ini_prod`)/10000)) WHERE  hora_fin_prod >  "00:00:00";
UPDATE productividad INNER JOIN asignacionestudio ON productividad.agente_prod = asignacionestudio.agente_asig AND productividad.fecha_prod = asignacionestudio.fecha_asig SET productividad.hora_ini_prod = asignacionestudio.hora_asig;
UPDATE productividad INNER JOIN asignacionestudio ON productividad.agente_prod = asignacionestudio.agente_asig AND productividad.fecha_prod = asignacionestudio.fecha_asig SET productividad.hora_fin_prod = asignacionestudio.hora_fin_asig;
UPDATE productividad SET `total_horas_trabajadas_prod`= (SELECT (FORMAT(`total_horas_trabajadas_prod`, 1)));
UPDATE productividad INNER JOIN estudios ON productividad.estudio_prod = estudios.Estudio SET productividad.meta_prod = estudios.TME*productividad.total_horas_trabajadas_prod, productividad.porcentaje_prod = ((productividad.enc_realizadas_prod/productividad.meta_prod)*100);
UPDATE productividad SET porcentaje_prod= (SELECT (FORMAT(porcentaje_prod, 0)));
DELETE t1 FROM productividad t1 INNER JOIN productividad t2 WHERE t1.id_productividad  > t2.id_productividad AND t1.estudio_prod = t2.estudio_prod and t1.fecha_prod = t2.fecha_prod AND t1.agente_prod = t2.agente_prod;
END //

DELIMITER ;


//crear disparadores o triggers


DELIMITER |

CREATE TRIGGER testref BEFORE INSERT ON test1
  FOR EACH ROW
  
  BEGIN
    UPDATE productividad SET productividad.total_horas_trabajadas_prod = (SELECT (TIMEDIFF(`hora_fin_prod`,`hora_ini_prod`)/10000)) WHERE  hora_fin_prod >  "00:00:00";
UPDATE productividad INNER JOIN asignacionestudio ON productividad.agente_prod = asignacionestudio.agente_asig AND productividad.fecha_prod = asignacionestudio.fecha_asig SET productividad.hora_ini_prod = asignacionestudio.hora_asig;
UPDATE productividad INNER JOIN asignacionestudio ON productividad.agente_prod = asignacionestudio.agente_asig AND productividad.fecha_prod = asignacionestudio.fecha_asig SET productividad.hora_fin_prod = asignacionestudio.hora_fin_asig;
UPDATE productividad SET `total_horas_trabajadas_prod`= (SELECT (FORMAT(`total_horas_trabajadas_prod`, 1)));
UPDATE productividad INNER JOIN estudios ON productividad.estudio_prod = estudios.Estudio SET productividad.meta_prod = estudios.TME*productividad.total_horas_trabajadas_prod, productividad.porcentaje_prod = ((productividad.enc_realizadas_prod/productividad.meta_prod)*100);
UPDATE productividad SET porcentaje_prod= (SELECT (FORMAT(porcentaje_prod, 0)));
DELETE t1 FROM productividad t1 INNER JOIN productividad t2 WHERE t1.id_productividad  > t2.id_productividad AND t1.estudio_prod = t2.estudio_prod and t1.fecha_prod = t2.fecha_prod AND t1.agente_prod = t2.agente_prod;
  END
|

DELIMITER ;