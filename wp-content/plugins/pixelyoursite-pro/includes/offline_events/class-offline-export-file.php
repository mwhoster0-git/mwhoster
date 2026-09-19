<?php
namespace PixelYourSite;
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class CSVWriterFile {

    private $output;
    private $heder;

    public function __construct($heder) {
        $this->heder = $heder;
    }

    function getHeadItems() {
        return $this->heder;
    }

    function writeLine($data) {
        fputcsv( $this->output, $data );
    }

    function openFile($filePath,$page = 0) {
        if(file_exists($filePath) && $page > 1) {
            $this->output = fopen( $filePath, 'a' ); // add more data
        } else {
            $tmp_dir = trailingslashit( PYS_PATH ) . 'tmp/';
            if(!is_dir($tmp_dir)) {
                if (!mkdir($tmp_dir, 0755, true) && !is_dir($tmp_dir)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $tmp_dir));
                }
            }
            $this->output = fopen( $filePath, 'w+' ); // create new file or replace old
            $this->writeLine($this->getHeadItems());
        }
    }

    function openCustomerFile($filePath,$page = 0) {
        if(file_exists($filePath) && $page > 1) {
            $this->output = fopen( $filePath, 'a' ); // add more data
        } else {
            $tmp_dir = trailingslashit( PYS_PATH ) . 'tmp_customers/';
            if(!is_dir($tmp_dir)) {
                if (!mkdir($tmp_dir, 0755, true) && !is_dir($tmp_dir)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $tmp_dir));
                }
            }
            $this->output = fopen( $filePath, 'w+' ); // create new file or replace old
            $this->writeLine($this->getHeadItems());
        }
    }

    function closeFile() {
        fclose($this->output);
    }
}