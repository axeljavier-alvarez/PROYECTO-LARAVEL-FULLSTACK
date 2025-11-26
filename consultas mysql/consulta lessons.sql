/* SELECT * FROM prices;

SELECT * FROM sections;
SELECT * FROM lessons; */
SELECT * FROM courses;
/* obtener lessons de sections del course_id 1 */
SELECT lessons.*
FROM lessons
JOIN sections ON lessons.section_id = sections.id
WHERE sections.course_id = 1;

   

/* obtener todas las lessons de la section 1 y del course 1*/
SELECT l.*
FROM lessons l
JOIN sections s ON l.section_id = s.id
WHERE s.id = 1
  AND s.course_id = 1
ORDER BY l.position ASC;

/* obtener la lesson 25 de la section 5 y el course 1*/
SELECT l.*
FROM lessons l
JOIN sections s ON l.section_id = s.id
WHERE s.id = 5
  AND s.course_id = 1
  AND l.id = 25
LIMIT 1;

/* obtener todas las sections del course 1 */
SELECT *
FROM sections
WHERE course_id = 1;



