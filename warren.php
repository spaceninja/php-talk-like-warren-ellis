<?
###################### UTILITY FUNCTIONS

function singularize($word) { // remove plurals
	$word = trim($word);
	if(substr($word, -1) == 's') return substr($word, 0, -1) . ' ';
	else return "$word ";
}

function weighted_random_index() {
  // returns the index of an item in its arguments list.  Supply arguments in ascending order.
  // EXAMPLES:
  // weighted_random_index(25, 50, 75);  // returns 0, 1, 2, or 3 with equal probability
  // weighted_random_index(75); // returns 0 75% of the time, 1 25% of the time.
  // USAGE:
  // $coin_toss = array('heads', 'tails', 'landed on the edge');
  // echo $coin_toss[weighted_random_index(50, 99)];

	$weights = func_get_args();
	$r = rand(0, 99);
	for($i = 0; $i < count($weights); $i++) {
		if($r < $weights[$i]) return $i;
	}
	return $i;
}

function yank_random_item_from(&$a) {
  // return a random item from an array and DELETE it from the source array, so generated sentences won't contain repetition.
	shuffle($a);
	return array_pop($a);
}

function random_choice($a) {
  // return a random item from an array WITHOUT DELETING it.
  // Two usages.

	// usage 1) random_choice($array_of_options);
	if(is_array($a)) {
		shuffle($a);
		return array_pop($a);
	}

	// Usage 2)   random_choice($choice_one, $choice_two, $choice_three, ...);
	$options = func_get_args();
	shuffle($options);
	return array_pop($options);
}

###################### READ IN ALL THE PHRASE DATA YAWP YAWP

/* Dev Mode reads phrase data from INI file - don't use in production! */
define('DEV_MODE', false);

if(DEV_MODE) {
  function match_key($line) {
  	if(preg_match('/\[(\w+)\]/', $line, $m)) {
  		return $m[1];
  	} else return false;
  }

  function is_comment($line) {
  	return empty($line) || preg_match('/^\s*;/', $line);
  }


	/* read and parse phrase data from files */
	$lines = array_map('trim', file('data.ini'));
	$data = array();
	$key = '';
	foreach($lines as $line) {
		if(is_comment($line)) continue;
		if($key_found = match_key($line)) {
			$key = $key_found;
			$data[$key]  = array();
		} else {
			$data[$key][] = $line;
		}
	}
	foreach(array_keys($data) as $key) {
  	// haha, this is so bad, but it makes the phrase generation code easier to read.
  	// switch this to hardcoded when we go live.
		$fn_code = "function $key() { return yank_random_item_from(\$GLOBALS['data']['$key']) . ' '; }\n";
		eval($fn_code);
	}
	echo "\$GLOBALS['data'] = " . var_export($data, 1) . ";\n\n";

} else {
	/* Production Mode - phrase data hard coded right here, for SPEEEEED */

	function sexy() { return yank_random_item_from($GLOBALS['data']['sexy']) . ' '; }

	function filthy() { return yank_random_item_from($GLOBALS['data']['filthy']) . ' '; }

	function sublime() { return yank_random_item_from($GLOBALS['data']['sublime']) . ' '; }

	function moist() { return yank_random_item_from($GLOBALS['data']['moist']) . ' '; }

	function body_parts() { return yank_random_item_from($GLOBALS['data']['body_parts']) . ' '; }

	function beasts() { return yank_random_item_from($GLOBALS['data']['beasts']) . ' '; }

	function mammals() { return yank_random_item_from($GLOBALS['data']['mammals']) . ' '; }

	function monsters() { return yank_random_item_from($GLOBALS['data']['monsters']) . ' '; }

	function arbitrary_gnarbags() { return yank_random_item_from($GLOBALS['data']['arbitrary_gnarbags']) . ' '; }

	function sexiness() { return yank_random_item_from($GLOBALS['data']['sexiness']) . ' '; }

	function sex() { return yank_random_item_from($GLOBALS['data']['sex']) . ' '; }

	function attentive_filth() { return yank_random_item_from($GLOBALS['data']['attentive_filth']) . ' '; }

	function scum() { return yank_random_item_from($GLOBALS['data']['scum']) . ' '; }

	function bastards() { return yank_random_item_from($GLOBALS['data']['bastards']) . ' '; }

	function horde() { return yank_random_item_from($GLOBALS['data']['horde']) . ' '; }

	function ill_omen() { return yank_random_item_from($GLOBALS['data']['ill_omen']) . ' '; }

	function internet() { return yank_random_item_from($GLOBALS['data']['internet']) . ' '; }

	function extra() { return yank_random_item_from($GLOBALS['data']['extra']) . ' '; }

	function salutation() { return yank_random_item_from($GLOBALS['data']['salutation']) . ' '; }

	function attention() { return yank_random_item_from($GLOBALS['data']['attention']) . ' '; }

function load_phrase_data(){
  global $data;
  /* Phrase data generated from data.ini by data2php.php */
$data = array (
	'sexy' => // adjective
		array (
			0 => 'concupiscent',
			1 => 'sexy',
			2 => 'sleek',
			3 => 'pretty',
			4 => 'ambulatory',
			5 => 'orgasm',
			6 => 'hopping',
			7 => 'purple',
			8 => 'oiled',
			9 => 'yummy',
			10 => 'bed',
			11 => 'pubic',
			12 => 'lovely',
			13 => 'beautiful',
			14 => 'motile',
			15 => 'perfumed',
			16 => 'lickable',
		),
	'filthy' => // adjective
		array (
			0 => 'weevil-ridden',
			1 => 'weekend',
			2 => 'internet',
			3 => 'filthy',
			4 => 'horrendous',
			5 => 'creepy',
			6 => 'hideous',
			7 => 'fucking',
			8 => 'terrible',
			9 => 'horrible',
			10 => 'corrupting',
			11 => 'ugly',
			12 => 'frightening',
			13 => 'heartless',
			14 => 'deathwatch',
			15 => 'doomed',
			16 => 'burning',
			17 => 'foul',
			18 => 'strange',
			19 => 'sinister',
		),
	'sublime' => // adjective
		array (
			0 => 'beautiful and terrifying',
			1 => 'flourescent',
			2 => 'exploding',
			3 => 'post-singularity',
			4 => 'disturbing',
			5 => 'evil',
			6 => 'electrical',
			7 => 'fiery',
			8 => 'galloping',
			9 => 'petrochemical',
			10 => 'spectral',
			11 => 'space',
			12 => 'great and shimmying',
			13 => 'wheel-eyed',
			14 => 'glowing',
			15 => 'joy',
		),
	'moist' => // adjective
		array (
			0 => 'sweaty',
			1 => 'greasy',
			2 => 'slimy',
			3 => 'oozing',
			4 => 'heaving',
			5 => 'spurting',
			6 => 'horrendous',
			7 => 'meat-based',
			8 => 'greased',
			9 => 'turgid',
			10 => 'frozen',
			11 => 'pleasure',
			12 => 'suppurating',
			13 => 'fragrant',
			14 => 'lubricated',
			15 => 'nipply',
			16 => 'undulating',
			17 => 'hairy',
			18 => 'scrotal',
			19 => 'lubricious',
		),
	'sex' => // filthy SEX monkeys
		array (
			0 => 'sex',
			1 => 'love',
			2 => 'orgasm',
			3 => 'porn',
			4 => 'pheremone',
			5 => 'sin',
			6 => 'slut',
			7 => 'bed',
			8 => 'death',
		),
	'body_parts' => // noun
		array (
			0 => 'pustules',
			1 => 'polyps',
			2 => 'lesions',
			3 => 'intestines',
			4 => 'teats',
			5 => 'nodules',
			6 => 'skin',
			7 => 'nipples',
			8 => 'treats',
			9 => 'estrus bumps',
			10 => 'fleshsocks',
			11 => 'bones',
			12 => 'fistulas',
			13 => 'discharges',
			14 => 'leakages',
			15 => 'plague buboes',
			16 => 'tumours',
			17 => 'erectile tissues',
			18 => 'tentacles',
			19 => 'jewels',
			20 => 'warts',
		),
	'beasts' => // noun
		array (
			0 => 'crows',
			1 => 'wolves',
			2 => 'buzzards',
			3 => 'cobras',
			4 => 'sharks',
			5 => 'piranha',
			6 => 'lungfish',
			7 => 'beasts',
			8 => 'lizards',
			9 => 'iguanas',
			10 => 'toads',
			11 => 'octopi',
			12 => 'squid',
			13 => 'piranhas',
			14 => 'urchins',
			15 => 'manatees',
		),
	'mammals' => // noun
		array (
			0 => 'ducklings',
			1 => 'ocelots',
			2 => 'antelopes',
			3 => 'chupacabras',
			4 => 'goats',
			5 => 'monkeys',
			6 => 'apes',
			7 => 'bonobos',
			8 => 'chimpanzees',
			9 => 'macaques',
			10 => 'otters',
			11 => 'wildebeest',
			12 => 'stoats',
			13 => 'weasels',
			14 => 'fruitbats',
			15 => 'lepers',
			16 => 'midgets',
			17 => 'lemmings',
			18 => 'ferrets',
			19 => 'marmosets',
			20 => 'badgers',
			21 => 'panthers',
			22 => 'dogs',
			23 => 'pigs',
			24 => 'voles',
			25 => 'meerkats',
			26 => 'fruitbats',
		),
	'monsters' => // noun
		array (
			0 => 'ducklings',
			1 => 'maggots',
			2 => 'phasmids',
			3 => 'mantises',
			4 => 'spiders',
			5 => 'fungi',
			6 => 'dermestid beetles',
			7 => 'vampires',
			8 => 'ammonites',
			9 => 'maggots',
			10 => 'death spores',
			11 => 'strangelets',
			12 => 'shitbeetles',
			13 => 'plague flies',
			14 => 'freaks of nature',
			15 => 'monsters',
			16 => 'ghosts',
			17 => 'machines',
			18 => 'leeches',
			19 => 'beetles',
			20 => 'ghostlings',
			21 => 'lice',
			22 => 'spores',
			23 => 'dreamgoats',
			24 => 'mugwumps',
			25 => 'tardigrades',
			26 => 'plaguebabies',
		),
	'attentive_filth' => // noun, used in attention scum phrases
		array (
			0 => 'scum',
			1 => 'filth',
			2 => 'sinners',
			3 => 'pariahs',
			4 => 'fuckwads',
			5 => 'meatbags',
			6 => 'filthy animals',
		),
	'scum' => // noun
		array (
			0 => 'scum',
			1 => 'shitbeetles',
			2 => 'shitbirds',
			3 => 'ordinary humans',
			4 => 'perverts',
			5 => 'meat',
			6 => 'monkey people',
			7 => 'scumbundles',
			8 => 'scumbubbles',
			9 => 'horrorbags',
			10 => 'horrormonkeys',
			11 => 'fuckoids',
			12 => 'freakazoids',
			13 => 'freakshow',
			14 => 'skin things',
			15 => 'animals',
			16 => 'filth',
			17 => 'spooklettes',
			18 => 'fuckbags',
			19 => 'freakpeople',
			20 => 'breathing machines',
			21 => 'bags of horror',
			22 => 'haunted beef',
			23 => 'fuckweasels',
			24 => 'victims',
			25 => 'shitfountains',
			26 => 'fuckmuppets',
			27 => 'fluffers',
			28 => 'spooklings',
			29 => 'arseleeches',
			30 => 'sexbeasts',
			31 => 'bloodbags',
			32 => 'horrorpops',
			33 => 'shagmuffins',
			34 => 'skinmachines',
			35 => 'catnipples',
			36 => 'meatsprites',
			37 => 'skinsacks',
			38 => 'skulltrolls',
			39 => 'godnipples',
			40 => 'marionettes',
			41 => 'bone machines',
			42 => 'lovebeasts',
			43 => 'fuckspores',
			44 => 'nipplybeasts',
			45 => 'sexbuckets',
			46 => 'scumshine',
			47 => 'weirdoids',
			48 => 'weirdlettes',
			49 => 'skinbeasts',
			50 => 'heartbubbles',
			51 => 'toxins',
			52 => 'strange matter',
			53 => 'futurenauts',
			54 => 'skinbags',
			55 => 'internauts',
			56 => 'lovespawn',
			57 => 'crotchbears',
			58 => 'skin monsters',
			59 => 'soulworms',
			60 => 'sparklewarts',
			61 => 'brothelkittens',
			62 => 'deathsperms',
			63 => 'salt licks',
			64 => 'crotchbeetles',
			65 => 'nipplewarmers',
			66 => 'bedpigs',
		),
	'bastards' => // noun
		array (
			0 => 'pervert people',
			1 => 'holy fools',
			2 => 'deathmonkeys',
			3 => 'goatfelchers',
			4 => 'whores',
			5 => 'space whores',
			6 => 'Mongols',
			7 => 'sex criminals',
			8 => 'freaks',
			9 => 'monkeyshaggers',
			9 => 'bastards',
			10 => 'doomed fools',
			11 => 'thought criminals',
			12 => 'munchkins',
			13 => 'face criminals',
			14 => 'dwarves',
			15 => 'frotteurs',
		),
	'horde' => // noun, groups only
		array (
			0 => 'horde',
			1 => 'hordes',
			2 => 'armada',
			3 => 'swarm',
			4 => 'twitterhorde',
			5 => 'freakscene',
			6 => 'herd',
			7 => 'pervherd',
		),
	'sexiness' => // of sexiness
		array (
			0 => 'frottage',
			1 => 'concupiscence',
			2 => 'love',
			3 => 'self-pollution',
			4 => 'desire',
			5 => 'intrusion',
			6 => 'sexcrime',
			7 => 'deliciousness',
			8 => 'delight',
			9 => 'turgidity',
			10 => 'romance',
			11 => 'amour',
			12 => 'joy',
			13 => 'lubriciousness',
			14 => 'engorgement',
			15 => 'surprise',
			16 => 'the boudoir',
			17 => 'abandon',
		),
	'ill_omen' => // of damnation
		array (
			0 => 'impending doom',
			1 => 'the apocalypse',
			2 => 'contagion',
			3 => 'the internet',
			4 => 'intervention',
			5 => 'damnation',
			6 => 'death',
		),
	'internet' => // internet synonyms
		array (
			0 => 'internet',
			1 => 'twitternet',
			2 => 'intertube',
			3 => 'interweb',
			//4 => 'noosphere',
		),
	'arbitrary_gnarbags' => // complete phrases
		array (
			0 => 'stains on the escutcheon of humanity itself',
			1 => 'dermestid beetles on the flesh of the internet',
			2 => 'horsepersons of the apocalypse',
			3 => 'living towers of burning murderous leipajuusto',
			4 => 'vectors of contagion',
			5 => 'vials of panther sweat',
			6 => 'walking slabs of haunted pork',
			7 => 'mind gangsters',
			8 => 'arsebiscuits',
			9 => 'cockblisters deluxe',
			10 => 'angels of the abyss',
			11 => 'scrotal treasures',
			12 => 'frightening skin machines',
			13 => 'love swamis',
			14 => 'crackling virility hedges',
			15 => 'tops and bottoms',
			16 => 'cloud of death spores',
			17 => 'splodges of monkey custard',
			18 => 'dollops of monkey custard',
			19 => 'bundles of muck',
			20 => 'brimming receptacles of deviljuice',
			21 => 'tiger blood clots',
		),
	'extra' => // random attachments
		array (
			0 => 'nnaaaaarg fuck cough spit twitch jerk',
			1 => 'I\'m off to the pub.',
			2 => 'I WILL FUCKING CUT YOU',
			3 => 'BABY HEADS SPANNERS PLAGUE COCKS',
			4 => 'You may amuse me now.',
			5 => 'I BLEED RED BULL',
			6 => 'I hate you with the fire of ten suns.',
			7 => 'Damn you all. (waves cane menacingly) (coughs consumptively)',
			8 => 'You may tell me that you love me now.',
			9 => 'hahaha suffer',
			10 => 'Everyone take their clothes off now.',
			11 => 'I spat in that last drink I bought you.',
			12 => 'Sit in my lap and tell me you\'re sorry.',
			13 => 'fuck you i am batman',
			14 => 'You will all pay.',
			15 => 'I blame YOU.',
			16 => 'jesus christ mutter fuck',
		),
	'salutation' => // greetings
		array (
			0 => 'Good morning,',
			1 => 'Good evening,',
			2 => 'Good night,',
			3 => 'Good day,',
			4 => 'Good afternoon,',
		),
	'attention' => // greetings, used in attention scum phrases
		array (
			0 => 'ATTENTION SCUM:',
			1 => 'ATTENTION SINNERS:',
		),
);

}
}
load_phrase_data();

// popular helper function.  everyone loves the_internet!11
function the_internet() {
	return 'the ' . internet();
}

############################## SAY SOMETHING!!!

# the root function
function ellis_complete_phrase() {
	$r = '';
	// good morning / ACHTUNG PUKEMONGER
	switch(weighted_random_index(85)) {

		case 0: // 85 % chance
		$r .= salutation(); // e.g., Good Morning
		$r .= ellis_label(); // e.g., my little plague monkeys
		$r = trim($r) . '. ';
		if(!weighted_random_index(10)) $r .= extra(); // e.g., I WILL CUT YOU
		break;

		case 1: // 15% chance
		$r .= random_choice(
			attention(), // eg, ATTENTION SCUM
			strtoupper('attention ' . trim(attentive_filth()) . ': ') // eg, ATTENTION FILTH (but random)
		);
		$r .= extra(); // eg, I WILL CUT YOU
		break;

	}
	return $r;
}

# ellis_label: Things Warren Ellis calls you.
function ellis_label() {
	$r = '';
	switch(rand(0, 7)) {
		case 0:
		return ellis_my_little_etc();
		break;

		case 1:
		$r .= random_choice(filthy(), sublime(), '');
		$r .= scum();
		break;

		case 2:
		$r .= bastards();
		$r .= 'of the ';
		$r .= internet();
		break;

		case 3:
		$r .= random_choice(sexy(), '');
		$r .= beasts();
		$r .= 'of ';
		$r .= ill_omen();
		break;

		case 4:
		$r .= internet();
		$r .= singularize(scum());
		$r .= random_choice(horde(), 'of ' . sexiness());
		break;

		case 5:
		$r .= arbitrary_gnarbags();
		break;

		case 6:
		$r .= filthy();
		$r .= sex();
		$r .= body_parts();
		break;

		case 7:
		$r .= 'you ';
		$r .= sublime();
		$r .= sex();
		$r .= random_choice(mammals(), beasts());
		if(!weighted_random_index(75)) $r .= 'of ' . the_internet();
	}
	return $r;
}

# ellis_my_little_etc: "my precious little thermonuclear fuckbags" and suchlike Ellisonia
function ellis_my_little_etc() {
	$r = 'my ';
	switch(rand(0,2)) {
		case 0:
		$r .= sexy();
		$r .= mammals();
		$r .= ' of ';
		$r .= random_choice(sexiness(), the_internet());
		break;

		case 1:
		$r .= 'little ';
		switch(rand(0,2)) {

			case 0:
			$r .= sex();
			$r .= monsters();
			break;

			case 1:
			$r .= mammals();
			$r .= 'of ';
			$r .= random_choice(sexiness(),
				ill_omen(),
				the_internet());
			break;

			case 2:
			$r .= sex();
			$r .= mammals();
			$r .= 'of ';
			$r .= random_choice(ill_omen(),
				the_internet());
		}
		break;

		case 2:
		$r .= moist();
		$r .= sex();
		$r .= mammals();

	}
	return $r;
}
/*
  		// FOR TESTING - ECHO 100 COMBINATIONS
        for($i=0;$i<100;$i++) {
            echo ellis_complete_phrase() . "<br />";
        }
*/
