-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2025 a las 09:12:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fatebound_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_breves`
--

CREATE TABLE `historias_breves` (
  `historia_id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` varchar(500) NOT NULL,
  `contenido_completo` text NOT NULL,
  `autor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historias_breves`
--

INSERT INTO `historias_breves` (`historia_id`, `titulo`, `resumen`, `contenido_completo`, `autor`) VALUES
(1, 'El Eco de la Alarma', 'El primer dilema de Soren al despertar: ¿ceder a la pereza o enfrentar el día y sus responsabilidades? Una pequeña elección que define su mentalidad para el resto del día.', 'El pitido de la alarma te saca de un sueño confuso. Una voz extraña resonaba en tu cabeza, una voz que hablaba de consecuencias inevitables. Tu mano se extiende hacia el botón de posponer. Cinco minutos más, ¿qué diferencia harán? Una voz interior te recuerda la lista de cosas pendientes, la mirada de tu madre esperándote en la cocina, la tensión que inunda el ambiente desde que tu padre volvió a beber. Elegir \"5 minutos más\" es rendirse a la inercia, a esa cómoda penumbra que te protege del mundo exterior. Elegir \"Despertar\" es un acto de voluntad, un pequeño paso para tomar el control, aunque el día que te espera sea incierto. ¿Qué harás? El juego te recuerda: incluso esta mínima decisión forja tu carácter.', 'Equipo FateBound'),
(2, 'El Silencio en la Cocina', 'Aveline, inteligente pero reservada, se enfrenta al miedo de hablar sobre sus problemas familiares. ¿Debe compartir su preocupación con su madre o cargar el peso sola?', 'Bajas a la cocina. El aroma a café y tostadas intenta enmascarar la pesadez que hay en el aire. Serenya, tu madre, te saluda con una sonrisa forzada. Sabes que debajo de esa dulzura hay preocupación. Tuviste ese mismo sueño: la voz de las advertencias. ¿Se lo cuentas? Si eliges *Contarle sobre tu sueño*, abres una grieta de vulnerabilidad y ella podría presionarte o, peor aún, desviar la conversación. Si eliges *Ignorar a tu mamá*, mantienes la paz superficial, pero permites que el silencio se convierta en tu carga. El silencio, te das cuenta, es a menudo la decisión más pesada.', 'Equipo FateBound'),
(3, 'La Promesa Incumplida', 'Una reflexión profunda sobre el rol del amigo (Riven o Elara). ¿Qué tan dispuesto está el protagonista a esforzarse por mantener una amistad cuando las prioridades y las decisiones vitales se interponen?', 'Riven (o Elara) siempre ha sido tu cable a tierra, el escape divertido y despreocupado de la oscuridad de tu casa. Pero, al igual que tú, también tiene sus propios problemas y sus propias decisiones. ¿Lo has estado descuidando? El juego te pondrá a prueba: ¿Priorizarás tus estudios y tu estabilidad emocional, o harás el esfuerzo consciente de cuidar esa amistad vital, incluso cuando parezca que Riven/Elara está a un paso de tomar un mal camino? El precio de tu enfoque podría ser la soledad, pero el precio de la distracción podría ser el fracaso personal. Todo es una balanza.', 'Equipo FateBound');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `personaje_id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `perfil_psicologico` text DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`personaje_id`, `nombre`, `rol`, `descripcion`, `perfil_psicologico`, `imagen_url`) VALUES
(1, 'Soren', 'Protagonista Masculino (El Jugador)', 'Tímido y reservado, lucha con las inseguridades familiares. Su camino es determinado por el jugador.', 'Inseguro, introvertido, busca desesperadamente un rumbo en su vida.', 'soren.png'),
(2, 'Aveline', 'Protagonista Femenina (La Jugadora)', 'Sensible e inteligente, le cuesta expresar sus sentimientos y cargar problemas sola.', 'Empática, confundida por la presión familiar y el miedo al juicio de los demás.', 'aveline.png'),
(3, 'Riven', 'Amigo del Protagonista Masculino', 'Relajado y leal, es el confidente de Soren. Aunque a veces es impulsivo, su amistad es incondicional.', 'Impulsivo, pero sincero. Tiende a la acción antes que a la reflexión y ofrece un escape a Soren.', 'riven.png'),
(4, 'Elara', 'Amiga de la Protagonista Femenina', 'Extrovertida, protectora y empática. Confronta a Aveline si toma malas decisiones.', 'Leal, directa, ofrece un apoyo incondicional, pero exige honestidad.', 'elara.png'),
(5, 'Auron', 'Padre del Protagonista', 'Grosero, abusivo, agresivo y alcohólico. Desconectado emocionalmente de la familia.', 'Violento, autodestructivo, crea un ambiente tóxico y de constante tensión.', 'auron.png'),
(6, 'Serenya', 'Madre del Protagonista', 'Dulce y protectora, pero presiona inconscientemente a sus hijos. Oculta su sufrimiento.', 'Resiliente, pero agotada, intenta mantener una fachada de fuerza por el bien de la familia.', 'serenya.png'),
(7, 'Eldan', 'Padre de la Iglesia (Mentor)', 'Amable, calmado y muy sabio. Brinda apoyo emocional y guía espiritual.', 'Figura de mentor, intenta influir positivamente en el protagonista sin juzgar su situación.', 'eldan.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_foro`
--

CREATE TABLE `publicaciones_foro` (
  `post_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `username`, `email`, `password_hash`, `fecha_registro`) VALUES
(1, 'AdminFate', 'admin@fatebound.com', '$2y$10$w4r2.15zN.J0N7tEwNl8IuB.gXg.wJvL6VvLhXkY9Vl.u', '2025-11-24 02:02:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historias_breves`
--
ALTER TABLE `historias_breves`
  ADD PRIMARY KEY (`historia_id`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`personaje_id`);

--
-- Indices de la tabla `publicaciones_foro`
--
ALTER TABLE `publicaciones_foro`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historias_breves`
--
ALTER TABLE `historias_breves`
  MODIFY `historia_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `personaje_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `publicaciones_foro`
--
ALTER TABLE `publicaciones_foro`
  MODIFY `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones_foro`
--
ALTER TABLE `publicaciones_foro`
  ADD CONSTRAINT `publicaciones_foro_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
