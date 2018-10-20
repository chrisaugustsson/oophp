<?php

namespace Anax\Content;

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;
use Anax\TextMyFilter\TextFilter;

class Page implements AppInjectableInterface
{
    use AppInjectableTrait;

    public function getPages()
    {
        $app = $this->app;
        $app->db->connect();
        $sql = <<<EOD
    SELECT
    *,
    CASE
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
    FROM content
    WHERE type=?
    ;
EOD;

        $resultset = $app->db->executeFetchAll($sql, ["page"]);

        return $resultset;
    }

    public function getPage($page)
    {
        $filter = new TextFilter;
        $app = $this->app;
        $app->db->connect();
        $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
    path = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;
EOD;

        $resultset = $app->db->executeFetch($sql, [$page, "page"]);
        $resultset->data = $filter->parse($resultset->data, $resultset->filter);

        return $resultset;
    }
}
