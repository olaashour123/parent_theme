<?php 
function gambarX21($gp1){
$gambarX21 = array();
foreach($this->match_all('/<img.*?data-src="(.*?)".*?>/msi', $this->match('/<div jsname="pCbVjb" class="SgoUSc">(.*?)<div class="awJjId nmBghe".*?><\/div>.*?<\/div>/ms', $gp1, 1), 1) as $m) {
$gambarX21Match					= $this->match_all('/<button class="Q4vdJd".*?>(.*?)<\/button>/ms', $m, 1);
$akaCountry						= trim($akaTitleMatch[0]);
$gambarX21link					= trim($gambarX21Match[1]);
array_push($gambarX21, $gambarX21link);
    }
    return array_filter($gambarX21);
}