<?php
/*

    ./app/modeles/postsModele.php

*/
namespace App\Modeles\PostsModele;

/**
 * [findAll description]
 * @param  PDO    $connexion [description]
 */
function findAll(\PDO $connexion) {
  $sql = "SELECT p.id AS postId,
                 p.title AS postTitle,
                 p.text AS postText,
                 p.created_at AS postDate,
                 p.quote AS postQuote,
                 p.category_id AS postCatagorieId,
                 c.id AS categorieId,
                 c.name AS categorieName,
                 c.created_at AS categorieDate
          FROM posts p
          JOIN categories c ON p.category_id = c.id
          ORDER BY p.created_at DESC
          LIMIT 10;";
  $rs = $connexion->query($sql);
  return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
