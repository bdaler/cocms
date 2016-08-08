-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 08 2016 г., 11:27
-- Версия сервера: 5.5.44
-- Версия PHP: 5.5.36-1~dotdeb+7.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `categoria`
--

INSERT INTO `categoria` (`id`, `name`, `parent_id`, `url`) VALUES
(1, 'Категория 1', 0, 'kategoriya-1'),
(2, 'Категория 2', 0, 'kategoriya-2'),
(3, 'Категория 3', 1, 'kategoriya-3'),
(4, 'Категория 4', 0, 'kategoriya-4'),
(5, 'Categoria 5', 0, 'categoria-5'),
(6, 'Categoria 6', 0, 'categoria-6');

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `url` varchar(512) NOT NULL,
  `text` text NOT NULL,
  `menu_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `author` varchar(256) NOT NULL DEFAULT 'admin',
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `title`, `url`, `text`, `menu_id`, `categoria_id`, `status`, `author`, `keywords`, `description`, `added_date`) VALUES
(1, 'Биржа копирайтинга TEXT.RU', 'birzha-kopirajtinga-text-ru', '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial,sans-serif">Это достойный заработок для копирайтеров и возможность заказать текст у профессиональных авторов. Здесь вы можете реализовать свой творческий потенциал или приобрести уникальные статьи для нужд своего сайта.</span></p>\r\n', 2, 2, 1, 'Mint Jon', 'биржа text.ru', 'Это достойный заработок для копирайтеров и возможность заказать текст у профессиональных авторов.', '2016-07-14 10:34:23'),
(2, 'Сколько стоит заказать копирайтинг текста?', 'skolko-stoit-zakazat-kopirajting-teksta-', '<p>Наша биржа является гарантом сделки между заказчиком и исполнителем при заказе уникального контента. У нас на сайте работает множество исполнителей, и у всех свои расценки. В среднем копирайтинг стоит от 60,00 до 100,00 рублей за 1000 знаков с пробелами. Исполнители с небольшим опытом в написании текстов иногда согласны выполнить заказ и за меньшую сумму.</p>\r\n\r\n<p>Вы можете создать заказ без указания цены, тогда на него будут откликаться многие исполнители и предлагать свою цену за выполнение работы по заказу. Вам останется лишь выбрать исполнителя с оптимальной стоимостью работы, ориентируясь при этом на количество положительных отзывов и рейтинг исполнителя.</p>\r\n', 6, 1, 1, 'Mint Jon', 'уникального контента сайте', 'Наша биржа является гарантом сделки между заказчиком и исполнителем при заказе уникального контента', '2016-05-14 16:16:33'),
(3, 'Сколько времени займет написание текста?', 'skolko-vremeni-zajmet-napisanie-teksta-', '', 4, 1, 1, 'Mint Jon', 'создании заказа Исполнители', 'Время сдачи работы устанавливает сам заказчик при создании заказа.', '2016-05-14 16:14:17'),
(4, 'По каким критериям выбирать исполнителя для выполнения заказа?', 'po-kakim-kriteriyam-vybirat-ispolnitelya-dlya-vypolneniya-zakaza-', '<p>При выборе исполнителя вы можете ориентироваться на:</p>\r\n\r\n<ul>\r\n	<li><strong>Рейтинг исполнителя.</strong>&nbsp;Высокий рейтинг говорит о большом опыте работы исполнителя на нашем сервисе и значительном количестве хорошо выполненных заказов. Исполнители с высоким рейтингом выполняют работу качественно и в срок.</li>\r\n	<li><strong>Отзывы</strong>&nbsp;в его профиле, положительную или отрицательную оценку других заказчиков.</li>\r\n	<li><strong>Профиль исполнителя.</strong>&nbsp;В нем обычно описывается опыт работы и предпочитаемые исполнителем темы, а также могут содержаться ссылки на выполненные работы.</li>\r\n</ul>\r\n', 6, 3, 1, 'macBook', 'ориентироваться', 'При выборе исполнителя вы можете ориентироваться на:', '2016-05-11 12:32:27'),
(5, 'Как сделать заказ на написание текстов?', 'kak-sdelat-zakaz-na-napisanie-tekstov-', '<p>&nbsp;</p>\r\n\r\n<div class="exch-description-block-left exch-description-block-left-2" style="height: 156px; width: 150px; background-image: url(http://text.ru/images/exchange/description/img-2.png); background-attachment: scroll; background-color: transparent; color: rgb(0, 0, 0); font-family: Tahoma, Arial, sans-serif; font-size: 12px; float: right !important; background-position: 50% 0%; background-repeat: no-repeat no-repeat;">&nbsp;</div>\r\n\r\n<p>Заказать копирайтинг текста легко и удобно. Процесс выглядит так:</p>\r\n\r\n<ul>\r\n	<li><strong>Публикация заказа.</strong>&nbsp;Это возможно сделать даже при нулевом балансе. Вы можете выбрать фиксированную стоимость заказа или ждать предложений цены от исполнителей.</li>\r\n	<li><strong>Выбор исполнителя.</strong>&nbsp;Многие оставят отклики на ваш заказ, сигнализирующие о готовности работать, вам останется только выбрать подходящего исполнителя. Вам будет предложено пополнить баланс на сумму заказа, если у вас нет средств на счету.</li>\r\n	<li><strong>Получение готового текста.</strong>&nbsp;Исполнитель присылает вам работу через сервис. Если вы довольны работой, то принимаете ее и средства начисляются исполнителю, если же работа вас не устраивает, вы можете вернуть ее на доработку исполнителю или подать жалобу в Арбитраж. При нарушении срока сдачи работы (дедлайна), вы вправе отказаться от исполнителя, в этом случае на ваш счет вернутся средства.</li>\r\n</ul>\r\n', 8, 3, 1, 'BDaler', 'Публикация', 'Заказать копирайтинг текста легко и удобно. Процесс выглядит так:', '2016-05-11 12:33:02'),
(6, 'Что означает рейтинг заказчика?', 'chto-oznachaet-rejting-zakazchika-', '<p>&nbsp;</p>\r\n\r\n<div class="exch-description-block-left exch-description-block-left-5" style="height: 156px; width: 150px; background-image: url(http://text.ru/images/exchange/description/img-5.png); background-attachment: scroll; background-color: transparent; color: rgb(0, 0, 0); font-family: Tahoma, Arial, sans-serif; font-size: 12px; float: right !important; background-position: 50% 0%; background-repeat: no-repeat no-repeat;">&nbsp;</div>\r\n\r\n<p>Рейтинг повышается при оплате заказов, покупке текстов и пополнении баланса. Высокий рейтинг заказчика сигнализирует о его надежности и большом числе оплаченных заказов, а также дает массу привилегий: снижается комиссия при заказе текстов, увеличивается доверие со стороны исполнителей и спрос на опубликованные заказы</p>\r\n', 8, 6, 1, 'Mint Jon', 'рейтинг', 'Что означает рейтинг заказчика?', '2016-05-11 12:33:29'),
(7, 'Может ли исполнитель получить деньги и не сделать мой заказ?', 'mozhet-li-ispolnitel-poluchit-dengi-i-ne-sdelat-moj-zakaz-', '<p>Подобное исключено. Средства за заказ перечисляются исполнителю только в момент принятия его работы заказчиком, т. е. вы лично должны подтвердить, что работа вас устраивает. Если исполнитель не прислал работу в срок, от него можно отказаться и вернуть средства за заказ, а затем выбрать на него другого исполнителя.</p>\r\n', 8, 4, 3, 'Mint Jon', 'заказчиком', 'Может ли исполнитель получить деньги и не сделать мой заказ?', '2016-05-14 16:29:12'),
(8, 'Что делать, если присланный исполнителем текст меня не устраивает?', 'chto-delat-esli-prislannyj-ispolnitelem-tekst-menya-ne-ustraivaet-', '<p>Если вас не устраивает присланная исполнителем работа, вы можете отправить ее на доработку исполнителю либо подать жалобу во внутренний Арбитраж TEXT.RU. При одобрении вашей жалобы средства за заказ возвращаются на ваш счет.</p>\r\n', 8, 5, 2, 'Mint Jon', 'подать', 'Что делать, если присланный исполнителем текст меня не устраивает?', '2016-05-14 16:22:01');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `url` varchar(256) NOT NULL DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent_id`, `url`) VALUES
(1, 'SEO', 0, 'seo'),
(2, 'Tools', 1, 'tools'),
(3, 'Configs', 0, 'configs'),
(4, 'Support', 0, 'support'),
(6, 'urlSettings', 3, 'urlsettings'),
(8, 'Help', 0, 'help');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `site_name` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `site_state` int(1) NOT NULL,
  `description` text,
  `keywords` text,
  `copyright` text,
  `robots` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`site_name`, `message`, `site_state`, `description`, `keywords`, `copyright`, `robots`) VALUES
('Blog', 'Sorry. Site currently off.  Come back soon.', 1, 'Blog about CodeIgniter', 'Blog, CodeIgniter', 'BDaler', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `passconfirm` varchar(256) NOT NULL,
  `state` int(2) NOT NULL,
  `added_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `passconfirm`, `state`, `added_date`) VALUES
(2, 'Mac@book.air', 'macBook', 'bddbdf40a996591d792ef2691fb73242', 'bddbdf40a996591d792ef2691fb73242', 0, '0000-00-00'),
(3, 'linux@mint.ru', 'Mint Jon', 'b93db181383a7ff776634df0f147c7fd', 'b93db181383a7ff776634df0f147c7fd', 1, '2016-05-01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
