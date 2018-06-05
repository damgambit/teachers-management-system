SELECT DISTINCT `orarios`.`id` AS `orario_id`, 
				`orarios`.`giorno`, 
				`descrizione`, 
				`docentes`.`id` AS `docente_id_sos`, 
				`nome` AS `docente_nome`, 
				`cognome` AS `docente_cognome`, 
				
FROM `orarios` INNER JOIN `docentes` 
						ON `orarios`.`docente_id` = `docentes`.`id` 
					INNER JOIN `classes`
							ON `orarios`.`classe_id` = `classes`.`id` 
						INNER JOIN `seziones` 
								ON `classes`.`sezione_id` = `seziones`.`id` 
							INNER JOIN `permessos` 
									ON `permessos`.`docente_id` != `orarios`.`docente_id` 
								INNER JOIN `orarios` AS `o2` 
										ON `o2`.`ora` = `orarios`.`ora` 
											AND `o2`.`giorno` = `orarios`.`giorno` 
									INNER JOIN `sostituziones` 
											ON `sostituziones`.`orario_id` = `o2`.`id` 
												AND `sostituziones`.`docente_id` != `docentes`.`id` 

WHERE `orarios`.`ora` = ? 
		AND `orarios`.`giorno` = ? 
		AND `anno` = ? 
		AND `sigla` = ? 
		AND `permessos`.`giorno` = ? 
		AND `permessos`.`ora` = ? 
		AND `sostituziones`.`date` = ? 

ORDER BY `docentes`.`nome` ASC
