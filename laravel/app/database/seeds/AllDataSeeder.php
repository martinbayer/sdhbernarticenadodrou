<?php
use Carbon\Carbon;
use SdhModel\AboutPart;
use SdhModel\Actuality;
use SdhModel\Event;
use SdhModel\Language;
use SdhModel\PartyEquipment;
class AllDataSeeder extends Seeder {
	public function run() {
		$all = true;
		
		/* more and less static content filled by seeder */
		DB::table ( 'about_parts' )->delete ();
		/* more and less static content filled by seeder */
		DB::table ( 'party_equipments' )->delete ();
		/* more and less static content filled by seeder */
		
		if ($all) {
			/* do not delete content of following tables automatically to not to lose a history */
			DB::table ( 'events' )->delete ();
			DB::table ( 'actualities' )->delete ();
			DB::table ( 'languages' )->delete ();
			$enLang = Language::create ( array (
					'shortcut' => 'en',
					'name' => 'English' 
			) );
			$csLang = Language::create ( array (
					'shortcut' => 'cs',
					'name' => 'Cesky' 
			) );
		} else {
			$enLang = Language::where ( 'shortcut', '=', 'en' )->first ();
			$csLang = Language::where ( 'shortcut', '=', 'cs' )->first ();
		}
		
		/* create party equipment records */
		PartyEquipment::create ( array (
				'language_id' => $csLang->id,
				'title' => 'First cooler',
				'content' => 'first cooler to be used to handle the beer properly',
				'image' => 'chladak1.png' 
		) );
		
		AboutPart::create ( array (
				'language_id' => $csLang->id,
				'title' => 'Počátky',
				'order_no' => 1,
				'content' => '<p>V květnu 1884 byl obecní radou v Bernarticích nad Odrou jmenován zřizovací výbor a ten 
								vypracoval 10. srpna 1884 za odborné porady, stanovy sboru. Už 19. srpna 1884 schválilo 
								tyto stanovy o 19-ti paragrafech Moravské zemské místodržitelství v Brně. Při vzniku sboru
								se hned přihlásilo 71 činných a 32 přispívajících členů. Členem České ústřední jednoty 
								moravskoslezských sborů hasičských ve Velkém Meziřící se náš sbor stal formálně teprve 
								1.2.1888, až byl pro svou činnost dostatečně vybaven. V roce 1885 byla na pozemku 
								zapůjčeném od p. Jana Bayera, postavena nová hasičská zbrojnice, svého času nejmodernější
								v okrese.</p>
								<p>I když ještě v první polovině 19. stol. převládala v Bernarticích nad Odrou dřevěná zástavba,
								nedošlo k nějakému hromadnému zničení většího počtu objektů ohněm, poněvadž se jednalo 
								o tzv. lánovou zástavbu a jednotlivá stavení byla od sebe více vzdálená.</p>',
				'image' => '1.jpg' 
		) );
		AboutPart::create ( array (
				'language_id' => $csLang->id,
				'title' => ' Války',
				'order_no' => 2,
				'content' => '<p>První světová válka znamenala pro sbor těžkou ránu, proto bylo třeba na jaře r. 1920 provést 
								nábor mládeže, aby sbor mohl plnit své poslání. V roce 1934, kdy sbor slavil 50leté jubileum, pořídil si novou motorovou stříkačku.</p>
								<p>Sbor prakticky zůstal za okupace jediným 
								činným spolkem v obci. Nezůstal však dlouho dobrovolným a brzy podléhal německé státní 
								policii. Cvičit se muselo pravidelně každou neděli ráno s německými povely. Na to dohlížel
								okresní vedoucí Kriebel ze Šenova, který dojížděl na inspekce ozbrojený.</p>
								<p>Po osvobození byl sbor obnoven pod starým názvem a hned od června začal intenzivně
								pracovat.</p>',
				'image' => '2.jpg' 
		) );
		AboutPart::create ( array (
				'language_id' => $csLang->id,
				'title' => 'Technika před válkou a za totality',
				'order_no' => 3,
				'content' => '<p>1949 – 1950 došlo k reorganizaci hasičstva jako celku. Samaritánská služba byla převedena 
								do Červeného kříže a o rok později byly likvidovány i zemské Jednotky. V roce 1953 bylo
								v Bernarticích nad Odrou založeno první požární družstvo žen.</p>
								<p>V roce 1961 byl předán MNV od ONV lehký nákladní automobil TATRA 805 valník,
								zároveň s ním přidělena stříkačka PPS 8.</p>
								<p>V roce 1971 byla z prostředků ONV získána nová stříkačka PPS 12 na přívěsném vozíku s vybavením.</p>
								<p>V letech 1969 – 1970 byla vystavěna budova MNV, v jejíž přízemí je umístěna nová požární
								zbrojnice. V roce 1978 byla postavena za touto budovou tolik potřebná sušící věž na hadice.
								Dva roky nato předal požární útvar v Novém Jičíně bernartskému sboru požární vodidlo IFA
								LF 16. A i toto povzbudilo požárníky k ještě větší činnosti. Vzali si za své vybudovat výletiště
								v Březovém háji.</p>',
				'image' => '3.jpg' 
		) );
		
		AboutPart::create ( array (
				'language_id' => $csLang->id,
				'title' => ' Po revoluci',
				'order_no' => 4,
				'content' => '<p>Od roku 1990 je naše obec opět samostatná. Ze zákona je povinna zabezpečit požární 
						ochranu, včetně výzbroje a výstroje. Je zřízena zásahová jednotka, jejíž velitel je jmenován 
						dekretem. Členové této jednotky musí absolvovat příslušná školení a lékařské prohlídky a 
						jsou členy občanského sdružení Sboru dobrovolných hasičů.</p>
						<p>V roce 2008 si náš sbor nechal zhotovit v Bolaticích u Opavy Hasičský prapor Sboru
						dobrovolných hasičů v Bernarticích nad Odrou, který byl financován jak ze společných
						prostředků sboru, tak z dobrovolné sbírky jednotlivých členů. Prapor byl požehnán   
						5. července 2009 u příležitosti 125. výročí založení sboru. Tento rok se také nesmazatelně 
						zapsal do dějin naší obce. V červnu roku 2009 zasáhla dolní část naší obce ničivá blesková 
						povodeň, po které byly oslavy 125. výročí založení sboru zrušeny.</p>
						<p>Sbor se kromě hlavní náplně své činnosti aktivně zapojuje do dění v obci., jako jsou kulturní a 
						sportovní akce apod. K tomu účelu si ze svých prostředků pořídil vybavení, jako chladící 
						pulty, grily, prodejní stánky, velké párty stany, stoly na stolní tenis apod. V roce 2006 byl 
						zbudován prodejní stánek Floriánek, který stojí v Břízovém háji.</p>
						<p>V roce 2013 byl po třiadvaceti letech obnoven náš vozový park. Naší IFU vystřídal DAF, 
						který byl zakoupený obcí Bernartice nad Odrou a dovezen z Holandska. Tato historická 
						událost byla posílením chutí a elánu do další činnosti a dalších let. Samotné žehnání proběhlo 
						loni v květnu při uctění památky svátku sv. Floriána.</p><br>
						<p>
						Družstva mužů, žen, starších i mladších žáků se pravidelně zúčastňují soutěží v požárním 
						sportu, jak v okrsku, tak mimo něj. Soutěže o Bernartský pohár, kterou pořádáme pravidelně 
						od roku 1991, se zúčastňuje zhruba 30 družstev, včetně špičkových.</p>',
				'image' => '4.jpg' 
		) );
		
		AboutPart::create ( array (
				'language_id' => $csLang->id,
				'title' => 'Velitelé a starostové SDH Bernartice nad Odrou',
				'order_no' => 5,
				'content' => '<table class="table table-striped">
						<thead>
							<tr><th>Velitelé</th></tr>
						</thead>
						<tbody>
							<tr><td>Jan Bayer č.1 1884 - 1895</td></tr>
							<tr><td>František Šlezar č.8 1895 - 1905</td></tr>
							<tr><td>František Šimíček č.14 1905 - 1921</td></tr>
							<tr><td>Jan Šimíček č.3 1921 - ?</td></tr>
							<tr><td>Alois Bayer č.58 1940 - ?</td></tr>
							<tr><td>Alois Kunetka č.12 1945 - 1957</td></tr>
							<tr><td>Karel Maléř č.107 1957 - ?</td></tr>
							<tr><td>Květoslav Horák č.40</td></tr>
							<tr><td>Oldřich Dorazil č.73</td></tr>
							<tr><td>Alois Hopp č.69 ? - 1970 </td></tr>
							<tr><td>Josef David č.66 1970 - 1972</td></tr>
							<tr><td>Petr Dorazil č.73 1972 - 1980</td></tr>
							<tr><td>Josef David č.187 1980 - 1990</td></tr>
							<tr><td>Vojtěch Knop č.175 1990 - dosud</td></tr>
						</tbody>
						</table>
						<table class="table table-striped">
						<thead>
							<tr><th>Starostové (předsedové)</th></tr>
						</thead>
						<tbody>
							<tr><td>František Glogar č.30 1884 - 1895</td></tr>
							<tr><td>František Glogar č.30 1895 - 1905</td></tr> 
							<tr><td>Josef Horák č.33 1905 - 1921</td></tr>
							<tr><td>František Bayer č.37 1921 - 1942    (zemřel)</td></tr>
							<tr><td>Alois Bayer č.58 1945 - 1952</td></tr>
							<tr><td>Josef Papák   č.51 1952 - 1957</td></tr>
							<tr><td>Alois Kunetka č.12 1957 - 1970</td></tr>
							<tr><td>Jan Váňa č.136 1970 - 1975</td></tr>
							<tr><td>Alois Hopp č.69 1975 -1980</td></tr>
							<tr><td>Václav Drlík č.208 1980 - 1990 </td></tr>
							<tr><td>Marie Drlíková č.208 1990 - 1994</td></tr>
							<tr><td>Václav Drlík č.208 1994 - 2010 </td></tr>
							<tr><td>Tomáš Horut č.223 2010 - dosud</td></tr>
						</tbody></table>',
				'image' => '5.jpg' 
		) );
		Actuality::create ( array (
				'language_id' => $csLang->id,
				'content' => 'V pátek dne 9. ledna 2015 se v sále KD uskuteční volební výroční valná hromada.',
				'reference' => 'volebni_valna_hromada_2015',
				'title' => 'Výroční volební valná hromada 2015',
				'order_no' => 1 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'volebni_valna_hromada_2015',
				'title' => 'Výroční volební valná hromada s živou hudbou',
				'from_datetime' => Carbon::create(2015, 1, 9, 18),
				'show_from_time'=>true
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'okrskova_valna_hromada_2015',
				'title' => 'Okrsková valná hromada v Jeseníku n/O',
				'from_datetime' => Carbon::createFromDate ( 2015, 2, 28 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'ping_pong_2015',
				'title' => 'Turnaj v ping-pongu',
				'from_datetime' => Carbon::createFromDate ( 2015, 3, 14 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'sber_srotu_jaro_2015',
				'title' => 'Sběr železného šrotu',
				'from_datetime' => Carbon::createFromDate ( 2015, 3, 28 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'velikonocni_diskoteka_2015',
				'title' => 'Velikonoční diskotéka',
				'from_datetime' => Carbon::createFromDate ( 2015, 4, 5 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'staveni_maje_2015',
				'title' => 'Stavění máje',
				'from_datetime' => Carbon::createFromDate ( 2015, 4, 30 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'sv_florian_2015',
				'title' => 'Oslavy svátku Sv. Floriána',
				'from_datetime' => Carbon::createFromDate ( 2015, 5, 3 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'lampionovy_pruvod_2015',
				'title' => 'Lampiónový průvod s táborákem',
				'from_datetime' => Carbon::createFromDate ( 2015, 5, 7 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'kaceni_maje_2015',
				'title' => 'Kácení máje',
				'from_datetime' => Carbon::createFromDate ( 2015, 5, 29 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'has_soutez_deti_2015',
				'title' => 'Hasičská soutěž dětí',
				'from_datetime' => Carbon::createFromDate ( 2015, 5, 30 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'pout_2015',
				'title' => 'Pouť',
				'from_datetime' => Carbon::createFromDate ( 2015, 5, 31 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'bernatsky_pohar_2015',
				'title' => 'Hasičská soutěž o Bernacký pohár',
				'from_datetime' => Carbon::createFromDate ( 2015, 6, 14 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'den_obce_2015',
				'title' => 'Den obce 2015',
				'from_datetime' => Carbon::createFromDate ( 2015, 6, 27 ) 
		) );
		Event::create ( array (
				'language_id' => $csLang->id,
				'shortcut' => 'zajezd_2015',
				'title' => 'Hasičský zájezd 2015',
				'from_datetime' => Carbon::createFromDate ( 2015, 9, 11 ),
				'to_datetime' => Carbon::createFromDate ( 2015, 9, 12 ),
				'image' => '' 
		) );
	}
}