<?php
date_default_timezone_set('Europe/Amsterdam');
$files = @glob('imgs/*.jpg');

natsort($files);
$rssImages = array_slice(array_reverse($files), 0, 5);

$path = strrev(strstr(strrev($_SERVER['REQUEST_URI']), '/'));
$url = 'http://' . $_SERVER['SERVER_NAME'] . $path;

header('Content-Type: text/xml');
echo  '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss xmlns:dc="http://purl.org/dc/elements/1.1/" version="2.0">
	<channel>
		<description>
			Maleglitch by ax710 and y-a-v-a glitches Malevitch paintings into hypersuprematism.
		</description>
		<title>Maleglitch by ax710 and y-a-v-a</title>
		<generator>Maleglitch 2.0</generator>
		<link>http://maleglitch.net/</link>
		<?php foreach($rssImages as $image):?>
		<?php $date = strtotime(str_replace('_',' ',substr($image, 5,17)));
		?>
		<item>
			<title>Hypersuprematist composition</title>
			<subject>hypersuprematism</subject>
			<description>
				<img src="<?php echo $url . $image ?>"/><br/><br/>
			</description>
			<link><?php echo $url . $image ?></link>
			<guid><?php echo $url . $image ?></guid>
			<pubDate><?php echo date('r', $date);?></pubDate>
			<rights>http://creativecommons.org/licenses/by/3.0/nl/</rights>
			<creator>Generated by Maleglitch from ax710 and y-a-v-a</creator>
		</item>
		<?php endforeach; ?>
	</channel>
</rss>