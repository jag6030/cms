<?
	$no_sentences = $_POST['no_sentences'];
	$sentences=array();
	for ($x = 0; $x < $no_sentences; $x++) {
		$sentences[$x] = $_POST['sentence'.$x];
	}
	if ($_POST['use_first']) { 
		$first = $sentences[0];
		$sentences = array_slice($sentences,1);
	}
	if ($_POST['limit']) {
		$limit = $_POST['limit'];
		if ($first) $limit--;
		$num = $limit;
		foreach($sentences as $key => $sentence) {
			if ($key >= $limit) unset($sentences[$key]);	
		}
	}
	
	permutate($sentences, 10);
		
	$x = 0;
	global $x;
	function permutate($items, $limit, $perms = array( )) {
		if (empty($items)) {
			configure_perm ($perms, $limit);
		}
		else { 
			for ($i = count($items) - 1; $i >= 0; --$i) { 
				$newitems = $items;
				$newperms = $perms;
				list($foo) = array_splice($newitems, $i, 1);
				array_unshift($newperms, $foo);
				$newperms = $newperms;
				permutate($newitems, $limit, $newperms); 
			} 
		} 
	}
	
	function configure_perm($perms=array( ), $limit) {
		$x++;
		global $x;
		echo '<div class="has-floats">';
		echo '<div style="float:left; margin-right:10px;"><input type="checkbox" vesion="'.$x.' class="perm_box" /></div>';
		echo '<div style="float:left;">';
		foreach ($perms as $perm) {			
			echo $perm.'<br>';
		}
		echo "</div></div><br><br><br>";
	}
?>