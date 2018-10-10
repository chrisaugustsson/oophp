<?php

/**
 * Edit movies.
 */
$app->router->any("GET|POST", "movie/edit", function () use ($app) {

    $method = $app->request->getMethod();
    $id = $app->request->getGet("id");
    $resultset = null;
    $app->db->connect();

    if ($method === "GET") {
        $data = [
            "title" => "Movie database | oophp"
        ];

        $sql = "SELECT * FROM movie WHERE id LIKE ?;";
        $resultset = $app->db->executeFetchAll($sql, [$id]);

        $data["resultset"] = $resultset;
        $app->page->add("movie/edit", $data);

        return $app->page->render(["title" => "Movie database | oophp"]);
    } else {
        $title = $app->request->getPost("title");
        $year = $app->request->getPost("year");
        $image = $app->request->getPost("image");
        $id = $app->request->getPost("id");

        $sql = "UPDATE movie SET title = ?, year = ?, image = ? WHERE id = ?;";
        $app->db->execute($sql, [$title, $year, $image, $id]);
        return $app->response->redirect("movie");
    }
});


/**
 * Add movie.
 */
$app->router->any("GET|POST", "movie/add", function () use ($app) {

    $method = $app->request->getMethod();
    $resultset = null;
    $app->db->connect();

    if ($method === "GET") {
        $data = [
            "title" => "Movie database | oophp"
        ];

        $data["resultset"] = $resultset;
        $app->page->add("movie/add", $data);

        return $app->page->render(["title" => "Movie database | oophp"]);
    } else {
        $title = $app->request->getPost("title");
        $year = $app->request->getPost("year");
        $image = $app->request->getPost("image");

        $sql = "INSERT INTO movie (title, year, image) VALUES (?, ?, ?);";
        $app->db->execute($sql, [$title, $year, $image]);

        return $app->response->redirect("movie");
    }
});



/**
 * Delete movie.
 */
$app->router->any("GET|POST", "movie/delete", function () use ($app) {

    $method = $app->request->getMethod();
    $id = $app->request->getGet("id");
    $resultset = null;
    $app->db->connect();

    if ($method === "GET") {
        $data = [
            "title" => "Movie database | oophp"
        ];

        $sql = "SELECT * FROM movie WHERE id LIKE ?;";
        $resultset = $app->db->executeFetchAll($sql, [$id]);

        $data["resultset"] = $resultset;
        $app->page->add("movie/delete", $data);

        return $app->page->render(["title" => "Movie database | oophp"]);
    } else {
        $id = $app->request->getPost("id");

        $sql = "DELETE FROM movie WHERE id = ?;";
        $app->db->execute($sql, [$id]);
        return $app->response->redirect("movie");
    }
});


/**
 * Get all movies.
 */
$app->router->get("movie", function () use ($app) {

    $queryTitel = $app->request->getGet("search-titel");
    $queryYearFrom = $app->request->getGet("search-year-from");
    $queryTYearTo = $app->request->getGet("search-year-to");
    $resultset = null;

    $app->db->connect();
    $data = [
        "title" => "Movie database | oophp"
    ];

    if (isset($queryTitel) && strlen($queryTitel) > 0) {
        $sql = "SELECT * FROM movie WHERE title LIKE ?;";
        $resultset = $app->db->executeFetchAll($sql, [$queryTitel]);

        $data["resultset"] = $resultset;
        $app->page->add("movie/movie", $data);

        return $app->page->render(["title" => "Movie database | oophp"]);
    }

    if (isset($queryYearFrom) || isset($queryTYearTo)) {
        if ($queryYearFrom && $queryTYearTo) {
            $sql = "SELECT * FROM movie WHERE year >= ? AND year <= ?;";
            $resultset = $app->db->executeFetchAll($sql, [$queryYearFrom, $queryTYearTo]);
        } elseif ($queryYearFrom) {
            $sql = "SELECT * FROM movie WHERE year >= ?;";
            $resultset = $app->db->executeFetchAll($sql, [$queryYearFrom]);
        } elseif ($queryTYearTo) {
            $sql = "SELECT * FROM movie WHERE year <= ?;";
            $resultset = $app->db->executeFetchAll($sql, [$queryTYearTo]);
        }

        $data["resultset"] = $resultset;
        $app->page->add("movie/movie", $data);
        return $app->page->render(["title" => "Movie database | oophp"]);
    }


    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);
    $data["resultset"] = $res;
    $app->page->add("movie/movie", $data);

    return $app->page->render(["title" => "Movie database | oophp"]);
});
