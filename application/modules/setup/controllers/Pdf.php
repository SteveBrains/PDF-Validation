<?php
require_once 'vendor/autoload.php';
// require_once ('tcpdf_include.php');

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


use TCPDF\TCPDF;

class Pdf extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        // $this->load->model('applicationfee_model');
        if (!$this->checkAccess('setup.pdf')) {
            $this->loadAccessRestricted();
        }
    }

    function main()
    {
        $this->global['code'] = 'setup.applicationfee';
        try {

            $this->loadViews("pdf/list", $this->global, ${'data'}, NULL);
        } catch (Throwable $e) {
            echo $e;
        }
    }

    // function makeSignature($text)
    // {

    //     // $password = 'user_password';
    //     $hashedPassword = password_hash($text, PASSWORD_DEFAULT);
    //     // $text = 'user_password';
    //     if (password_verify($text, $hashedPassword)) {
    //         echo 'Password is correct. Allow access to the user.';
    //     } else {
    //         echo 'Password is incorrect. Deny access.';
    //     }
    // }
    // function readPdf()
    // {
    //     $file_path = '/Applications/XAMPP/xamppfiles/htdocs/college/pdf/sree3.pdf';
    //     $pdfParser = new \Smalot\PdfParser\Parser();
    //     $pdf = $pdfParser->parseFile($file_path);
    //     $metadata = $pdf->getDetails();
    //     echo var_dump(($metadata['Subject']));
    //     $hashedContent = isset($metadata['Subject']) ? $metadata['Subject'] : 'Unknown PDF';

    //     $text = '';
    //     foreach ($pdf->getPages() as $page) {
    //         $text .= $page->getText();
    //     }


    //     if (password_verify($text, $hashedContent)) {
    //         echo 'Original Document ';
    //     } else {
    //         echo 'Document is not valid ';
    //     }


    // }

    function handleUpload()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdfFile"])) {
            $targetDirectory = '/Applications/XAMPP/xamppfiles/htdocs/college/uploaded-pdf/';
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }

            $targetFile = $targetDirectory . basename($_FILES["pdfFile"]["name"]);
            if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
                // echo "The file " . basename($_FILES["pdfFile"]["name"]) . " has been uploaded.";
                $pdfParser = new \Smalot\PdfParser\Parser();
                $ppdf = $pdfParser->parseFile($targetFile);
                $metadata = $ppdf->getDetails();
                $hashedContent = isset($metadata['Subject']) ? $metadata['Subject'] : 'Unknown PDF';

                $tex = '';
                foreach ($ppdf->getPages() as $page) {
                    $tex .= $page->getText();
                }

                $tex = str_replace(" ", "", $tex);
                $tex = str_replace(" ", "", $tex);
                $pepper = "foIwUVmkKGrGucNJMOkxkvcQ79iPNzP5OKlbIdGPCMTjJcDYnR";
                $input_peppered = hash_hmac('sha256', $tex, $pepper);
                $notTemppered = password_verify($input_peppered, $hashedContent);

                if ($notTemppered) {
                    echo ' Original Document ';
                } else {
                    echo ' Document is not valid ';
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "No file uploaded.";
        }
    }
    function generatePdf()
    {
        $html = '<h2>Sreenivas TABLE:</h2>
            <table border="1" cellspacing="3" cellpadding="4">
                <tr>
                    <th>#</th>
                    <th align="right">RIGHT align</th>
                    <th align="left">LEFT align</th>
                    <th>4A</th>
                </tr>
                <tr>
                    <td>1</td>  
                    <td bgcolor="#cccccc" align="center" colspan="2">A1 ex<i>amp</i>le <a href="http://www.tcpdf.org">link</a> column span. One two tree four five six seven eight nine ten.<br />line after br<br /><small>small text</small> normal <sub>subscript</sub> normal <sup>superscript</sup> normal  bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla<ol><li>first<ol><li>sublist</li><li>sublist</li></ol></li><li>second</li></ol><small color="#FF0000" bgcolor="#FFFF00">small small small small small small small small small small small small small small small small small small small small</small></td>
                    <td>4B</td>
                </tr>
                <tr>
                    <td></td>
                    <td bgcolor="#0000FF" color="yellow" align="center">A2 € &euro; &#8364; &amp; è &egrave;<br/>A2 € &euro; &#8364; &amp; è &egrave;</td>
                    <td bgcolor="#FFFF00" align="left"><font color="#FF0000">Red</font> Yellow BG</td>
                    <td>4C</td>
                </tr>
                <tr>
                    <td>1A</td>
                    <td rowspan="2" colspan="2" bgcolor="#FFFFCC">2AA<br />2AB<br />2AC</td>
                    <td bgcolor="#FF0000">4D</td>
                </tr>
                <tr>
                    <td>1B</td>
                    <td>4E</td>
                </tr>
                <tr>
                    <td>1C</td>
                    <td>2C</td>
                    <td>3C</td>
                    <td>4F</td>
                </tr>
            </table>';

        $this->load->library('MYPDF');

        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);

        $pdf->SetFont('times', 'BI', 12);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $file_path = '/Applications/XAMPP/xamppfiles/htdocs/college/pdf/sree2.pdf';

        $pdf->Output($file_path, 'F');

        $pdfParser = new \Smalot\PdfParser\Parser();
        $readPdf = $pdfParser->parseFile($file_path);
        $text = '';
        foreach ($readPdf->getPages() as $page) {
            $text .= $page->getText();
        }
        unlink($file_path);

        $text = str_replace(" ", "", $text);
        $text = str_replace(" ", "", $text);

        $pepper = "foIwUVmkKGrGucNJMOkxkvcQ79iPNzP5OKlbIdGPCMTjJcDYnR";


        $password_peppered = hash_hmac('sha256', $text, $pepper);
        $hash = password_hash($password_peppered, PASSWORD_BCRYPT);
        $pdf2 = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);
        $pdf2->SetSubject($hash);
        $pdf2->SetFont('times', 'BI', 12);
        $pdf2->AddPage();
        $pdf2->writeHTML($html, true, false, true, false, '');
        $pdf2->Output('/Applications/XAMPP/xamppfiles/htdocs/college/pdf/sree3.pdf', 'F');

        echo "DONE";
    }

}
