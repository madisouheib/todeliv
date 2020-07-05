<?php 

return [
	'mode'                 => '',
	'format'               => 'A4',

	'default_font'         => 'sans-serif',

	'orientation'          => 'P',
	'title'                => 'Laravel mPDF',
	'author'               => '',
	'watermark'            => '',
	'show_watermark'       => false,
	'watermark_font'       => 'sans-serif',
	'display_mode'         => 'fullpage',
	'watermark_text_alpha' => 0.1,
    'custom_font_dir'      => '',
    'charset_in'=>'utf-8',
	'custom_font_data' 	   => [],
	'auto_language_detection'  => true,
    'temp_dir'               => '',
  'useDefaultCSS2' => true,
   
	'pdfa' 			=> true,
        'pdfaauto' 		=> false,
        'custom_font_dir' => base_path('public/fonts/'), // don't forget the trailing slash!
        'custom_font_data' => [
            'default' => [
                'R'  => 'DINNextLTArabic-Medium.ttf',    // regular font
                'B'  => '',       // optional: bold font
                'I'  => '',     // optional: italic font
                'BI' => '', // optional: bold-italic font
                'useOTL' => 0xFF,
'useKashida' => 75
            ],
            'cairo' => [
                'R'  => 'Cairo-Regular.ttf',    // regular font
                'B'  => 'Cairo-bold.ttf',       // optional: bold font
                'I'  => 'Cairo-Light.ttf',     // optional: italic font
                'BI' => '', // optional: bold-italic font
     
            ],
            
            'roboto' => [
                'R'  => 'Roboto-Regular.ttf',    // regular font
                'B'  => '',       // optional: bold font
                'I'  => '',     // optional: italic font
                'BI' => '', // optional: bold-italic font
      
            ]
            
            // ...add as many as you want.
        ]



];
?>