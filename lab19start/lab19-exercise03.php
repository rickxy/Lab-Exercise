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
          <span class="mdl-layout-title">XML Processing (PHP XMLReader)</span>
        </div>
      </header>

      <main class="mdl-layout__content">
        <div class="page-content">
            <div class="mdl-grid">
                
               <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp">
                 <thead>
                   <tr>
                     <th>Name</th>
                     <th>City</th>
                     <th>State</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                  $filename = 'universities.xml';
                  if (file_exists($filename)) {
                  // create and open the reader
                  $reader = new XMLReader();
                  $reader->open($filename);
                  // loop through the XML file
                  while ( $reader->read() ) {
                    $nodeName = $reader->name;
                    // since all sorts of different XML nodes we must check node type
                    if ($reader->nodeType == XMLREADER::ELEMENT &&
                    $nodeName == 'university') {
                    // create a SimpleXML object from the current painting node
                    $doc = new DOMDocument('1.0', 'UTF-8');
                    $univ = simplexml_import_dom($doc->importNode(
                    $reader->expand(),true));
                    // now have a single university as an object so can output it
                    echo '<tr>';
                    echo '<td>' . $univ->name . '</td>';
                    echo '<td>' . $univ->mailing->city . '</td>';
                    echo '<td>' . $univ->mailing->state . '</td>';
                    echo '</tr>';
                    }
                    }
                    }
                    else {
                    exit('Failed to open ' . $filename);
                    }
                    ?>
                    </tbody>


                 </tbody>
               </table>

            </div>
        </div>
      </main>
    </div>
</body>
</html>