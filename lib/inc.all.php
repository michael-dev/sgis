<?php

define('SGISBASE', dirname(dirname(__FILE__)));

require_once SGISBASE.'/config/config.php';
require_once SGISBASE.'/lib/inc.error.php';
require_once SGISBASE.'/lib/inc.simplesaml.php';
require_once SGISBASE.'/lib/inc.exportlogin.php';
require_once SGISBASE.'/lib/inc.password.php';
require_once SGISBASE.'/lib/inc.db.php';
require_once SGISBASE.'/lib/inc.page.php';
require_once SGISBASE.'/lib/inc.nonce.php';
require_once SGISBASE.'/lib/inc.header.php';
require_once SGISBASE.'/lib/inc.crypto.php';
require_once SGISBASE.'/lib/inc.curl.php';
require_once SGISBASE.'/lib/inc.unildap.php';
#require_once SGISBASE.'/lib/inc.sni.php'; # too slow, load only if needed
require_once SGISBASE.'/lib/inc.dokuwiki.php';
require_once SGISBASE.'/lib/inc.prof.php';
require_once SGISBASE.'/lib/inc.helper.php';
require_once SGISBASE.'/lib/ods/OpenDocument_Spreadsheet_Writer.class.php';
#require_once 'XML/RPC2/Client.php'; # too slow,load on demand
require_once 'Text/Diff.php';
require_once 'Text/Diff/Renderer.php';
require_once 'Text/Diff/Renderer/unified.php';
require_once 'ssp.class.php';


