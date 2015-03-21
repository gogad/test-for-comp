

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_name` text COLLATE utf8_bin NOT NULL,
  `countTh` int(11) NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Структура таблицы `taxrelation`
--

CREATE TABLE IF NOT EXISTS `taxrelation` (
  `stud` int(11) NOT NULL,
  `teach` int(11) NOT NULL,
  PRIMARY KEY (`stud`,`teach`),
  KEY `teach` (`teach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teach_id` int(11) NOT NULL AUTO_INCREMENT,
  `teach_name` text COLLATE utf8_bin NOT NULL,
  `countSt` int(11) NOT NULL,
  PRIMARY KEY (`teach_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `taxrelation`
--
ALTER TABLE `taxrelation`
  ADD CONSTRAINT `taxrelation_ibfk_1` FOREIGN KEY (`stud`) REFERENCES `student` (`stud_id`),
  ADD CONSTRAINT `taxrelation_ibfk_2` FOREIGN KEY (`teach`) REFERENCES `teacher` (`teach_id`);


