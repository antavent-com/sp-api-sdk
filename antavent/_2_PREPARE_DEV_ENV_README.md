# IBU PIM 2 Build / Deployment Informationen

## Docker Images erstellen und Container starten

### Docker Images bauen (optional, privates Repository auf hub.docker.com kann benutzt werden)
- Rechtsklick auf das Projekt -> Open in Terminal
1. Basis-Image der Antavent Contao-Installation bauen
- `docker build ./.project/contao4.9 -t antaventdd/contao:4.9`
- Prozess kann eine Weile brauchen bis etwas sichtbares passiert (Sending build context to docker daemon)
2. Projekt-Image bauen 
    1. aus lokalen Verzeichnis
    - `docker build . -t antaventdd/ibu-pim-2`
    2. oder direkt aus Versionsverwaltung 
    - `docker build https://bitbucket.org/ibus/ibu-pim-2.git -t antaventdd/ibu-pim-2`
    
    Prozess kann eine Weile brauchen bis etwas sichtbares passiert (Sending build context to docker daemon)
    
    3. Dev-Image bauen (ohne apcu/opcache, mit xdebug)
    - `docker build .project/dev -t antaventdd/ibu-pim-2:dev`
    
### Projekt für Container mit Volume-Binding vorbereiten

- Container über Datei docker-compose.yml starten, Datei .project/docker-compose.yml als Vorlage verwenden oder selbst Datei schreiben
- Web Container mit vollständigen Volume-Binding starten, docker-compose.yml starten mit:
    ````    
    volumes:
        - ./html:/var/www/html
    ````
- auch XDebug in docker-compose.yml auskommentieren (composer läuft dann schneller)
- `docker exec -it ibu-pim-2 bash`
- `runuser -u www-data composer install`
- Nur bei Fehler "composer [ErrorException] file_get_contents(): read of 8192 bytes failed with errno=21 Is a directory":
    - ist vermutlich Problem mit Volume Binding bei Docker Desktop, folgendes probieren:
    - `exit`
    - `docker-compose down -v`
    - PhpStorm bzw. Docker Desktop bzw. Rechner neu starten
    - wieder Web Container mit vollständigen Volume-Binding starten, docker-compose.yml starten
- `exit`
- `docker-compose stop`
- XDebug in docker-compose.yml wieder einkommentieren
- Container über docker-compose.yml starten

### Web Container mit reduzierten Volume-Binding starten

- bringt Performance-Vorteile, bei guter Performance nicht notwendig (z.B. Docker auf Linux oder Mac ist meist schnell genug)
docker-compose.yml starten mit
    ````    
    volumes:
    #      - ./html:/var/www/html
          - ./html/config:/var/www/html/config
          - ./html/system/config:/var/www/html/system/config
          - ./html/bundles:/var/www/html/bundles
          - ./html/files:/var/www/html/files
          - ./html/var/logs:/var/www/html/var/logs
          - ./html/composer.json:/var/www/html/composer.json
          - ./html/composer.lock:/var/www/html/composer.lock
          - ./html/vendor/autoload.php:/var/www/html/vendor/autoload.php
          - ./html/vendor/composer:/var/www/html/vendor/composer
          - ./html/contao-manager:/var/www/html/contao-manager
          - ./html/isotope:/var/www/html/isotope          
    ````
    
### NUR BEI VIRTUALBOX SHARED FOLDERS:
- damit symlinks funktionieren (wichtig für Contao):
- `"C:\Program Files\Oracle\VirtualBox\VBoxManage.exe" setextradata VMNAME VBoxInternal2/SharedFoldersEnableSymlinksCreate/SHARE_NAME 1`
- VMNAME ist normalerweise "default"
- SHARE_NAME wie in VirtualBox angegeben 

## DB Daten importieren

### Über PhpStorm

1. Am rechten Rand "Database" öffnen
2. "+"-Icon drücken => Data-Source => MySQL
3. Daten entsprechend docker-compose-yml eingeben
    - database_host: localhost
    - Port, User, DB so wie in gestarteter docker-compose.yml angegeben
4. Test Connection
5. Connection erfolgreich? => Rechtsklick auf grade angelegte Verbindung im Database-Tool
    - "Run SQL Script" auswählen (für alle .sql Dateien in .project/docker-build/sql)
    - SQL-Script auswählen
    - PHPStorm führt Import aus

### Direkt im Docker Container

Datenbank mit Testdaten importieren
`docker cp .project/docker-build/sql/ibu-pim-2-db.sql ibu-pim-2-db:/var/tmp`
- Bash Shell im Container öffnen
- `docker exec -it ibu-pim-2-db bash`
- Alte DB löschen und neu anlegen (nur bei Bedarf)
- VORSICHT: Der nächste Befehl versucht eine lokale DB zu löschen. Überprüfe, ob du den docker host port vom richtigen SQL-Container eingetragen hast!  
- `mysql -u contaouser -pCzwyp8cskneZWzHk -e "DROP DATABASE contao"`
- `mysql -u contaouser -pCzwyp8cskneZWzHk -e "CREATE DATABASE contao"`
- Testdaten importieren
- `mysql -u root -p6Druh6t3KwkU5rTH -e "SET GLOBAL max_allowed_packet=268435456"`
- `mysql -u contaouser -pCzwyp8cskneZWzHk contao < /var/tmp/ibu-pim-2-db.sql`
- Das kann ein paar Minuten dauern... Danach .sql Datei löschen 
- `rm /var/tmp/ibu-pim-2-db.sql`

## Contao mit Install-Tool konfigurieren

1. http://localhost:8089/contao/install aufrufen
    - Standard-Installtool-Passwort: #password12
    - Datenbankverbindung eingeben
        * Host: Name des DB-Containers, z.B. ibu-pim-2-db
        * Port: 3306, **nicht** 33066
        * DB USER: contaouser
        * DB PASSWORD: Czwyp8cskneZWzHk 
        * DB Name: contao
    - DB aktualisieren
2. Im Backend anmelden
    - user: admin, pw: #password12
3. Standard-Einstellungen überprüfen bzw. einstellen:
    - System -> Einstellungen
        - E-Mail-Adresse des Systemadministrators angeben
        - Datumsformat: 'd.m.Y'
        - Datums- und Zeitformat: 'd.m.Y H:i'
        - Elemente pro Seite: 50
        - Maximum Datensätze pro Seite: 500
    - alle hier eingestellten Werte werden in der Daten system/config/localconfig.php gespeichert

## Contao-Manager einrichten
- damit können Paktete verwaltet, Systemwartungsaufgaben erledigt werden und weiteres
- http://localhost:8089/contao-manager.phar.php aufrufen
- Account anlegen
- Serverkonfiguration anpassen
    - Hosting-Anbieter: Andere
    - Composer Resolver Cloud deaktivieren
    - Contao Manager starten

## Debugger-Konfiguration in PHPStorm

- wichtige Hinweise:
    - der Webcontainer läuft am schnellsten ohne gesetzter 'XDEBUG_CONFIG' Umgebungsvariable (also ohne aktiviertes Debugging)
    - wenn Debugging aktiviert ist läuft der Webcontainer schneller wenn der Listener im PhpStorm aktiviert ist
    - falls Xdebug bei laufenden Webcontainer ein- oder ausgeschaltet werden soll wird ein Docker recreate ausgelöst
    - falls auf Linux-Systemen das Xdebug nicht funktioniert könnte es am 'XDEBUG_CONFIG: remote_host=host.docker.internal' in der docker-compose.yml 
    liegen, die Angabe von host.docker.internal funktioniert normalerweise nur auf Windows und Mac
### Debugger Mapping in PHPStorm
- Strg + Alt + S drücken
- Languages & Frameworks -> PHP -> Servers
- localhost und verwendeten Port prüfen bzw. korrigieren
- Debugger: Xdebug
- Checkbox 'Use path mappings' aktivieren
- Mapping von Project files/_dein_lokales_Projektverzeichnis_/html auf '/var/www/html'
- Apply & OK  

## Bilder aus Produktiv-System importieren

- über Aufruf von PHP-Script: 

[Bild-Import](http://localhost:8089/bundles/ibupim/ImagesImporter.php)

- Script läuft mehrere Stunden, da Bilder relativ groß (~ 1 MB)
- in der Grund-Einstellung sind 10 Tausend Bücher im Buchkatalog, für alle Bilder werden etwa 16 GB Speicher benötigt 

## Datenbank-Aufrufe, um Export-Status der Bücher zu setzen

### alle Bücher in die Export-Vorbereitung bringen

`update tl_buch_exemplare set lock_gs_export = 0,
                              lock_gs_export_by_warehouse = 0,
                              lock_export_to_woo_c_shop = 0,
                              ready_for_export = 0,
                              ready_for_ibus = 0,
                              quantity = 1;`

### alle ISBN-Bücher für den vorläufigen IBUS Export freigeben

`delete from tl_buch_ibus_status`
`update tl_buch_exemplare set lock_gs_export_by_warehouse = 0,
                              lock_gs_export = 0,
                              ready_for_export = 0,
                              ready_for_ibus = 0
                              quantity = 1;`

### alle Bücher für den Webshop-Export freigeben

`update tl_buch_exemplare set preis_1 = 12.34 where preis_1 = '' or preis_1 is null`

`update tl_buch_exemplare set lock_gs_export_by_warehouse = 0,
                              lock_gs_export = 0,
                              ready_for_export = 1,
                              lock_export_to_woo_c_shop = 0,
                              quantity = 1,
                              sperre_woocommerce = 0;`

### alle Bücher für den IBUS Export freigeben

`update tl_buch_exemplare set preis_1 = 12.34 where preis_1 = '' or preis_1 is null`
`update tl_buch_exemplare set lock_gs_export_by_warehouse = 0,
                              lock_gs_export = 0,
                              ready_for_export = 1,
                              ready_for_ibus = 1,
                              lock_export_to_ibus = 0,
                              quantity = 1,
                              sperre_woocommerce = 0;`