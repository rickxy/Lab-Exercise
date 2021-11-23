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
          <span class="mdl-layout-title">XML Processing (PHP SimpleXML)</span>
        </div>
      </header>

      <main class="mdl-layout__content">
        <div class="page-content">
            <div class="mdl-grid">
               
                <ul class="mdl-list" id="universityList">
                      <?php
                      $filename = 'universities.xml';
                      if (file_exists($filename)) {
                      $universities = simplexml_load_file($filename);
                      // loop thru each <university> element
                      foreach ($universities->university as $univ) {
                      echo '<li>';
                      echo '<b>' . $univ->name . '</b>';
                      echo ' (' . $univ->mailing->state . ')';
                      echo '</li>';
                      }
                      }
                      else {
                      exit('Failed to open ' . $filename);
                      }
                      ?>
                 </ul>
            </div>
        </div>
      </main>
    </div>
</body>
</html>