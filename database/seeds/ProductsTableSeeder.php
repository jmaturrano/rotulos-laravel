<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$handle = fopen(public_path().'/files/products.csv', "r");
		$header = true;

		//Código SKU	Código de barras	Descripción artículo	UM	Dpto	SECCION
		while ($csvLine = fgetcsv($handle, 1000, ",")) {

		    if ($header) {
		        $header = false;
		    } else {

		    	$barcode = str_replace("'", "", $csvLine[1]);
		    	if(!empty($csvLine[0]) && !empty($barcode)){
			        Product::create([
			            'sku' => $csvLine[0],
			            'barcode' => $barcode,
			            'description' => $this->escape_chars($csvLine[2]),
			            'unitmed' => $this->escape_chars($csvLine[3]),
			            'department' => $this->escape_chars($csvLine[4]),
			            'section' => $this->escape_chars($csvLine[5])
			        ]);
		    	}
		    }
		}
    }

    public function escape_chars($string){
	    $string = trim($string);

	    $string = str_replace(
	        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
	        array('&#225;', '&#225;', '&#228;', '&#226;', 'a', '&#193;', '&#192;', '&#194;', '&#196;'),
	        $string
	    );

	    $string = str_replace(
	        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
	        array('&#233;', '&#233;', '&#235;', '&#234;', '&#201;', '&#201;', '&#202;', '&#203;'),
	        $string
	    );

	    $string = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('&#237;', '&#236;', '&#239;', '&#238;', '&#205;', '&#204;', '&#207;', '&#206;'),
	        $string
	    );

	    $string = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('&#243;', '&#242;', '&#246;', '&#244;', '&#211;', '&#210;', '&#214;', '&#212;'),
	        $string
	    );

	    $string = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('&#250;', '&#249;', '&#252;', '&#251;', '&#218;', '&#217;', '&#219;', '&#220;'),
	        $string
	    );

	    $string = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç', '¿', '?'),
	        array('&#241;', '&#209;', '&#231;', '&#199;', '&#191;', '&#63;'),
	        $string
	    );

	    $string = str_replace(
	        array("¨", "º", "-", "~",
	             '#', '@', '|', '!', '"',
	             "·", "$", "%", "&", "/",
	             "(", ")", "?", "'", '¡',
	             "¿", "[", "^", "<code>", "]",
	             "+", "}", "{", "¨", "´",
	             ">", "< ", ";", ",", ":",
	             ".", '�'),
	        '',
	        $string
	    );

    	$string = addslashes(utf8_encode($string));
    	return $string;
    }
}
