<?php
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="mauricio-masias-cv.pdf"');
readfile('mauricio-masias-cv.pdf');
?>