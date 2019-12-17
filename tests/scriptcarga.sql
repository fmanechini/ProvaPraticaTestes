DELIMITER //
CREATE PROCEDURE addcolecionavel (limite INT)
BEGIN
DECLARE contador INT DEFAULT 0 ;
DECLARE soma INT DEFAULT 0 ;
loop_teste: LOOP
    SET contador = contador + 1;
    INSERT INTO `cadastro`.`colecionavel` (nome,tipo,tempo,id_colecionador,detalhes,quantidade) values ('camiseta', 'Camiseta', 10, 1, 'detalhes', 5);
    IF contador >= limite THEN
        LEAVE loop_teste;
    END IF;
END LOOP loop_teste;
END//
DELIMITER ;

call addcolecionavel(10000);

select * from colecionavel limit 0,10000;