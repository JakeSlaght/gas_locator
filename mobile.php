	<?php
function checkMobile()
{
	return preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
                    '|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
'|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );
}

if(checkMobile())
{
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"..\css\mobile_devices.css\" media=\"screen\"/>";
}
else
{
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"..\css\desktop_style.CSS\"/>";
}

?>