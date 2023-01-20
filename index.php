<?php
set_time_limit(300);
// ini_set('max_execution_time', 300);
ini_set ('display_errors', 'On');
error_reporting(E_ALL);
use Cristal\Presentation\PPTX;

require 'vendor/autoload.php';
$url = 'https://ddm-dev2.relationshipaudits.com/tmp/ppt_22120906371297100/RAM_dev.pptx';
$new_dir = "ddm/test.pptx";
$res = file_put_contents($new_dir, fopen($url, 'r'));
if($res > 0){
    $basePPTX = new PPTX($new_dir);
    $endPPTX = new PPTX(__DIR__.'/source/test.pptx');
    // $basePPTX = new PPTX(__DIR__.'/source/RAM_devDDM.pptx');
    // $endPPTX = new PPTX(__DIR__.'/source/test.pptx');

    $basePPTX->addSlides($endPPTX->getSlides());

    $basePPTX->template([
        'materiel' => [
            'libelle' => 'Bonjour'
        ]
    ]);
    $url = '/dist/presentation.pptx';
    $basePPTX->saveAs(__DIR__.$url);
    ?>
    <a href="<?= $url ?>" download>download presentation</a>
<?php } ?>