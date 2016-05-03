<?php

header("Content-disposition: attatchment;
    filename=test.pdf");
header("Content-type: application/pfd");
readfile("test.pdf");
