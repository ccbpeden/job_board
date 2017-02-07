<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
          <head>
            <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
            <meta charset='utf-8'>
            <title>Job Postings</title>
          </head>
          <body>
            <div class='container'>
              <h1 class='jumbotron'>Job Postings</h1>
              <form action='/output'>
                <div class='row'>
                  <div class='col-sm-6'>
                    <div class='form-group'>
                      <label for='title'>Job Title:</label>
                      <input type='text' name='title'>
                    </div>

                    <div class='form-group'>
                      <label for='description'>Job Description:</label>
                      <input type='text' name='description'>
                    </div>
                  </div>

                  <div class='col-sm-6'>
                    <div class='form-group'>
                      <label for='contact'>Contact Info:</label>
                      <input type='text' name='contact'>
                    </div>
                  </div>
                </div>

                <div class='row'>
                  <div class='col-sm-12'>
                    <button type='submit'>Post!</button>
                  </div>
                </div>
              </form>
            </div>
          </body>
        </html>";
    });

    $app->get("/output", function() {
        $newPosting = new JobOpening($_GET['title'], $_GET['description'], $_GET['contact']);
        $returnTitle = $newPosting->getTitle();
        $returnDesc = $newPosting->getDescription();
        $returnContact = $newPosting->getContact();

        return "
        <!DOCTYPE html>
        <html>
          <head>
            <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
            <meta charset='utf-8'>
            <title>Job Postings</title>
          </head>
          <body>
              <p>Your posted a new job! Here are the details:</p>
              <ul>
                  <li>$returnTitle</li>
                  <li>$returnDesc</li>
                  <li>$returnContact</li>
              </ul>
        ";
    });

    return $app;
?>
