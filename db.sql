-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2010 a las 23:11:25
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
CREATE DATABASE `mydesign_ar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydesign_ar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

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
('0e39ac1448a7f9d2e75978c584229913', '127.0.0.1', 'Mozilla/5.0 (X11; U; Linux x86_64; es-AR; rv:1.9.2', 1291150266, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date_added` char(10) NOT NULL,
  `last_modified` char(10) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `contents`
--

INSERT INTO `contents` (`content_id`, `reference`, `title`, `content`, `date_added`, `last_modified`) VALUES
(7, 'la_empresa', 'Empresa', '<img style="float: left; margin-right: 10px;" src="./uploads/kcfinder/image/Empresa/oficina-01.jpg" alt="" width="240" height="281" />\n<p style="display: block;">&nbsp;</p>\n<p style="display: block; margin-top: -20px;">Somos un grupo de <strong>dise&ntilde;adores web y desarrolladores</strong>, que con el paso del tiempo fueron tomando la experiencia necesaria y conociendo las herramientas mas fascinantes para formar hoy una de las mejores empresas en el rubro.</p>\n<p>Contamos con profesionales en las &aacute;reas de <strong>dise&ntilde;o web, programaci&oacute;n</strong> y <strong>publicidad</strong> volcada a internet (<strong>SEO</strong>).Capacitados para brindarle a usted y a su compa&ntilde;ia los mejores servicios.</p>\n<p>P&oacute;ngase en contacto con nosotros y lo asesoraremos sobre la desici&oacute;n mas adecuada para su compa&ntilde;&iacute;a.</p>\n<p>&nbsp;</p>\n<h3 class="title3" style="text-align: left; margin-top: -20px; width: 380px;">Nuestra Misi&oacute;n</h3>\n<p><img style="float: right; margin-left: 10px; margin-top: -10px;" src="./uploads/kcfinder/image/Empresa/oficina-02.jpg" alt="" width="278" height="166" />Realizar <strong>dise&ntilde;os web a medida</strong> utilizando tecnolog&iacute;a de vanguardia y brindando la mejor calidad en servicios en internet. Conectando arte y emociones para darle los resultados esperados.</p>\n<img style="float: right; margin-left: 10px; clear: both;" src="./uploads/kcfinder/image/Empresa/oficina-03.jpg" alt="" width="278" height="203" /><strong>Nuestro progreso es el suyo:</strong><br />\n<p>Hoy en d&iacute;a, orgullosamente podemos afirmar que somos la empresa Argentina de dise&ntilde;o web mejor valorada por los clientes que nos contratan.</p>\n<p>Este reconocimiento nos ha brindado la posibilidad de ampliar el alcance de nuestros servicios a empresas y profesionales de pa&iacute;ses como Espa&ntilde;a, M&eacute;xico, Venezuela, Chile, USA y otros paises. Realizando <strong>trabajos tercerizados y dise&ntilde;os web completos</strong>.</p>', '1286420400', '1290999600'),
(8, 'faq', 'Preguntas frecuentes', '<ul class="list-faq">\r\n    <li>\r\n        <span>1.</span>\r\n        <div class="span-15">\r\n            <a href="#res1" onclick="ShowHide(this); return false">¿Qui&eacute;n aporta el <b>contenido</b> de la p&aacute;gina web?</a>\r\n            <div id="res1">\r\n                Todos los contenidos de la web, tanto los textos como algunas im&aacute;genes son aportados por el cliente.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>2.</span>\r\n        <div class="span-15">\r\n            <a href="#res2" onclick="ShowHide(this); return false">¿Cu&aacute;les son las distintas <b>etapas</b> del proceso de <b>dise&ntilde;o</b> de una web?</a>\r\n            <div id="res2">\r\n                <p>Las distintas etapas de como trabajamos a la hora de realizar una p&aacute;gina web:</p>\r\n                En el proceso del desarrollo de la web pasaremos por las siguientes fases:<br />\r\n                <ul>\r\n                    <li>Primer Contacto.</li>\r\n                    <li>Presupuesto</li>\r\n                    <li>Dise&ntilde;o y Maquetaci&oacute;n</li>\r\n                    <li>Desarrollo y Programaci&oacute;n</li>\r\n                    <li>Pruebas</li>\r\n                    <li>Publicaci&oacute;n en Internet</li>\r\n                </ul>\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>3.</span>\r\n        <div class="span-15">\r\n            <a href="#res3" onclick="ShowHide(this); return false">¿C&oacute;mo ser&iacute;a la <b>forma de pago</b> de un proyecto web?</a>\r\n            <div id="res3">\r\n                Si acepta nuestro presupuesto se deber&aacute; abonar el 50% por adelantado y el resto al finalizar el proyecto.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>4.</span>\r\n        <div class="span-15">\r\n            <a href="#res4" onclick="ShowHide(this); return false">¿Ustedes proveen del servicio de <b>hospedaje web</b>?</a>\r\n            <div id="res4">\r\n                Si, nosotros proveemos servicio de hosting en servidores linux 99.9 % uptime.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>5.</span>\r\n        <div class="span-15">\r\n            <a href="#res5" onclick="ShowHide(this); return false">¿Qu&eacute; es <b>FLASH</b>?</a>\r\n            <div id="res5">\r\n                Flash es un programa vectorial para realizar efectos visuales que se suelen utilizar en animaciones, banner, etc. Hace un par de a&ntilde;os estaban muy de moda las p&aacute;ginas hechas en Flash, actualmente no tanto ya que las p&aacute;ginas realizadas en Flash no son bien indexadas por los buscadores.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>6.</span>\r\n        <div class="span-15">\r\n            <a href="#res6" onclick="ShowHide(this); return false">Actualizo mi p&aacute;gina frecuentemente y me sale muy caro actualizarla. ¿Habr&iacute;a alguna forma de <b>ahorrar costes</b>?</a>\r\n            <div id="res6">\r\n                Si, efectivamente, se podr&iacute;a desarrollar un gestor de contenidos.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>7.</span>\r\n        <div class="span-15">\r\n            <a href="#res7" onclick="ShowHide(this); return false">¿Qu&eacute; es un <b>sitio web</b>?</a>\r\n            <div id="res7">\r\n                Un sitio web es b&aacute;sicamente un conjunto organizado y coherente de diversas p&aacute;ginas web (generalmente archivos en formato html, php, cgi, etc.) y otros archivos, ya sean gr&aacute;ficos, animaciones, sonidos, etc. A trav&eacute;s de un sitio web podemos ofrecer, informar, publicitar o vender, productos y servicios.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>8.</span>\r\n        <div class="span-15">\r\n            <a href="#res8" onclick="ShowHide(this); return false">¿Cu&aacute;nto <b>cuesta</b> una p&aacute;gina web?</a>\r\n            <div id="res8">\r\n                Todo depender&aacute; de su plan de negocios y hasta donde quiera llegar, adem&aacute;s no todas las p&aacute;ginas web son iguales, unas llevan una serie de funcionalidades que en otras no serian &uacute;tiles, si est&aacute; pensando en hacer una, nosotros le podremos preparar un presupuesto que se ajuste a sus necesidades.\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>9.</span>\r\n        <div class="span-15">\r\n            <a href="#res9" onclick="ShowHide(this); return false">¿En cuanto <b>tiempo</b> desarrollan mi web?</a>\r\n            <div id="res9">\r\n                Es muy dif&iacute;cil determinar con precisi&oacute;n el tiempo necesario para el desarrollo de un sitio web. Influyen una serie de causas como pueden ser:\r\n                <ul>\r\n                    <li>Lo claras que tenga sus ideas de la web.</li>\r\n                    <li>El alcance y complejidad del sitio web.</li>\r\n                    <li>Los contenidos que se van a incluir.</li>\r\n                    <li>Los contenidos que se van a incluir.</li>\r\n                    <li>La traducci&oacute;n a otros idiomas si se requiere</li>\r\n                </ul>\r\n                <p>De todas formas y dependiendo de la complejidad del mismo, el tiempo de desarrollo de un sitio web puede estar entre 1 semana hasta 6 meses o m&aacute;s, normalmente este tiempo esta entre 1 y 6 semanas.</p>\r\n            </div>\r\n        </div>\r\n    </li>\r\n    <li>\r\n        <span>10.</span>\r\n        <div class="span-15">\r\n            <a href="#res10" onclick="ShowHide(this); return false">¿Qu&eacute; son los <b>formularios</b>?</a>\r\n            <div id="res10">\r\n                Los formularios permiten interactuar con los usuarios de nuestro sitio web. Son empleados muchas veces para recabar informaci&oacute;n de contacto. Cuando se recaban otros tipo de datos confidenciales (cuenta bancaria, etc...) solamente se deben poner en un formulario si son imprescindibles y disponer de una conexi&oacute;n segura (SSL u otros).\r\n            </div>            \r\n        </div>\r\n    </li>\r\n</ul>', '1286420400', '1286420400'),
(11, 'sitemap', 'Mapa del sitio', '<ul class="list-sitemap">\n<li><a href="http://www.mydesign.com.ar">Home</a></li>\n<li><a href="/mydesign/disenio_web.php">Dise&ntilde;o Web</a> \n<ul>\n<li><a href="/mydesign/disenio_web/web-institucional.php">Web Institucional</a></li>\n<li><a href="/mydesign/disenio_web/web-autoadministrable.php">Web Autoadministrable</a></li>\n<li><a href="/mydesign/disenio_web/web-inmobiliario.php">Web Inmobiliario</a></li>\n<li><a href="/mydesign/disenio_web/catalogo-de-productos.php">Cat&aacute;logo de Productos</a></li>\n<li><a href="/mydesign/disenio_web/carrito-de-compras.php">Carrito de Compras</a></li>\n<li><a href="/mydesign/disenio_web/guia-turistica.php">Gu&iacute;a Tur&iacute;stica</a></li>\n</ul>\n</li>\n<li><a href="/mydesign/disenio_grafico.php">Dise&ntilde;o Gr&aacute;fico</a> \n<ul>\n<li><a href="/mydesign/disenio_grafico/identidad-corporativa.php">Identidad Corporativa</a></li>\n<li><a href="/mydesign/disenio_grafico/diseno-editorial.php">Dise&ntilde;o Editorial</a></li>\n<li><a href="/mydesign/disenio_grafico/diseno-packaging.php">Dise&ntilde;o Packaging</a></li>\n<li><a href="/mydesign/disenio_grafico/diseno-publicitario.php">Dise&ntilde;o Publicitario</a></li>\n<li><a href="/mydesign/disenio_grafico/diseno-multimedia.php">Dise&ntilde;o Multimedia</a></li>\n</ul>\n</li>\n<li><a href="/mydesign/marketing_online.php">Marketing Online</a> \n<ul>\n<li><a href="/mydesign/marketing_online/search-engine-marketing.php">Search Engine Marketing</a></li>\n<li><a href="/mydesign/marketing_online/search-engine-optimization.php">Search Engine Optimization</a></li>\n<li><a href="/mydesign/marketing_online/e-mail-marketing.php">E-mail Marketing</a></li>\n<li><a href="/mydesign/marketing_online/fanpage-facebook.php">FanPage (Facebook)</a></li>\n<li><a href="/mydesign/marketing_online/canal-youtube.php">Canal YouTube</a></li>\n<li><a href="/mydesign/marketing_online/marketing-viral.php">Marketing Viral</a></li>\n</ul>\n</li>\n<li><a href="/mydesign/portfolio.php">Portfolio</a></li>\n<li><a href="/mydesign/empresa.php">Empresa</a></li>\n<li><a href="/mydesign/blog">Blog</a></li>\n<li><a href="/mydesign/preguntas-frecuentes.php">Preguntas Frecuentes</a></li>\n</ul>', '1286420400', '1291086000'),
(12, 'sitios-recomendados', 'Sitios Recomendados', '<a class="link-footer" href="http://www.alquilerestemporarios.org" target="_blank">www.alquilerestemporarios.org</a><br /> <a class="link-footer" href="http://www.mendozaandes.com" target="_blank">www.mendozaandes.com</a><br /> <a class="link-footer" href="http://www.uniquewp.com.ar" target="_blank">www.uniquewp.com.ar</a><br /><a class="link-footer" href="http://www.priolo.com.ar/" target="_blank">www.priolo.com.ar</a>', '1286420400', '1290999600'),
(13, 'web-amigas', 'web-amigas', '    <a target="_blank" href="http://www.balnearios.bz/" class="link-webamiga">Balnearios</a>,\r\n    <a target="_blank" href="http://www.curioseando.com.ar/" class="link-webamiga">Curiosidades</a>,\r\n    <a target="_blank" href="http://www.argentinaesmendoza.com.ar/" class="link-webamiga">Turismo Mendoza</a>,\r\n    <a target="_blank" href="http://www.spanishmb.com.ar/" class="link-webamiga">Spanish Courses</a>,\r\n    <a target="_blank" href="http://www.alquilerestemporarios.org/" class="link-webamiga">Alquileres de Vacaciones</a>,\r\n    <a target="_blank" href="http://www.sitelicon.com/" class="link-webamiga">Dise&ntilde;o Web</a>,\r\n    <a target="_blank" href="http://www.aikidoargentina.com/" class="link-webamiga">Aikido</a>,\r\n    <a target="_blank" href="http://www.vsisoluciones.com.ar" class="link-webamiga">Fibra Optica</a>,\r\n    <a target="_blank" href="http://www.termasdelchallao.com.ar" class="link-webamiga">Termas del Challao</a>,\r\n    <a target="_blank" href="http://www.gamadigital.es" class="link-webamiga">Dise&ntilde;o web</a>,\r\n    <a target="_blank" href="http://www.mydesign.com.es" class="link-webamiga">Dise&ntilde;o Web Madrid</a>,\r\n    <a target="_blank" href="http://www.artimedia.es" class="link-webamiga">Dise&ntilde;o Web Barcelona</a>,\r\n    <a target="_blank" href="http://www.merca-tech.com.mx" class="link-webamiga">Dise&ntilde;o Web</a>,\r\n    <a target="_blank" href="http://www.laryweb.com.ar" class="link-webamiga">Dise&ntilde;o Web</a>\r\n', '1286420400', '1286420400'),
(14, 'politicas-de-privacidad', 'Pol&iacute;ticas de Privacidad', '<p><strong>POL&Iacute;TICA DE PRIVACIDAD</strong></p>\n<p>MYDESIGN, le informa que el acceso y uso de este sitio web est&aacute;n sujetos a las condiciones de uso establecidas en la presente advertencia legal, recomend&aacute;ndole que las lea atentamente por cuanto el hecho de acceder y usar este sitio web implica su plena y total aceptaci&oacute;n. <br /> <br /> En este web site se utiliza indistintamente la denominaci&oacute;n MYDESIGN, haciendo referencia la misma entidad.</p>\n<p><strong>I. DERECHOS DE PROPIEDAD INTELECTUAL E INDUSTRIAL</strong></p>\n<p>I.1. El objetivo del sitio web de MYDESIGN es facilitar informaci&oacute;n de inter&eacute;s sobre los servicios prestados para el p&uacute;blico en general, ofreciendo un servicio de la m&aacute;xima calidad.<br /> <br /> I.2. Todos los contenidos del sitio web (incluyendo, sin car&aacute;cter limitativo, bases de datos, im&aacute;genes y fotograf&iacute;as, patentes, dibujos, gr&aacute;ficos, archivos de texto, audio, v&iacute;deo y software) son propiedad de MYDESIGN o de terceros y de los proveedores de contenidos, habiendo sido, en este &uacute;ltimo caso, objeto de licencia o cesi&oacute;n por parte de los mismos, y est&aacute;n protegidos por las normas nacionales o internacionales de propiedad intelectual e industrial. La compilaci&oacute;n (entendi&eacute;ndose por tal la recopilaci&oacute;n, dise&ntilde;o, ordenaci&oacute;n y montaje) de todo el contenido del sitio web es propiedad exclusiva de MYDESIGN y se encuentra protegida por las normas nacionales e internacionales de propiedad industrial e intelectual.<br /> <br /> I.3. Todo el software utilizado en las pantallas, navegaci&oacute;n y uso y desarrollo del sitio web es propiedad de MYDESIGN o de sus proveedores de software que se encuentra protegido por las leyes nacionales e internacionales de propiedad industrial e intelectual.<br /> <br /> I.4. Las marcas, r&oacute;tulos, signos distintivos o logos de MYDESIGN, que aparecen en el sitio web son titularidad de MYDESIGN y est&aacute;n debidamente registrados.<br /> <br /> I.5. Todos los textos, datos, dibujos gr&aacute;ficos, v&iacute;deos o soportes de audio son propiedad de MYDESIGN o de terceros o de las entidades proveedoras de informaci&oacute;n, no pudiendo ser objeto de ulterior modificaci&oacute;n, copia, alteraci&oacute;n, transformaci&oacute;n, reproducci&oacute;n, adaptaci&oacute;n o traducci&oacute;n por parte del Usuario o de terceros sin la expresa autorizaci&oacute;n por parte de los titulares de dichos contenidos.<br /> <br /> I.6. La puesta a disposici&oacute;n de los Usuarios para su uso de las bases de datos, dibujos, gr&aacute;ficos, im&aacute;genes y fotograf&iacute;as, archivos de texto, audio, v&iacute;deo y software propiedad de MYDESIGN o de sus proveedores que figuran en el sitio web no implica, en ning&uacute;n caso, la cesi&oacute;n de su titularidad o la concesi&oacute;n de un derecho de explotaci&oacute;n a favor del Usuario, distinto del derecho de uso que comporta la utilizaci&oacute;n leg&iacute;tima y acorde con la naturaleza del sitio web.<br /> <br /> I.7. Queda terminantemente prohibido cualquier uso de los contenidos del sitio web, de los servicios y en general de todos los derechos mencionados en los ep&iacute;grafes precedentes que se realice sin la autorizaci&oacute;n de MYDESIGN, incluida su explotaci&oacute;n, reproducci&oacute;n, difusi&oacute;n, transformaci&oacute;n, distribuci&oacute;n, transmisi&oacute;n por cualquier medio, posterior publicaci&oacute;n, exhibici&oacute;n, comunicaci&oacute;n p&uacute;blica o representaci&oacute;n total o parcial las cuales, de producirse, constituir&aacute;n infracci&oacute;n de los derechos de propiedad intelectual de MYDESIGN, sancionados por la legislaci&oacute;n vigente.</p>\n<p><strong>II. MANIFESTACIONES Y GARANT&Iacute;AS DE CAR&Aacute;CTER GENERAL</strong><br /> <br /> II.1. MYDESIGN manifiesta y garantiza que el sitio web dispone de la tecnolog&iacute;a (software y hardware) necesaria, al d&iacute;a de la fecha, para permitir el acceso y utilizaci&oacute;n del mismo. Sin embargo, MYDESIGN no se responsabiliza por la eventual existencia de virus u otros elementos nocivos, introducidos por cualquier medio o por cualquier tercero, que puedan producir alteraciones en los sistemas inform&aacute;ticos del Usuario, ni por las consecuencias perjudiciales que las mismas puedan producir en los sistemas inform&aacute;ticos del Usuario. El Usuario acepta plenamente lo anterior y se compromete, de su parte, a desplegar la m&aacute;xima diligencia y prudencia cuando acceda y utilice los Servicios que se ofrecen a trav&eacute;s del Sitio web.<br /> <br /> II.2. El Usuario acepta que el sitio web ha sido creado y desarrollado de buena fe por MYDESIGN con informaci&oacute;n procedente de fuentes internas y externas y lo ofrece en su estado actual a los Usuarios, pudiendo, no obstante, contener falsedades, inexactitudes, omisiones relevantes, imprecisiones o erratas. MYDESIGN, en consecuencia, no garantiza en ning&uacute;n caso la veracidad, exactitud, actualidad como tampoco la exhaustividad de los contenidos del sitio web. Por ello el Usuario exonera a MYDESIGN de cualquier responsabilidad en relaci&oacute;n con la fiabilidad, utilidad o falsas expectativas que el sitio web pudiera producirle o generarle durante su navegaci&oacute;n por el mismo.<br /> <br /> II.3. El Usuario garantiza que cualesquiera actividades por &eacute;l desarrolladas a trav&eacute;s del sitio web se adecuar&aacute;n a la ley, la moral, las buenas costumbres aceptadas generalmente y al orden p&uacute;blico, y que en ning&uacute;n caso resultar&aacute;n ofensivas para el buen nombre de MYDESIGN o para el resto de Usuarios del sitio web.<br /> <br /> II.4. En particular, a t&iacute;tulo meramente enunciativo y no limitativo, el Usuario se compromete a no utilizar los Servicios con finalidad de:</p>\n<ul>\n<li>suplantar la identidad de un      tercero; </li>\n<li>vulnerar los derechos      fundamentales y libertades p&uacute;blicas reconocidas en la normativa nacional y      en los tratados o convenios internacionales, y, en particular, a no      lesionar el honor, la intimidad personal, la imagen o la propiedad de      bienes y derechos de terceros;</li>\n<li>incitar o promover acciones      delictivas, denigrantes, difamatorias, ofensivas o, en general, contrarias      a la ley, a la moral, a las buenas costumbres generalmente aceptadas o al      orden p&uacute;blico;</li>\n<li>inducir o promover      actuaciones o ideas discriminatorias por raz&oacute;n de raza, sexo, ideolog&iacute;a,      religi&oacute;n o creencias; (*)</li>\n<li>incorporar, poner a disposici&oacute;n      o permitir acceder a productos, elementos, mensajes y/o servicios      delictivos, violentos, pornogr&aacute;ficos, ofensivos o, en general, contrarios      a la ley, a la moral o al orden p&uacute;blico;</li>\n<li>vulnerar los derechos de      propiedad intelectual o industrial pertenecientes a terceros;</li>\n<li>vulnerar la normativa sobre      secreto de las comunicaciones, normativa de publicidad y/o normativa de      competencia desleal;</li>\n<li>transmitir a trav&eacute;s del      Sitio web con dolo o culpa correo electr&oacute;nico, programas o datos      (incluidos virus y software nocivo) que causen o puedan causar da&ntilde;os o      perjuicios en cualquier grado a los sistemas inform&aacute;ticos de MYDESIGN o de      otros Usuarios o de terceros, as&iacute; como falsificar el origen del correo      electr&oacute;nico o de otro material contenido en un archivo que se transmita a      trav&eacute;s del sitio web.</li>\n</ul>\n<p><strong>III. LIMITACI&Oacute;N DE RESPONSABILIDAD DE CAR&Aacute;CTER GENERAL</strong><br /> <br /> III.1. MYDESIGN no efect&uacute;a manifestaciones ni ofrece garant&iacute;as de ninguna clase, ya sean expl&iacute;citas o impl&iacute;citas, en cuanto al funcionamiento del sitio web o a la informaci&oacute;n, contenido, software, materiales, o productos incluidos en el mismo en la medida que lo permita la legislaci&oacute;n aplicable. Asimismo, MYDESIGN queda exonerado de prestar cualesquiera garant&iacute;as ya sean expl&iacute;citas o impl&iacute;citas, incluidas, entre otras, las garant&iacute;as impl&iacute;citas de idoneidad para un fin determinado. MYDESIGN no ser&aacute; responsable de los da&ntilde;os o perjuicios de cualquier &iacute;ndole que puedan derivarse del uso de este sitio web, incluidos, entre otros, los da&ntilde;os directos e indirectos.<br /> <br /> III.2. MYDESIGN no se hace responsable de cualquier da&ntilde;os o perjuicios directos o indirectos que pudieran derivarse de la interrupci&oacute;n del Servicio por parte del sitio web as&iacute; como de su continuidad. Asimismo, MYDESIGN no se hace responsable de los posibles errores o deficiencias de seguridad que pudieran producirse por la utilizaci&oacute;n, por parte del Usuario, de un navegador de una versi&oacute;n no actualizada o insegura, as&iacute; como por la activaci&oacute;n de los dispositivos de conservaci&oacute;n de claves o c&oacute;digos de identificaci&oacute;n del Usuario registrado en el navegador o de los da&ntilde;os, errores o inexactitudes que pudieran derivarse del mal funcionamiento del mismo.<br /> <br /> III.3. MYDESIGN excluye toda responsabilidad por la licitud, contenido y calidad de los datos e informaciones ofrecidos por terceros a trav&eacute;s del sitio web.<br /> <br /> III.4. MYDESIGN no otorga garant&iacute;as de naturaleza alguna, ni expresa ni impl&iacute;citamente, respecto de la informaci&oacute;n que se transmita, distribuya, publique o almacene en el sitio web, ni de la utilizaci&oacute;n que los Usuarios, sus empleados o terceros hagan de la misma.<br /> <br /> III.5. En cualquier caso de responsabilidad exigible a MYDESIGN, &eacute;sta responder&aacute; tan s&oacute;lo por los da&ntilde;os y perjuicios efectiva y directamente causados por ella, sin incluir en ning&uacute;n caso compensaci&oacute;n por lucro cesante.<br /> <br /> III.6. El Usuario responder&aacute; por los da&ntilde;os y perjuicios de cualquier naturaleza que MYDESIGN pueda sufrir como consecuencia, directa o indirecta, del incumplimiento por parte del Usuario de las Condiciones Generales expuestas con anterioridad.</p>\n<p><strong>IV. V&Iacute;NCULOS O ENLACES HIPERTEXTUALES CON EL SITIO WEB</strong><br /> <br /> IV.1. Los Usuarios o los titulares de otros sitios web que pretendan crear un enlace de hipertexto (en adelante link) al sitio web deber&aacute;n asegurar y comprometerse al respecto de las reglas de MYDESIGN sobre enlaces en la Red. Dichas reglas consisten en:</p>\n<ul>\n<li>no establecer enlaces a      p&aacute;ginas o subp&aacute;ginas en las que no aparezca el logotipo de MYDESIGN;</li>\n<li>no establecer enlaces que      permitan la reproducci&oacute;n total o parcial de las p&aacute;ginas del sitio web; </li>\n<li>no realizar manifestaciones      falsas, inexactas, incorrectas, que puedan inducir a error o confusi&oacute;n o,      en general, que sean contrarias a la ley, la moral o las buenas      costumbres; </li>\n<li>no establecer links con      p&aacute;ginas que contengan contenidos, manifestaciones o propaganda de car&aacute;cter      racista, xen&oacute;fobo, pornogr&aacute;fico, de apolog&iacute;a del terrorismo o atentatoria      contra los derechos humanos y en general puedan perjudicar de cualquier      modo el buen nombre o la imagen de MYDESIGN. </li>\n</ul>\n<p>En cualquier caso, la inclusi&oacute;n de v&iacute;nculos o enlaces al sitio web por parte de otros sitios web no implica que MYDESIGN mantenga v&iacute;nculos o asociaci&oacute;n de ninguna clase con el titular de la web en la que se establezca el link ni, tanto menos, que MYDESIGN promocione, avale, garantice o recomiende los contenidos de dichos portales o sitios web.<br /> <br /> IV.2. Por su parte, el sitio web puede contener v&iacute;nculos o enlaces con otros portales o sitios web no gestionados por MYDESIGN. MYDESIGN declina toda responsabilidad por las informaciones contenidas en dichos portales o sitios web a los que se pueda acceder por enlaces ("links") o buscadores de las p&aacute;ginas web de MYDESIGN. La presencia de enlaces ("links") en las p&aacute;ginas web de MYDESIGN tiene finalidad meramente informativa. Por tanto, MYDESIGN no se responsabiliza ni otorga garant&iacute;a de ninguna naturaleza, ni expresa ni impl&iacute;citamente respecto a:</p>\n<ul>\n<li>la comerciabilidad,      idoneidad, calidad, cantidad, caracter&iacute;sticas, procedencia u origen,      comercializaci&oacute;n o cualquier otro aspecto de las informaciones, productos      o servicios que se ofrezcan y comercialicen a trav&eacute;s del sitio web;</li>\n<li>los da&ntilde;os y perjuicios      directos, indirectos o de cualquier otro tipo que pudiesen generar las      informaciones, productos o servicios que se ofrezcan, comercialicen,      adquieran, vendan o presten a trav&eacute;s del sitio web;</li>\n<li>los precios ofertados o      pactados por los Usuarios con las entidades oferentes;</li>\n<li>ni las transacciones u      operaciones que se lleven a cabo entre ellos; </li>\n<li>ni del buen fin de las      mismas; </li>\n<li>ni sobre los t&eacute;rminos y      condiciones que entre ellos pacten en sus negocios y condiciones de usos,      ni de sus modificaciones, cumplimiento y ejecuci&oacute;n, facturaci&oacute;n, forma y      medios de pago y resoluci&oacute;n; </li>\n<li>ni de las informaciones que      entre ellos puedan intercambiarse; </li>\n<li>ni del contenido y uso de      las informaciones de car&aacute;cter personal o no que dichas entidades requieran      al Usuario para captar y llevar a cabo las operaciones; </li>\n<li>ni de la publicidad que      puedan hacer uso los Usuarios, ni del uso que los Usuarios puedan realizar      de los signos distintivos de un tercero o de los suyos propios.</li>\n</ul>\n<p><strong>V. SUSPENSI&Oacute;N DEL ACCESO AL SITIO WEB Y DE LOS SERVICIOS</strong><br /> <br /> V.1. MYDESIGN se esforzar&aacute; en mantener la disponibilidad continuada del sitio web. No obstante, cualquier modalidad de operaci&oacute;n de prueba, control y mantenimiento ser&aacute;n libremente elegidas y realizadas por MYDESIGN en cualquier momento, sean cuales fueren los procedimientos y medios empleados para llevarlas a cabo.<br /> <br /> V.2. MYDESIGN se reserva la plena libertad para modificar las capacidades de transmisi&oacute;n, seguimiento u otros medios o servicios t&eacute;cnicos utilizados para el acceso o utilizaci&oacute;n del sitio web.<br /> <br /> V.3. MYDESIGN podr&aacute; suspender de forma temporal o definitiva los servicios, sin que ello genere ning&uacute;n tipo de indemnizaci&oacute;n a favor del Usuario, cuando concurra cualquiera de las siguientes circunstancias:</p>\n<ul>\n<li>cuando sea necesario para      realizar labores de mantenimiento; </li>\n<li>cuando sea necesario para      preservar la integridad o la seguridad de los equipos, de los sistemas o      de las redes de MYDESIGN o de terceros;</li>\n<li>cuando as&iacute; lo justifiquen      razones operativas propias o de terceros que afecten a la prestaci&oacute;n de      los servicios de MYDESIGN; </li>\n<li>cuando exista una causa de      fuerza mayor. A estos efectos, se entender&aacute; por fuerza mayor, a t&iacute;tulo      enunciativo pero no limitativo: </li>\n</ul>\n<p>- todo suceso no culposo imposible de prever o que previsto o previsible, fuere inevitable;<br /> - los fallos en el acceso a las distintas p&aacute;ginas web; <br /> - los fallos en el suministro de red el&eacute;ctrica o telef&oacute;nica; <br /> - los da&ntilde;os producidos por terceros o ataques al servidor del sitio web (virus) que afecten a la calidad de los servicios y no sean imputables ni a MYDESIGN ni al Usuario; <br /> - los fallos en la transmisi&oacute;n, difusi&oacute;n, almacenamiento o puesta en disposici&oacute;n a terceros de las bases de datos y dem&aacute;s contenidos del sitio web y; <br /> - los problemas o errores en la recepci&oacute;n, obtenci&oacute;n o acceso al sitio web o a los servicios por parte de dichos terceros.</p>\n<p><strong>VI. TERMINACI&Oacute;N</strong><br /> <br /> MYDESIGN podr&aacute; dar por terminado el uso del sitio web, sin necesidad de preaviso alguno al Usuario, cuando:</p>\n<ul>\n<li>tenga conocimiento de la      realizaci&oacute;n por parte del Usuario de alguna actividad il&iacute;cita a trav&eacute;s de      los servicios, y; </li>\n<li>el Usuario haya incumplido      alguna de sus obligaciones esenciales y especialmente en caso de uso      indebido del c&oacute;digo de acceso y en caso de vulneraci&oacute;n o impugnaci&oacute;n de      los derechos de propiedad intelectual e industrial del sitio web;</li>\n</ul>\n<p><br /> Todo ello sin perjuicio del ejercicio de cuantas acciones legales le correspondan en defensa de sus intereses.<br /> <br /> <strong>VII. POL&Iacute;TICA DE PROTECCI&Oacute;N DE DATOS</strong><br /> <br /> VII.1. MYDESIGN garantiza que los datos aportados por los usuarios son voluntarios y confidenciales. El usuario autoriza el tratamiento y la cesi&oacute;n, incluso internacional, en su caso, de sus datos personales con la finalidad de posibilitar la plena prestaci&oacute;n de los servicios objeto de la actividad de MYDESIGN.<br /> <br /> VII.2. MYDESIGN sigue todos los requerimientos de protecci&oacute;n de datos establecidos por la Ley Org&aacute;nica 15/1999, de 13 de diciembre, de Protecci&oacute;n de datos de car&aacute;cter personal, (LOPD), y en su cumplimiento garantiza los derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n y oposici&oacute;n mediante correo electr&oacute;nico a info@mydesign.com.ar.<br /> <strong><br /> VIII. POL&Iacute;TICA DE COOKIES</strong><br /> <br /> MYDESIGN utiliza cookies para lograr una mayor efectividad y eficacia en la prestaci&oacute;n de los servicios que ofrece. Las ventajas que conlleva la aceptaci&oacute;n de nuestras cookies se traduce en un ahorro de tiempo. Mediante el uso de las cookies el usuario no tiene que verificar el proceso de registro con car&aacute;cter reiterativo y se personalizan los servicios facilitando as&iacute; su navegaci&oacute;n por nuestro sitio web.<br /> <br /> A&uacute;n cuando configurase su navegador en el sentido de rechazar la descarga de todos los ficheros de "cookies" o rechazase expresamente las cookies de MYDESIGN, usted podr&aacute; navegar en nuestro sitio web con el &uacute;nico inconveniente de no poder participar en todos y cada uno de los servicios ofrecidos que requieran la instalaci&oacute;n de alguna de ellas. Concretamente, usted no podr&aacute; utilizar los servicios para los que sea necesario registrarse lo que, a t&iacute;tulo de ejemplo, incluir&iacute;a servicios como el de informaci&oacute;n de Promociones, Programas ROM, Empleo, o cualquier otro apartado en el que sea necesaria autentificaci&oacute;n. Las cookies que MYDESIGN descarga en su disco duro se utilizan para:</p>\n<ul>\n<li>Conservar los resultados de      la &uacute;ltima b&uacute;squeda. </li>\n<li>Guardar los permisos de los      usuarios que han sido autentificados. </li>\n<li>Medir algunos par&aacute;metros de      tr&aacute;fico de red, las &aacute;reas de la web de MYDESIGN m&aacute;s visitadas, los filtros      de visita utilizados y otros par&aacute;metros estad&iacute;sticos. </li>\n</ul>\n<p><br /> &copy; MYDESIGN, Todos los derechos reservados</p>', '1286420400', '1290999600');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents_services`
--

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
(1, 1, 'disenio_grafico', 'identidad-corporativa', 'Identidad Corporativa', '<p>La Identidad Corporativa incluye principalmente el desarrollo  de  la marca...</p>', '<p>La Imagen Corporativa incluye principalmente el desarrollo de  la marca (logotipo, isotipo, etc.) y piezas de soporte. Los  elementos  compositivos son agrupados en un manual de normas en donde se  establece c&oacute;mo deben aplicarse.</p>\n<p>Un dise&ntilde;o de logo adecuado es fundamental para una empresa y para su imagen corporativa. El disponer de un dise&ntilde;o de logotipo profesional, reflejar&aacute; tanto su actividad como filosof&iacute;a empresarial</p>\n<p>Algunas de las piezas incluidas en el dise&ntilde;o de Identidad Corporativa son:</p>\n<ul>\n<li>Papeler&iacute;a corporativa (tarjetas de presentaci&oacute;n, hojas membretadas, sobres, carpetas corporativas, invitaciones,  etiquetas de env&iacute;o, formularios, etc.); </li>\n<li>papeler&iacute;a fiscal (facturas,  notas de venta, sellos fiscales, etc.), </li>\n<li>gr&aacute;fica vehicular, </li>\n<li>g&aacute;fica para  indumentaria institucional, </li>\n<li>se&ntilde;alizaci&oacute;n, entre otras.</li>\n</ul>\n<img src="./uploads/kcfinder/image/Disenio%20Grafico/imagen-identidad-corporativa.jpg" alt="" width="524" height="318" /><br />', '1_12891762524cd744bcf1596__thumb-identidad-corporativa.jpg', 1, '1286420400', '1290999600'),
(3, 1, 'disenio_grafico', 'diseno-editorial', 'Diseño Editorial', '<p>Es la cara visible de todo local comercial de vista al publico ...</p>', '<p>Es la cara visible de todo local comercial de vista al publico. El objetivo del dise&ntilde;o de carteler&iacute;a es captar mayor atenci&oacute;n logrando que el p&uacute;blico pueda ubicar e identificar con mayor facilidad el local.</p>\n<p>Este dise&ntilde;o ayuda a dar una imagen competitiva en el mercado, diferenci&aacute;ndola del resto y d&aacute;ndole su propia identidad visible de cara al publico.</p>\n<p>Ofrecemos una amplia gama de posibilidades de acuerdo con las necesidades de cada compa&ntilde;&iacute;a y del p&uacute;blico al que se dirige, realizamos trabajos en diferentes tama&ntilde;os y estilos seg&uacute;n las necesidades de su empresa.</p>\n<p><img src="./uploads/kcfinder/image/Disenio%20Grafico/imagen-editorial.jpg" alt="" /></p>', '3_12892438574cd84cd138afc__thumb-diseno-editorial.jpg', 3, '1286420400', '1290999600'),
(4, 1, 'disenio_grafico', 'diseno-packaging', 'Diseño Packaging', '<p>Dise&ntilde;amos packaging para todo tipo de productos ...</p>', '<p>Dise&ntilde;amos packaging para todo tipo de productos. Disponer de un buen <strong>dise&ntilde;o de packaging</strong> de su producto es de vital importancia para aumentar las ventas del mismo.</p>\n<p>Est&aacute; comprobado que renovando el dise&ntilde;o de un producto se podr&aacute; llegar a duplicar las ventas del mismo.</p>\n<p>La imagen de sus productos debe <strong>representar la estrategia</strong> corporativa de la marca y reflejar el contenido informativo necesario para brindar una <strong>imagen impecable</strong>, que seduzca, llame la atenci&oacute;n e invite a adquirirlo.</p>\n<p><img src="./uploads/kcfinder/image/Disenio%20Grafico/imagen-packaging.jpg" alt="" width="429" height="409" /></p>', '3_12892437344cd84c568eef1__thumb-packaging.jpg', 4, '1286420400', '1290999600'),
(5, 1, 'disenio_grafico', 'diseno-publicitario', 'Diseño Publicitario', '<p>Realizamos campa&ntilde;as exitosas que provocan decisiones de compra en el consumidor ...</p>', '<p>Realizamos campa&ntilde;as exitosas que provocan decisiones de compra en el consumidor. Ofrecemos servicios de <strong>publicidad gr&aacute;fica</strong> de forma individualizada o en forma de campa&ntilde;as publicitarias.</p>\n<p>Creamos conceptos creativos con im&aacute;genes impactantes y el uso de las &uacute;ltimas tecnolog&iacute;as y tendencias a fin de alcanzar las mejores soluciones que rentabilicen al m&aacute;ximo las inversiones realizadas por nuestros clientes.</p>\nNuestro dise&ntilde;o de Publicidad abarca:<br /> \n<ul class="list-item">\n<li>Anuncios para revistas.</li>\n<li>Anuncios para prensa diaria o escrita.</li>\n<li>Publicidad directa.</li>\n</ul>\n<img src="./uploads/kcfinder/image/Disenio%20Grafico/imagen-publicidad.jpg" alt="" width="576" height="320" /><br />', '3_12892306184cd8191a27c2d__thumb-diseno-publicitario.jpg', 5, '1286420400', '1290999600'),
(6, 1, 'disenio_grafico', 'diseno-multimedia', 'Diseño Multimedia', '<p>El dise&ntilde;o multimedia sirve como una importante herramienta de marketing ...</p>', '<p>El dise&ntilde;o multimedia sirve como una importante herramienta de marketing que suma multiples recursos como el dise&ntilde;o, la animaci&oacute;n, el video, la fotograf&iacute;a y hasta la interacci&oacute;n con el cliente.</p>\nNuestro dise&ntilde;o Multimedia abarca:<br /> \n<ul class="list-item">\n<li>Presentaciones multimedia. CD-Roms</li>\n<li>Intros en flash, banners din&aacute;micos.</li>\n<li>Animaciones y tours virtuales.</li>\n<li>Modelado 3D, Realidad virtual</li>\n</ul>\n<img src="./uploads/kcfinder/image/Disenio%20Grafico/imagen-multimedia.jpg" alt="" width="546" height="366" /><br />', '3_12905204494cebc78181982__thumb-multimedia.jpg', 6, '1286420400', '1290999600'),
(7, 1, 'disenio_web', 'web-institucional', 'Web Institucional', '<p>Para poder insertar su Pyme o simplemente tener su pagina personal. Obteniendo ...</p>', '<p>Para poder insertar su Pyme o simplemente tener su p&aacute;gina personal. Obteniendo un dise&ntilde;o profesional y permiti&eacute;ndole abrir paso a su negocio en Internet.</p>\n<p>Consiste en realizar en forma atractiva una presentaci&oacute;n eficaz de su empresa, de modo que la pagina sirva de toma de contacto a sus clientes a trav&eacute;s de Internet. En ella se podr&aacute;n colocar fotos, textos, im&aacute;genes y datos de contacto.</p>\n<p>Es la opci&oacute;n m&aacute;s usada por las PYMES, que desean tener una presencia en Internet junto con sus direcciones de correo personalizadas para reforzar su imagen ante sus clientes.</p>\n<p>Estamos interesados en brindar una soluci&oacute;n para las necesidades de cada cliente. Orientado a nuevos emprendimientos y negocios j&oacute;venes que buscan dar un paso adelante.</p>', '1_12891758934cd74355850f6__thumb-institucional.jpg', 1, '1286420400', '1290394800'),
(8, 1, 'disenio_web', 'web-autoadministrable', 'Web Autoadministrable', '<p>Cuenta con una interfaz para poder modificar el contenido sin causar...</p>', '<p>Cuenta con una interfaz para poder modificar el contenido sin causar ning&uacute;n efecto en el dise&ntilde;o. Permite un f&aacute;cil control y publicaci&oacute;n de los cambios en el sitio.</p>\n<p>La combinaci&oacute;n mas potente actualmente en lo que se trata de webs con gran dinamismo y funcionalidad. Es la soluci&oacute;n m&aacute;s pr&aacute;ctica y utilizada hoy en d&iacute;a para la administraci&oacute;n de webs que conllevan actualizaci&oacute;n continua.</p>\n<p>El manejo adecuado de la informaci&oacute;n puede marcar la diferencia, un sistema de gesti&oacute;n de contenido (CMS) debe ser f&aacute;cil de mantener y actualizar, nuestro equipo de profesionales dise&ntilde;a y desarrolla estrat&eacute;gicamente los gestores de contenido <strong>a medida</strong> para que sean escalables, permitiendo as&iacute; su <strong>f&aacute;cil modificaci&oacute;n</strong> y adaptaci&oacute;n con los requisitos establecidos.</p>\n<p>En definitiva, un sitio autoadministrable le permitir&aacute; tener control total de su sitio sin cargo alguno de mentenimiento mensual.</p>', '1_12891759944cd743baea6e4__thumb-autoadmin.jpg', 2, '1286420400', '1290394800'),
(9, 1, 'disenio_web', 'web-inmobiliario', 'Web Inmobiliario', '<p>A trav&eacute;s de nuestro sistema <strong>Inmobiliario</strong> logre una mayor din&aacute;mica en la compra, venta ...</p>', '<p>A trav&eacute;s de nuestro sistema <strong>Inmobiliario</strong> logre una mayor din&aacute;mica en la compra, venta y alquiler de propiedades en Internet.</p>\n<p>Permiti&eacute;ndole llegar al potencial cliente nacional e internacional y acceso permanente e ilimitado a su oferta inmobiliaria, reduciendo considerablemente los costos de operaci&oacute;n.</p>\n<p>Mejore la relaci&oacute;n con sus clientes, ofreciendo informaci&oacute;n y precios siempre actualizados. Sus inmuebles van a estar disponibles para que todos sus clientes actuales y potenciales puedan consultarlos las 24 horas del d&iacute;a.</p>\nNuestro sistema inmobiliario incluye:<br />\n<ul class="list-item">\n<li>Buscador de propiedades por zona/costo/alquiler.</li>\n<li>Administrador web de propiedades y clientes.</li>\n<li>Asignaci&oacute;n de relevancia y destacados.</li>\n</ul>', '1_12891760414cd743e924b5f__thumb-inmobiliario.jpg', 3, '1286420400', '1290394800'),
(10, 1, 'disenio_web', 'catalogo-de-productos', 'Catálogo de Productos', '<p>Ideal para empresas con una amplia gama de productos o servicios ...</p>', '<p>Ideal para empresas con una amplia gama de productos o servicios. Este sistema le permitir&aacute; listar detalladamente todos sus productos o servicios.</p>\n<p>Un catalogo de productos es la mejor manera de mostrar sus productos en un concepto integral ya que facilitar&aacute; el acceso a ellos y mejorar&aacute; su imagen como empresa.</p>\n<p>El servicio de cat&aacute;logos online se adapta m&aacute;s a empresas que buscan mostrar su cartera de productos o servicios con el objetivo de informar pero no de realizar la venta v&iacute;a internet.</p>\nNuestro catalogo incluye:<br /> \n<ul class="list-item">\n<li>Administrador web de Cat&aacute;logo y Contenido</li>\n<li>Actualizaciones masivas</li>\n<li>Galer&iacute;a de im&aacute;genes avanzada</li>\n<li>Seguridad, Actualizaci&oacute;n y Soporte</li>\n</ul>', '1_12891760924cd7441c33c04__thumb-catalogo.jpg', 4, '1286420400', '1290394800'),
(11, 1, 'disenio_web', 'carrito-de-compras', 'Carrito de Compras', '<p>Venda sus productos a todo el mundo. Nuestra soluci&oacute;n de comercio electr&oacute;nico ...</p>', '<p>Venda sus productos a todo el mundo. Nuestra soluci&oacute;n de comercio electr&oacute;nico cuenta con las funcionalidades necesarias para optimizar las ventas y garantizar a los usuarios una compra segura.</p>\n<p>Es una potente y flexible plataforma de comercio electr&oacute;nico que junto a un sistema sencillo de operar con cientos de funcionalidades y todos los servicios necesarios para promover su negocio en Internet en forma efectiva y econ&oacute;mica</p>\nNuestro sistema e-commerce incluye:<br /> \n<ul class="list-item">\n<li>Catalogo de productos.</li>\n<li>C&aacute;lculo autom&aacute;tico de costo y tiempo de env&iacute;o</li>\n<li>Administrador web de clientes y &oacute;rdenes.</li>\n<li>Automatizaci&oacute;n de pedidos, descuentos y promociones.</li>\n</ul>', '1_12891757424cd742be7594a__thumb-carrito-de-compras.jpg', 5, '1286420400', '1290394800'),
(12, 1, 'disenio_web', 'guia-turistica', 'Guía Turística', '<p>Ofrece una soluci&oacute;n absolutamente flexible y escalable ...</p>', '<p>Ofrece una soluci&oacute;n absolutamente flexible y escalable. Tanto microempresas o agentes independientes como grandes organizaciones encuentran en &eacute;l, el sistema Web adecuado para la exposici&oacute;n de sus servicios a trav&eacute;s de Internet. Desde una peque&ntilde;a cartera de anunciantes hasta una enorme cantidad de categor&iacute;as y destinos.</p>\n<p>Es un sistema concebido con el objetivo de permitir a nuestros clientes la capacidad de contacto r&aacute;pido y directo mediante reservas on line. Desde su panel de control podr&aacute;, de forma interactiva modificar los contenidos, adem&aacute;s de agregar y editar anunciantes, categor&iacute;as, ubicaciones y destacados.</p>\nEl sistema incluye entre otros:<br /> \n<ul class="list-item">\n<li>Gesti&oacute;n de anunciantes.</li>\n<li>Gesti&oacute;n de categor&iacute;a y destinos.</li>\n<li>Formulario de reservas.</li>\n<li>Gesti&oacute;n de publicidades.</li>\n<li>Gesti&oacute;n de idiomas.</li>\n</ul>', '1_12891761284cd74440e6004__thumb-turistica.jpg', 6, '1286420400', '1290394800'),
(13, 1, 'marketing_online', 'search-engine-marketing', 'Search Engine Marketing', '<p>Planificaremos y gestionaremos su campa&ntilde;a de publicidad en buscadores mediante el sistema de pago por clic ...</p>', '<p>Planificaremos y gestionaremos su campa&ntilde;a de publicidad en buscadores mediante el sistema de pago por clic.</p>\n<p>Podr&aacute; aparecer a la derecha y en recuadro superior a la lista de resultados naturales. Significa estar en las primeras p&aacute;ginas de los buscadores en el listado preferencial de enlaces patrocinados. Esta posici&oacute;n se compra mediante subasta y se paga por cada usuario que usa el enlace o link (Pago por click). Su precio var&iacute;a en funci&oacute;n del criterio de b&uacute;squeda en el que se quiere aparecer y la posici&oacute;n que se quiere obtener.</p>\nNuestro servicio SEM le proporciona:<br /> \n<ul class="list-item">\n<li>Rentabilidad a corto plazo</li>\n<li>Resultados inmediatos</li>\n<li>Alta flexibilidad y visitas de calidad</li>\n</ul>\n<img src="./uploads/kcfinder/image/Marketing%20Online/imagen-sem.jpg" alt="" width="622" height="244" /><br />', '3_12892306844cd8195cb43d4__thumb-sem.jpg', 1, '1286420400', '1290999600'),
(14, 1, 'marketing_online', 'search-engine-optimization', 'Search Engine Optimization', '<p>Aumente el tr&aacute;fico cualificado hacia su web mediante la optimizaci&oacute;n de la estructura y contenidos de la misma ...</p>', '<p>Aumente el tr&aacute;fico cualificado hacia su web mediante la <strong>optimizaci&oacute;n de la estructura y contenidos</strong> de la misma.</p>\n<p>Con nuestras t&eacute;cnicas podemos mejorar notablemente el orden de posici&oacute;n que su empresa obtiene en las b&uacute;squedas org&aacute;nicas hasta hacerla llegar a los primeros puestos.</p>\n<p>Corresponde &uacute;nicamente a los web-sites que el buscador ha seleccionado como objetivamente m&aacute;s adecuados a los criterios de b&uacute;squeda usados. Las posiciones obtenidas siempre son las primeras y el retorno de inversi&oacute;n es muy alto.</p>\nNuestro servicio SEO le proporciona:<br /> \n<ul class="list-item">\n<li>Alta flexibilidad y visitas de calidad</li>\n<li>Incrementar el tr&aacute;fico hacia su web</li>\n<li>Alta en cientos de buscadores</li>\n</ul>\n<img src="./uploads/kcfinder/image/Marketing%20Online/imagen-seo.jpg" alt="" width="635" height="180" /><br />', '3_12892307194cd8197f67041__thumb-seo.jpg', 2, '1286420400', '1290999600'),
(15, 1, 'marketing_online', 'e-mail-marketing', 'E-mail Marketing', '<p>Es una poderosa herramienta de marketing directo que permite ...</p>', '<p>Es una poderosa herramienta de marketing directo que permite la comunicaci&oacute;n con sus clientes actuales o potenciales mediante el env&iacute;o de e-mails. Adem&aacute;s le brinda la posibilidad de determinar y elegir el target de personas ya sea por pa&iacute;s, idioma, etc.</p>\n<p>De esta manera, la inversi&oacute;n involucra a posibles compradores potenciales y no a terceros sin inter&eacute;s. Tendr&aacute; a su disposici&oacute;n la opci&oacute;n de segmentar su campa&ntilde;a y hacerla mas efectiva.</p>\nLa utilizaci&oacute;n del e-mail marketing le permitir&aacute; a su empresa realizar una comunicaci&oacute;n econ&oacute;mica, r&aacute;pida y sencilla. Ofrecemos:<br /> \n<ul class="list-item">\n<li>Desarrollo de estrategias de e-mail marketing</li>\n<li>Conformaci&oacute;n de bases de datos a medida</li>\n<li>Gesti&oacute;n de env&iacute;o</li>\n<li>Reportes estad&iacute;sticos</li>\n</ul>\n<img src="./uploads/kcfinder/image/Marketing%20Online/imagen-newsletter.jpg" alt="" width="510" height="284" /><br />', '1_12892311604cd81b38391e9__thumb-diseno-publicitario.jpg', 3, '1286420400', '1290999600'),
(16, 1, 'marketing_online', 'fanpage-facebook', 'FanPage (Facebook)', '<p>Las campa&ntilde;as publicitarias realizadas por Banners se apoyan en todos los medios disponibles ...</p>', '<p>Las campa&ntilde;as publicitarias realizadas por Banners se apoyan en todos los medios disponibles. La diversidad de productos al alcance del cliente es muy amplia.</p>\n<p>Un banner es un v&iacute;nculo que trabaja como una herramienta de mercadeo para su empresa, y como una puerta de entrada a su sitio Web. Como una forma de dirigir tr&aacute;fico de calidad hacia su sitio Web, que resultar&aacute; en incrementos en las ventas, entendemos que los banners deben ser atractivos y dar una raz&oacute;n para que les hagan click.</p>\nPara esto ofrecemos:<br /> \n<ul class="list-item">\n<li>Dise&ntilde;o orientado a objetivos.</li>\n<li>Gran variedad de estilos.</li>\n<li>Revisiones y conceptos ilimitados.</li>\n</ul>\n<img src="./uploads/kcfinder/image/Marketing%20Online/imagen-fan-page.jpg" alt="" width="469" height="334" /><br />', '3_12892309064cd81a3ae1a62__thumb-fan-page.jpg', 4, '1286420400', '1290999600'),
(17, 1, 'marketing_online', 'canal-youtube', 'Canal YouTube', '<p>El e-mail se ha convertido en un medio muy eficaz para la promoci&oacute;n de productos y servicios ...</p>', '<p>El e-mail se ha convertido en un medio muy eficaz para la promoci&oacute;n de productos y servicios de una manera r&aacute;pida y econ&oacute;mica, permitiendo alcanzar con el mensaje publicitario a una audiencia calificada y de manera personalizada.</p>\n<p>Nuestro equipo creativo, trabaja en conjunto para el dise&ntilde;o de publicidades optimizadas para su env&iacute;o por e-mail. Se aprovechan las excelentes capacidades de Internet para presentar copias publicitarias altamente atractivas con el prop&oacute;sito de crear publicidades que induzcan a la interactividad.</p>\nSe realizan dise&ntilde;os de:<br /> \n<ul class="list-item">\n<li>Emails publicitarios.</li>\n<li>Cupones o invitaciones.</li>\n<li>Newsletters.</li>\n</ul>\n<img src="./uploads/kcfinder/image/Marketing%20Online/imagen-canal-youtube.jpg" alt="" width="411" height="328" /><br />', '3_12892309674cd81a773a866__thumb-canal-youtube.jpg', 5, '1286420400', '1290999600'),
(18, 1, 'marketing_online', 'marketing-viral', 'Marketing Viral', '<p>Mediante una campa&ntilde;a de marketing viral se busca que la misma llegue a la mayor cantidad de usuarios ...</p>', '<p>Mediante una campa&ntilde;a de marketing viral se busca que la misma llegue a la mayor cantidad de usuarios posibles. Se lo podr&iacute;a asemejar a un servicio de boca a boca virtual</p>\n<p>Para conseguir este boca a boca hay muchas t&eacute;cnicas, pero la base siempre es la misma, hacer algo llamativo, curioso o interesante que la gente quiera o desee compartir y se lo env&iacute;en los unos a los otros.</p>\n<p>Para eso, ofrecemos la difusi&oacute;n de contenidos (ya sean textos, im&aacute;genes o videos) mediante las distintas plataformas y comunidades 2.0 como facebook, youtube, myspace, sonico y distintos blogs relacionados a cada necesidad.</p>\n<p><img src="./uploads/kcfinder/image/Marketing%20Online/imagen-marketing-viral.jpg" alt="" width="405" height="304" /></p>', '3_12892308294cd819edab21f__thumb-marketing-viral.jpg', 6, '1286420400', '1290999600');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents_services_gallery`
--

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
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `platform` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date_add` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `ip`, `browser`, `platform`, `message`, `date_add`) VALUES
(1, 'sdfsd', '0261 - 4442192', 'iwmattoni@yahoo.com', '127.0.0.1', 'Firefox 3.6.12', 'Linux', 'sdfsdfsdf<br />\nsdfsñdfsdf', '1291086000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolio_clients`
--

CREATE TABLE IF NOT EXISTS `portfolio_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` char(10) NOT NULL,
  `last_modified` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Volcar la base de datos para la tabla `portfolio_clients`
--

INSERT INTO `portfolio_clients` (`id`, `name`, `filename`, `order`, `date_added`, `last_modified`) VALUES
(1, 'Ackon Cahuak', 'ackon-cahuak.jpg', 31, '1286420400', '1286420400'),
(2, 'Af Maquinas', 'af-maquinas.jpg', 5, '1286420400', '1286420400'),
(3, 'Aikido', 'aikido.jpg', 19, '1286420400', '1286420400'),
(4, 'Alquileres Temporarios', 'alquileres-temporarios.jpg', 12, '1286420400', '1286420400'),
(5, 'Argentina es Mendoza', 'argentinaesmendoza.jpg', 13, '1286420400', '1286420400'),
(6, 'Artrans', 'artrans.jpg', 3, '1286420400', '1286420400'),
(7, 'Azer', 'azer.jpg', 6, '1286420400', '1286420400'),
(8, 'Barahona Constructora', 'barahona.jpg', 27, '1286420400', '1286420400'),
(9, 'Bottino hnos', 'bottino-hnos.jpg', 4, '1286420400', '1286420400'),
(10, 'Brokers', 'brokers.jpg', 28, '1286420400', '1286420400'),
(11, 'Consurpyme', 'consurpyme.jpg', 16, '1286420400', '1286420400'),
(12, 'Cumbre textil', 'cumbre-textil.jpg', 17, '1286420400', '1286420400'),
(14, 'Federico Azpilcueta', 'federico-azpilcueta.jpg', 18, '1286420400', '1286420400'),
(15, 'Fundacion proambiente', 'fundacion-proambiente.jpg', 11, '1286420400', '1286420400'),
(17, 'Fya tour', 'fya-tour.jpg', 10, '1286420400', '1286420400'),
(18, 'Getsouth', 'get-south.jpg', 20, '1286420400', '1286420400'),
(19, 'Greenfields', 'greenfields.jpg', 7, '1286420400', '1286420400'),
(20, 'Grundfos', 'grundfos-bottino-subfactory.jpg', 15, '1286420400', '1286420400'),
(21, 'Jp Services', 'jp-services.jpg', 21, '1286420400', '1286420400'),
(22, 'Laco', 'laco.jpg', 22, '1286420400', '1286420400'),
(23, 'La primavera', 'laprimavera.jpg', 23, '1286420400', '1286420400'),
(24, 'Legal y Logistica', 'legalylogistica.jpg', 24, '1286420400', '1286420400'),
(25, 'Lexer', 'lexer.jpg', 32, '1286420400', '1286420400'),
(26, 'Lion', 'lion.jpg', 9, '1286420400', '1286420400'),
(27, 'LyC Consulta', 'lyc-consultora.jpg', 25, '1286420400', '1286420400'),
(28, 'Mendoza Andes', 'mendozaandes.jpg', 8, '1286420400', '1286420400'),
(30, 'SOP', 'sop.jpg', 29, '1286420400', '1286420400'),
(31, 'Termas del challao', 'termas-del-challao.jpg', 14, '1286420400', '1286420400'),
(32, 'Unique', 'unique.jpg', 26, '1286420400', '1286420400'),
(33, 'Vsisoluciones', 'vsisoluciones.jpg', 30, '1286420400', '1286420400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolio_works`
--

CREATE TABLE IF NOT EXISTS `portfolio_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `date_added` char(10) NOT NULL,
  `last_modified` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcar la base de datos para la tabla `portfolio_works`
--

INSERT INTO `portfolio_works` (`id`, `type`, `filename`, `name`, `url`, `order`, `date_added`, `last_modified`) VALUES
(1, 'web', 'web-aikido.jpg', 'Web autoadministrable', 'http://www.aikidoargentina.com/', 36, '1286420400', '1286420400'),
(3, 'web', 'web-alquileres-temporarios.jpg', 'Web inmobiliaria', 'http://www.alquilerestemporarios.org/', 32, '1286420400', '1290999600'),
(4, 'web', 'web-argentinaesmendoza.jpg', 'Web turistica', 'http://www.argentinaesmendoza.com.ar/', 34, '1286420400', '1290999600'),
(5, 'web', 'web-artrans.jpg', 'Catálogo de producto (En proceso)', '', 17, '1286420400', '1290999600'),
(6, 'web', 'web-azer.jpg', 'Web institucional', 'http://www.azerconsultores.com/', 18, '1286420400', '1290999600'),
(7, 'web', 'web-bottino-hnos.jpg', 'Catálogo de producto', 'http://www.ebhsa.com.ar/', 37, '1286420400', '1290999600'),
(8, 'web', '1_12909777194cf2c1b731936__web-brokers.jpg', 'Web autoadministrable', 'http://www.b-tbrokers.com/', 43, '1286420400', '1290999600'),
(9, 'web', '1_12909777484cf2c1d4b493c__web-consurpyme.jpg', 'Web autoadministrable', 'http://www.consurpyme.com.ar/', 42, '1286420400', '1290999600'),
(11, 'web', 'web-federico-azpilcueta.jpg', 'Web autoadministrable', 'http://www.federicoazpilcueta.com/', 25, '1286420400', '1290999600'),
(12, 'web', '1_12909779184cf2c27e7b2c0__web-fundacion-proambiente.jpg', 'Web institucional', '', 44, '1286420400', '1290999600'),
(14, 'web', '1_12909779304cf2c28ab9342__web-fya-tour.jpg', 'Web turistica', 'http://www.fyatour.com.ar/', 47, '1286420400', '1290999600'),
(15, 'web', '1_12909779454cf2c2993b754__web-get-south.jpg', 'Web turistica', 'http://www.getsouth.com/', 41, '1286420400', '1290999600'),
(16, 'web', '1_12909779574cf2c2a54379e__web-greenfields.jpg', 'Web autoadministrable', 'www.hinundwegfuerargentinien.com/', 48, '1286420400', '1290999600'),
(17, 'web', 'web-grundfos-subfactory-bottino.jpg', 'Catálogo de producto (En proceso)', '', 24, '1286420400', '1290999600'),
(18, 'web', '1_12909779694cf2c2b151c14__web-i-sim.jpg', 'Web autoadministrable', 'http://www.i-sim.com.ar/', 49, '1286420400', '1290999600'),
(19, 'web', '1_12909779804cf2c2bcf0a56__web-jp-services.jpg', 'Web autoadministrable', 'http://www.jp-services.com.ar/', 45, '1286420400', '1290999600'),
(20, 'web', '1_12909779944cf2c2ca1274d__web-laco.jpg', 'Web e-commerce', '', 50, '1286420400', '1290913200'),
(21, 'web', 'web-laprimavera.jpg', 'Web institucional', '', 51, '1286420400', '1286420400'),
(22, 'web', 'web-latinoamericaexporta.jpg', 'Web institucional', '', 52, '1286420400', '1286420400'),
(23, 'web', 'web-legalylogistica.jpg', 'Web autoadministrable (En proceso)', '', 27, '1286420400', '1290999600'),
(24, 'web', 'web-lyc-consultora.jpg', 'Web institucional', 'http://www.lycconsultora.com.ar/', 53, '1286420400', '1290999600'),
(25, 'web', 'web-mendozaandes.jpg', 'Web turistica', 'http://www.mendozaandes.com/', 30, '1286420400', '1290999600'),
(26, 'web', 'web-priolo.jpg', 'Catálogo de producto', 'http://www.priolo.com.ar/', 40, '1286420400', '1290999600'),
(27, 'web', 'web-respat.jpg', 'Web autoadministrable', 'http://www.respat.com.ar/', 38, '1286420400', '1290999600'),
(28, 'web', 'web-sop.jpg', 'Web institucional', 'http://www.sopbahiablanca.com.ar/', 54, '1286420400', '1290999600'),
(29, 'web', 'web-termasdelchallao.jpg', 'Web autoadministrable', 'http://www.termasdelchallao.com.ar/', 55, '1286420400', '1290999600'),
(30, 'web', 'web-unique.jpg', 'Web autoadministrable', 'http://www.uniquewp.com.ar/', 23, '1286420400', '1290999600'),
(31, 'web', 'web-vsisoluciones.jpg', 'Web autoadministrable', 'http://www.vsisoluciones.com.ar/', 56, '1286420400', '1290999600'),
(33, 'grafica', 'carta-sobre.jpg', 'Grafica carta,sobre', '', 21, '1286420400', '1286420400'),
(34, 'grafica', 'factura.jpg', 'Grafica factura', '', 20, '1286420400', '1286420400'),
(35, 'grafica', 'logo-legalylogistica.jpg', 'Grafica logo', '', 26, '1286420400', '1286420400'),
(36, 'grafica', 'logo-mendoza-andes.jpg', 'Grafica logo', '', 28, '1286420400', '1286420400'),
(37, 'grafica', 'logo-unique.jpg', 'Grafica logo', '', 19, '1286420400', '1286420400'),
(40, 'grafica', 'tarjetas-personales-mendozaandes.jpg', 'Grafica tarjeta', '', 29, '1286420400', '1286420400'),
(41, 'grafica', 'tarjetas-personales-unique.jpg', 'Grafica tarjeta', '', 22, '1286420400', '1286420400'),
(45, 'grafica', '3_12910521964cf3e4a4506fe__logo-alquileres-temporarios.jpg', 'Grafica Logo', '', 31, '1290999600', '1290999600'),
(46, 'grafica', '3_12910524284cf3e58c2ac8d__logo-argentinaesmendoza.jpg', 'Grafica Logo', '', 33, '1290999600', '1290999600'),
(47, 'grafica', '3_12910525344cf3e5f67f53a__logo-aikido.jpg', 'Grafica Logo', '', 35, '1290999600', '1290999600'),
(48, 'web', '3_12910528954cf3e75f3283f__web-barahona.jpg', 'Web autoadministrable (En proceso)', '', 39, '1290999600', '1290999600'),
(49, 'web', '3_12910529214cf3e7795cbd5__web-zona-ganjah.jpg', 'Web autoadministrable', 'www.zonaganjah.net', 46, '1290999600', '1290999600');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `setup`
--

CREATE TABLE IF NOT EXISTS `setup` (
  `var` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `setup`
--

INSERT INTO `setup` (`var`, `value`, `type`) VALUES
('title_general', 'Empresa de Diseño Web - Diseño de Paginas Web', 'meta'),
('keywords_general', 'diseño web, empresa de diseño web, diseño de paginas web, diseño paginas web, diseño web profesional, creacion paginas web, diseño web mendoza', 'meta'),
('description_general', 'Empresa de diseño web. Realizamos Diseño de Paginas Web optimizado para empresas y particulares, generando nuevas oportunidades de negocio.', 'meta'),
('title_disenioweb', 'Empresa de Diseño Web - Diseño de Paginas Web', 'meta'),
('keywords_disenioweb', 'diseño web, empresa de diseño web, diseño de paginas web, diseño paginas web, diseño web profesional, creacion paginas web, diseño web mendoza', 'meta'),
('description_disenioweb', 'Empresa de diseño web. Realizamos Diseño de Paginas Web optimizado para empresas y particulares, generando nuevas oportunidades de negocio.', 'meta'),
('title_diseniografico', 'Agencia de Diseño Grafico -  Estudio de diseño grafico creativo', 'meta'),
('keywords_diseniografico', 'diseño grafico, diseño industrial, diseño publicitario, estudio de diseño, diseño grafico creativo, empresa de diseño grafico, agencia de diseño, diseño de logotipos, diseño de packaging', 'meta'),
('description_diseniografico', 'Agencia de diseño grafico profesional. Somos un estudio de diseño grafico creativo. Realizamos diseño editorial, publicitario e identidad corporativa', 'meta'),
('title_marketingonline', 'Marketing Online y Posicionamiento web', 'meta'),
('keywords_marketingonline', 'posicionamiento web, marketing online, marketing on line, landing pages, fan page facebook, canal youtube, posicionamiento en buscadores, marketing viral, email marketing', 'meta'),
('description_marketingonline', 'Posicionamiento Web y Marketing Online. Realizamos optimizacion de sitios web.', 'meta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

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
