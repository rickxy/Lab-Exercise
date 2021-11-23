<!DOCTYPE html>
<html lang=en>
<head>
    <title>Chapter 19</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-orange.min.css">
    <link rel="stylesheet" href="css/styles.css">  
</head>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Web Service Processing (XML Server-Side)</span>
        </div>
      </header>

      <main class="mdl-layout__content">
        <div class="page-content">
            <div class="mdl-grid">
                
              <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp">
                <thead>
                  <tr>
                    <th>ISO</th>
                    <th>Name</th>
                    <th>Population</th>
                    <th>Capital</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    // make request of the web service using curl library (all one line)
                    $request = 'http://www.randyconnolly.com/funwebdev/services/visits/countries.php?continent=EU&format=xml';
                    $http = curl_init($request);
                    // set curl options
                    curl_setopt($http, CURLOPT_HEADER, false);

                    curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($http, CURLOPT_SSL_VERIFYPEER, false);
                    // make the request
                    $response = curl_exec($http);
                    // get the status code
                    $status_code = curl_getinfo($http, CURLINFO_HTTP_CODE);
                    // close the curl session
                    curl_close($http);
                    // if the request worked then we have a string with XML in it
                    if ($status_code == 200) {
                    // create simpleXML object by loading string
                    $xml = simplexml_load_string($response);
                    // loop thru each country element
                    foreach ($xml->country as $c) {
                    echo '<tr>';
                    echo '<td>' . $c->iso . '</td>';
                    echo '<td>' . $c->name . '</td>';
                    echo '<td>' . $c->population . '</td>';
                    echo '<td>' . $c->capital . '</td>';
                    echo '</tr>';
                    }
                    }
                    else {
                    die("Your call to web service failed -- code=" . $status_code);
                    }
                    ?>
               </tbody>

             
              </table>
            </div>
        </div>
      </main>
    </div>
</body>
</html>