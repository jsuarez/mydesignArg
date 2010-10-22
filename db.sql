-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-10-2010 a las 08:03:57
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydesign_ar`
--
CREATE DATABASE `mydesign_ar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydesign_ar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner_diseniografico`
--

DROP TABLE IF EXISTS `banner_diseniografico`;
CREATE TABLE IF NOT EXISTS `banner_diseniografico` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(2) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `banner_diseniografico`
--

INSERT INTO `banner_diseniografico` (`banner_id`, `codlang`, `image`, `order`) VALUES
(1, 1, 'images/banner_diseniografico/banner1.png', 1),
(2, 1, 'images/banner_diseniografico/banner2.png', 2),
(3, 1, 'images/banner_diseniografico/banner3.png', 3),
(4, 1, 'images/banner_diseniografico/banner4.png', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner_disenioweb`
--

DROP TABLE IF EXISTS `banner_disenioweb`;
CREATE TABLE IF NOT EXISTS `banner_disenioweb` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(2) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `banner_disenioweb`
--

INSERT INTO `banner_disenioweb` (`banner_id`, `codlang`, `image`, `order`) VALUES
(1, 1, 'images/banner_disenioweb/banner1.png', 1),
(2, 1, 'images/banner_disenioweb/banner2.png', 2),
(3, 1, 'images/banner_disenioweb/banner3.png', 3),
(4, 1, 'images/banner_disenioweb/banner4.png', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner_markonline`
--

DROP TABLE IF EXISTS `banner_markonline`;
CREATE TABLE IF NOT EXISTS `banner_markonline` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(2) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `banner_markonline`
--

INSERT INTO `banner_markonline` (`banner_id`, `codlang`, `image`, `order`) VALUES
(1, 1, 'images/banner_markonline/banner1.png', 1),
(2, 1, 'images/banner_markonline/banner2.png', 2),
(3, 1, 'images/banner_markonline/banner3.png', 3),
(4, 1, 'images/banner_markonline/banner4.png', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner_servextra`
--

DROP TABLE IF EXISTS `banner_servextra`;
CREATE TABLE IF NOT EXISTS `banner_servextra` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(2) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `banner_servextra`
--

INSERT INTO `banner_servextra` (`banner_id`, `codlang`, `image`, `order`) VALUES
(1, 1, 'images/banner_servextra/banner1.png', 1),
(2, 1, 'images/banner_servextra/banner2.png', 2),
(3, 1, 'images/banner_servextra/banner3.png', 3),
(4, 1, 'images/banner_servextra/banner4.png', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` varchar(500) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('92505cd8d9cfa22cb624064aa0316141', '192.168.0.3', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) Ap', 1280355419, ''),
('92948fa3c0e88bacd62ae8e65b48a5d9', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux i686; es-AR; rv:1.9.1.9', 1282137332, ''),
('8484963f401de5e176441f0725a0854b', '0.0.0.0', 'Mozilla/5.0 (X11; U; Linux x86_64; es-AR; rv:1.9.2', 1285708146, ''),
('61768dc5f229e6171767c9130fcac970', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux x86_64; es-AR; rv:1.9.2', 1285790447, ''),
('d6866a8c52cee2b0ed44091e87c96e52', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux x86_64; es-AR; rv:1.9.2', 1285999146, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `src` varchar(255) NOT NULL,
  `order` int(3) NOT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `clients`
--

INSERT INTO `clients` (`cliente_id`, `name`, `src`, `order`) VALUES
(1, 'Aikido Argentina', 'images/banner_portfolio/img1.png', 1),
(2, 'Alquileres Temporarios', 'images/banner_portfolio/img2.png', 2),
(3, 'Azer', 'images/banner_portfolio/img3.png', 3),
(4, 'Argentina es Mendoza', 'images/banner_portfolio/img4.png', 4),
(5, 'Consurpyme', 'images/banner_portfolio/img5.png', 5),
(6, 'Federico Azpilcueta', 'images/banner_portfolio/img6.png', 6),
(7, 'FundaProAmbiente', 'images/banner_portfolio/img7.png', 7),
(8, 'FundasDakar', 'images/banner_portfolio/img8.png', 8),
(9, 'Getsouth', 'images/banner_portfolio/img9.png', 9),
(10, 'Greenfields', 'images/banner_portfolio/img10.png', 10),
(11, 'La Primevera', 'images/banner_portfolio/img11.png', 11),
(12, 'L&C', 'images/banner_portfolio/img12.png', 12),
(13, 'Respat S.A.', 'images/banner_portfolio/img13.png', 13),
(14, 'VSI Soluciones', 'images/banner_portfolio/img14.png', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_diseniografico`
--

DROP TABLE IF EXISTS `content_diseniografico`;
CREATE TABLE IF NOT EXISTS `content_diseniografico` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL DEFAULT '1' COMMENT '1=Español, 2=Ingles',
  `name` varchar(100) NOT NULL,
  `content_intro` text NOT NULL,
  `content_full` text NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `order` int(3) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `content_diseniografico`
--

INSERT INTO `content_diseniografico` (`content_id`, `codlang`, `name`, `content_intro`, `content_full`, `thumb`, `order`) VALUES
(1, 1, 'Dise&ntilde;o Logotipo', '<p>El logotipo de su compa&ntilde;&iacute;a ser&aacute; la imagen que lo acompa&ntilde;ar&aacute; durante todo el crecimiento y desarrollo de su empresa</p>', '            <p>El logotipo de su compa&ntilde;&iacute;a ser&aacute; la imagen que lo acompa&ntilde;ar&aacute; durante todo el crecimiento y desarrollo de su empresa. Un dise&ntilde;o de logo adecuado es fundamental para una empresa y para su imagen corporativa.</p>\r\n            <p>El disponer de un dise&ntilde;o de logotipo profesional, reflejar&aacute; tanto su actividad como filosof&iacute;a empresarial, por consiguiente este recaer&aacute; en sus futuros clientes y lograr&aacute; generar una mayor confianza. Los consumidores piensan en la empresa a partir de su logo dado que es en &eacute;ste donde se conjugan los valores, objetivos e ideas de la misma y por ello es imprescindible un desarrollo profesional.</p>\r\n            <p>Con un buen dise&ntilde;o del logo lograra que los posibles clientes identifiquen su empresa del resto de competidores.</p>\r\n', 'images/thumbs_diseniografico/img5.png', 1),
(2, 1, 'Dise&ntilde;o Impresos', '<p>Disponer de un <b>dise&ntilde;o de papeler&iacute;a</b> de calidad, har&aacute; transmitir los valores de su empresa eficazmente</p>', '            <p>Disponer de un <b>dise&ntilde;o de papeler&iacute;a</b> de calidad, har&aacute; transmitir los valores de su empresa eficazmente. De esta modo lograr&aacute; as&iacute; expresar una imagen seria y profesional.</p>\r\n            <p>Su funci&oacute;n principal es transmitir al p&uacute;blico destinatario una informaci&oacute;n determinada, un mensaje claro y directo utilizando diferentes elementos gr&aacute;ficos.</p>\r\n            Nuestro dise&ntilde;o de impresos abarca:<br />\r\n            <ul class="list-item">\r\n                <li>Tarjetas personales.</li>\r\n                <li>Carpetas y sobres.</li>\r\n                <li>Papeles membretados.</li>\r\n                <li>Folletos (flyers, d&iacute;pticos, tripticos).</li>\r\n            </ul>\r\n', 'images/thumbs_diseniografico/img2.png', 2),
(3, 1, 'Dise&ntilde;o Carteler&iacute;a', '<p>Es la cara visible de todo local comercial de vista al publico</p>', '            <p>Es la cara visible de todo local comercial de vista al publico. El objetivo del dise&ntilde;o de carteler&iacute;a es captar mayor atenci&oacute;n logrando que el p&uacute;blico pueda ubicar e identificar con mayor facilidad el local.</p>\r\n            <p>Este dise&ntilde;o ayuda a dar una imagen competitiva en el mercado, diferenci&aacute;ndola del resto y d&aacute;ndole su propia identidad visible de cara al publico.</p>\r\n            <p>Ofrecemos una amplia gama de posibilidades de acuerdo con las necesidades de cada compa&ntilde;&iacute;a y del p&uacute;blico al que se dirige, realizamos trabajos en diferentes tama&ntilde;os y estilos seg&uacute;n las necesidades de su empresa.</p>\r\n', 'images/thumbs_diseniografico/img1.png', 3),
(4, 1, 'Dise&ntilde;o Packaging', '<p>Dise&ntilde;amos packaging para todo tipo de productos</p>', '            <p>Dise&ntilde;amos packaging para todo tipo de productos. Disponer de un buen <b>dise&ntilde;o de packaging</b> de su producto es de vital importancia para aumentar las ventas del mismo.</p>\r\n            <p>Est&aacute; comprobado que renovando el dise&ntilde;o de un producto se podr&aacute; llegar a duplicar las ventas del mismo.</p>\r\n            <p>La imagen de sus productos debe <b>representar la estrategia</b> corporativa de la marca y reflejar el contenido informativo necesario para brindar una <b>imagen impecable</b>, que seduzca, llame la atenci&oacute;n e invite a adquirirlo.</p>\r\n', 'images/thumbs_diseniografico/img4.png', 4),
(5, 1, 'Dise&ntilde;o Publicidad', '<p>Realizamos campa&ntilde;as exitosas que provocan decisiones de compra en el consumidor</p>', '            <p>Realizamos campa&ntilde;as exitosas que provocan decisiones de compra en el consumidor. Ofrecemos servicios de <b>publicidad gr&aacute;fica</b> de forma individualizada o en forma de campa&ntilde;as publicitarias.</p>\r\n            <p>Creamos conceptos creativos con im&aacute;genes impactantes y el uso de las &uacute;ltimas tecnolog&iacute;as y tendencias a fin de alcanzar las mejores soluciones que rentabilicen al m&aacute;ximo las inversiones realizadas por nuestros clientes.</p>\r\n            Nuestro dise&ntilde;o de Publicidad abarca:<br />\r\n            <ul class="list-item">\r\n                <li>Anuncios para revistas.</li>\r\n                <li>Anuncios para prensa diaria o escrita.</li>\r\n                <li>Publicidad directa.</li>\r\n            </ul>\r\n', 'images/thumbs_diseniografico/img3.png', 5),
(6, 1, 'Dise&ntilde;o Multimedia', '<p>El dise&ntilde;o multimedia sirve como una importante herramienta de marketing</p>', '            <p>El dise&ntilde;o multimedia sirve como una importante herramienta de marketing que suma multiples recursos como el dise&ntilde;o, la animaci&oacute;n, el video, la fotograf&iacute;a y hasta la interacci&oacute;n con el cliente.</p>\r\n            Nuestro dise&ntilde;o Multimedia abarca:<br />\r\n            <ul class="list-item">\r\n                <li>Presentaciones multimedia. CD-Roms</li>\r\n                <li>Intros en flash, banners din&aacute;micos.</li>\r\n                <li>Animaciones y tours virtuales.</li>\r\n                <li>Modelado 3D, Realidad virtual</li>\r\n            </ul>\r\n', 'images/thumbs_diseniografico/img6.png', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_disenioweb`
--

DROP TABLE IF EXISTS `content_disenioweb`;
CREATE TABLE IF NOT EXISTS `content_disenioweb` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL DEFAULT '1' COMMENT '1=Español, 2=Ingles',
  `name` varchar(100) NOT NULL,
  `content_intro` text NOT NULL,
  `content_full` text NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `order` int(3) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `content_disenioweb`
--

INSERT INTO `content_disenioweb` (`content_id`, `codlang`, `name`, `content_intro`, `content_full`, `thumb`, `order`) VALUES
(1, 1, 'Web Instituciona', '<p>Para poder insertar su Pyme o simplemente tener su pagina personal. Obteniendo</p>', '<p>Para poder insertar su Pyme o simplemente tener su p&aacute;gina personal. Obteniendo un dise&ntilde;o profesional y permiti&eacute;ndole abrir paso a su negocio en Internet.</p>\r\n<p>Consiste en realizar en forma atractiva una presentaci&oacute;n eficaz de su empresa, de modo que la pagina sirva de toma de contacto a sus clientes a trav&eacute;s de Internet. En ella se podr´n colocar fotos, textos, im´genes y datos de contacto.</p>\r\n<p>Es la opci&oacute;n m&aacute;s usada por las PYMES, que desean tener una presencia en Internet junto con sus direcciones de correo personalizadas para reforzar su imagen ante sus clientes.</p>\r\n<p>Estamos interesados en brindar una soluci&oacute;n para las necesidades de cada cliente. Orientado a nuevos emprendimientos y negocios j&oacute;venes que buscan dar un paso adelante.</p>', 'images/thumbs_disenioweb/img5.png', 1),
(2, 1, 'Web Autoadministrable', '<p>Cuenta con una interfaz para poder modificar el contenido sin causar ning&uacute;n efecto en el dise&ntilde;o</p>', '<p>Cuenta con una interfaz para poder modificar el contenido sin causar ning&uacute;n efecto en el dise&ntilde;o. Permite un f&aacute;cil control y publicaci&oacute;n de los cambios en el sitio.</p>\r\n<p>La combinaci&oacute;n mas potente actualmente en lo que se trata de webs con gran dinamismo y funcionalidad. Es la soluci&oacute;n m&aacute;s pr&aacute;ctica y utilizada hoy en d&iacute;a para la administraci&oacute;n de webs que conllevan actualizaci&oacute;n continua.</p>\r\n<p>El manejo adecuado de la informaci&oacute;n puede marcar la diferencia, un sistema de gesti&oacute;n de contenido (CMS) debe ser f&aacute;cil de mantener y actualizar, nuestro equipo de profesionales dise&ntilde;a y desarrolla estrat&eacute;gicamente los gestores de contenido para que sean escalables, permitiendo as&iacute; su <b>f&aacute;cil modificaci&oacute;n</b> y adaptaci&oacute;n con los requisitos establecidos.</p>\r\n<p>En definitiva, un sitio autoadministrable le permitir&aacute; tener control total de su sitio sin cargo alguno.</p>', 'images/thumbs_disenioweb/img2.png', 2),
(3, 1, 'Web Imobiliaria', '<p>A trav&eacute;s de nuestro sistema <b>Inmobiliario</b> logre una mayor din&aacute;mica en la compra, venta</p>', '        <p>A trav&eacute;s de nuestro sistema <b>Inmobiliario</b> logre una mayor din&aacute;mica en la compra, venta y alquiler de propiedades en Internet.</p>\r\n        <p>Permiti&eacute;ndole llegar al potencial cliente nacional e internacional y acceso permanente e ilimitado a su oferta inmobiliaria, reduciendo considerablemente los costos de operaci&oacute;n.</p>\r\n\r\n        <p>Mejore la relaci&oacute;n con sus clientes, ofreciendo informaci&oacute;n y precios siempre actualizados. Sus inmuebles van a estar disponibles para que todos sus clientes actuales y potenciales puedan consultarlos las 24 horas al d&iacute;a.</p>\r\n        Nuestro sistema inmobiliario incluye:<br />\r\n        <ul class="list-item">\r\n            <li>Todas las funcionalidades del Catalogo de productos.</li>\r\n            <li>Buscador de propiedades por zona/costo/alquiler.</li>\r\n            <li>Administrador web de propiedades y clientes.</li>\r\n            <li>Asignaci&oacute;n de relevancia y destacados.</li>\r\n        </ul>\r\n', 'images/thumbs_disenioweb/img1.png', 3),
(4, 1, 'Cat&aacute;logo de Productos', '<p>Ideal para empresas con una amplia gama de productos o servicios. Este sistema le permitir&aacute; listar detalladamente</p>', '        <p>Ideal para empresas con una amplia gama de productos o servicios. Este sistema le permitir&aacute; listar detalladamente todos sus productos o servicios.</p>\r\n        <p>Un catalogo de productos es la mejor manera de mostrar sus productos en un concepto integral ya que facilitar&aacute; el acceso a sus productos y mejorar&aacute; su imagen como empresa.</p>\r\n        <p>El servicio de cat&aacute;logos online se adapta m&aacute;s a empresas que buscan mostrar su cartera de productos o servicios con el objetivo de informar pero no de realizar la venta v&iacute;a internet.</p>\r\n        Nuestro catalogo incluye:<br />\r\n        <ul class="list-item">\r\n            <li>Administrador web de Cat&aacute;logo y Contenido</li>\r\n            <li>Actualizaciones masivas</li>\r\n            <li>Galer&iacute;a de im&aacute;genes avanzada</li>\r\n            <li>Seguridad, Actualizaci&oacute;n y Soporte</li>\r\n        </ul>\r\n', 'images/thumbs_disenioweb/img4.png', 4),
(5, 1, 'Carrito de Compras', '<p>Venda sus productos a todo el mundo. Nuestra soluci&oacute;n de comercio electr&oacute;nico</p>', '        <p>Venda sus productos a todo el mundo. Nuestra soluci&oacute;n de comercio electr&oacute;nico cuenta con las funcionalidades necesarias para optimizar las ventas y garantizar a los usuarios una compra segura.</p>\r\n        <p>Es una potente y flexible plataforma de comercio electr&oacute;nico que junto a un sistema sencillo de operar con cientos de funcionalidades y todos los servicios necesarios para promover su negocio en Internet haran de su negocio le permitir&aacute;n promocionar su negocio en forma efectiva y econ&oacute;mica</p>\r\n        Nuestro sistema e-commerce incluye:<br />\r\n        <ul class="list-item">\r\n            <li>Todas las funcionalidades del Catalogo de productos.</li>\r\n            <li>C&aacute;lculo autom&aacute;tico de costo y tiempo de env&iacute;o</li>\r\n            <li>Administrador web de clientes y &oacute;rdenes.</li>\r\n            <li>Gr&aacute;ficos de monitoreo en tiempo real (visitas, &oacute;rdenes, etc.).</li>\r\n            <li>Automatizaci&oacute;n de pedidos, descuentos y promociones.</li>\r\n        </ul>\r\n', 'images/thumbs_disenioweb/img3.png', 5),
(6, 1, 'Web Turismo', '<p>Ofrece una soluci&oacute;n absolutamente flexible y escalable</p>', '        <p>Ofrece una soluci&oacute;n absolutamente flexible y escalable. Tanto microempresas o agentes independientes como grandes organizaciones encuentran en &eacute;l, el sistema Web adecuado para la exposici&oacute;n de sus productos a trav&eacute;s de Internet. Desde una peque&ntilde;a cartera de anunciantes hasta una enorme cantidad de categor&iacute;as y destinos.</p>\r\n        <p>Es un sistema concebido con el objetivo de permitir a nuestros clientes la capacidad de contacto r&aacute;pido y directo mediante reservas on line. Desde su panel de control podr&aacute;, de forma interactiva y modificar los contenidos, adem&aacute;s de agregar y editar anunciantes, categor&iacute;as, ubicaciones y destacados.</p>\r\n        El sistema incluye entre otros:<br />\r\n        <ul class="list-item">\r\n            <li>Gesti&oacute;n de anunciantes.</li>\r\n            <li>Gesti&oacute;n de categor&iacute;a y destinos.</li>\r\n            <li>Formulario de reservas personalizable.</li>\r\n            <li>Gesti&oacute;n de publicidades.</li>\r\n            <li>Gesti&oacute;n de idiomas y monedas.</li>\r\n        </ul>\r\n', 'images/thumbs_disenioweb/img6.png', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_markonline`
--

DROP TABLE IF EXISTS `content_markonline`;
CREATE TABLE IF NOT EXISTS `content_markonline` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL DEFAULT '1' COMMENT '1=Español, 2=Ingles',
  `name` varchar(100) NOT NULL,
  `content_intro` text NOT NULL,
  `content_full` text NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `order` int(3) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `content_markonline`
--

INSERT INTO `content_markonline` (`content_id`, `codlang`, `name`, `content_intro`, `content_full`, `thumb`, `order`) VALUES
(1, 1, 'Search Engine Marketing', '<p>Planificaremos y gestionaremos su campa&ntilde;a de publicidad en buscadores mediante el sistema de pago por clic</p>', '            <p>Planificaremos y gestionaremos su campa&ntilde;a de publicidad en buscadores mediante el sistema de pago por clic.</p>\r\n            <p>Podr&aacute; aparecer a la derecha y en recuadro superior a la lista de resultados naturales. Significa estar en las primeras p&aacute;ginas de los buscadores en el listado preferencial de enlaces patrocinados. Esta posici&oacute;n se compra mediante subasta y se paga por cada usuario que usa el enlace o link (Pago por click). Su precio var&iacute;a en funci&oacute;n del criterio de b&uacute;squeda en el que se quiere aparecer y la posici&oacute;n que se quiere obtener.</p>\r\n            Nuestro servicio SEM le proporciona:<br />\r\n            <ul class="list-item">\r\n                <li>Rentabilidad a corto plazo</li>\r\n                <li>Resultados inmediatos</li>\r\n                <li>Alta flexibilidad y visitas de calidad</li>\r\n            </ul>\r\n', 'images/thumbs_markonline/img5.png', 1),
(2, 1, 'Search Engine Optimization', '<p>Aumente el tr&aacute;fico cualificado hacia su web mediante la optimizaci&oacute;n de la estructura y contenidos de la misma</p>', '            <p>Aumente el tr&aacute;fico cualificado hacia su web mediante la <b>optimizaci&oacute;n de la estructura y contenidos</b> de la misma.</p>\r\n            <p>Con nuestras t&eacute;cnicas podemos mejorar notablemente el orden de posici&oacute;n que su empresa obtiene en las b&uacute;squedas org&aacute;nicas hasta hacerla llegar a los primeros puestos.</p>\r\n            <p>Corresponde &uacute;nicamente a los web-sites que el buscador ha seleccionado como objetivamente m&aacute;s adecuados a los criterios de b&uacute;squeda usados. Las posiciones obtenidas siempre son las primeras y el retorno de inversi&oacute;n es muy alto.</p>\r\n            Nuestro servicio SEO le proporciona:<br />\r\n            <ul class="list-item">\r\n                <li>Alta flexibilidad y visitas de calidad</li>\r\n                <li>Incrementar el tr&aacute;fico hacia su web</li>\r\n                <li>Alta en cientos de buscadores</li>\r\n            </ul>\r\n', 'images/thumbs_markonline/img2.png', 2),
(3, 1, 'E-mail Marketing', '<p>Es una poderosa herramienta de marketing directo que permite</p>', '                <p>Es una poderosa herramienta de marketing directo que permite la comunicaci&oacute;n con sus clientes actuales o potenciales mediante el env&iacute;o de e-mails. Adem&aacute;s le brinda la posibilidad de determinar y elegir el target de personas ya sea por pa&iacute;s, idioma, etc.</p>\r\n                <p>De esta manera, la inversi&oacute;n involucra a posibles compradores potenciales y no a terceros sin inter&eacute;s. Tendr&aacute; a su disposici&oacute;n la opci&oacute;n de segmentar su campa&ntilde;a y hacerla mas efectiva.</p>\r\n\r\n                La utilizaci&oacute;n del e-mail marketing le permitir&aacute; a su empresa realizar una comunicaci&oacute;n econ&oacute;mica, r&aacute;pida y sencilla. Ofrecemos:<br />\r\n                <ul class="list-item">\r\n                    <li>Desarrollo de estrategias de e-mail marketing</li>\r\n                    <li>Conformaci&oacute;n de bases de datos a medida</li>\r\n                    <li>Gesti&oacute;n de env&iacute;o</li>\r\n                    <li>Reportes estad&iacute;sticos</li>\r\n                </ul>\r\n', 'images/thumbs_markonline/img1.png', 3),
(4, 1, 'Banners Publicitarios', '<p>Las campa&ntilde;as publicitarias realizadas por Banners se apoyan en todos los medios disponibles</p>', '            <p>Las campa&ntilde;as publicitarias realizadas por Banners se apoyan en todos los medios disponibles. La diversidad de productos al alcance del cliente es muy amplia.</p>\r\n            <p>Un banner es un v&iacute;nculo que trabaja como una herramienta de mercadeo para su empresa, y como una puerta de entrada a su sitio Web. Como una forma de dirigir tr&aacute;fico de calidad hacia su sitio Web, que resultar&aacute; en incrementos en las ventas, entendemos que los banners deben ser atractivos y dar una raz&oacute;n para que les hagan click.</p>\r\n            Para esto ofrecemos:<br />\r\n            <ul class="list-item">\r\n                <li>Dise&ntilde;o orientado a objetivos.</li>\r\n                <li>Gran variedad de estilos.</li>\r\n                <li>Revisiones y conceptos ilimitados.</li>\r\n            </ul>\r\n', 'images/thumbs_markonline/img4.png', 4),
(5, 1, 'Dise&ntilde;o de Newsletters', '<p>El e-mail se ha convertido en un medio muy eficaz para la promoci&oacute;n de productos y servicios</p>', '            <p>El e-mail se ha convertido en un medio muy eficaz para la promoci&oacute;n de productos y servicios de una manera r&aacute;pida y econ&oacute;mica, permitiendo alcanzar con el mensaje publicitario a una audiencia calificada y de manera personalizada.</p>\r\n            <p>Nuestro equipo creativo, trabaja en conjunto para el dise&ntilde;o de publicidades optimizadas para su env&iacute;o por e-mail. Se aprovechan las excelentes capacidades de Internet para presentar copias publicitarias altamente atractivas con el prop&oacute;sito de crear publicidades que induzcan a la interactividad.</p>\r\n            Se realizan dise&ntilde;os de:<br />\r\n            <ul class="list-item">\r\n                <li>Emails publicitarios.</li>\r\n                <li>Cupones o invitaciones.</li>\r\n                <li>Newsletters.</li>\r\n            </ul>\r\n', 'images/thumbs_markonline/img3.png', 5),
(6, 1, 'Marketing Viral', '<p>Mediante una campa&ntilde;a de marketing viral se busca que la misma llegue a la mayor cantidad de usuarios</p>', '            <p>Mediante una campa&ntilde;a de marketing viral se busca que la misma llegue a la mayor cantidad de usuarios posibles. Se lo podr&iacute;a asemejar a un servicio de boca a boca virtual</p>\r\n            <p>Para conseguir este boca a boca hay muchas t&eacute;cnicas, pero la base siempre es la misma, hacer algo llamativo, curioso o interesante que la gente quiera o desee compartir y se lo env&iacute;en los unos a los otros.</p>\r\n            <p>Para eso, ofrecemos la difusi&oacute;n de contenidos (ya sean textos, im&aacute;genes o videos) mediante las distintas plataformas y comunidades 2.0 como facebook, youtube, myspace, sonico y distintos blogs relacionados a cada necesidad.</p>\r\n', 'images/thumbs_markonline/img6.png', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_servextra`
--

DROP TABLE IF EXISTS `content_servextra`;
CREATE TABLE IF NOT EXISTS `content_servextra` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL DEFAULT '1' COMMENT '1=Español, 2=Ingles',
  `name` varchar(100) NOT NULL,
  `content_intro` text NOT NULL,
  `content_full` text NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `order` int(3) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `content_servextra`
--

INSERT INTO `content_servextra` (`content_id`, `codlang`, `name`, `content_intro`, `content_full`, `thumb`, `order`) VALUES
(1, 1, 'Registro de Dominios', '<p>Su dominio ser&aacute; su marca e identidad en el mundo virtual, y como tal, lo llevar&aacute; a identificarse y obtener</p>', '            <p>Su dominio ser&aacute; su marca e identidad en el mundo virtual, y como tal, lo llevar&aacute; a identificarse y obtener un nombre de referencia.</p>\r\n            <p>Lo asesoramos en todo el proceso, desde la identificaci&oacute;n de los mejores nombres para su negocio, hasta la gesti&oacute;n y alta de dominios locales e internacionales en cualquiera de las extensiones utilizadas mundialmente (.com, .net, .info, etc.).</p>\r\n            <p>El &eacute;xito de su estrategia en Internet comienza con la elecci&oacute;n de un buen nombre de dominio. Esto le permitir&aacute; a su empresa generar la identidad necesaria para posicionarse en la red y ser reconocido por los visitantes de todo el mundo.</p>\r\n', 'images/thumbs_servextra/img5.png', 1),
(2, 1, 'Generaci&oacute;n de Contenidos', '<p>Para generar un flujo constante de usuarios, es necesario que la informaci&oacute;n disponible est&eacute; de acuerdo con su imagen</p>', '            <p>Para generar un flujo constante de usuarios, es necesario que la informaci&oacute;n disponible est&eacute; de acuerdo con su imagen y sea actualizada constantemente.</p>\r\n            <p>Si su estructura actual no puede abarcar tener el contenido adecuado y debidamente actualizado le ofrecemos hacernos cargo de la producci&oacute;n de informaci&oacute;n exclusiva para su website, portal o intranet.</p>\r\n            <p>El proceso se inicia con la investigaci&oacute;n de contenidos, para luego desarrollar la clasificaci&oacute;n, redacci&oacute;n, revisi&oacute;n editorial, adaptaci&oacute;n multimedial y publicaci&oacute;n del contenido en el formato digital que usted necesite (texto, imagen, audio y animaci&oacute;n), bajo un componente hipertextual.</p>\r\n', 'images/thumbs_servextra/img2.png', 2),
(3, 1, 'Servicio de Traducci&oacute;n', '<p>Es una soluci&oacute;n especial para quien est&aacute; pensando en expandir su propuesta comercial y promocionar</p>', '            <p>Es una soluci&oacute;n especial para quien est&aacute; pensando en expandir su propuesta comercial y promocionar sus productos y servicios en el mercado internacional.</p>\r\n            <p>De esta manera, la inversi&oacute;n involucra a posibles compradores potenciales y no a terceros sin inter&eacute;s. Tendra a su disposici&oacute;n la opci&oacute;n de segmentar su campa&ntilde;a y hacerla mas efectiva.</p>\r\n            <p>Si su p&aacute;gina web no est&aacute; en diferentes idiomas, quedar&aacute; acotada a la regi&oacute;n de la lengua en la cual ha sido redactada. La traducci&oacute;n de un sitio web implica precisi&oacute;n, conocimientos culturales especializados y un elevado nivel de organizaci&oacute;n.</p>\r\n            Poniendo especial atenci&oacute;n en:<br />\r\n            <ul class="list-item">\r\n                <li>El mensaje y la forma en que se transmite</li>\r\n                <li>Interpretaci&oacute;n del contenido.</li>\r\n                <li>Revisi&oacute;n de la traducci&oacute;n y de sintaxis.</li>\r\n            </ul>\r\n', 'images/thumbs_servextra/img1.png', 3),
(4, 1, 'Dise&ntilde;o de Blogs', '<p>Los blogs se presentan hoy en d&iacute;a como un canal publicitario ideal, debido a su fuerte presencia en Internet</p>', '            <p>Los blogs se presentan hoy en d&iacute;a como un canal publicitario ideal, debido a su fuerte presencia en Internet. Ofrecemos la posibilidad de generar nuevos enlaces comerciales y negocios en este fascinante medio de comunicaci&oacute;n.</p>\r\n            <p>Un Blog es la herramienta de marketing m&aacute;s econ&oacute;mica, r&aacute;pida y f&aacute;cil de utilizar. Le permitir&aacute; subir fotos, videos, crear un nuevo canal de comunicaci&oacute;n con proveedores, clientes, no clientes, incluso con sus empleados mediante la generaci&oacute;n de boletines internos.</p>\r\n            <p>Permite dar a conocer las novedades de la empresa, nuevos productos, nuevas promociones, descuentos, sorteos, etc. Es sin duda canal de comunicaci&oacute;n m&aacute;s r&aacute;pido que existe.</p>\r\n', 'images/thumbs_servextra/img4.png', 4),
(5, 1, 'Redise&ntilde;o Web', '<p>Los blogs se presentan hoy en d&iacute;a como un canal publicitario ideal, debido a su fuerte presencia en Internet</p>', '            <p>Los blogs se presentan hoy en d&iacute;a como un canal publicitario ideal, debido a su fuerte presencia en Internet. Ofrecemos la posibilidad de generar nuevos enlaces comerciales y negocios en este fascinante medio de comunicaci&oacute;n.</p>\r\n            <p>Un Blog es la herramienta de marketing m&aacute;s econ&oacute;mica, r&aacute;pida y f&aacute;cil de utilizar. Le permitir&aacute; subir fotos, videos, crear un nuevo canal de comunicaci&oacute;n con proveedores, clientes, no clientes, incluso con sus empleados mediante la generaci&oacute;n de boletines internos.</p>\r\n            <p>Permite dar a conocer las novedades de la empresa, nuevos productos, nuevas promociones, descuentos, sorteos, etc. Es sin duda canal de comunicaci&oacute;n m&aacute;s r&aacute;pido que existe.</p>\r\n', 'images/thumbs_servextra/img3.png', 5),
(6, 1, 'Mantenimiento Web', '<p>Podemos dar una respuesta en 24/48 horas a todos los cambios o modificaciones que nos son requeridos</p>', '            <p>Podemos dar una respuesta en 24/48 horas a todos los cambios o modificaciones que nos son requeridos. Teniendo en cuenta la diversidad de sistemas, estructuras y modelos de desarrollo existentes.</p>\r\n            <p>Se debe tener en cuenta la importancia del mantenimiento web. La constante evoluci&oacute;n de las tecnolog&iacute;as web, junto con la din&aacute;mica propia de los negocios, hace dif&iacute;cil imaginar que una web pueda permanecer sin cambios durante largos periodos de tiempos.</p>\r\n            <p>Nos encargamos de actualizar su Sitio Web con la frecuencia que sea necesaria, y lo podemos asesorar sobre el sistema de mantenimiento m&aacute;s apropiado para el Sitio Web de su empresa.</p>\r\n', 'images/thumbs_servextra/img6.png', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE IF NOT EXISTS `portfolio` (
  `portfolio_id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name_link` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `order` int(3) NOT NULL,
  PRIMARY KEY (`portfolio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcar la base de datos para la tabla `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `src`, `alt`, `title`, `name_link`, `link`, `order`) VALUES
(1, 'images/portfolio/img1.jpg', '', '', 'www.azerconsultores.com', 'http://www.azerconsultores.com', 1),
(2, 'images/portfolio/img2.jpg', '', '', 'www.consurpyme.com.ar', 'http://www.consurpyme.com.ar', 2),
(3, 'images/portfolio/img3.jpg', '', '', 'www.argentinaesmendoza.com.ar', 'http://www.argentinaesmendoza.com.ar', 3),
(4, 'images/portfolio/img4.jpg', '', '', 'www.aikidoargentina.com', 'http://www.aikidoargentina.com', 4),
(6, 'images/portfolio/img5.jpg', '', '', 'www.alquilerestemporarios.org', 'http://www.alquilerestemporarios.org', 6),
(7, 'images/portfolio/img6.jpg', '', '', 'www.b-tbrokers.com', 'http://www.b-tbrokers.com', 7),
(8, 'images/portfolio/img8.jpg', '', '', 'www.fundaproambiente.org.ar', 'http://www.fundaproambiente.org.ar/', 8),
(10, 'images/portfolio/img10.jpg', '', '', 'www.getsouth.com', 'http://www.getsouth.com/', 10),
(11, 'images/portfolio/img11.jpg', '', '', 'www.hinundwegfuerargentinien.com', 'htttp://www.hinundwegfuerargentinien.com', 11),
(12, 'images/portfolio/img12.jpg', '', '', 'www.i-sim.com.ar', 'http://www.i-sim.com.ar/', 12),
(13, 'images/portfolio/img13.jpg', '', '', 'www.lycconsultora.com.ar', 'http://www.lycconsultora.com.ar/', 13),
(14, 'images/portfolio/img14.jpg', '', '', 'www.respat.com.ar', 'http://www.respat.com.ar/', 14),
(15, 'images/portfolio/img15.jpg', '', '', 'www.sopbahiablanca.com.ar', 'http://www.sopbahiablanca.com.ar/', 15),
(16, 'images/portfolio/img16.jpg', '', '', 'www.fyatour.com.ar', 'http://fyatour.com.ar/', 16),
(17, 'images/portfolio/img17.jpg', '', '', 'www.vsisoluciones.com.ar', 'http://www.vsisoluciones.com.ar/', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` char(30) DEFAULT NULL,
  `phone_area` char(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `fondo` int(6) NOT NULL DEFAULT '0',
  `token` char(23) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '0' COMMENT '0=User, 1=Admin',
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `users`
--

