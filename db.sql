-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2010 a las 21:23:28
-- Versión del servidor: 5.1.49
-- Versión de PHP: 5.3.3-1ubuntu9.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydesign_ar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `banners_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`banners_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `banners`
--

INSERT INTO `banners` (`banners_id`, `codlang`, `reference`, `image`, `order`) VALUES
(1, 1, 'disenio_web', 'disenio_web/disenoweb-01.jpg', 1),
(2, 1, 'disenio_web', 'disenio_web/disenoweb-02.jpg', 2),
(3, 1, 'disenio_web', 'disenio_web/disenoweb-03.jpg', 3),
(4, 1, 'disenio_web', 'disenio_web/disenoweb-04.jpg', 4),
(5, 1, 'disenio_web', 'disenio_web/disenoweb-05.jpg', 5),
(6, 1, 'disenio_grafico', 'disenio_grafico/diseno-grafico-01.jpg', 1),
(7, 1, 'disenio_grafico', 'disenio_grafico/diseno-grafico-02.jpg', 2),
(8, 1, 'disenio_grafico', 'disenio_grafico/diseno-grafico-03.jpg', 3),
(9, 1, 'disenio_grafico', 'disenio_grafico/diseno-grafico-04.jpg', 4),
(10, 1, 'marketing_online', 'marketing_online/marketing-01.jpg', 1),
(11, 1, 'marketing_online', 'marketing_online/marketing-02.jpg', 2),
(12, 1, 'marketing_online', 'marketing_online/marketing-03.jpg', 3),
(13, 1, 'marketing_online', 'marketing_online/marketing-04.jpg', 4);

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
('95bc5fbcb29b50b25e154b1b36d33880', '192.168.1.23', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', 1290464928, ''),
('8f7f20c6feb9e9e66650c1922f3cb88e', '192.168.1.23', 'Mozilla/5.0 (X11; U; Linux x86_64; es-AR; rv:1.9.2', 1290467330, ''),
('c10d5c36b413b54a494b63019fde2a43', '192.168.1.23', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWeb', 1290465038, ''),
('2fa67cc534be3e1bf298ea1dd63554f1', '192.168.1.23', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1;', 1290465459, ''),
('1cad1c4efac9f2a2b57abba6cd97b5ee', '192.168.1.23', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1;', 1290465694, ''),
('cd41aab521fd567b1e64e23d41e04e17', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux x86_64; es-AR; rv:1.9.2', 1290467407, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date_added` char(10) NOT NULL,
  `last_modified` char(10) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `contents`
--

INSERT INTO `contents` (`content_id`, `reference`, `title`, `content`, `date_added`, `last_modified`) VALUES
(7, 'empresa', 'Empresa', '<h3 class="title2">Nuestra Empresa</h3>\n<p>Somos un grupo de <strong>dise&ntilde;adores web y desarrolladores</strong>, que con el paso del tiempo fueron tomando la experiencia necesaria y conociendo las herramientas mas fascinantes para formar hoy una de las mejores empresas en el rubro.</p>\n<p>Contamos con profesionales en las &aacute;reas de <strong>dise&ntilde;o web, programaci&oacute;n</strong> y <strong>publicidad</strong> volcada a internet (<strong>SEO</strong>).Capacitados para brindarle a usted y a su compa&ntilde;ia los mejores servicios.</p>\n<p>P&oacute;ngase en contacto con nosotros y lo asesoraremos sobre la desici&oacute;n mas adecuada para su compa&ntilde;&iacute;a.</p>\n<h3 class="title2">Nuestra Misi&oacute;n</h3>\n<p>Realizar <strong>dise&ntilde;os web a medida</strong> utilizando tecnolog&iacute;a de vanguardia y brindando la mejor calidad en servicios en internet. Conectando arte y emociones para darle los resultados esperados.</p>\n<strong>Nuestro progreso es el suyo:</strong><br />\n<p>Hoy en d&iacute;a, orgullosamente podemos afirmar que somos la empresa Argentina de dise&ntilde;o web mejor valorada por los clientes que nos contratan.</p>\n<p>Este reconocimiento nos ha brindado la posibilidad de ampliar el alcance de nuestros servicios a empresas y profesionales de pa&iacute;ses como Espa&ntilde;a, M&eacute;xico, Venezuela, Chile, USA y otros paises. Realizando <strong>trabajos tercerizados y dise&ntilde;os web completos</strong>.</p>', '1286420400', '1289185200'),
(8, 'preguntas-frecuentes', 'Preguntas frecuentes', '<ul class="list-faq">\r\n    <li>\r\n        <span>1.</span>\r\n        <div class="span-15">\r\n            <a href="#res1" onclick="ShowHide(this); return false">¿Qui&eacute;n aporta el <b>contenido</b> de la p&aacute;gina web?</a>\r\n            <div id="res1">\r\n                Todos los contenidos de la web, tanto los textos como algunas im&aacute;genes son aportados por el cliente.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>2.</span>\r\n        <div class="span-15">\r\n            <a href="#res2" onclick="ShowHide(this); return false">¿Cu&aacute;les son las distintas <b>etapas</b> del proceso de <b>dise&ntilde;o</b> de una web?</a>\r\n            <div id="res2">\r\n                <p>Las distintas etapas de como trabajamos a la hora de realizar una p&aacute;gina web:</p>\r\n                En el proceso del desarrollo de la web pasaremos por las siguientes fases:<br />\r\n                <ul>\r\n                    <li>Primer Contacto.</li>\r\n                    <li>Presupuesto</li>\r\n                    <li>Dise&ntilde;o y Maquetaci&oacute;n</li>\r\n                    <li>Desarrollo y Programaci&oacute;n</li>\r\n                    <li>Pruebas</li>\r\n                    <li>Publicaci&oacute;n en Internet</li>\r\n                </ul>\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>3.</span>\r\n        <div class="span-15">\r\n            <a href="#res3" onclick="ShowHide(this); return false">¿C&oacute;mo ser&iacute;a la <b>forma de pago</b> de un proyecto web?</a>\r\n            <div id="res3">\r\n                Si acepta nuestro presupuesto se deber&aacute; abonar el 50% por adelantado y el resto al finalizar el proyecto.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>4.</span>\r\n        <div class="span-15">\r\n            <a href="#res4" onclick="ShowHide(this); return false">¿Ustedes proveen del servicio de <b>hospedaje web</b>?</a>\r\n            <div id="res4">\r\n                Si, nosotros proveemos servicio de hosting en servidores linux 99.9 % uptime.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>5.</span>\r\n        <div class="span-15">\r\n            <a href="#res5" onclick="ShowHide(this); return false">¿Qu&eacute; es <b>FLASH</b>?</a>\r\n            <div id="res5">\r\n                Flash es un programa vectorial para realizar efectos visuales que se suelen utilizar en animaciones, banner, etc. Hace un par de a&ntilde;os estaban muy de moda las p&aacute;ginas hechas en Flash, actualmente no tanto ya que las p&aacute;ginas realizadas en Flash no son bien indexadas por los buscadores.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>6.</span>\r\n        <div class="span-15">\r\n            <a href="#res6" onclick="ShowHide(this); return false">Actualizo mi p&aacute;gina frecuentemente y me sale muy caro actualizarla. ¿Habr&iacute;a alguna forma de <b>ahorrar costes</b>?</a>\r\n            <div id="res6">\r\n                Si, efectivamente, se podr&iacute;a desarrollar un gestor de contenidos.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>7.</span>\r\n        <div class="span-15">\r\n            <a href="#res7" onclick="ShowHide(this); return false">¿Qu&eacute; es un <b>sitio web</b>?</a>\r\n            <div id="res7">\r\n                Un sitio web es b&aacute;sicamente un conjunto organizado y coherente de diversas p&aacute;ginas web (generalmente archivos en formato html, php, cgi, etc.) y otros archivos, ya sean gr&aacute;ficos, animaciones, sonidos, etc. A trav&eacute;s de un sitio web podemos ofrecer, informar, publicitar o vender, productos y servicios.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>8.</span>\r\n        <div class="span-15">\r\n            <a href="#res8" onclick="ShowHide(this); return false">¿Cu&aacute;nto <b>cuesta</b> una p&aacute;gina web?</a>\r\n            <div id="res8">\r\n                Todo depender&aacute; de su plan de negocios y hasta donde quiera llegar, adem&aacute;s no todas las p&aacute;ginas web son iguales, unas llevan una serie de funcionalidades que en otras no serian &uacute;tiles, si est&aacute; pensando en hacer una, nosotros le podremos preparar un presupuesto que se ajuste a sus necesidades.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>9.</span>\r\n        <div class="span-15">\r\n            <a href="#res9" onclick="ShowHide(this); return false">¿En cuanto <b>tiempo</b> desarrollan mi web?</a>\r\n            <div id="res9">\r\n                Es muy dif&iacute;cil determinar con precisi&oacute;n el tiempo necesario para el desarrollo de un sitio web. Influyen una serie de causas como pueden ser:\r\n                <ul>\r\n                    <li>Lo claras que tenga sus ideas de la web.</li>\r\n                    <li>El alcance y complejidad del sitio web.</li>\r\n                    <li>Los contenidos que se van a incluir.</li>\r\n                    <li>Los contenidos que se van a incluir.</li>\r\n                    <li>La traducci&oacute;n a otros idiomas si se requiere</li>\r\n                </ul>\r\n                <p>De todas formas y dependiendo de la complejidad del mismo, el tiempo de desarrollo de un sitio web puede estar entre 1 semana hasta 6 meses o m&aacute;s, normalmente este tiempo esta entre 1 y 6 semanas.</p>\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>10.</span>\r\n        <div class="span-15">\r\n            <a href="#res10" onclick="ShowHide(this); return false">¿Qu&eacute; son los <b>formularios</b>?</a>\r\n            <div id="res10">\r\n                Los formularios permiten interactuar con los usuarios de nuestro sitio web. Son empleados muchas veces para recabar informaci&oacute;n de contacto. Cuando se recaban otros tipo de datos confidenciales (cuenta bancaria, etc...) solamente se deben poner en un formulario si son imprescindibles y disponer de una conexi&oacute;n segura (SSL u otros).\r\n            </div>            \r\n        </div>\r\n    </li>\r\n</ul>', '1286420400', '1286420400'),
(9, 'politicas-de-privacidad', 'Pol&iacute;ticas de Privacidad', '', '1286420400', '1286420400'),
(10, 'terminos-y-condiciones', 'T&eacute;rminos y Condiciones', '', '1286420400', '1286420400'),
(11, 'sitemap', 'Mapa del sitio', '', '1286420400', '1286420400'),
(12, 'sitios-recomendados', 'Sitios Recomendados', '            <a href="http://www.getsouth.com" class="link-footer" target="_blank">www.getsouth.com</a><br />\r\n            <a href="http://www.fundaproambiente.org.ar" class="link-footer" target="_blank">www.fundaproambiente.org.ar</a><br />\r\n            <a href="http://www.mendozaandes.com" class="link-footer" target="_blank">www.mendozaandes.com</a><br />\r\n            <a href="http://www.lycconsultora.com.ar" class="link-footer" target="_blank">www.lycconsultora.com.ar</a>\r\n', '1286420400', '1286420400'),
(13, 'web-amigas', 'web-amigas', '    <a target="_blank" href="http://www.balnearios.bz/" class="link-webamiga">Balnearios</a>,\r\n    <a target="_blank" href="http://www.curioseando.com.ar/" class="link-webamiga">Curiosidades</a>,\r\n    <a target="_blank" href="http://www.argentinaesmendoza.com.ar/" class="link-webamiga">Turismo Mendoza</a>,\r\n    <a target="_blank" href="http://www.spanishmb.com.ar/" class="link-webamiga">Spanish Courses</a>,\r\n    <a target="_blank" href="http://www.alquilerestemporarios.org/" class="link-webamiga">Alquileres de Vacaciones</a>,\r\n    <a target="_blank" href="http://www.sitelicon.com/" class="link-webamiga">Dise&ntilde;o Web</a>,\r\n    <a target="_blank" href="http://www.aikidoargentina.com/" class="link-webamiga">Aikido</a>,\r\n    <a target="_blank" href="http://www.vsisoluciones.com.ar" class="link-webamiga">Fibra Optica</a>,\r\n    <a target="_blank" href="http://www.termasdelchallao.com.ar" class="link-webamiga">Termas del Challao</a>,\r\n    <a target="_blank" href="http://www.gamadigital.es" class="link-webamiga">Dise&ntilde;o web</a>,\r\n    <a target="_blank" href="http://www.mydesign.com.es" class="link-webamiga">Dise&ntilde;o Web Madrid</a>,\r\n    <a target="_blank" href="http://www.artimedia.es" class="link-webamiga">Dise&ntilde;o Web Barcelona</a>,\r\n    <a target="_blank" href="http://www.merca-tech.com.mx" class="link-webamiga">Dise&ntilde;o Web</a>,\r\n    <a target="_blank" href="http://www.laryweb.com.ar" class="link-webamiga">Dise&ntilde;o Web</a>\r\n', '1286420400', '1286420400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents_services`
--

DROP TABLE IF EXISTS `contents_services`;
CREATE TABLE IF NOT EXISTS `contents_services` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `codlang` int(1) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `reference2` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content_intro` text NOT NULL,
  `content_full` text NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` char(10) NOT NULL,
  `last_modified` char(10) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `contents_services`
--

INSERT INTO `contents_services` (`content_id`, `codlang`, `reference`, `reference2`, `title`, `content_intro`, `content_full`, `thumb`, `order`, `date_added`, `last_modified`) VALUES
(7, 1, 'disenio_web', 'web-institucional', 'Web Institucional', '<p>Para poder insertar su Pyme o simplemente tener su pagina personal. Obteniendo ...</p>', '<p>Para poder insertar su Pyme o simplemente tener su p&aacute;gina personal. Obteniendo un dise&ntilde;o profesional y permiti&eacute;ndole abrir paso a su negocio en Internet.</p>\n<p>Consiste en realizar en forma atractiva una presentaci&oacute;n eficaz de su empresa, de modo que la pagina sirva de toma de contacto a sus clientes a trav&eacute;s de Internet. En ella se podr&acute;n colocar fotos, textos, im&acute;genes y datos de contacto.</p>\n<p>Es la opci&oacute;n m&aacute;s usada por las PYMES, que desean tener una presencia en Internet junto con sus direcciones de correo personalizadas para reforzar su imagen ante sus clientes.</p>\n<p>Estamos interesados en brindar una soluci&oacute;n para las necesidades de cada cliente. Orientado a nuevos emprendimientos y negocios j&oacute;venes que buscan dar un paso adelante.</p>', '1_12891758934cd74355850f6__thumb-institucional.jpg', 1, '1286420400', '1289098800'),
(8, 1, 'disenio_web', 'web-autoadministrable', 'Web Autoadministrable', '<p>Cuenta con una interfaz para poder modificar el contenido sin causar ning&uacute;n efecto en el dise&ntilde;o ...</p>', '<p>Cuenta con una interfaz para poder modificar el contenido sin causar ning&uacute;n efecto en el dise&ntilde;o. Permite un f&aacute;cil control y publicaci&oacute;n de los cambios en el sitio.</p>\n<p>La combinaci&oacute;n mas potente actualmente en lo que se trata de webs con gran dinamismo y funcionalidad. Es la soluci&oacute;n m&aacute;s pr&aacute;ctica y utilizada hoy en d&iacute;a para la administraci&oacute;n de webs que conllevan actualizaci&oacute;n continua.</p>\n<p>El manejo adecuado de la informaci&oacute;n puede marcar la diferencia, un sistema de gesti&oacute;n de contenido (CMS) debe ser f&aacute;cil de mantener y actualizar, nuestro equipo de profesionales dise&ntilde;a y desarrolla estrat&eacute;gicamente los gestores de contenido para que sean escalables, permitiendo as&iacute; su <strong>f&aacute;cil modificaci&oacute;n</strong> y adaptaci&oacute;n con los requisitos establecidos.</p>\n<p>En definitiva, un sitio autoadministrable le permitir&aacute; tener control total de su sitio sin cargo alguno.</p>', '1_12891759944cd743baea6e4__thumb-autoadmin.jpg', 2, '1286420400', '1289098800'),
(9, 1, 'disenio_web', 'web-inmobiliario', 'Web Inmobiliario', '<p>A trav&eacute;s de nuestro sistema <strong>Inmobiliario</strong> logre una mayor din&aacute;mica en la compra, venta ...</p>', '<p>A trav&eacute;s de nuestro sistema <strong>Inmobiliario</strong> logre una mayor din&aacute;mica en la compra, venta y alquiler de propiedades en Internet.</p>\n<p>Permiti&eacute;ndole llegar al potencial cliente nacional e internacional y acceso permanente e ilimitado a su oferta inmobiliaria, reduciendo considerablemente los costos de operaci&oacute;n.</p>\n<p>Mejore la relaci&oacute;n con sus clientes, ofreciendo informaci&oacute;n y precios siempre actualizados. Sus inmuebles van a estar disponibles para que todos sus clientes actuales y potenciales puedan consultarlos las 24 horas al d&iacute;a.</p>\nNuestro sistema inmobiliario incluye:<br /> \n<ul class="list-item">\n<li>Todas las funcionalidades del Catalogo de productos.</li>\n<li>Buscador de propiedades por zona/costo/alquiler.</li>\n<li>Administrador web de propiedades y clientes.</li>\n<li>Asignaci&oacute;n de relevancia y destacados.</li>\n</ul>', '1_12891760414cd743e924b5f__thumb-inmobiliario.jpg', 3, '1286420400', '1289098800'),
(10, 1, 'disenio_web', 'catalogo-de-productos', 'Catálogo de Productos', '<p>Ideal para empresas con una amplia gama de productos o servicios ...</p>', '<p>Ideal para empresas con una amplia gama de productos o servicios. Este sistema le permitir&aacute; listar detalladamente todos sus productos o servicios.</p>\n<p>Un catalogo de productos es la mejor manera de mostrar sus productos en un concepto integral ya que facilitar&aacute; el acceso a sus productos y mejorar&aacute; su imagen como empresa.</p>\n<p>El servicio de cat&aacute;logos online se adapta m&aacute;s a empresas que buscan mostrar su cartera de productos o servicios con el objetivo de informar pero no de realizar la venta v&iacute;a internet.</p>\nNuestro catalogo incluye:<br /> \n<ul class="list-item">\n<li>Administrador web de Cat&aacute;logo y Contenido</li>\n<li>Actualizaciones masivas</li>\n<li>Galer&iacute;a de im&aacute;genes avanzada</li>\n<li>Seguridad, Actualizaci&oacute;n y Soporte</li>\n</ul>', '1_12891760924cd7441c33c04__thumb-catalogo.jpg', 4, '1286420400', '1289098800'),
(11, 1, 'disenio_web', 'carrito-de-compras', 'Carrito de Compras', '<p>Venda sus productos a todo el mundo. Nuestra soluci&oacute;n de comercio electr&oacute;nico ...</p>', '<p>Venda sus productos a todo el mundo. Nuestra soluci&oacute;n de comercio electr&oacute;nico cuenta con las funcionalidades necesarias para optimizar las ventas y garantizar a los usuarios una compra segura.</p>\n<p>Es una potente y flexible plataforma de comercio electr&oacute;nico que junto a un sistema sencillo de operar con cientos de funcionalidades y todos los servicios necesarios para promover su negocio en Internet haran de su negocio le permitir&aacute;n promocionar su negocio en forma efectiva y econ&oacute;mica</p>\nNuestro sistema e-commerce incluye:<br /> \n<ul class="list-item">\n<li>Todas las funcionalidades del Catalogo de productos.</li>\n<li>C&aacute;lculo autom&aacute;tico de costo y tiempo de env&iacute;o</li>\n<li>Administrador web de clientes y &oacute;rdenes.</li>\n<li>Gr&aacute;ficos de monitoreo en tiempo real (visitas, &oacute;rdenes, etc.).</li>\n<li>Automatizaci&oacute;n de pedidos, descuentos y promociones.</li>\n</ul>', '1_12891757424cd742be7594a__thumb-carrito-de-compras.jpg', 5, '1286420400', '1289098800'),
(12, 1, 'disenio_web', 'guia-turistica', 'Guía Turística', '<p>Ofrece una soluci&oacute;n absolutamente flexible y escalable ...</p>', '<p>Ofrece una soluci&oacute;n absolutamente flexible y escalable. Tanto microempresas o agentes independientes como grandes organizaciones encuentran en &eacute;l, el sistema Web adecuado para la exposici&oacute;n de sus productos a trav&eacute;s de Internet. Desde una peque&ntilde;a cartera de anunciantes hasta una enorme cantidad de categor&iacute;as y destinos.</p>\n<p>Es un sistema concebido con el objetivo de permitir a nuestros clientes la capacidad de contacto r&aacute;pido y directo mediante reservas on line. Desde su panel de control podr&aacute;, de forma interactiva y modificar los contenidos, adem&aacute;s de agregar y editar anunciantes, categor&iacute;as, ubicaciones y destacados.</p>\nEl sistema incluye entre otros:<br /> \n<ul class="list-item">\n<li>Gesti&oacute;n de anunciantes.</li>\n<li>Gesti&oacute;n de categor&iacute;a y destinos.</li>\n<li>Formulario de reservas personalizable.</li>\n<li>Gesti&oacute;n de publicidades.</li>\n<li>Gesti&oacute;n de idiomas y monedas.</li>\n</ul>', '1_12891761284cd74440e6004__thumb-turistica.jpg', 6, '1286420400', '1289098800'),
(13, 1, 'marketing_online', 'search-engine-marketing', 'Search Engine Marketing', '<p>Planificaremos y gestionaremos su campa&ntilde;a de publicidad en buscadores mediante el sistema de pago por clic ...</p>', '            <p>Planificaremos y gestionaremos su campa&ntilde;a de publicidad en buscadores mediante el sistema de pago por clic.</p>\r\n            <p>Podr&aacute; aparecer a la derecha y en recuadro superior a la lista de resultados naturales. Significa estar en las primeras p&aacute;ginas de los buscadores en el listado preferencial de enlaces patrocinados. Esta posici&oacute;n se compra mediante subasta y se paga por cada usuario que usa el enlace o link (Pago por click). Su precio var&iacute;a en funci&oacute;n del criterio de b&uacute;squeda en el que se quiere aparecer y la posici&oacute;n que se quiere obtener.</p>\r\n            Nuestro servicio SEM le proporciona:<br />\r\n            <ul class="list-item">\r\n                <li>Rentabilidad a corto plazo</li>\r\n                <li>Resultados inmediatos</li>\r\n                <li>Alta flexibilidad y visitas de calidad</li>\r\n            </ul>\r\n', 'images/thumbs_markonline/img5.png', 1, '1286420400', '1286420400'),
(14, 1, 'marketing_online', 'search-engine-optimization', 'Search Engine Optimization', '<p>Aumente el tr&aacute;fico cualificado hacia su web mediante la optimizaci&oacute;n de la estructura y contenidos de la misma ...</p>', '            <p>Aumente el tr&aacute;fico cualificado hacia su web mediante la <b>optimizaci&oacute;n de la estructura y contenidos</b> de la misma.</p>\r\n            <p>Con nuestras t&eacute;cnicas podemos mejorar notablemente el orden de posici&oacute;n que su empresa obtiene en las b&uacute;squedas org&aacute;nicas hasta hacerla llegar a los primeros puestos.</p>\r\n            <p>Corresponde &uacute;nicamente a los web-sites que el buscador ha seleccionado como objetivamente m&aacute;s adecuados a los criterios de b&uacute;squeda usados. Las posiciones obtenidas siempre son las primeras y el retorno de inversi&oacute;n es muy alto.</p>\r\n            Nuestro servicio SEO le proporciona:<br />\r\n            <ul class="list-item">\r\n                <li>Alta flexibilidad y visitas de calidad</li>\r\n                <li>Incrementar el tr&aacute;fico hacia su web</li>\r\n                <li>Alta en cientos de buscadores</li>\r\n            </ul>\r\n', 'images/thumbs_markonline/img2.png', 2, '1286420400', '1286420400'),
(15, 1, 'marketing_online', 'email-marketing', 'E-mail Marketing', '<p>Es una poderosa herramienta de marketing directo que permite ...</p>', '                <p>Es una poderosa herramienta de marketing directo que permite la comunicaci&oacute;n con sus clientes actuales o potenciales mediante el env&iacute;o de e-mails. Adem&aacute;s le brinda la posibilidad de determinar y elegir el target de personas ya sea por pa&iacute;s, idioma, etc.</p>\r\n                <p>De esta manera, la inversi&oacute;n involucra a posibles compradores potenciales y no a terceros sin inter&eacute;s. Tendr&aacute; a su disposici&oacute;n la opci&oacute;n de segmentar su campa&ntilde;a y hacerla mas efectiva.</p>\r\n\r\n                La utilizaci&oacute;n del e-mail marketing le permitir&aacute; a su empresa realizar una comunicaci&oacute;n econ&oacute;mica, r&aacute;pida y sencilla. Ofrecemos:<br />\r\n                <ul class="list-item">\r\n                    <li>Desarrollo de estrategias de e-mail marketing</li>\r\n                    <li>Conformaci&oacute;n de bases de datos a medida</li>\r\n                    <li>Gesti&oacute;n de env&iacute;o</li>\r\n                    <li>Reportes estad&iacute;sticos</li>\r\n                </ul>\r\n', 'images/thumbs_markonline/img1.png', 3, '1286420400', '1286420400'),
(16, 1, 'marketing_online', 'banners-publicitarios', 'Banners Publicitarios', '<p>Las campa&ntilde;as publicitarias realizadas por Banners se apoyan en todos los medios disponibles ...</p>', '            <p>Las campa&ntilde;as publicitarias realizadas por Banners se apoyan en todos los medios disponibles. La diversidad de productos al alcance del cliente es muy amplia.</p>\r\n            <p>Un banner es un v&iacute;nculo que trabaja como una herramienta de mercadeo para su empresa, y como una puerta de entrada a su sitio Web. Como una forma de dirigir tr&aacute;fico de calidad hacia su sitio Web, que resultar&aacute; en incrementos en las ventas, entendemos que los banners deben ser atractivos y dar una raz&oacute;n para que les hagan click.</p>\r\n            Para esto ofrecemos:<br />\r\n            <ul class="list-item">\r\n                <li>Dise&ntilde;o orientado a objetivos.</li>\r\n                <li>Gran variedad de estilos.</li>\r\n                <li>Revisiones y conceptos ilimitados.</li>\r\n            </ul>\r\n', 'images/thumbs_markonline/img4.png', 4, '1286420400', '1286420400'),
(17, 1, 'marketing_online', 'disenio-newsletters', 'Dise&ntilde;o de Newsletters', '<p>El e-mail se ha convertido en un medio muy eficaz para la promoci&oacute;n de productos y servicios ...</p>', '            <p>El e-mail se ha convertido en un medio muy eficaz para la promoci&oacute;n de productos y servicios de una manera r&aacute;pida y econ&oacute;mica, permitiendo alcanzar con el mensaje publicitario a una audiencia calificada y de manera personalizada.</p>\r\n            <p>Nuestro equipo creativo, trabaja en conjunto para el dise&ntilde;o de publicidades optimizadas para su env&iacute;o por e-mail. Se aprovechan las excelentes capacidades de Internet para presentar copias publicitarias altamente atractivas con el prop&oacute;sito de crear publicidades que induzcan a la interactividad.</p>\r\n            Se realizan dise&ntilde;os de:<br />\r\n            <ul class="list-item">\r\n                <li>Emails publicitarios.</li>\r\n                <li>Cupones o invitaciones.</li>\r\n                <li>Newsletters.</li>\r\n            </ul>\r\n', 'images/thumbs_markonline/img3.png', 5, '1286420400', '1286420400'),
(18, 1, 'marketing_online', 'marketing-viral', 'Marketing Viral', '<p>Mediante una campa&ntilde;a de marketing viral se busca que la misma llegue a la mayor cantidad de usuarios ...</p>', '            <p>Mediante una campa&ntilde;a de marketing viral se busca que la misma llegue a la mayor cantidad de usuarios posibles. Se lo podr&iacute;a asemejar a un servicio de boca a boca virtual</p>\r\n            <p>Para conseguir este boca a boca hay muchas t&eacute;cnicas, pero la base siempre es la misma, hacer algo llamativo, curioso o interesante que la gente quiera o desee compartir y se lo env&iacute;en los unos a los otros.</p>\r\n            <p>Para eso, ofrecemos la difusi&oacute;n de contenidos (ya sean textos, im&aacute;genes o videos) mediante las distintas plataformas y comunidades 2.0 como facebook, youtube, myspace, sonico y distintos blogs relacionados a cada necesidad.</p>\r\n', 'images/thumbs_markonline/img6.png', 6, '1286420400', '1286420400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents_services_gallery`
--

DROP TABLE IF EXISTS `contents_services_gallery`;
CREATE TABLE IF NOT EXISTS `contents_services_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcar la base de datos para la tabla `contents_services_gallery`
--

INSERT INTO `contents_services_gallery` (`gallery_id`, `content_id`, `filename`, `width`, `height`, `order`) VALUES
(5, 11, '1_12891757574cd742cdcab65__carrito-01.png', 320, 260, 1),
(6, 11, '1_12891757614cd742d1ccb85__carrito-02.png', 320, 260, 2),
(7, 11, '1_12891757654cd742d51e85c__carrito-03.png', 320, 260, 3),
(8, 7, '1_12891759084cd74364eccc3__web-institucional-01.png', 320, 260, 1),
(9, 7, '1_12891759124cd743688de5e__web-institucional-02.png', 320, 260, 2),
(10, 7, '1_12891759164cd7436c2a773__web-institucional-03.png', 320, 260, 3),
(11, 8, '1_12891760074cd743c773b47__web-autoadmin-01.png', 320, 260, 1),
(12, 8, '1_12891760114cd743cb9d70b__web-autoadmin-02.png', 320, 260, 2),
(13, 8, '1_12891760154cd743cfa603f__web-autoadmin-03.png', 320, 260, 3),
(14, 9, '1_12891760634cd743ff29948__inmobiliario-01.png', 320, 260, 1),
(15, 9, '1_12891760674cd744037eea0__inmobiliario-02.png', 320, 260, 2),
(16, 9, '1_12891760704cd74406bb8f9__inmobiliario-03.png', 320, 260, 3),
(17, 10, '1_12891761014cd744254c36e__catalogo-01.png', 320, 260, 1),
(18, 10, '1_12891761044cd74428441d5__catalogo-02.png', 320, 260, 2),
(19, 10, '1_12891761074cd7442be204a__catalogo-03.png', 320, 260, 3),
(20, 12, '1_12891761374cd74449b7cd9__turistica-01.png', 320, 260, 1),
(21, 12, '1_12891761404cd7444ca9015__turistica-02.png', 320, 260, 2),
(22, 12, '1_12891761444cd74450405d8__turistica-03.png', 320, 260, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolio_clients`
--

DROP TABLE IF EXISTS `portfolio_clients`;
CREATE TABLE IF NOT EXISTS `portfolio_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` char(10) NOT NULL,
  `last_modified` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcar la base de datos para la tabla `portfolio_clients`
--

INSERT INTO `portfolio_clients` (`id`, `filename`, `order`, `date_added`, `last_modified`) VALUES
(1, 'ackon-cahuak.jpg', 1, '1286420400', '1286420400'),
(2, 'af-maquinas.jpg', 2, '1286420400', '1286420400'),
(3, 'aikido.jpg', 3, '1286420400', '1286420400'),
(4, 'alquileres-temporarios.jpg', 4, '1286420400', '1286420400'),
(5, 'argentinaesmendoza.jpg', 5, '1286420400', '1286420400'),
(6, 'artrans.jpg', 6, '1286420400', '1286420400'),
(7, 'azer.jpg', 7, '1286420400', '1286420400'),
(8, 'barahona.jpg', 8, '1286420400', '1286420400'),
(9, 'bottino-hnos.jpg', 9, '1286420400', '1286420400'),
(10, 'brokers.jpg', 10, '1286420400', '1286420400'),
(11, 'consurpyme.jpg', 11, '1286420400', '1286420400'),
(12, 'cumbre-textil.jpg', 12, '1286420400', '1286420400'),
(13, 'eneting.jpg', 13, '1286420400', '1286420400'),
(14, 'federico-azpilcueta.jpg', 14, '1286420400', '1286420400'),
(15, 'fundacion-proambiente.jpg', 15, '1286420400', '1286420400'),
(16, 'fundasdakar.jpg', 16, '1286420400', '1286420400'),
(17, 'fya-tour.jpg', 17, '1286420400', '1286420400'),
(18, 'get-south.jpg', 18, '1286420400', '1286420400'),
(19, 'greenfields.jpg', 19, '1286420400', '1286420400'),
(20, 'grundfos-bottino-subfactory.jpg', 20, '1286420400', '1286420400'),
(21, 'jp-services.jpg', 21, '1286420400', '1286420400'),
(22, 'laco.jpg', 22, '1286420400', '1286420400'),
(23, 'laprimavera.jpg', 23, '1286420400', '1286420400'),
(24, 'legalylogistica.jpg', 24, '1286420400', '1286420400'),
(25, 'lexer.jpg', 25, '1286420400', '1286420400'),
(26, 'lion.jpg', 26, '1286420400', '1286420400'),
(27, 'lyc-consultora.jpg', 27, '1286420400', '1286420400'),
(28, 'mendozaandes.jpg', 28, '1286420400', '1286420400'),
(29, 'priolo.jpg', 29, '1286420400', '1286420400'),
(30, 'sop.jpg', 30, '1286420400', '1286420400'),
(31, 'termas-del-challao.jpg', 31, '1286420400', '1286420400'),
(32, 'unique.jpg', 32, '1286420400', '1286420400'),
(33, 'vsisoluciones.jpg', 33, '1286420400', '1286420400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolio_works`
--

DROP TABLE IF EXISTS `portfolio_works`;
CREATE TABLE IF NOT EXISTS `portfolio_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `date_add` char(10) NOT NULL,
  `last_modified` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcar la base de datos para la tabla `portfolio_works`
--

INSERT INTO `portfolio_works` (`id`, `type`, `filename`, `name`, `url`, `order`, `date_add`, `last_modified`) VALUES
(1, 'web', 'web-aikido.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 1, '1286420400', '1286420400'),
(3, 'web', 'web-alquileres-temporarios.jpg', 'Web inmobiliaria', 'http://www.aikidoargentina.com/', 3, '1286420400', '1286420400'),
(4, 'web', 'web-argentinaesmendoza.jpg', 'Web turistica', 'http://www.aikidoargentina.com/', 4, '1286420400', '1286420400'),
(5, 'web', 'web-artrans.jpg', 'Cat&aacute;logo de producto', 'http://www.aikidoargentina.com/', 5, '1286420400', '1286420400'),
(6, 'web', 'web-azer.jpg', 'Web institucional', 'http://www.aikidoargentina.com/', 6, '1286420400', '1286420400'),
(7, 'web', 'web-bottino-hnos.jpg', 'Cat&aacute;logo de producto', 'http://www.aikidoargentina.com/', 7, '1286420400', '1286420400'),
(8, 'web', 'web-brokers.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 8, '1286420400', '1286420400'),
(9, 'web', 'web-consurpyme.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 9, '1286420400', '1286420400'),
(10, 'web', 'web-eneting.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 10, '1286420400', '1286420400'),
(11, 'web', 'web-federico-azpilcueta.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 11, '1286420400', '1286420400'),
(12, 'web', 'web-fundacion-proambiente.jpg', 'Web institucional', 'http://www.aikidoargentina.com/', 12, '1286420400', '1286420400'),
(13, 'web', 'web-fundasdakar.jpg', 'Web institucional', 'http://www.aikidoargentina.com/', 13, '1286420400', '1286420400'),
(14, 'web', 'web-fya-tour.jpg', 'Web turistica', 'http://www.aikidoargentina.com/', 14, '1286420400', '1286420400'),
(15, 'web', 'web-get-south.jpg', 'Web turistica', 'http://www.aikidoargentina.com/', 15, '1286420400', '1286420400'),
(16, 'web', 'web-greenfields.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 16, '1286420400', '1286420400'),
(17, 'web', 'web-grundfos-subfactory-bottino.jpg', 'Cat&aacute;logo de producto', 'http://www.aikidoargentina.com/', 17, '1286420400', '1286420400'),
(18, 'web', 'web-i-sim.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 18, '1286420400', '1286420400'),
(19, 'web', 'web-jp-services.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 19, '1286420400', '1286420400'),
(20, 'web', 'web-laco.jpg', 'Web e-commerce', 'http://www.aikidoargentina.com/', 20, '1286420400', '1286420400'),
(21, 'web', 'web-laprimavera.jpg', 'Web institucional', 'http://www.aikidoargentina.com/', 21, '1286420400', '1286420400'),
(22, 'web', 'web-latinoamericaexporta.jpg', 'Web institucional', 'http://www.aikidoargentina.com/', 22, '1286420400', '1286420400'),
(23, 'web', 'web-legalylogistica.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 23, '1286420400', '1286420400'),
(24, 'web', 'web-lyc-consultora.jpg', 'Web institucional', 'http://www.aikidoargentina.com/', 24, '1286420400', '1286420400'),
(25, 'web', 'web-mendozaandes.jpg', 'Web turistica', 'http://www.aikidoargentina.com/', 25, '1286420400', '1286420400'),
(26, 'web', 'web-priolo.jpg', 'Cat&aacute;logo de producto', 'http://www.aikidoargentina.com/', 26, '1286420400', '1286420400'),
(27, 'web', 'web-respat.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 27, '1286420400', '1286420400'),
(28, 'web', 'web-sop.jpg', 'Web institucional', 'http://www.aikidoargentina.com/', 28, '1286420400', '1286420400'),
(29, 'web', 'web-termasdelchallao.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 29, '1286420400', '1286420400'),
(30, 'web', 'web-unique.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 30, '1286420400', '1286420400'),
(31, 'web', 'web-vsisoluciones.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 31, '1286420400', '1286420400'),
(32, 'web', 'web-ackon-cahuak.jpg', 'Web autoadministrable', '', 32, '1286420400', '1286420400'),
(33, 'grafica', 'carta-sobre.jpg', 'Grafica carta,sobre', '', 1, '1286420400', '1286420400'),
(34, 'grafica', 'factura.jpg', 'Grafica factura', '', 2, '1286420400', '1286420400'),
(35, 'grafica', 'logo-legalylogistica.jpg', 'Grafica logo', '', 3, '1286420400', '1286420400'),
(36, 'grafica', 'logo-mendoza-andes.jpg', 'Grafica logo', '', 4, '1286420400', '1286420400'),
(37, 'grafica', 'logo-unique.jpg', 'Grafica logo', '', 5, '1286420400', '1286420400'),
(38, 'grafica', 'logos.jpg', 'Grafica logos', '', 6, '1286420400', '1286420400'),
(39, 'grafica', 'tarjetas-personales.jpg', 'Grafica tarjetas personales', '', 7, '1286420400', '1286420400'),
(40, 'grafica', 'tarjetas-personales-mendozaandes.jpg', 'Grafica tarjeta', '', 8, '1286420400', '1286420400'),
(41, 'grafica', 'tarjetas-personales-unique.jpg', 'Grafica tarjeta', '', 9, '1286420400', '1286420400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `email`, `date_added`, `last_modified`) VALUES
(1, 'ivan', 'A2YFbw1zWyZRcwlhBzQFaQIEDB0=', 'ivan@mydesign.com.ar', '2010-10-11 15:43:05', '2010-10-11 15:43:05'),
(2, 'fede', 'yhP+7e5sO4atccL3FpeM7g==', 'federico@mydesign.com.ar', '2010-10-11 15:43:05', '2010-10-11 15:43:05');
