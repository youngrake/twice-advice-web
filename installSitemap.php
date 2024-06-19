<?php
    $domen = $_SERVER['HTTP_HOST'];
    $sitemap = file_get_contents(__DIR__.'/sitemap.txt');
    if($sitemap){
        $sitemap = str_replace('{REPLACE_URL}', $domen, $sitemap);
        file_put_contents(__DIR__.'/sitemap.xml' , $sitemap);

        $robots = file_get_contents(__DIR__.'/robots.txt');
        $new_robots = 'User-agent: *
Allow: /
Sitemap: https://'.$domen.'/sitemap.xml';
        file_put_contents(__DIR__.'/robots.txt' , $new_robots);

        echo '<h1 style="text-align: center;">DONE</h1>';
    }

?>
