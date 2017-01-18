<?php

$ruta = base_url().$link_archivo;
$tmp = explode('.', $link_archivo);
$extension = end($tmp);
$archivo = $nombre_archivo.'.'.$extension;


header("Content-disposition: attachment; filename=".$archivo."");
header("Content-type: application/".$extension."");
readfile($ruta);

?>