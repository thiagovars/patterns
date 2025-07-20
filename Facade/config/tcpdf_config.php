<?php

// Configurações do TCPDF
define('PDF_PAGE_ORIENTATION', 'P'); // P = Portrait, L = Landscape
define('PDF_UNIT', 'mm');
define('PDF_PAGE_FORMAT', 'A4');
define('PDF_CREATOR', 'Sistema de Geração de PDF');
define('PDF_AUTHOR', 'Sistema');
define('PDF_UNICODE', true);
define('PDF_ENCODING', 'UTF-8');
define('PDF_DISPLAY_MODE', 'real');
define('PDF_TEMP_DIR', __DIR__ . '/../storage/temp/');
define('PDF_FONT_NAME_MAIN', 'helvetica');
define('PDF_FONT_SIZE_MAIN', 12); 