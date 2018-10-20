<?php
use Anax\TextMyFilter\TextFilter;

/**
 *
 */
$app->router->get("test-filter", function () use ($app) {
    $parser = new TextFilter();

    $text = "#Detta är en titel \n Här är text med [b]bbcode[/b] formatterad text.
        Nu bryts raden, så borde bli en line break.
        Detta borde också va på en egen rad och denna länken: https://www.google.se/search?q=google&oq=google&aqs=chrome..69i57j0j69i60l3j35i39.1608j0j9&sourceid=chrome&ie=UTF-8 borde vara klickbar!
        [b]Hade nog inte tryckt på den om jag vore du...[/b]
    ";

    $markDown = file_get_contents(__DIR__ . "/../htdocs/markdown_example/sample.md");

    $formattedText = $parser->parse($text, ["bbcode", "link", "nl2br", "markdown"]);
    $formattedMarkdown = $parser->parse($markDown, ["bbcode", "markdown", "link"]);

    $data = [
        "unformattedText" => $text,
        "formattedText" => $formattedText,
        "markdown" => $formattedMarkdown
    ];

    $app->page->add("filter/index", $data);
    return $app->page->render(["title" => "Testar textfilter | oophp"]);


    return $app->page->render();
});
