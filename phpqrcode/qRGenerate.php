<?php
require_once 'qrlib.php';
// require "../vendor/autoload.php";
require __DIR__ . '/../vendor/autoload.php';

class qRGenerate extends QRcode{
 public static function create($path, $data){
    $orgFile      = uniqid().".png";
    $fullFilename = $path.$orgFile;
    parent::png($data, $fullFilename);
        $detail = [
            'response' => 'success',
            'filename' => $orgFile,
        ];
     echo json_encode($detail);
}
}
//How to use and generate qrcode
//qRGenerate::create('./images/', 'Hartina');


class Scanner{

    public static function scanCode($image){

        $qrcode = new Zxing\QrReader($image);
        // $code = new QrReader('./images/5f617495cbc8c.png');
        $text = $qrcode->text();

        if($text === '' || $text === null || $text == undefined){

            echo "Sorry, Can't read file";

        }else{

            $detail = [
                'response' => 'success',
                'data' => $text,
            ];
                echo json_encode($detail);
        }

    }
}

//How to use and read qrcode
// Scanner::scanCode($data);

?>