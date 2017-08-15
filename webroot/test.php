<?php
include('../vendor/autoload.php');


$source_path = "./files/pdf/";

$source_dir = array_diff(scandir($source_path), array('..', '.')); 
foreach ($source_dir as $key => $value) {
    $file_name =  basename($value, '.pdf');

    $save_path = "./files/png/$file_name.png";

    if(!file_exists($save_path)) {
        $pdf_source = $source_path . $value;
        print("Generating preview image for: $pdf_source". PHP_EOL);
        $pdf = new Spatie\PdfToImage\Pdf($pdf_source);
        $pdf->saveImage($save_path);

        print("file was saved to: '$save_path'". PHP_EOL);
    } else {
        print("file already exists: '$save_path'". PHP_EOL);
    }
}