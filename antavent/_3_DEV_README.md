# Antavent PHP DEV Informationen

## Coding Style

Der Phpstorm Einstellungsimport `phpstorm_settings.zip` enthält folgende Einstellungen:

1. Standardeinstellung PSR1/PSR2 (Editor > Code Style > Scheme: Antavent)
2. Zeilenumbruch: Unix (\n)
3. PHP mit `strict_types=1`. (modifierter PHP Header für neue PHP Dateien)

Weitere Regeln:

4. Schreibweise:
    1. Klassen: camelCase beginnend mit Großbuchstaben
    2. Variablen: camelCase
    3. Klassen-Funktionen: camelCase
    4. Test-Funktionen: snake_case
    5. Konstanten: Alles Großbuchstaben mit Unterstrich
    6. Datenbankfelder: snake_case
    7. weitere Folgen
    
## Zusätzliche Einrichtung

1. SASS/SCSS
    1. Dart Sass herunterladen: https://github.com/sass/dart-sass/releases/tag/1.17.1 und entpacken
    2. Settings > Tools > File Watcher > Add (SCSS)
    3. Unter Program den Pfad zur sass-Datei (sass.bat auf Windows) angeben
    
## GIT Anleitung
    
1. Oft comitten. Thematisch comitten.
2. Commit Messages
    1. Imperativ für erstes Verb in Subject-Zeile (`add` statt `added` oder `adding`)
    2. Kein Punkt am Ende der Subject-Zeile
    2. alles klein schreiben (außer "Eigennamen" wie Klassen usw.)
    3. Subject-Zeile mit Leerzeile von Body (optional) trennen
3. Möglichst täglich in den Master Branch pushen&mergen
4. Standard-Workflow:
    1. commit (bzw. stash, macht PhpStorm automatisch)
    2. fetch von remote
    3. rebase in local master
    4. push in remote
    5. (unstash)
    6. Änderungen im Container bereitstellen (siehe 5. Häufige Arbeitschritte ...)

## Composer Kurzanleitung

1. Contao Cache löschen
- `runuser -u www-data php vendor/bin/contao-console cache:clear`
2. Alle Antavent Bundles aktualisieren / Autoloader neu generieren / Contao/Symfony Cache neu aufbauen 
- `runuser -u www-data composer install`
3. Ein Antavent Bundle gezielt aktualisieren / Autoloader neu generieren / Contao/Symfony Cache neu aufbauen
- `runuser -u www-data composer update antavent/zvab-bundle`
- `runuser -u www-data composer update antavent/amazon-bundle`
- usw.
4. Nur Autoloader neu generieren
- `runuser -u www-data composer dump-autoload`

## Häufige Arbeitsschritte bei der Arbeit mit Docker & Composer

1. Situation: Neuer Code wird per Fetch || Merge ins Projekt integriert
    - Siehe 2.4: Git Standard Workflow
    - Vollständig Volume-Synchronisierten Web Container starten bzw. prüfen ob einer läuft
    - Contao Installation im Container aktualisieren:
        - anmelden: `docker exec -it ibu-pim-2 bash`
        - im Container: `runuser -u www-data composer install`
        - wenn keine neuen Module erstellt wurden reichen auch statt composer install:
            - `runuser -u www-data php vendor/bin/contao-console cache:clear`
            - `runuser -u www-data composer dump-autoload`
    - /contao/install aufrufen und Datenbankupdate ausführen (für Änderungen nach rebase)
2. Situation: Neues Modul wird selbst erstellt
    - unter contao/bundles/antavent das template-bundle kopieren und als Vorlage verwenden
    - wichtig: composer.json vom neuen bundle anpassen
    - in contao/composer.json in require das neue bundle eintragen
    - in contao/composer.json in repository das Verzeichnis des neuen bundle als Path-Repository eintragen
    - Vollständig Volume-Synchronisierten Web Container starten bzw. prüfen ob einer läuft
    - Contao Installation im Container aktualisieren:
        - anmelden: `docker exec -it ibu-pim-2 bash`
        - im Container: `runuser -u www-data composer install` oder `runuser -u www-data composer update antavent/new-module` 
        - /contao/install aufrufen und Datenbankupdate ausführen (für Änderungen nach rebase)
        - Änderungen committen und pushen (wg. neuer composer.json und composer.lock)
        - @todo: hier Spezialfall neuer Versions-Stand im Remote beschreiben! 
2. Container starten
    - z.B. über Datei docker-compose.yml starten
    - eigene docker-compose.yml erstellen, dann mit docker-compose Befehlen arbeiten, z.B.:
    - `docker-compose up ibu-pim-2 -d`
    - mit Angabe der docker-compose-Datei:
    - `docker-compose -f .project/docker-compose.yml up ibu-pim-2 -d`

## Troubleshooting / Allgemeine Fehler

1. Leere Seite / ERR_EMPTY_RESPONSE im Browser wenn PhpStorm Debug Listener aktiv ist
    - **Alle** Breakpoints in PhpStorm löschen (Strg+Shift+F8)
2. PhpStorm: Git fordert Passwort obwohl Pageant mit korrektem Key läuft
    - neue Umgebungsvariable (für aktuellen Nutzer) in Windows anlegen
        - Name: SSH_AUTH_SOCK
        - Wert: `C:\Users\{windows-username}\.ssh\.ssh-pageant-{bitbucket-username}`
    - `C:\Program Files\Git\cmd\start-ssh-pageant.cmd` ausführen
    - PhpStorm neustarten
3. 
