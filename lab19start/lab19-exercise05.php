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
          <span class="mdl-layout-title">JSON Processing (in PHP)</span>
        </div>
      </header>

      <main class="mdl-layout__content">
        <div class="page-content">
            <div class="mdl-grid">
                
               <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp">
                 <thead>
                   <tr>
                     <th>Name</th>
                     <th>Address</th>
                   </tr>
                 </thead>
                 <tbody>
                      <?php
                      $filename = 'universities.json';
                      if (file_exists($filename)) {
                      // read the json file and decode its contents
                      $string = file_get_contents($filename);
                      $universities = json_decode($string);
                      // verify the JSON had proper syntax
                      if (json_last_error() == JSON_ERROR_NONE) {
                      // json was ok so output data
                      foreach ($universities as $univ) {
                      echo '<tr>';
                      echo '<td>' . $univ->name . '</td>';
                      echo '<td>' . $univ->address . '</td>';
                      echo '</tr>';
                      }
                      }
                      }
                      else {
                      exit('Failed to open ' . $filename);
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