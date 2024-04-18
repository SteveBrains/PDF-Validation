<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Verification extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('verification_model');
        $this->load->library('excel');


    }
    function index()
    {
        $this->load->view("verification/verification");
    }


    function handleVerifyUpload()
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
                if ($metadata['Subject'] == 'Unknown PDF') {
                    echo ' Document is not valid ';
                    die;
                }

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
                    echo '<script>alert("Original Document")</script>';
                } else {
                    echo '<script>alert("Document is not valid")</script>';
                }

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "No file uploaded.";
        }
        // redirect('/verification');
    }

}
