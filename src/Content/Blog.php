<?php

namespace Anax\Content;

use Anax\TextMyFilter\TextFilter;
use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

class Blog implements AppInjectableInterface
{
    use AppInjectableTrait;


    public function getAllPosts()
    {
        $filter = new TextFilter;
        $this->app->db->connect();
        $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE type=?
ORDER BY published DESC
;
EOD;
        $resultset = $this->app->db->executeFetchAll($sql, ["post"]);

        foreach ($resultset as $result) {
            $result->data = $filter->parse($result->data, $result->filter);
        }

        return $resultset;
    }


    public function getPost($slug)
    {
        $filter = new TextFilter;
        $this->app->db->connect();

        $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE
    slug = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
ORDER BY published DESC
;
EOD;

        $resultset = $this->app->db->executeFetch($sql, [$slug, "post"]);
        if (!$resultset) {
            return null;
        }
        $resultset->data = $filter->parse($resultset->data, $resultset->filter);

        return $resultset;

    }
}
