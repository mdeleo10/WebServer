<?php
/*
 phpinfo();
 */

if (!empty($_SERVER['HTTP_CLIENT_IP']))
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
echo "This site supports IPv4 and IPv6 connectivity.<br>";
echo "Let us see if you are connecting with an IPv4 or IPv6 address..<br>";
echo "Your IP address is ", $ip_address, "<br>";

$exec_str = "host $ip_address 1.1.1.1| awk '{printf  $5 }' ";
//echo "Your exec_str is ", $exec_str, "<br>";
$host_name = exec($exec_str,$test);
echo "Your hostname is ", $host_name, "<br>";
if (strpos($ip_address,':') == true)
     {
     echo "Congratuations, you are IPv6 enabled to this site. <br>";
     }
else
     {
     echo "You are IPv4 enabled to this site. If you believe you are IPv6 enabled, check your connectivity. <br>";
     }

echo "<br>";


$exec_str="whois $ip_address | grep owner: | awk {'first = $1; $1=\"\"; print $0'}|sed 's/^ //g'";
$ISP=exec($exec_str,$test);
if (empty($ISP) )
{
        $exec_str="whois $ip_address | grep OrgName | awk {'first = $1; $1=\"\"; print $0'}|sed 's/^ //g'";
        $ISP=exec($exec_str,$test);
};
if (empty($ISP) )
{
        $exec_str="whois $ip_address | grep org-name | awk {'first = $1; $1=\"\"; print $0'}|sed 's/^ //g'";
        $ISP=exec($exec_str,$test);
};
if (empty($ISP) )
{
        $exec_str="whois $ip_address | grep netname | awk {'first = $1; $1=\"\"; print $0'}|sed 's/^ //g'";
        $ISP=exec($exec_str,$test);
};
echo "Your Internet Service Provider (ISP) appears to be $ISP";
echo "<br>";
echo "<br>";

// Use JSON encoded string and converts
// it into a PHP variable
$ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip_address));

echo "Country Name: " . $ipdat->geoplugin_countryName . "\n";
echo "<br>";
echo 'City Name: ' . $ipdat->geoplugin_city . "\n";
echo "<br>";
echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n";
echo "<br>";
echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n";
echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n";
echo "<br>";
echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n";
echo "<br>";
echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";
echo "<br>";
echo 'Timezone: ' . $ipdat->geoplugin_timezone;

echo "<br>";
echo "<br>";
echo "Do you know if you already using popular IPv6 (and IPv4) enabled websites? <br>";
echo "<br>";



echo 'Test your IPv4 aand IPv6 connectivity at  <a href="https://test-ipv6.com/">test-ipv6.com </a> <br>';
echo "<br>";

echo 'See your IP Info: Whois, DNS and RBL at HE.net: <a href="https://bgp.he.net/ip/',$ip_address,'"> bgp.he.net </a> <br>';

echo "<br>";
echo 'See your IP Geolocation information: <a href="https://ipgeolocation.io/ip-location/',$ip_address,'"> ipgeolocation.io</a> <br>
';
echo "<br>";
echo "<br>";

echo "United States: Popular IPv6 sites<br>";

echo "<br>";
echo '<a href="https://www.google.com/">www.google.com </a>, ';
echo '<a href="https://www.youtube.com/">www.youtube.com </a>, ';
echo '<a href="https://www.facebook.com/">www.facebook.com </a>, ';
echo '<a href="https://www.yahoo.com/">www.yahoo.com </a>, ';
echo '<a href="https://www.netflix.com/">www.netflix.com </a>, ';
echo '<a href="https://www.live.com/">www.live.com </a>, ';
echo '<a href="https://www.instagram.com/">www.instagram.com </a>, ';
echo '<a href="https://www.bing.com/">www.bing.com </a>, ';
echo '<a href="https://www.office.com/">www.office.com </a>, ';
echo '<a href="https://www.office365.com/">www.office365.com </a>, ';
echo '<a href="https://www.linkedin.com/">www.linkedin.com </a>, ';
echo '<a href="https://www.whatsapp.com/">www.whatsapp.com </a>, ';
echo '<a href="https://www.apple.com/">www.apple.com </a>, ';
echo '<a href="https://www.salesforce.com/">www.salesforce.com </a>, ';
echo '<a href="https://www.wikipedia.org/">www.wikipedia.org </a> <br>';


echo "<br>";

echo "Mexico: Popular IPv6 sites<br>";
echo "<br>";

echo '<a href="https://www.google.com.mx/">www.google.com.mx </a>, ';
echo '<a href="https://www.eluniversal.com.mx/">www.eluniversal.com.mx </a>, ';
echo '<a href="https://www.elfinanciero.com.mx/">www.elfinanciero.com.mx </a>, ';
echo '<a href="https://www.sat.gob.mx/">www.sat.gob.mx </a>, ';
echo '<a href="https://www.unam.mx/">www.unam.mx </a> <br>';
echo "<br>";
echo "<br>";
echo "IPv6 adoption Statiestics <br>";
echo "<br>";

echo 'Internet Society with several sites <a href="https://www.internetsociety.org/deploy360/ipv6/statistics/"> https://www.internet
society.org/deploy360/ipv6/statistics/ </a> <br>';

echo "<br>";
echo 'See here for more information about IPv6 servers, dns and mail ... <a href="https://www.vyncke.org/ipv6status/detailed.php?cou
ntry=us"> https://www.vyncke.org/ipv6status/detailed.php?country=us </a> <br>';

echo "<br>";

echo 'Google\' IPv6 Statistics with global adoption and per country ... <a href="https://www.google.com/intl/en/ipv6/statistics.html
#tab=ipv6-adoption"> https://www.google.com/intl/en/ipv6/statistics.html#tab=ipv6-adoption  </a> <br>';

echo "<br>";

echo "Are you using cloud computing from Azure, Google or Amazon? They are also IPv6 enabled if you turn it on.";
echo "<br>";

echo "<br>";
echo "Check your Cybersecurity...<br>";
echo "<br>";

echo "How do you rate your website for DNS, Encryption, Open Standards and proper configuration. <br>";
echo 'Test it now at <a href="https://internet.nl/">Internet.nl </a> <br>';
echo 'Test your SSL Cert and your web configuration at <a href="https://www.ssllabs.com/ssltest/">sslabs.com </a> <br>';
echo 'Test your site using the Mozilla Observatory  <a href="https://observatory.mozilla.org/">observatory.mozilla.org </a> <br>';
echo "<br>";
echo "Check your DNS Cybersecurity...<br>";
echo 'Check your DNS Connection Information at Cloudflare <a href="https://1.1.1.1/help/">https://1.1.1.1/help </a> <br>';
echo 'Check your DNS Transport, basic and Features  <a href="https://cmdns.dev.dns-oarc.net/">cmdns.dev.dns-oarc.net at DNS OARC </a
> <br>';
echo 'DNSViz is a tool for visualizing the status of a DNS zone <a href="https://dnsviz.net/">dnsviz.net </a> <br>';

echo "<br>";
echo "Check your browser to see if you are QUIC ready...<br>";
echo 'Test QUIC at <a href="https://quic.nginx.org/"> quick.nginx.org </a> <br>';

echo "<br>";
echo '<a href="https://mdeleo.com/index_spa.php/">Español</a> <br>';

?>
