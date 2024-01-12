# Evidence TCP/IP
Jedná se o webovou aplikaci, která eviduje a skenuje lokální síť, zjišťuje, jaké zařízení se nachází na konkrétní IP adrese a výsledky ukládá do databáze
Sken sítě probíhá 3x za den (0h, 9h,17h), nebo je možné zapnout i ruční sken

## Tato aplikace není nikde spuštěna na veřejném webhostingu, jelikož její běh je závislý na lokální intranetové síti MV PČR
* Bude představena přes VPN v den prezentace 


## Editování evidence
* všechny nalezené záznamy se dají editovat
* předešlá editace je ukládána
* možnost editovat záznamy jak uložené ručně, tak uložené ze serveru
  
##  Lokality IP adres
* Z databáze jsou načtené IP dresy, které jsou pak rozmaskovány pro konkrétní lokality
* nebo je možné zobrazit celý jeden rozsah IP adres
* nebo si vyhledat požadovanou lokalitu

## Vyhledávání
### jsou zde dvě vyhledávací okna
* vyhledávání v evidenci konkrétní lokality
* kompletní vyhledávání v historii a evidenci 
* možnost hledat i více hodnot najednou
* hledané hodnoty se podbarví

# Další funkce

## Status OFFLINE
* aplikace umí na základě zadané IP adresy spočítat, kolik dnů je IP ve stavu OFFLINE
* nebo se může zadat rozsah IP adres pro výpočet OFFLINE dnů

## IP kalkulačka
* dle zadané IP adresy a prefixu vypočítá rozsah sítě
* z toho použitelných IP adres
* bránu
* masku

## Login - pro správu uživatelů
* logování do aplikace
* vytvoření uživatele - (heslo je hešováno)
* reset hesla

## Checkout
* okamžité zjištění, co se nachází na konkrétní IP adrese

## Ping
* zjištění odezvy IP adresy

## Periférie
* periférie, jako je tiskárna, kamera, NAS, NVR je možno okamžitě vstoupit do webového rozhraní dané periférie
  
