<?php

namespace Anax\Content;

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

class ContentController implements AppInjectableInterface
{
    use AppInjectableTrait;

    public function indexAction()
    {
        $app = $this->app;
        $app->db->connect();
        $sql = "SELECT * FROM content;";
        $resultset = $app->db->executeFetchAll($sql);
        $data = [
            "res" => $resultset
        ];

        $app->page->add("content/index", $data);
        return $app->page->render(["title" => "Visar allt | oophp"]);
    }

    public function pageAction($page)
    {
        $pageHandler = new Page();
        $pageHandler->setApp($this->app);

        $resultset = $pageHandler->getPage($page);
        if (!$resultset) {
            $this->app->response->setStatusCode(404);
            return;
        }

        $data = [
            "res" => $resultset
        ];

        $this->app->page->add("content/page", $data);
        return $this->app->page->render(["title" => "hej"]);
    }

    public function pagesAction()
    {
        $app = $this->app;
        $pageHandler = new Page();
        $pageHandler->setApp($app);
        $resultset = $pageHandler->getPages();
        $data = [
            "res" => $resultset
        ];

        $app->page->add("content/pages", $data);
        return $app->page->render(["title" => "Editera | oophp"]);
    }

    public function adminAction()
    {
        $app = $this->app;
        $app->db->connect();
        $sql = "SELECT * FROM content;";
        $resultset = $app->db->executeFetchAll($sql);
        $data = [
            "res" => $resultset
        ];

        $app->page->add("content/admin", $data);
        return $app->page->render(["title" => "Visar allt | oophp"]);
    }


    public function editAction()
    {
        $app = $this->app;
        $app->db->connect();

        $contentId = $app->request->getPost("contentId") ?: $app->request->getGet("id");
        $error = $app->request->getGet("error") ?: null;

        if (hasKeyPost("doDelete")) {
            $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
            $app->db->execute($sql, [$contentId]);
            return $app->response->redirect("content/admin");
        } elseif (hasKeyPost("doSave")) {
            $title = $app->request->getPost("contentTitle");
            $path = $app->request->getPost("contentPath");
            $slug = $app->request->getPost("contentSlug");
            $data = $app->request->getPost("contentData");
            $type = $app->request->getPost("contentType");
            $filter = $app->request->getPost("contentFilter");
            $publish = $app->request->getPost("contentPublish");
            $id = $app->request->getPost("contentId");

            if (!$slug) {
                $slug = slugify($title);
            }

            if (!$path) {
                $path = null;
            }

            $app = $this->app;
            $app->db->connect();

            $params = [
                $title,
                $path,
                $slug,
                $data,
                $type,
                $filter,
                $publish,
                $id
            ];

            $sql = "SELECT * FROM content WHERE slug=?";
            $res = $app->db->executeFetch($sql, [$slug]);
            var_dump($res);
            if ($res && $res->id != $id) {
                return $app->response->redirect("content/edit?id=$id&error=slug");
            }
            $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=? WHERE id = ?;";
            $app->db->execute($sql, $params);
            return $app->response->redirect("content/edit?id=$id");
        }

        $sql = "SELECT * FROM content WHERE id = ?;";
        $content = $app->db->executeFetch($sql, [$contentId]);

        $data = [
            "content" => $content,
            "error" => $error
        ];
        $app->page->add("content/edit", $data);
        return $app->page->render(["title" => "Editera | oophp"]);
    }

    public function deleteAction()
    {
        $app = $this->app;
        $app->db->connect();

        $contentId = $app->request->getPost("contentId") ?: $app->request->getGet("id");

        if (hasKeyPost("doDelete")) {
            $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
            $app->db->execute($sql, [$contentId]);

            return $app->response->redirect("content/admin");
        }

        $sql = "SELECT id, title FROM content WHERE id = ?;";
        $content = $app->db->executeFetch($sql, [$contentId]);

        $data = [
            "content" => $content
        ];
        $app->page->add("content/delete", $data);
        return $app->page->render(["title" => "Editera | oophp"]);
    }


    public function blogAction()
    {
        $blog = new Blog();
        $blog->setApp($this->app);
        $res = $blog->getAllPosts();
        $data = [
            "res" => $res
        ];

        $this->app->page->add("content/blog", $data);
        return $this->app->page->render(["title" => "Bloggen | oophp"]);
    }

    public function postAction($post)
    {
        $blog = new Blog();
        $blog->setApp($this->app);
        $res = $blog->getPost($post);

        $data = [
            "res" => $res
        ];

        if (!$res) {
            $this->app->response->setStatusCode(404);
            return;
        }

        $this->app->page->add("content/post", $data);
        return $this->app->page->render(["title" => $res->title]);
    }

    public function createAction()
    {
        if (hasKeyPost("doCreate")) {
            $title = $this->app->request->getPost("contentTitle");
            $this->app->db->connect();

            $sql = "INSERT INTO content (title) VALUES (?);";
            $this->app->db->execute($sql, [$title]);
            $id = $this->app->db->lastInsertId();
            return $this->app->response->redirect("content/edit?id=" . $id);
        }

        $this->app->page->add("content/add");
        return $this->app->page->render(["title" => "Lägg till | oophp"]);
    }
}
