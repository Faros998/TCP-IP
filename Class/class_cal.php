<?php
class NetworkCalculator
{
    private $ipAddress;
    private $cidr;

    public function __construct($ipAddress, $cidr)
    {
        $this->ipAddress = $ipAddress;
        $this->cidr = $cidr;
    }

    public function calculateNetwork()
    {
        $ipParts = explode('.', $this->ipAddress);
        $binIP = sprintf("%08b%08b%08b%08b", $ipParts[0], $ipParts[1], $ipParts[2], $ipParts[3]);
        $subnet = substr($binIP, 0, $this->cidr);
        $hostBits = str_repeat('0', 32 - $this->cidr);
        $networkAddress = $subnet . $hostBits;
        $broadcastAddress = substr_replace($networkAddress, str_repeat('1', 32 - $this->cidr), $this->cidr);
        $mask = long2ip(bindec(str_pad('', $this->cidr, '1') . str_pad('', 32 - $this->cidr, '0')));
        
        // Výpočet brány (nejnižší možná IP adresa v síti)
        $gatewayBin = substr_replace($networkAddress, '1', -1);
        $gateway = long2ip(bindec($gatewayBin));

        // Výpočet počtu použitelných IP adres
        $totalIPs = pow(2, 32 - $this->cidr);
        $usableIPs = $totalIPs - 2; // Rozdíl mezi celkovým počtem a adresami sítě a broadcastu

        return [
            'Network' => long2ip(bindec($networkAddress)),
            'Broadcast' => long2ip(bindec($broadcastAddress)),
            'Mask' => $mask,
            'Gateway' => $gateway,
            'UsableIPs' => $usableIPs, // Přidání počtu použitelných IP adres do výsledku
        ];
    }
}
?>