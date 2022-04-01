# Könyvtári Szoftver - Szakács Gergő

## Fontos tudnivalók

- Az adatbázis a `Database` mappában található. A Program indítása elött az adatbázisnak futnia kell!

- Amennyiben a `connection string` módósítására van szükség akkor a `Values/constans.php` fájlban kell átírni a következőt:

```
$conn = new mysqli("127.0.0.1", "root", "titok1234", "konyvtar");
```

- A program indításakor a `Pages` mappában található `login.php` vagy a `registration.php` fájlt kell elindítani.

- A könyvtáros felhasználónak belépéséhez a következő adatokat kell beírni:

```
Email: konyvtaros@konyvtar.hu
Jelszó: konyv1234
```
