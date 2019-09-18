<?php
header("Content-disposition: attachment; filename=listaPrecios.pdf");
header("Content-type: application/pdf");
readfile("ListaPrecios.pdf");
