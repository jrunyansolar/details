<?php
@ini_set('zlib.output_compression',0);
@ini_set('implicit_flush',1);
@ob_end_clean();
set_time_limit(0); 
ob_implicit_flush(true);
header('X-Accel-Buffering: no');


for($i = 1; $i < 10000; $i++) { 
 print("<tr><td>test</td><td>test2</td></td><br>");
 usleep(500000);
}
