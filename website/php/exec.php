<?php
$descriptorspec = array(
	0 => array("pipe", "r"),  // // stdin est un pipe où le processus va lire
	1 => array("pipe", "w"),  // stdout est un pipe où le processus va écrire
	2 => array("file", "/tmp/error-output.txt", "a") // stderr est un fichier
);
$cwd = '/tmp';
$pipes = [];
$processes = [];
foreach (range(1, 3) as $i) {
	$proc = proc_open('docker-compose up', $descriptorspec, $procPipes, $cwd);
	$processes[$i] = $proc;
	//no lock
	stream_set_blocking($procPipes[1], 0);
	$pipes[$i] = $procPipes;
}


while (array_filter($processes, function($proc) { return proc_get_status($proc)['running']; })) {
	$str = fread($pipes[$i][1], 32768);
	if ($str) {
		printf($str);
	}
}

foreach (range(1, 3) as $i) {
	fclose($pipes[$i][1]);
	proc_close($processes[$i]);
}
