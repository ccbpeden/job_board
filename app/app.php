<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";


    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('jobs.html.twig');
    });

    $app->get("/output", function() use ($app) {
        $newPosting = new JobOpening($_GET['title'], $_GET['description'], $_GET['contact']);
        $variableName = "Ash";

        return $app['twig']->render('job_output.html.twig', array('newpost' => $newPosting));
    });

    return $app;
?>
