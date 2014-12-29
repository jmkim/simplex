<?php
/***************************************************************************
 *
 *   Simplex
 *
 *   Jongmin Kim
 *   kdzlvaids@gmail.com
 *
 *   https://github.com/kdzlvaids/Simplex
 *
 *   Based on Encode Explorer by Marek Rei
 *   http://encode-explorer.siineiolekala.net
 *
 *   Comments are in English.
 *   If you change anything, save with UTF-8! Otherwise you may
 *   encounter problems, especially when displaying images.
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This is free software and it's distributed under GNU/GPL Licence.
 *
 *   Encode Explorer is written in the hopes that it can be useful to people,
 *   and Simplex is following it respectfully.
 *   It has NO WARRANTY and when you use it, the author is not responsible
 *   for how it works (or doesn't).
 *
 *   Faenza Icons (http://tiheum.deviantart.com/art/Faenza-Icons-173323228)
 *   are used which is distributed under the GNU/GPL License.
 *
 ***************************************************************************/

/***************************************************************************/
/*   HERE ARE THE SETTINGS FOR CONFIGURATION                               */
/***************************************************************************/

//
// Initialising variables. Don't change these.
//

$CONFIG = array();
$ERROR = "";
$LOADTIME = microtime(TRUE);

/*
 * GENERAL SETTINGS
 */

//
// Choose a language. See below in the language section for options.
// Default: $CONFIG['confLang'] = "en";
//
$CONFIG['confLang'] = "en";

/*
 * USER INTERFACE
 */

//
// Will the files be opened in a new window? true/false
// Default: $CONFIG['confNewWindow'] = false;
//
$CONFIG['confNewWindow'] = false;

//
// How deep in subfolders will the script search for files?
// Set it larger than 0 to display the total used space.
// Default: $CONFIG['confSubfolders'] = 0;
//
$CONFIG['confSubfolders'] = 0;

//
// Will the page header be displayed? 0=no, 1=yes.
// Default: $CONFIG['confShowHeader'] = true;
//
$CONFIG['confShowHeader'] = true;

//
// The title for the page
// Default: $CONFIG['confTitle'] = "Simplex";
//
$CONFIG['confTitle'] = "Simplex";

//
// The secondary page titles, randomly selected and displayed under the main header.
// For example: $CONFIG['confTitleSub'] = array("Secondary title", "&ldquo;Secondary title with quotes&rdquo;");
// Default: $CONFIG['confTitleSub'] = array("Simple File Explorer");
//
$CONFIG['confTitleSub'] = array("Simple File Explorer");

//
// Display breadcrumbs (relative path of the location).
// Default: $CONFIG['confShowBreadcrumb'] = true;
//
$CONFIG['confShowBreadcrumb'] = true;

//
// Display the time it took to load the page.
// Default: $CONFIG['confShowLoadTime'] = true;
//
$CONFIG['confShowLoadTime'] = true;

//
// The time format for the "last changed" column.
// Default: $CONFIG['confTimeFormat'] = "M d, Y G:i";
//
$CONFIG['confTimeFormat'] = "M d, Y G:i";

//
// Charset. Use the one that suits for you.
// Default: $CONFIG['confCharset'] = "utf-8";
//
$CONFIG['confCharset'] = "utf-8";

/*
* PERMISSIONS
*/

//
// The array of folder names that will be hidden from the list.
// Default: $CONFIG['confHiddenDir'] = array();
//
$CONFIG['confHiddenDir'] = array();

//
// Filenames that will be hidden from the list.
// Default: $CONFIG['confHiddenFile'] = array(".ftpquota", "index.php", "index.php~", ".htaccess", ".htpasswd");
//
$CONFIG['confHiddenFile'] = array(".ftpquota", "index.php", "index.php~", ".index.php.swp", ".htaccess", ".htpasswd");

//
// Whether authentication is required to see the contents of the page.
// If set to false, the page is public.
// If set to true, you should specify some users as well (see below).
// Important: This only prevents people from seeing the list.
// They will still be able to access the files with a direct link.
// Default: $CONFIG['confLogin'] = false;
//
$CONFIG['confLogin'] = false;

//
// Usernames and passwords for restricting access to the page.
// The format is: array(username, password, level)
// Level can be one of "user", "staff", and "admin".
// User("user") can read the page.
// Contributor("staff") can upload
// Administrator("admin") can delete (only when confEnableDelete=true).
// For example: $CONFIG['confUsers'] = array(array("username1", "password1", "user"), array("username2", "password2", "staff"), array("username2", "password2", "admin"));
// You can also keep confLogin=false and specify "staff" and "admin".
// That way everyone can see the page but username and password are needed for uploading.
// For example: $CONFIG['confUsers'] = array(array("username", "password", "admin"));
// Default: $CONFIG['confUsers'] = array();
//
$CONFIG['confUsers'] = array();

//
// Permissions for uploading, creating new directories and deleting.
// They only apply to admin accounts, regular users can never perform these operations.
// Default:
// $CONFIG['confEnableUpload'] = true;
// $CONFIG['confEnableMkDir'] = true;
// $CONFIG['confEnableDelete'] = false;
//
$CONFIG['confEnableUpload'] = true;
$CONFIG['confEnableMkDir'] = true;
$CONFIG['confEnableDelete'] = false;

/*
 * UPLOADING
 */

//
// List of directories where users are allowed to upload.
// For example: $CONFIG['confUploadDir'] = array("./myuploaddir1/", "./mydir/upload2/");
// The path should be relative to the main directory, start with "./" and end with "/".
// All the directories below the marked ones are automatically included as well.
// If the list is empty (default), all directories are open for uploads, given that the password has been set.
// Default: $CONFIG['confUploadDir'] = array();
//
$CONFIG['confUploadDir'] = array();

//
// MIME type that are allowed to be uploaded.
// For example, to only allow uploading of common image types, you could use:
// $CONFIG['confUploadType'] = array("image/png", "image/gif", "image/jpeg");
// Default: $CONFIG['confUploadType'] = array();
//
$CONFIG['confUploadType'] = array();

//
// File extensions that are not allowed for uploading.
// For example: $CONFIG['confUploadRejectExtension'] = array("php", "html", "htm");
// Default: $CONFIG['confUploadRejectExtension'] = array();
//
$CONFIG['confUploadRejectExtension'] = array();

/*
 * LOGGING
 */

//
// Upload notification e-mail.
// If set, an e-mail will be sent every time someone uploads a file or creates a new dirctory.
// Default: $CONFIG['confEmailNotification'] = "";
//
$CONFIG['confEmailNotification'] = "";

//
// Logfile name. If set, a log line will be written there whenever a directory or file is accessed.
// For example: $CONFIG['confLogFile'] = ".log.txt";
// Default: $CONFIG['confLogFile'] = "";
//
$CONFIG['confLogFile'] = "";

/*
 * SYSTEM
 */

//
// The starting directory. Normally no need to change this.
// Use only relative subdirectories!
// For example: $CONFIG['confStartDir'] = "./mysubdir/";
// Default: $CONFIG['confStartDir'] = ".";
//
$CONFIG['confStartDir'] = ".";

//
// Location in the server. Usually this does not have to be set manually.
// Default: $CONFIG['confBaseDir'] = "";
//
$CONFIG['confBaseDir'] = "";

//
// Big files. If you have some very big files (>4GB), enable this for correct
// file size calculation.
// Default: $CONFIG['confLargeFile'] = false;
//
$CONFIG['confLargeFile'] = false;

//
// The session name, which is used as a cookie name.
// Change this to something original if you have multiple copies in the same space
// and wish to keep their authentication separate.
// The value can contain only letters and numbers. For example: MYSESSION1
// More info at: http://www.php.net/manual/en/function.session-name.php
// Default: $CONFIG['confSession'] = "";
//
$CONFIG['confSession'] = "";

/***************************************************************************/
/*   TRANSLATIONS.                                                         */
/***************************************************************************/

$LANG = array();

// Albanian
$LANG["al"] = array(
	"langFileName" => "Emri Skedarit",
	"langFileSize" => "Madhësia",
	"langFileLastmod" => "Ndryshuar",
	"langInfoSpaceUsed" => "Memorija e përdorur total",
	"langInfoSpaceFree" => "Memorija e lirë",
	"langInputPassword" => "Fjalëkalimi",
	"langBtnUpload" => "Ngarko skedarë",
	"langErrorUpload" => "Ngarkimi i skedarit dështoi!",
	"langErrorMove" => "Lëvizja e skedarit në udhëzuesin e saktë deshtoi!",
	"langErrorSignin" => "Fjalëkalimi i Gabuar!!"
);

// Dutch
$LANG["nl"] = array(
	"langFileName" => "Bestandsnaam",
	"langFileSize" => "Omvang",
	"langFileLastmod" => "Laatst gewijzigd",
	"langInfoSpaceUsed" => "Totaal gebruikte ruimte",
	"langInfoSpaceFree" => "Beschikbaar",
	"langInputPassword" => "Wachtwoord",
	"langBtnUpload" => "Upload",
	"langErrorUpload" => "Fout bij uploaden van bestand!",
	"langErrorMove" => "Fout bij het verplaatsen van tijdelijk uploadbestand!",
	"langErrorSignin" => "Fout wachtwoord!",
	"langBtnMkdir" => "Nieuwe folder",
	"langErrorMkDir" => "Fout bij aanmaken folder!",
	"langErrorChDir" => "Rechten konden niet gewijzigd worden!"
);

// English
$LANG["en"] = array(
	"langFileName" => "File name",
	"langFileSize" => "Size",
	"langFileLastmod" => "Last changed",
	"langInfoSpaceUsed" => "Total used space",
	"langInfoSpaceFree" => "Free space",
	"langInputPassword" => "Password",
	"langBtnUpload" => "Upload",
	"langErrorUpload" => "Failed to upload the file!",
	"langErrorMove" => "Failed to move the file into the right directory!",
	"langBtnMkdir" => "Create",
	"langErrorMkDir" => "Failed to create directory",
	"langErrorChDir" => "Failed to change directory rights",
	"langErrorReadDir" => "Unable to read directory",
	"langInfoRoot" => "Root Directory",
	"langErrorWriteLog" => "The script does not have permissions to write the log file.",
	"langErrorUploadDenied" => "The script configuration does not allow uploading in this directory.",
	"langErrorUploadPermission" => "This directory does not have write permissions.",
	"langInfoLoadTime" => "Page loaded in %.2f ms",
	"langErrorSignin" => "Wrong username or password",
	"langInputUsername" => "Username",
	"langBtnSignin" => "Sign in",
	"langErrorUploadType" => "This file type is not allowed for uploading.",
	"langFileDelete" => "Del", // short for Delete
	"langBtnSignout" => "Sign out",
	"langInfoMkDir" => "New directory",
	"langInfoUpload" => "Upload new file",
	"langBtnChooseFile" => "Choose",
	"langInfoSignin" => "Before upload, please sign in.",
	"langInfoDelete" => "Delete"
);

// Estonian
$LANG["et"] = array(
	"langFileName" => "Faili nimi",
	"langFileSize" => "Suurus",
	"langFileLastmod" => "Viimati muudetud",
	"langInfoSpaceUsed" => "Kokku kasutatud",
	"langInfoSpaceFree" => "Vaba ruumi",
	"langInputPassword" => "Parool",
	"langBtnUpload" => "Uploadi",
	"langErrorUpload" => "Faili ei &otilde;nnestunud serverisse laadida!",
	"langErrorMove" => "Faili ei &otilde;nnestunud &otilde;igesse kausta liigutada!",
	"langErrorSignin" => "Vale parool",
	"langBtnMkdir" => "Uus kaust",
	"langErrorMkDir" => "Kausta loomine ebaõnnestus",
	"langErrorChDir" => "Kausta õiguste muutmine ebaõnnestus",
	"langInfoRoot" => "Peakaust"
);

// Finnish
$LANG["fi"] = array(
	"langFileName" => "Tiedoston nimi",
	"langFileSize" => "Koko",
	"langFileLastmod" => "Muokattu",
	"langInfoSpaceUsed" => "Yhteenlaskettu koko",
	"langInfoSpaceFree" => "Vapaa tila",
	"langInputPassword" => "Salasana",
	"langBtnUpload" => "Lisää tiedosto",
	"langErrorUpload" => "Tiedoston lisäys epäonnistui!",
	"langErrorMove" => "Tiedoston siirto kansioon epäonnistui!",
	"langBtnMkdir" => "Uusi kansio",
	"langErrorMkDir" => "Uuden kansion luonti epäonnistui!",
	"langErrorChDir" => "Kansion käyttäjäoikeuksien muuttaminen epäonnistui!",
	"langErrorReadDir" => "Kansion sisältöä ei voi lukea.",
	"langInfoRoot" => "Juurihakemisto",
	"langErrorWriteLog" => "Ohjelman ei ole sallittu kirjoittaa lokiin.",
	"langErrorUploadDenied" => "Ohjelman asetukset eivät salli tiedoston lisäämistä tähän kansioon.",
	"langErrorUploadPermission" => "Kansioon tallentaminen epäonnistui.",
	"langInfoLoadTime" => "Sivu ladattu %.2f ms:ssa",
	"langErrorSignin" => "Väärä käyttäjätunnus tai salasana",
	"langInputUsername" => "Käyttäjätunnus",
	"langBtnSignin" => "Kirjaudu sisään",
	"langBtnSignout" => "Kirjaudu ulos",
	"langErrorUploadType" => "Tämän tiedostotyypin lisääminen on estetty.",
	"langFileDelete" => "Poista"
);

// French
$LANG["fr"] = array(
	"langFileName" => "Nom de fichier",
	"langFileSize" => "Taille",
	"langFileLastmod" => "Ajout&eacute;",
	"langInfoSpaceUsed" => "Espace total utilis&eacute;",
	"langInfoSpaceFree" => "Espace libre",
	"langInputPassword" => "Mot de passe",
	"langBtnUpload" => "Envoyer un fichier",
	"langErrorUpload" => "Erreur lors de l'envoi",
	"langErrorMove" => "Erreur lors du changement de dossier",
	"langErrorSignin" => "Mauvais mot de passe",
	"langBtnMkdir" => "Nouveau dossier",
	"langErrorMkDir" => "Erreur lors de la cr&eacute;ation du dossier",
	"langErrorChDir" => "Impossible de changer les permissions du dossier",
	"langErrorReadDir" => "Impossible de lire le dossier",
	"langInfoRoot" => "Racine"
);

// German
$LANG["de"] = array(
	"langFileName" => "Dateiname",
	"langFileSize" => "Größe",
	"langFileLastmod" => "Letzte Änderung",
	"langInfoSpaceUsed" => "Benutzter Speicher",
	"langInfoSpaceFree" => "Freier Speicher",
	"langInputPassword" => "Passwort",
	"langBtnUpload" => "Upload",
	"langErrorUpload" => "Upload ist fehlgeschlagen!",
	"langErrorMove" => "Verschieben der Datei ist fehlgeschlagen!",
	"langErrorSignin" => "Falsches Passwort",
	"langBtnMkdir" => "Neuer Ordner",
	"langErrorMkDir" => "Erstellen des Ordners fehlgeschlagen",
	"langErrorChDir" => "Veränderung der Zugriffsrechte des Ordners fehlgeschlagen"
);

// Greek
$LANG["el"] = array(
	"langFileName" => "Όνομα αρχείου",
	"langFileSize" => "Μέγεθος",
	"langFileLastmod" => "Τροποποιημένο",
	"langInfoSpaceUsed" => "Χρησιμοποιημένος χώρος",
	"langInfoSpaceFree" => "Ελεύθερος χώρος",
	"langInputPassword" => "Εισάγεται κωδικό",
	"langBtnUpload" => "Φόρτωση",
	"langErrorUpload" => "Αποτυχία φόρτωσης αρχείου!",
	"langErrorMove" => "Αποτυχία μεταφοράς αρχείου στον κατάλληλο φάκελο!",
	"langErrorSignin" => "Λάθος κωδικός",
	"langBtnMkdir" => "Δημιουργία νέου φακέλου",
	"langErrorMkDir" => "Αποτυχία δημιουργίας νέου φακέλου",
	"langErrorChDir" => "Αποτυχία τροποποίησης δικαιωμάτων φακέλου"
);

// Hungarian
$LANG["hu"] = array(
	"langFileName" => "Fájl név",
	"langFileSize" => "Méret",
	"langFileLastmod" => "Utolsó módosítás",
	"langInfoSpaceUsed" => "Összes elfoglalt terület",
	"langInfoSpaceFree" => "Szabad terület",
	"langInputPassword" => "Jelszó",
	"langBtnUpload" => "Feltöltés",
	"langErrorUpload" => "A fájl feltöltése nem sikerült!",
	"langErrorMove" => "A fájl mozgatása nem sikerült!",
	"langBtnMkdir" => "Új mappa",
	"langErrorMkDir" => "A mappa létrehozása nem sikerült",
	"langErrorChDir" => "A mappa jogainak megváltoztatása nem sikerült",
	"langErrorReadDir" => "A mappa nem olvasható",
	"langInfoRoot" => "Gyökér",
	"langErrorWriteLog" => "A log fájl írása jogosultsági okok miatt nem sikerült.",
	"langErrorUploadDenied" => "Ebbe a mappába a feltöltés nem engedélyezett.",
	"langErrorUploadPermission" => "A mappa nem írható.",
	"langInfoLoadTime" => "Letöltési id? %.2f ms",
	"langErrorSignin" => "Rossz felhasználónév vagy jelszó",
	"langInputUsername" => "Felhasználónév",
	"langBtnSignin" => "Belépés",
	"langErrorUploadType" => "A fájltípus feltöltése tiltott."
);

// Italian
$LANG["it"] = array(
	"langFileName" => "Nome file",
	"langFileSize" => "Dimensione",
	"langFileLastmod" => "Ultima modifica",
	"langInfoSpaceUsed" => "Totale spazio usato",
	"langInfoSpaceFree" => "Spazio disponibile",
	"langInputPassword" => "Parola chiave",
	"langBtnUpload" => "Caricamento file",
	"langErrorUpload" => "Caricamento del file fallito!",
	"langErrorMove" => "Spostamento del file nella cartella fallito!",
	"langErrorSignin" => "Password sbagliata",
	"langBtnMkdir" => "Nuova cartella",
	"langErrorMkDir" => "Creazione cartella fallita!",
	"langErrorChDir" => "Modifica dei permessi della cartella fallita!"
);

// Korean
$LANG["ko"] = array(
	"langFileName" => "이름",
	"langFileSize" => "크기",
	"langFileLastmod" => "마지막 수정",
	"langInfoSpaceUsed" => "사용한 공간",
	"langInfoSpaceFree" => "남은 공간",
	"langInputPassword" => "비밀번호",
	"langBtnUpload" => "올리기",
	"langErrorUpload" => "파일을 올릴 수 없습니다.",
	"langErrorMove" => "파일을 옮길 수 없습니다.",
	"langBtnMkdir" => "만들기",
	"langErrorMkDir" => "폴더를 만들 수 없습니다.",
	"langErrorChDir" => "권한 설정을 할 수 없습니다.",
	"langErrorReadDir" => "폴더를 읽을 수 없습니다.",
	"langInfoRoot" => "최상위 폴더",
	"langErrorWriteLog" => "로그 파일의 위치에 쓰기 권한을 가지고 있지 않습니다.",
	"langErrorUploadDenied" => "이 위치에 업로드 할 수 없습니다.",
	"langErrorUploadPermission" => "이 위치에 쓰기 권한을 가지고 있지 않습니다.",
	"langInfoLoadTime" => "%.2f ms",
	"langErrorSignin" => "유저 이름 또는 비밀번호가 올바르지 않습니다.",
	"langInputUsername" => "유저 이름",
	"langBtnSignin" => "로그인",
	"langErrorUploadType" => "이 종류의 파일은 올릴 수 없습니다.",
	"langFileDelete" => "삭제",
	"langBtnSignout" => "로그아웃",
	"langInfoMkDir" => "폴더 만들기",
	"langInfoUpload" => "파일 올리기",
	"langBtnChooseFile" => "고르기",
	"langInfoSignin" => "파일을 올리려면 로그인하세요.",
	"langInfoDelete" => "삭제하기"
);

// Norwegian
$LANG["no"] = array(
	"langFileName" => "Navn",
	"langFileSize" => "Størrelse",
	"langFileLastmod" => "Endret",
	"langInfoSpaceUsed" => "Brukt plass",
	"langInfoSpaceFree" => "Resterende plass",
	"langInputPassword" => "Passord",
	"langBtnUpload" => "Last opp",
	"langErrorUpload" => "Opplasting gikk galt",
	"langErrorMove" => "Kunne ikke flytte objektet",
	"langErrorSignin" => "Feil passord",
	"langBtnMkdir" => "Ny mappe",
	"langErrorMkDir" => "Kunne ikke lage ny mappe",
	"langErrorChDir" => "Kunne ikke endre rettigheter",
	"langErrorReadDir" => "Kunne ikke lese mappen"
);

// Polish
$LANG["pl"] = array(
	"langFileName" => "Nazwa Pliku",
	"langFileSize" => "Rozmiar",
	"langFileLastmod" => "Data Zmiany",
	"langInfoSpaceUsed" => "Total used space",
	"langInfoSpaceFree" => "Wolnego obszaru",
	"langInputPassword" => "Haslo",
	"langBtnUpload" => "Przeslij",
	"langErrorUpload" => "Przeslanie pliku nie powiodlo sie",
	"langErrorMove" => "Przenosienie pliku nie powidlo sie!",
	"langBtnMkdir" => "Nowy folder",
	"langErrorMkDir" => "Blad podczas tworzenia nowego foldera",
	"langErrorChDir" => "Blad podczas zmiany uprawnienia foldera",
	"langErrorReadDir" => "Odczytanie foldera nie powiodlo sie",
	"langInfoRoot" => "Root",
	"langErrorWriteLog" => "Brak uprawnien aby utowrzyc dziennik dzialan.",
	"langErrorUploadDenied" => "Konfiguracja zabrania przeslanie pliku do tego foldera.",
	"langErrorUploadPermission" => "Nie mozna zapisac pliku do tego foldera.",
	"langInfoLoadTime" => "Zaladowano w %.2f ms",
	"langErrorSignin" => "Nie poprawna nazwa uzytkownika lub hasla",
	"langInputUsername" => "Uzytkownik",
	"langBtnSignin" => "Zaloguj sie",
	"langErrorUploadType" => "Ten rodazaj pliku jest zabrioniony."
);

// Portuguese (Brazil)
$LANG["pt_BR"] = array(
	"langFileName" => "Nome do arquivo",
	"langFileSize" => "Tamanho",
	"langFileLastmod" => "Modificado em",
	"langInfoSpaceUsed" => "Total de espaço utilizado",
	"langInfoSpaceFree" => "Espaço livre",
	"langInputPassword" => "Senha",
	"langBtnUpload" => "Enviar",
	"langErrorUpload" => "Falha ao enviar o arquivo!",
	"langErrorMove" => "Falha ao mover o arquivo para o diretório correto!",
	"langBtnMkdir" => "Nova pasta",
	"langErrorMkDir" => "Falha ao criar diretório",
	"langErrorChDir" => "Falha ao mudar os privilégios do diretório",
	"langErrorReadDir" => "Não foi possível ler o diretório",
	"langInfoRoot" => "Raíz",
	"langErrorWriteLog" => "O script não tem permissão para escrever o arquivo de log.",
	"langErrorUploadDenied" => "A configuração do script não permite envios neste diretório.",
	"langErrorUploadPermission" => "Não há permissão para escrita neste diretório.",
	"langInfoLoadTime" => "Página carregada em %.2f ms",
	"langErrorSignin" => "Nome de usuário ou senha errados",
	"langInputUsername" => "Nome de Usuário",
	"langBtnSignin" => "Log in",
	"langErrorUploadType" => "Não é permitido envio de arquivos deste tipo."
);

// Romanian
$LANG["ro"] = array(
	"langFileName" => "Nume fisier",
	"langFileSize" => "Marime",
	"langFileLastmod" => "Ultima modificare",
	"langInfoSpaceUsed" => "Spatiu total utilizat",
	"langInfoSpaceFree" => "Spatiu disponibil",
	"langInputPassword" => "Parola",
	"langBtnUpload" => "Incarcare fisier",
	"langErrorUpload" => "Incarcarea fisierului a esuat!",
	"langErrorMove" => "Mutarea fisierului in alt director a esuat!",
	"langErrorSignin" => "Parol gresita!",
	"langBtnMkdir" => "Director nou",
	"langErrorMkDir" => "Eroare la crearea directorului",
	"langErrorChDir" => "Eroare la modificarea drepturilor pe director",
	"langErrorReadDir" => "Nu s-a putut citi directorul"
);

// Russian
$LANG["ru"] = array(
    "langFileName" => "Имя файла",
    "langFileSize" => "Размер",
    "langFileLastmod" => "Последнее изменение",
    "langInfoSpaceUsed" => "Всего использовано",
    "langInfoSpaceFree" => "Свободно",
    "langInputPassword" => "Пароль",
    "langBtnUpload" => "Загрузка",
    "langErrorUpload" => "Не удалось загрузить файл!",
    "langErrorMove" => "Не удалось переместить файл в нужную папку!",
    "langBtnMkdir" => "Новая папка",
    "langErrorMkDir" => "Не удалось создать папку",
    "langErrorChDir" => "Не удалось изменить права доступа к папке",
    "langErrorReadDir" => "Не возможно прочитать папку",
    "langInfoRoot" => "Корневая папка",
    "langErrorWriteLog" => "Скрипт не имеет прав для записи лога файла.",
    "langErrorUploadDenied" => "Загрузка в эту папку запрещена в настройках скрипта",
    "langErrorUploadPermission" => "В эту папку запрещена запись",
    "langInfoLoadTime" => "Страница загружена за %.2f мс.",
    "langErrorSignin" => "Неверное имя пользователя или пароль",
    "langInputUsername" => "Имя пользователя",
    "langBtnSignin" => "Войти",
    "langErrorUploadType" => "Этот тип файла запрещено загружать"
);

// Slovensky
$LANG["sk"] = array(
	"langFileName" => "Meno súboru",
	"langFileSize" => "Ve?kos?",
	"langFileLastmod" => "Posledná zmena",
	"langInfoSpaceUsed" => "Použité miesto celkom",
	"langInfoSpaceFree" => "Vo?né miesto",
	"langInputPassword" => "Heslo",
	"langBtnUpload" => "Nahranie súborov",
	"langErrorUpload" => "Chyba nahrávania súboru!",
	"langErrorMove" => "Nepodarilo sa presunú? súbor do vybraného adresára!",
	"langErrorSignin" => "Neplatné heslo!",
	"langBtnMkdir" => "Nový prie?inok",
	"langErrorMkDir" => "Nepodarilo sa vytvori? adresár!",
	"langErrorChDir" => "Nepodarilo sa zmeni? práva adresára!",
	"langErrorReadDir" => "Nemôžem ?íta? adresár",
	"langInfoRoot" => "Domov"
);

// Spanish
$LANG["es"] = array(
	"langFileName" => "Nombre de archivo",
	"langFileSize" => "Medida",
	"langFileLastmod" => "Ultima modificaciÃ³n",
	"langInfoSpaceUsed" => "Total espacio usado",
	"langInfoSpaceFree" => "Espacio libre",
	"langInputPassword" => "ContraseÃ±a",
	"langBtnUpload" => "Subir el archivo",
	"langErrorUpload" => "Error al subir el archivo!",
	"langErrorMove" => "Error al mover el archivo al directorio seleccionado!",
	"langErrorSignin" => "ContraseÃ±a incorrecta"
);

// Swedish
$LANG["sv"] = array(
	"langFileName" => "Filnamn",
	"langFileSize" => "Storlek",
	"langFileLastmod" => "Senast andrad",
	"langInfoSpaceUsed" => "Totalt upptaget utrymme",
	"langInfoSpaceFree" => "Ledigt utrymme",
	"langInputPassword" => "Losenord",
	"langBtnUpload" => "Ladda upp",
	"langErrorUpload" => "Fel vid uppladdning av fil!",
	"langErrorMove" => "Fel vid flytt av fil till mapp!",
	"langErrorSignin" => "Fel losenord",
	"langBtnMkdir" => "Ny mapp",
	"langErrorMkDir" => "Fel vid skapande av mapp",
	"langErrorChDir" => "Fel vid andring av mappens egenskaper",
	"langErrorReadDir" => "Kan inte lasa den filen",
	"langInfoRoot" => "Hem"
);

// Turkish
$LANG["tr"] = array(
	"langFileName" => "Dosya ismi",
	"langFileSize" => "Boyut",
	"langFileLastmod" => "gecmis",
	"langInfoSpaceUsed" => "Toplam dosya boyutu",
	"langInfoSpaceFree" => "Bos alan",
	"langInputPassword" => "Sifre",
	"langBtnUpload" => "Yükleyen",
	"langErrorUpload" => "Hatali dosya yüklemesi!",
	"langErrorMove" => "Hatali dosya tasimasi!",
	"langErrorSignin" => "Yeniden sifre",
	"langBtnMkdir" => "Yeni dosya",
	"langErrorMkDir" => "Dosya olusturalamadi",
	"langErrorChDir" => "Dosya ayari deqistirelemedi"
);

/***************************************************************************/
/*   IMAGE CODES IN BASE64                                                 */
/*   You can generate your own with a converter                            */
/*   Like here: http://www.motobit.com/util/base64-decoder-encoder.asp     */
/*   Or here: http://www.greywyvern.com/code/php/binary2base64             */
/*   Or just use PHP base64_encode() function                              */
/***************************************************************************/


$ICON = array();

$ICON["arrow_down"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABbSURBVCjPY/jPgB8yDCkFB/7v+r/5/+r/
i/7P+N/3DYuC7V93/d//fydQ0Zz/9eexKFgtsejLiv8b/8/8X/WtUBGrGyZLdH6f8r/sW64cTkdW
SRS+zpQbgiEJAI4UCqdRg1A6AAAAAElFTkSuQmCC";
$ICON["arrow_up"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABbSURBVCjPY/jPgB8yDDkFmyVWv14kh1PB
eoll31f/n/ytUw6rgtUSi76s+L/x/8z/Vd8KFbEomPt16f/1/1f+X/S/7X/qeSwK+v63/K/6X/g/
83/S/5hvQywkAdMGCdCoabZeAAAAAElFTkSuQmCC";
$ICON["del"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAJdSURBVDjLpZP7S1NhGMf9W7YfogSJboSE
UVCY8zJ31trcps6zTI9bLGJpjp1hmkGNxVz4Q6ildtXKXzJNbJRaRmrXoeWx8tJOTWptnrNryre5
YCYuI3rh+8vL+/m8PA/PkwIg5X+y5mJWrxfOUBXm91QZM6UluUmthntHqplxUml2lciF6wrmdHri
I0Wx3xw2hAediLwZRWRkCPzdDswaSvGqkGCfq8VEUsEyPF1O8Qu3O7A09RbRvjuIttsRbT6HHzeb
sDjcB4/JgFFlNv9MnkmsEszodIIY7Oaut2OJcSF68Qx8dgv8tmqEL1gQaaARtp5A+N4NzB0lMXxo
n/uxbI8gIYjB9HytGYuusfiPIQcN71kjgnW6VeFOkgh3XcHLvAwMSDPohOADdYQJdF1FtLMZPmsl
vhZJk2ahkgRvq4HHUoWHRDqTEDDl2mDkfheiDgt8pw340/EocuClCuFvboQzb0cwIZgki4KhzlaE
6w0InipbVzBfqoK/qRH94i0rgokSFeO11iBkp8EdV8cfJo0yD75aE2ZNRvSJ0lZKcBXLaUYmQrCz
DT6tDN5SyRqYlWeDLZAg0H4JQ+Jt6M3atNLE10VSwQsN4Z6r0CBwqzXesHmV+BeoyAUri8EyMfi2
FowXS5dhd7doo2DVII0V5BAjigP89GEVAtda8b2ehodU4rNaAW+dGfzlFkyo89GTlcrHYCLpKD+V
7yeeHNzLjkp24Uu1Ed6G8/F8qjqGRzlbl2H2dzjpMg1KdwsHxOlmJ7GTeZC/nesXbeZ6c9OYnuxU
c3fmBuFft/Ff8xMd0s65SXIb/gAAAABJRU5ErkJggg==";


$ICON["folder"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAEISURBVDiNrZGxSgNREEXPCw/S7EZIZWelYqFlvsDKQhC0ssoPmCIfYG1hoWCXP7C3Si+ksBJEtBHE2JhgdgvNm5lnIQYkuLAbb3/vnHvHxRjpdbYugX1+62qpaXsHx7dTCuRixPU6m7a2voFzNQBijAxfnsnzLAA2Z4JYr/v+4cnNrru+2DlrrG4fNZdXig7NafT6xOShf+6DWjtJEj7eh6UCkiThTa3tg2gaPvNSZgCVKUE09aKGSSgdACBq+CCKVgwIongRw6TwU38TyA+BLkAQRCtvMKtQdYNZhaobfBPoAgRq/7CBig3G41GrkaalzJMsQ8UGPljs3t0/nkZolQlwMKBW634BV/GiU2qcKJgAAAAASUVORK5CYII=";
$ICON["folder-home"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHnSURBVDiNlZI9axRRFIafmb3L7MdshBRB2EIIqNlCyxSWkkIsAspaBIuQP2CK/ABrCwsFu/wDqwjZhHyYUtjCShDRRlAjumYxOzs7M/fcey3W3XWZGPSF29zzvuc893A95xyb69efA02m1bowa+/ce/gm4xx5zuFtrl+zV6428DwfAOccx18+EUU9DdhcCFwQqIP7j14ve6+e3X4yc3npwezFS+cNyunk60dO3x88VdrYtTAMSX4e5/F8NSSykquFYcgPY9eUFlPTaZQz+CogimIAqpUAK+lU3UiGFlNTYixW9Jnhl7svALh5a5lKqZhrIsbiazEY0ePj8In6Aw53t1iol1iolzjc3SLqD3D4U14tBl/EYiXDSgb49OOEo/1tGvUyRVWgqAo06mWO9rfpxwngj/0iIwKjsc7RT1L2dlrMzwUUVWGMWlQF5ucC9nZa9JMU6xzG/CbQYrCisaKplis0V1aJE5NbapwYmiurVMuVsV+LQYlYjGhAI9mAwOhceKQk6pD2vk+WKBY1JJj8VieaOBW+dZNpglRwoqe8QwIzIhgqSyJuLN09kyDufp7yihkTTC7TXoe01/nrM/6UFoMyYtvd7sniTK32T6GRTns9jNi20tZtvH334bGDxf9p4EEb39/4BVgfNE6XF4wqAAAAAElFTkSuQmCC";
$ICON["archive"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGkSURBVDiNlZCxiuJQFIY/403AQkWxCLLFYj/7AtpuJyls9kW22NJyhG31MSyCbyCphZBOxBWmVhKRJDcnuVsMyiyruzM/HLjnwvnOd29ts9l81Vr/NMZ84U5qtRrj8ZjJZALAcrlktVoBhI7jfCcIgnC73Zosy0xRFH+ViJh+v2+iKDJRFJl+v2/yPDfb7dYEQRCqNE2fXNdFa31PgHq9DkCn07ndiQiu63I4HJ6UiFCW5d1hAMuyAJjP54RhCIAxhrIsEREsrTVlWT4sYwwASimm0+kfAK01Ks9zROShgVIKAM/z8H0fgKqqEBHyPMcqiuKfBtf4vo/nebe+LEuKokCJCFVVPTS45q3BWwt1PTyKiDAajW7bR6MRIsJ1saqqCtu2ybLsLuByubBYLG5/ISJcLhds234FxHGM4zj0er3/PuOaZrNJkiTEcYyyLIvdbsf5fH434AqxLAultWYwGNBqtT4ESJKE9Xr9arDf74nj+EOAdrt9M3g5nU6fhsMhtm2/a7goCoIgQGv9UpvNZt+Ox+NzmqafP2LQaDR+dbvdH78BVq8sNS+rVegAAAAASUVORK5CYII=";
$ICON["audio"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGnSURBVDiNpZBPaxNRFMXPjFcSGtrQDiYNUgxKN0LqZ2hApAs/Ql1ZN3Vp6Kbgxp3duPAbFLor0m132XQRKvUZUGegBq2EYBU78wIz789cFyXSOtPQ0gMPHpdzf/fc63Q6nYfGmI00TRdwBbmuK4johdNut0W9Xm9Uq1W4rnup5jRNMRgM0Ov1PpJSquF5HpRSVwkAz/Pg+36DrLWw1mYMYcI4OrH4+lMh6Mf49G0IcRhh79V9AMCoj4wxYOYM4Nn2H8gwQRTGkGECGZ3+z3qNMSCtdS5Ahgnqk4zbtSLmpku4d6uAR+sfznm11iBrbS4gCmO8eTqXqZ/1jl1BhkluPbPChYDomoDRwQ4Oh3i++QPfTwzgOuMBn/sJ1t4dw+/HkFKBmdHaOsIXZwKYcVDNAbgjADPj5c4x3g9v4FexiEptEsyMxw+mMBVK3Ikl3j6p/fMyczbB4t2b2N/9jdmig9fLs2BmrC5VsLpUGX8DrTWICCtNDytNL9f8v4wxpysQkS+EgFLqXLxxTykFIQSIyKdSqdQKgmCj2+3OXzguR4VCISiXy62/DsFP85AcHBcAAAAASUVORK5CYII=";
$ICON["bin"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGkSURBVDiNlZKxiupAFIb/HWYYwUIwQcXKZi8W5opWFlbCBVsL32T3LfZ5BCGF2FhoIblBMDY2oonpRJTMTGaLJWKMxXq6M3POxzn/f97m8/k/KeVXHMd/8UIQQhxK6cfbdDp1arWaVS6XQQj5VXMcx/B9H9vt9j+NosgyDANRFAEAFosFOOc4nU7I5XJot9uYTCY4Ho8YDoc3iGEY8DzPIkopKKWgtYbWGkEQoNFogDEG3/ehtUa32wWAW43WGkkfkVKmPgBgv9+jUqlk3u9zrTWklCBCiEzhbrdDtVpNNT0DCCFA7sfXWsM0TVyvV6xWK5RKJSilMB6PIaXEaDRKrauUAk1WSKLVamVU7/f7qTypl1JmAa/EU8BsNsPhcMBgMAAALJdLcM5xPp/BGEOz2UwBMi50Op2UYGEYol6vgzGGMAyzLjwCHhUHgCAIYJrmcxt/A0ju4tHKG+D+FmzbRhzHsG0bSikUi0VcLhes1+vUFEKIHxEppZ7jOH+S8+31eimlLcvKWCiEgOu6oJR6NJ/Pf242my/Xdd9fsZBzvikUCp/fgomc9slzF5YAAAAASUVORK5CYII=";
$ICON["bmp"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIUSURBVDiNlZLLalNRFIa/vc8+l9zV1LbUQRStILQFH8GBzyG+gKM+hIOCcx/BgS/gsCAWUpAadJBAG4TSor0kaZKTsy/LQVo6k2aN1mR9fGutX7Xb7ddFUeyIyBYLlFLqIEmSbbW7u3vQarU2V1ZW0FrfaTiEwOnpKf1+/4cpimKz2WxSFMUiAjSbTbrd7qZxzvHl5x5vP3+AbIKKLGJTZFqGIoNZCjZFOYMKESrMLT+9e4NzDuOc42Q4ory2jEpnEOf4PEKmCcpmqKIERXneB4OWOeDsakzFOYy1Fl+KqDVXieJAwOFiiylbMolRIUVslTyvoEgwiQalsDpgrZ0bYFJePX/J9/ExVR1zPjihHizLWYKWhMI1GOQlJpISVSA1ETaW+Qree5Q2HKoLtlpPOBpcsKof8jhOacQ5S+kSe3+vqJWrmKjEWjPFm4BcKrz31waAiGYSPEoinlUe0Tvr00gjzvIJteQBU18mCExmgfPxFHx6e0TtFcM/M65GM8QKXycj1EwYKCGNHLkbIARQHqIAGszS/VtAbDXj4ynKgAQhzIRQxBAEjQNRwMV1BAWA+J5ifAMoO8XwcIiKQAKIFcSr/wbJv3C3Bqv1BqOjk4WSuFyrcXnzha2nLX5/fL8QYDQa8av9DaO17u7v769vbGwQx/Gdhq21dDodtNZdU61Wt3u93k6n01lfxCDLsm69Xt/+B3PMGuu7hcw2AAAAAElFTkSuQmCC";
$ICON["c"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGnSURBVDiNlVIxSxxBGH0zfncrd5oDN3AEUhwJZyFcTBPShqC1IvgLhOQPxN42YJFKQjoLsZBUKZIiaRZSLZFkPDHuNmfnFRdOPIw3881Mqj1Z16D3wWvefO/xvceIOI4XmXnTOfcEY4yUUhHRGxFFkWo0Gq16vQ4p5Z3Ezjl0u110Op0D0lq3wjCE1nqcAxCGIZIkaZG1FtbascQAkOmImeG9zz3+Sob4Fl+g22OUSGDuURnLL6ZQmcxHZGZIYwy89yP8OLrE+499BCVgdWEKi88r2P89xNZeP7fnvYcxBmStzV3w+fsA0xWB1ys1ZJ0+uD+Bs4GFcx5C5GMUIpycajydDSCER0Y/fkgACMAVl0UoGDAD2vhCLzcNM0NmBhnqMxIqHcKwG3E/jy+x9/Uc2rjc7o0GKy+rOO0ZbHzoIdq/wKdogLfbfxAf/sWERMGgEGG+WcbGqxnsfDnHu90+yiWBZ3MB1pbu3a2DzGS+GRYyX98bGRhjQES3lnZdzMyQRJQopaC1LnyU/0FrDaUUiCiharW6nqbpZrvdbo5zQRAEaa1WW/8HGgtKKBMv8f4AAAAASUVORK5CYII=";
$ICON["calc"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAF3SURBVDiNnVG9SgNBGJzsLcSAcIiF+T1BLU2ZNimsfAsfQUErC7Gw1GfIEwh21tcFC/UsRAVJNh45LUQiitx+365FyJk/E3Rgi/mWnW9mNnV6cbKjnm+PXj86GQDY9PZhjMEsCCECKeVu6vhs63N+IZ0pFVbgCAcbpW1Ya6c+JiK0221EUXQjX96eMvnVdYTvAYxl6KxGHMcQQkwVyefzUEqVJRGjqyMYywAArTV8358ZoVargZkhmRjEOrno269Wq8lMKQXP8xLu+z6stSAiSCJOtg8KjPYwiWutew6MYYxCKTWVW2t7EYhpooNisZjMwjBEoVBIeKvV+onAZIb+/S8Rkg7YjkcIw3AqH3Aw3EF/Uy6XS2ZRFCGbzf4Sgf//CxM76KPRaAzxZrM5WYCYQZogZAoA4DgOKpXKmOAotNYgIohFd+krvO9CxwRjGNbamSeOYwRBACnlvVxbLh/ePV4dXJ535gCgfl0HEc10kE6nH1zX3fsGk+81brfhE9sAAAAASUVORK5CYII=";
$ICON["cpp"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHUSURBVDiNlZE/aFNBHMc/73JpgkGDBAkNRYLWDvpS/4DVqYLQwaE4ZXMVTScFQ3edhDqIFIyim2AHwUlbEEsDdQm1mj4RE4UQihAVRB0Md/feuTTB+JJSD37Dl7vvl9/3c06lUpkyxswFQTDOfxwhRFVKec0pl8vVbDabS6fTCCF2ZA6CgFarRaPR2BBKqVwqlUIpRbvdDs30rZGQVkqx5ckJ3/fxfR9rbWjy86MA5OdHQ7rjE8aYvmZrLQuFGgALhVpfbYxBaq2x1g7s+/jyh577v7XWGtlZH+Btc4mX7x/S+vmJaCTO4cwk50/Msmso2Te8p8LrxiL3V64Qj+4lf/I6U0dmeNNcprQ8M7CiMQbZCVjyHrA7PszFM3cQTgSA4eQYP35/Iwh8HCf8xT0Bm98bjI9M4iC6lQ7sO9593I9TT0BgBcYPtgXaL6DLIL3nIO8+r6F91e24sbnK0/W7KNMeyKAbMH30El9/feHm8wKvPj5j0XvE7RdF1purRER0e4haa9zMaWbP3ePJWonSyg2GZJxj+89y4dRVsGCxofWNMUgpZa1arY65roubmcDNTIS6/stFa43neUgpazKRSBTr9fqc53mHdkwPiMVi9WQyWfwDpnuCarLFwhUAAAAASUVORK5CYII=";
$ICON["css"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHNSURBVDiNlZK9bhNBFEaPZ2e8axvbImtpgcpCIkIiToOgoqXlAWiQeAAaSB16/AC8Bq/g1lUWV+vGrVG0koOw1zt/FAOJrITE3G6k+c7cc+80ptPpa2PM2Dl3zH+UECKXUn5qTCaTfDgcjrIsQwixV9g5x3K5ZLFYfJd1XY/SNKUYv8f8LAGQ3QOGH77eCknTlKIoRtJai7WWh65EdRsAaFfivb8V8DcnjTF471HO4rdbAJSK7wQAGGOQWmu894jHzxH1BgDfbOH2AGitkdZavPcU0RTNeeggGlCefmN7sQYg7rV58fnNjRqXCll7ifwzA2OXdMwBzW4GQG30jUrGmCuAEGBNUBBRgnQCW9UAyGZ0N0ANXoENLRO1aT1N8VsLQCPeA3D6Q7OqfgHQTxRnasW5DlsZqJjD8Rmri3Du92K+fDzeBVQP1rRVAkCl15TlI6J7CoDSaDa0SO43AdjYGu/9LsBElrUJCs0oRhqoqvBiIgXOSzaboBQruQvQWvOsc8SWKlwgoZclrHXwbqsGWSOm0sE9UeEPGGOQUsoiz/PDt0fvUEpdTejltZldltaaPJ8hpSxkp9M5mc/n49ls9uTfkesVx/G83++f/AbgZRYV7aahUwAAAABJRU5ErkJggg==";
$ICON["deb"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIcSURBVDiNlZNPSJRBGMZ/OzvuX3PLrbY/B82KDrUKRmBQEtQeIiJIwqhuRTdvebMORZ08RYeOefGQHbtEh2APUgiVX17ajdygEjUpUVedb77v7bDt5y4bYQMDM8+8z2+eF2ZCExMTOWvtsO/7nfzHUEo5WutboXw+77S3t2czmQxKqU2Zfd9ndnaWUqn0QRtjsul0GmPMRsFimaWHzymPjaM7Muh9GWJnuoif7QYVAiCdTlMoFLLa8zw8zwvM9uM35s/fp+lIG6kH18D38RfL/Lo9ysponvSTAdBhqj5trUVEAJBVw8L1R7Tc6SdxtbcudizXxVzvECtj4yQun6hcZi3KdV1EBBFhZeQVyRs54ldOIiJ4C0uY99OI7xPa0UK8rwfxvKDedV2UVyOsvZwkduk4IoK/uo559xnd2YYAIkLT0Q687z+D+oYWEIFoUwWwvAaJyMYZ4P1YInI6G2jWWlQVICKo7VuCdai1GfftdLC3Xxfw5xYriaqatfUJ1O5t2OIM4QO7AIic66b8+AVqZ4pQc4zE4IW6RA2ASF8Py3ef0jIyUAHubSV2MxcYpNpmDaCuhfChPajMVtzJUqD9azYARITEvX7Wn73GfprZPKD2LYgOEx+6iPdlHvdNEX/N/NXsum4FoLUuOI6DMTWFYYU+dZjwsf0Q0Q1mYwyO46C1LuhkMjlYLBaHp6amDm7qK/4Z0Wi0mEqlBn8Dbs+yiICF0/0AAAAASUVORK5CYII=";
$ICON["doc"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGUSURBVDiNjZMxa9tAGIbfyAeOAo1iuFsEJmA56RS62SZLfkTH/IpCO5bQIT8he5f+hC79A7ZXBZo0NhmkRcQKpJAW4/vuvgzNXSTbSXogEJ907/O8J7Tx7Xv6YZLPTsu7PyEAHB8pWGvx2gqCIBVCfNz4fPbj79abVrjbjtFoBHh/qMDML24mIuR5jqIozkVR/g7ftfdxXcxhmaH1DojoVYM4jpFl2YEgY3B7b2AfqcwMZsZwOAQAKKUwm838RqUUut0umBnGGAhDBDJPnV3AYDDwsyRJanRXkYggiAyqZ+YCptOpJ1ctnAEAaK0hjCWvXw1JkqRGrt47g8cKBtZy7SEzYzQa1ehKqZUqRARhjIGpCLiAfr/vZ51Op0ZeCqCawboXn1veoHoGzmA8HvuZlBIAUJYlpJS+ylPAmq/Q6/VWiMtV/gXQ+grOQErpyXEcIwzD1QqaCEFDPGvgyMt0IkIgW9vzm+wnSGtYyz7gpWuxWCBNUwghrsTbvfjLxa/85HJ0sQkAX3X0Xz9Ts9mcRFH06QFIsTx57QMZyQAAAABJRU5ErkJggg==";
$ICON["draw"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIkSURBVDiNlZLPS9NhHMdf+/rMzX0na33TsYQxtR82NzM8mAgRQRBE/gnVvYMH8+ipq6fwJB6DoEuHopAgyB1XlzkRtgwzjNnKQ25i3+f5Pk8H2ReHU+oNn9Pn/X7zfn+eJ1AoFG4rpea11iP8ByzLKgohHgdWVlaK6XQ6l0gksCzrn8Raa3Z2dtjc3FwVruvmHMfBdV2f8Kva4MPLDaSr6RABRm/0cSF3rsXEcRzK5XJOeJ6H53kty+Xn69y8k6PLDnFQd1n99JW3z9a4e3+Y/owDQFMnlFIYY1oMjDHY3WGU1FgdHVyb6KfvchQnabdwlVJYUkqMMUSmpxH5PO4fhVIe2jP+hM/A0Fgv0Vgnxhh/pJQIz/MwxtCYm8Pa2yOy/Iax+k8K7zpJDKaIn7UJx4LHUjZr+BVMPI6Ox1GpFEO3Dqg/fc2rj9tM5rpJZiZpoz+s4BscGR0OceXRPaYeXEVXa2w9WSSYz8P+PkZrn3eigTGGcCRIajDBwNQU74PD7J7vp2thga6lpRaDtq/QRL0WwPMMPT0OGz8UkZkZ0Jpmn1MTuA1wGwZPab5tbdOTjB7uAoHTE+zW9viyXiWVHKD6/Tdrq2Wy15P09sWOJfUNpJQIIQDY+lzjxWKezOg2TiJKZqKX0Yl0W7FSCiGEKBeLxUvZbJZgMMjIeJqR8YfHfuZRSCkplUoIIcrCtu3ZSqUyXyqVLra95AkIhUKVWCw2+xfnpm1LoHdLEwAAAABJRU5ErkJggg==";
$ICON["eps"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHoSURBVDiNlZJPa1NBFMV/72XSZxI16FMCFUs2LhQiSN0KbgoFv4aLLroRLO676qJfwJW48SOUWLBgVmIE22dMJUltAnWRWhf+a83M3BkXaRNeRTEDd3Hn3nPmnDs3qNfrc9baVefcTSY4YRgmSqmHQa1WS8rlcqVUKhGG4X+BnXP0+3263e47pbWuxHGM1noSAcRxTKvVqigRQURSxeD7LsHPHj6K8Rcq4/tvHVA5fP4KJzhlrcV7n/b3doVg/zVBdBF7bx2CobXMy/v4szO4u08BsNaijDFpAv0Vt/cKPzNH0KviP2/C5VtDwO0V/NQ5OO43xhCKCN77cfQ2kF8ad2MBcWfwu+ujmtt8jG8+G+UiQnhiYdTUqSLRNP58GRfPIp3nY0B/G/myO8qttacI9A/sxxqOPLL5BBkMkIMebv/9kEALTkuKIDVEt/MCOTyCwy3Y2xrPpVUlc+k6biBghPC4/w8FprmGtQFqoU52sUF2sYHkptHNteGL2iKnFIwJzBF6ewNKsxAV8ZkpfGaK4Ood7KcPyMEOMhCccX+xkInIP2oCpL41O79Mdn4ZgNyDN6n6iMAYg1JqolW21g4tKKVaSZKgtU7vwz9Ca02SJCilWqpQKCy12+3VRqNxbRIFURS1i8Xi0m+pDpZup//nDwAAAABJRU5ErkJggg==";
$ICON["exe"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAALLSURBVDiNXZPJbupoEIU/jC0bCJMhMSAkhihZoKSXeYPe3qe5j3GlfoU8S3ZRdukoQkEhYQbLGAiTh9/+exEJKV1SbepIp+ocnUo8PT39LYT4E8fxX/yvxuMxm82Ger1OPp8H4HA4MJvNuLq6elZV9Xfi4eHhudls3lqWhaIoAByPR47HI1EUkUwmkVKiqioAvu8TRRHb7ZblcvmvGgTBbalUIgiC0+YwDFksFti2TaPRwLIs+v0+juNgmiae55FKpej1erdKFEVEUYSU8tSappHP54njmDiOAUilUsRxjGEYKIqC67oUCgVUIQRSyh/aJ5MJw+EQANu2qVQqAMRxfJpXq1U8z0MNw/BEsN1uyWaz1Go1LMtiNBoxnU75/PzEdV1ubm7Y7/esVis0TSMMQ5T5fI7jOGw2G15fX5FS0u/3WSwWzGYzpJRMJhMuLy/JZDJcXFzQarWYTqes1+vvC97f3zEMgyAI6Ha7OI5Dq9WiXC6TTqfp9/s8Pz9TLpc5OzsjiiKEEHx8fKAul0s8z8P3fXRdx7btk/bdbkexWASgVqsxHo9PuKZp3yb6vs/19TWFQgHf9zEMg9FoxGQyQdd1SqUShUIBy7IYDAZ0Oh12ux2u62KaJmqtVmO329Hr9RBCkMlkaDabKIrCYDCg2+1SLBapVCq0221M0ySXy5FKpRgOhyhRFDEYDGi329zd3ZFOp+n1etTrdRRFIZvN0ul0kFJSrVaRUpJMJimXywghUBzHIZfLcX5+jqZpNJtNDocDq9WKdDrNer3m8fER13V/hE1KiRACNZlM8vX1RRzHJBIJ9vs9UkoMw2C/36PrOo1Gg2w2+yNwQohvglKp9P729napaRqmaWLbNqZpEgQBnueh6zqKoqAoyokgDENeXl5QVfUtcX9//8t13X/m83nb87yTQaPRCCHE6Seq1eqPuOu63svn87//A6ghlC2fRIo/AAAAAElFTkSuQmCC";
$ICON["gif"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIMSURBVDiNlZLLTlNhFIW//3L+XmhK5IjYgdYJCZjWmVN14nuY+AaGxyA+ho9hokwhQWyMptCkihJUEDht6fmvDmoCExO6hztZX9Zee4nt7e3n1trNlNIj5hghxJ4xZkNsbW3ttdvt7srKClLKG4ljjBwfHzMcDj9qa203z3OstfMYIM9z+v1+V3vvGb57y+6rl2QBVEp4KXASnIKgBEEKooR4zeDT12/w3qO990xOjnjQNhgFwiXKcaQMkGrglcAlQRSQ1BVgcv4LLxto5xyy5llcq6GMBJswl46FqSO4SNSQTAVrHaom0HWFkAKRlbhpZeZA1SL5k2e4kw8I1cD//EEcRVIRSBJEs07UCaFLVKOCNDUuMocfeXQIAWWAckD94WP8SZ/MLCNDlXh4gF68hysO0PktgjLo1jpIGMlACAHpvSeRECKSwhikQN9ZI1x8JYqSMDlCL7VA1ZGyApfnhNMBMXEVYkiK6e8zRDEBHxgV34hFSRyBzBzxz3eiA7WgkdULkIKwrK8APlQ4OxwjzZTkEn7isOeRUAJYUhD/sg8IHRECso7B+3IGsNM6p5+nSCNIAdw44KfpPxWa7W/bayfUl1rsDuZr4v2lu/ijL7MvtNa7vHg/mAtQFAVh7xNaStnf2dlZ7XQ6ZFl2I7Fzjl6vh5SyrxuNxsb+/v5mr9dbncdBtVrtN5vNjb/87yAmK+YXngAAAABJRU5ErkJggg==";
$ICON["h"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAF1SURBVDiNlVKxSgNBEH23jqZIEeTEtFEQbGJpbWOdzsofsNBKP8DeD/AHxB+wtkhptDmDkQtICiMERTBYXHZndiwuMXecqPdgYIfZ93hvmKDT6ewy85n3fgslYIyJiOg4aLfbUaPRaNbrdRhj/kX23mM0GmEwGNyTtbYZhiGstWUMIAxDxHHcJBGBiJQiA8CMZ5gZqporxG9Y2LsEbp4Ls2wxM8g5l5KyYA/9tFCW4iwD5xyMiBTVvQcmDIiHOgGG42+xbIkIaBYhB++hEwZuh6DTayBh6Poy+LwFLC3MjTL/vAP1mjp4GcNe7UMOthH0XhHcDYs7+NGBpA5kZw1qAkhzFWbC0I8k97fgAI+v0MQB0x2owXSGtBdfcJATWGxdAE/vUK/QLGG6E+WiQC5C8nA4T9E7Sh+q0M0VJJk+G4GYGc45ENEft5cHM6cRiCiOogjW2l+vLlvWWkRRBCKKqVqtnvT7/bNut7tRxkGlUunXarWTL1vcmFDGw4fYAAAAAElFTkSuQmCC";
$ICON["html"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJ/SURBVDiNlZM9b1RXEIafe+65d9d79wP7rr1oMeCAsOTEjpBQKBBJlygSTZQ+HT8B/gUVok2RPp0lJIjSWJFSGCS02aBk14XBCWZtgyzb7OJ7zpmh2NgUTgFTz/vMzDsz0erq6tfe+zsi8jkfEcaYjrX2VrSystKZm5tbarVaGGM+SCwiDAYD1tfX/7BFUSzleU5RFAAo8PDxvzzfGbLx6oDzMzXO5Bl5NeWLS/kxJM9zer3ekg0hEEIA4OXuiJ9/e0atWuaT9ilazSrtqYwgyu9/Dbj/6Dk3v5mnPVXhSGe896gqIsK95afEScKhE2abGQuzk9QnEja29zEmwmO4u/wnzgdUFe89xjmHqvLjw7+RaOzB1fkZUhuTWIOoosBktUR9IsXElp9+7aOqOOcwIYxpG6+GnJup8+Vnp2lkKTY2JLGh8MJgd4iIciavUC4lrG8doKqEELBHI8TGcHV+hnJqMSYiNhE2NjzdeE3hhM23b1BV8lqZYazvRzgCnJ2usb33lkdrW+wNi2O3s1KCicbb8aKMCk/rVOUkYCIxqAhrL/b45ck/PNvaxwfh8oUm31+7SKOSIgKT1ZQkjk4CpuspO7vjNkeHnsdrO7ggBFF8EKrlBBFlNDpkup6eBFxfaHLoHM1qig9Ke6qC84Lzgg8CwN7+kDSG6wvNkwBV5dvLp3mxvcvm1mtmpyu4ILgg7A8LDt6MqJUNN660j/O99+MtOOew1jKZJdz67lMePNmk09+kcOPKaWKYnZrgh6/Ojs/9P7H3Hmut7XU6nfnFxUWSJMHGETeutP/3iVQVAOcc3W4Xa23PZll2u9/v3+l2u5c+7JHHUSqV+o1G4/Y7VN2AN07a1GsAAAAASUVORK5CYII=";
$ICON["ico"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAKVSURBVDiNlZLLThNhAIW/+TudKdOZYdppqSBSUFALFG8hgcSYaOJCDTsjG+NT8ABuTVzxFhBijDEgmBAjC7kmXBoVykVkUesdKKWdS+sCEzcu4GzO6iTfOTnS/Pz8bcdxnlar1S5OIEmSlhVFGZCmpqaWk8lkOpFIIIQ4VrhSqZDP59ne3l6RHcdJ27aN4zgnAcC2bbLZbFr2PI+JpRV+lqu82/lMT2sz02tb9DY1Mf1+k97WFmaWNuhJnWVmcZOe9Dlmlje5f6sdz/OQPc8jt7vLWlHide4X4XicF59yKIrO6FoOrSbCy8UdVNXk5cxnQjUWo9M73LyaJCw8ZNd1EZrGjfNNWJEoXaeiGAGNS3U2ES3C5YY4Vtiioz5CrRnj2sV67NP1SKqPW3SPCAIiSBnB3NciMcNk9ksRQzWYzZcxwx5LuRKm5rOQc4k3CVZLCqmgf1TB932ECFCn6zy60kosFCQoVDpiBqZmcqlOR62qdDXWohlRrrVZNJyx4dsnfN8/IqACqz8KrO4dkLJ0vuyVcEo+k6s/qZ71yWzvYchBZjcKmKbK5FaBu/HqvxGFX6FFUymXHJKawt73As3RMN2WTFIX/DYkbMXnguUTwaFdKVFxynieR6Cvr+9xQLP4kD9kdH6LGiHx/O1HFNdn5NUSmiwYGV8hHBKMjC+jKYKRiRWunzco7X8/IlDLLm1mlEIsTKuhcr3eIFWnc5A+RXujSfFqgo5kLYcHCVKNOgedUTzX/VchYZs8e7PI8NgcD+50Mzw2R/Gvl4v/93tPHvI75yENDg5W+/v7MQzjRFfe399naGgIWQiRXVhYaOvs7CQYDB4r7LoumUwGIURW1nV9YH19/Wkmk2k7CUEoFMqapjnwB4RXJArcoNEUAAAAAElFTkSuQmCC";
$ICON["java"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIPSURBVDiNlZPPaxNBGIafncxumsa0lqUGxGAUrCKpgiIBrYKCFDz0Us/+BfUi9uJd6KHqQQ/qP+DFiwURepHGg0IO2jTQmoiWYrUpUvs76czsrIfQQNttwRfmMDPv+/B93zBOsVi8aYwZtdae4z8khChJKe87hUKhlM1me9PpNEKIaHPhGfbaUGtvraVWqzE7OzsllVK9vu+jlIoMO6u/8Ra/stVo7Dj3fZ9KpdIrgiAgCALCMNyz2Fii7d0D9MU7iJ+fd9xt54QxJjr8d47E2F10Jo/34QnOyvwejzEGqbVuBnaprfgSdeI63vQY9f6HBOmzsMuntUbsV34YS2APHSFM+YjF6UjPgS1s9t1DfpvA+KcRS9+bVW5t7G1hG7Ct+JdXeDPj6MwldCaPO/cJm+zGm3xNbKGEWFtgffAFQDRAZ/LE5ichUDiNZdTxyxBPoU5eJS4EXnW85Y8EmK4s5tgFvJm3OFYRugmC1FHY+ANBg9WBp61hRgLEeg3rdSDWauC6OPVlwjDG1pUbhInDTdN+gI43Q8hfU6gz/dRzgyBcsBYn2CT5fgRH1VHZPhrnb+8EaK2RUrJ66xGxpR+0f3xOW3UCJ7SETgxCS9jeRZDqxvjZ1gsYY5BSykqpVOrJ5XK4rovt7mFl4HHkv2gNWinK5TJSyopMJpPD1Wp1tFwunzowtUvxeLza2dk5/A8rQ4uu8K0RngAAAABJRU5ErkJggg==";
$ICON["jpg"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIgSURBVDiNlZJNTxNRGIWfe3tnpp8TpYkl0YjEoMS0GP6BG3+MOxf8A7fs3Lvijxh2BBZi1eg0EQKJFoj0YzqduXM/XKBC4oa++/PknPMesb+//1Jrve2932CBE0IchmG4JXZ3dw9XVlZ6nU4HKeWtxM45hsMhx8fHH5XWutdut9FaL2KAdrtNkiQ9ZYzh/Yc9Xu+8Qag6QoZ4m+NNhrcZ3s3xvsD7AkT5D/Du1Q7GGJQxhl/TCY9XY6KwgSVkklUockvVlwhvyK3D4BDC/83PaHpBYBqosixp1C3PH0RESlE6R5YL9MzicoPA4gLFyJZEtTqtqI4UgkhZirK8ctAMHC+ebDJNj0DWuRyfkIcePTUIHLSaFGEVEUmWohZRpUYt9MyMQVlriZTH85ON5XUuZqe0ZAvfaJCKOfXGfX7Yb0R3lyCq8bC5jvISn3ustUhjDHiHwOBsjsASx4+Y6BPmwYxLd0ojvgeqihABaTnmfH6E8/66ROskw8kZo2yKtoZRkZBmM9I8R1UkWXZJiqBVbdEMxkgh2LwjrgHaRnw9GxKpCOMskyLjfDYhLwoASg/ggTFBJUUKwdNnNwBpHnHw/ZxQVbDOMZnnZLr8bzx/dgiAXrsRoR0v8yUZLbTEpbjDmRldfaG72qP/drAQYDqd8mnvM0pKmRwcHKx1u12CILiVuCxL+v0+UspENZvNrcFgsN3v99cWcVCtVpM4jrd+A4LaMXjAhbxxAAAAAElFTkSuQmCC";
$ICON["js"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGZSURBVDiNlZKxa1NRFMZ/93IhlhQjfUKQog2COEWnKDgK3aKj6OBf4OJg/4FOgtl0sLgJWXUXRIgFh1CQZ1xeBoNQIeKg4uJ9557jUKt9pkZz4Gzf9zvnu+e64XC4LiI9VT3HAuW9z0MId9xgMMhbrVa72Wzivf8vs6oynU6ZTCZvQoyxnWUZMcZFFiDLMoqiaIeUEimlhcwA+74gIpjZwgAAEcGXZYmZ/e6v7/Fbq/BpBLvbuKdX8I9a+P4F+Pi6oi3LkpBSqm5gYNFharhXPWz5JOn6Fu7zO6y2Age0h0dQ+wkAlk7hime4mLCzV7ETnQpARPD7gF+thn3f2yCt3yNdvouVDvfkFuw8rmgPBxho9KgCO3302GnSpdtoOI59+zIDmIngdt9iegQ7ugof+rjnD0AFXetg56/NRKgA/Iv7uJcPsc4NrLaMdTehu1m93TyAtrvYxZuw1KgI5/2DICJ79wwBW1mbmTLPLCL4EEKR5zkxxj8e8+8dYyTPc0IIRajX6xvj8bg3Go3O/HPsgarVauNGo7HxAwJPUB9huYnSAAAAAElFTkSuQmCC";
$ICON["markdown"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHwSURBVDiNjZNNbtNgEIYfRx+xE8f5qROR0pC2EhR1USSQuAFdcABWrLgCogvu0Guw4gqIRVh2AXIXSE5FUwgJqvNTu2n8m3wsElIQQvUrjWYzmnlezYxydHS0nyTJYeb09GGyuUkaibMz5tvblhDitdJqtaytra29O6qKXFtL1UAZjeiFIZ1O51hEUbRnmiYz2ybK51M1yPZ6mDs72La9J/wgovtzDOceUW7I2w89aqUsAHdrGt+dAADHjXh8r8hus0D23IPiGD+IEBlFUq8aqBcFwvUKb15UbiRQr4aEVYMTRSLiOEZKCbDKaSSlJI5jhB/G9B0XHI8wN+TLtyu6S+yBF1Mt3qJR0+g6AY2axm5TR3U8KLr4YYzIMOe2aZBzDfx6hWb9Zgu56RjfNMgwRyRJgpRyFWnxpZQkSYLwg4i+45IZTAi0Ee8/jVeFjarK56+ThY2qSncQ8vRRBW0wYW64iy0oSwt5T2daL/PyWfmvaftP/iXI+2OmpoHyp4XfaGl1bSGM6Tsewrlkmh3x7qODWRRsmCo/hiEAG6bKg8b1leadSxLdW2xBkTPMkka5WmBSL/Pqefl/Q1cqhC4XJQ1FzsgIIWzLsoiWB5UmojjGsiyEELbQdf2g3W4fnvT794OU36iNRsj19XapVDr4BWVfFfesCxmtAAAAAElFTkSuQmCC";
$ICON["package"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHjSURBVDiNlZG9btRAFIU/22OvvQskrNgIIYQUKUGUkRAt70SxFXU6HoH3oKCiTIGERIMSgVBEIsj+AWvP2J65MxTZJJjwl9vde3S/e+ZM9OL5+Ik2drdpm0Jsi7MNYlvWNx8SJYqIiBACi/d7JGmGSnskaUYv65l+kT5Vpg67t0a3i9FoSBCLsy3iWm5uPiJKEoBTwLojURkqzYiSlMlkXsym013VuFCMhjdolie4xmDbGtfWFBvbRIliRaCcHqKynDTLUb2C0XDI8edJocR7xBoIgZ8rBAv+bNbVCAGxBvEeJeIvLQN4q4ni5NK8AxGPMrr6vW41xPGfAYDRFWo+OcaHB+dhhRDwIawcXAD8Sgsrtz7AfHKMqsol30vD0cEbKtNSmQZtWh73r5EkF4C91+/o5ymDPGPQz7iztUNVLlHiBFdrVAxrg4y1QQZAlhcdB1t3h+fXAVytEScoax1trRHnOu9Le/0OQEQI3p/3ba2x1qGcE2xj8CLdhFRK9e0r5WJGuZgh1nZk2xicE5QToak18gvg7auXf/2BptY4kdMMbK0vO/hH2bMMnAi6KonC1QC6Kk8dRIT9D5+m9+9tXCeJo/9aFh84PFkQEfZVL43HR7Pq2ccvy+2rOEhVfDDI1fgHL38qmgAqvQIAAAAASUVORK5CYII=";
$ICON["pdf"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAKcSURBVDiNdZPPa5RnEMc/77vP7vtmX2NYYjC+sBqkrRBMhB5KURoQCeKh9KZ/gRehhWo8VFAEQT2ICXpI24NRkZJSFIm0J08bKKVpxKwpLe4pCUKaKmv257vv+8zzeNgkGkgG5jTDZ2a+M+PMzMwMa61vGGMG2cbsmxXs3J+4R44hl86QunATN9ddVEqNOIVCodjb2zuQz+dRSm0JiO+MkTr4KcmTSZxwL6nTIywtLbG8vPxCxXE8EIYhWmu01lsCWlOTpDId6D8K+L9Mo7UmDEMWFxcHlIhgjNmue+yrRZIXz5HoR/zxh1jPB2ux1iIiKK011tptAfGvDxFSeFduQ5jflNtsNlFJkmwNsJbkt0c0fxgFV+H2H9qUF0UR5XIZV0Sway2te1x4SuXkMMncLBIn6HoDG7c24o1Gg3K5jNa6PYKJIqT0D/Lv37Qe/4wT7CB7fZxU337qE9+DAXn7FndXD/V6nWq1CtDWoHzhW17HNTKHh8h8cZTs1Vuk8vsAMJVVJGkLXJufI+ofREQ2xhARlP3oAE6rhkQtjOPi7gmx1mKMIV75D1lbUO33afikf5NMnuehmse/RE6cwFhDcv8Oq6e+gsvXsN09sLAAawDn+TM8z8PzPKIowvd9HMdBBUFALpdrV/36LMmRIWrfnWPnT4+QIKCyDpj9i07RGBUA4Ps+WmtcrTWO4+C6LkopOj77nMzhIWTqMf6+PkRABHSjRfXeBFEUkU6nsda+B6zfwrp3nvmGyoP7uN27MCqDGBADlbsTxLUq6XSaJEnaAKXUy2KxSBzHGwCyWejciayuwu5wAxCv/E/94kW01hSLRZRSL1UQBOdLpdKN+fn5jz9UuK4tmbFRGk6K5MNXmZoiK4bc8HCpq6vr/DvKaYMHJvkNngAAAABJRU5ErkJggg==";
$ICON["php"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJySURBVDiNlZNPSFRRFMZ/vrnDOI4m+lKzhCyoFqEQpRXVIigG2gQuooWbNrWPWrSrlmEtgiAiIRBq47hIggaJYKboj6XMa9QaQ4aybBwb/8w8x7nvvndbDCYShR04i8PHdzjn+86pGB4ePqmU6vE8r53/CMMwLCHEpYpYLGa1tra2NTU1YRjGhsie55HJZEin0x+ElLLNNE2klP8zAKZpkkql2oTruriu+xuYydikvyySt0vYtiRvlyhJF8NncGj/VvbubgBglSeUUmitKdgOyYk55nLLTGdtfMLHrh0m33Kz5AuS0orDyINhqqv8XLxwmMbNIZRSCMdxsJcdEuNZMHwEa4IEC4qW5hpOn9zD6NgM8bdfWSqUOHpwB6UVSV//COfO7sdxHIhEIrp/MKEfD33SgAZ0OBzWr0en/1nf6X2uI5GINpRSTH9forjiADCb/Uk0GqVlyyYAfmTm19WreDAoUEphKKXILRZxPQ1AY4NJOBwm/W0BAMcrW6tZj3+e+lHWQCkFaBypAHg9Os1QfIr+J+P0DSS493CEvoEE76yZ3/hgNMFyfh6lXCp6e3v14SMnuH3/LZ0HdvJ+fJZ8ofSH7zXVATram4m/+kj2+xduXD3DyxfPyhNsrg9yvnsfN+/GsZdL+CurMIQfw+cHNK4jKSzM8WhslFAowPUrXdTXVa2toLVmW3MNt66dIvYmzdNnE+RyWYrFAp7nUVkZoL6umu6u4xzp2FnWROu1Bo7jIIQA4Fjndo51bv/rCWtdFlMpVXZBCJGyLAspJVrrDaWUEsuyEEKkRCgUujw5OdmTTCZ3beyNyhEIBCZra2sv/wIdNXwQeOKyCAAAAABJRU5ErkJggg==";
$ICON["playlist"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHfSURBVDiNjZPPaxNBFMe/m07ZTaUJNZh2o8GfBxEl+CfYi/Tgn6AHsV7qpWDwIhRBT55EvAsVvIl4FbyJpxa7SjUtVNiN3WDrj+xuyuzMG5+HmNImqe6DgWH4zIfve8xYj9805lfDnw/CtszXa6PIWrlczhNC3LauP327YxdK+ZPHXMxfHMt0mYgQBAFardYH4W/F+fPVs1j5RpBSZk5QqVTg+/4FoTVhM2YYBph5HxSljGbb4MuWwnoo8cnvwNuI8e7+OTAzjDEQWmlI/RvAoODmi19IohRxJJFEKZK4u+9xRARBiqA1DxUkUYoT44yjroPqxCGcPmLj8t2VXU5rDaG0gaLhgjiSeHSjOtB/jzPGQJAm6AMESZQOnO3lui1oDU3DZ5DEGQT6Hwl6A3u/0cGtZ18RtAnIWf0JzD7B5zDFnZfbWAslkkSBmVF/3kTDGgMOW5jsE+SICIoYihjMjIVX21jujOC746DsjoOZcaVWQCFKcFwmeHLNBXOX/ZuAoPe8g0unRrH0+gemHAsPr06BmTE3U8bcTPmgIRJUqmGNCDAzZqdLmJ0uDcD9RUTdFiYnCnIn+AiVqt1o/1tKKXieByHEmqidce8tN5oLm0urzuJi9u9s2/Z6sVis/wEm0XQMRVSBOgAAAABJRU5ErkJggg==";
$ICON["png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIkSURBVDiNlZLBThNRFIa/c+dOOwOlFUYkGBNQwZgIxJVbVz6Jb2BIfAmewBdw40sY4sIEEoONxrSJAobYQi2l0+nM3HvnutCEnaFn/3/58p9fDg4OXpRluee932GGE5GjWq22K/v7+0dra2vbKysrKKVuFK6qil6vx/Hx8WddluV2kiSUZTmLAEmS0Ol0trW1lvcf2rx6/Q6iGqI13pRQlPjc4o3FGwcWxAl4AeDN25dYa9HWWn5fXrKRrBPFEU4pLqcTiukV9bkMjKPIAlwZIE4hXhARLgcp4ZxFG2OYZ56nt1aJ6iGm8kzqIXkjx7oMZRXOxYyGc8S+RSuqo0SIvCY35q/BAiHPnz0k/ZFBpBiOc6YuJC8F74BoAdNaRGfLLMUxtTgglpDUWrRzjroEqHNh/fEqg7OURtKiij2j3oR4aZHeaUW9uYgOb3PvQQPthcqnuMqhrLXgPVTgigrxQvPuIuNfBXkeMzx3xK1lgnAeQiFLLYOzKR5/XaILK3oXI0bjjNI6hicpY+cZ5QFaC8U0Jc2EVi2jcaFRIuywcA0oQse3fp9Ih5jKcZUX9CeWqREEj7ElMOCUAWGgCETY4NE1YOILDn+eUNcBrqoY5QUT8/9hFfb+NSBZafK1351tiXcW6A//feHJ9jqfvu/NBBiPx7S/fEQrpTqHh4ebW1tbhGF4o7Axhna7jVKqoxuNxm63291rt9ubsxhEUdRpNpu7fwCz8y2A0DFUAgAAAABJRU5ErkJggg==";
$ICON["ps"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAKuSURBVDiNdZNBTBNZGMd/7bzpUAfbBiywGNgpG9QILB529+KSIEYjkj2Vi7dNSHaTPXjzYoiJB256NFw4eCZeuHrcPWwiJiakKFs2oKAxaiPtdOp03nvTt4dGGlf4knd5yff7v+//vn9ifX39itb6XqvV+r4hDaHi2Mp0JUhZoJRieXm5sb+/vyLCMLzved5Ef38/LQNbr2vHAlxHUBg4ydLSElprt1gs/iKklBO9vb1IKQHwgxAVt44EmG6Hra03hGFIpVJhcnJyRMRxTBzHAKi4xUe/iTmi2baSfDOU5e6dB+zt7TE7O0sURSS11hhjMMZQqTWpNST+/06jqZjwcjz5+y9mZmbY3Nxkfn6eMAwRSimMaWvuvK1TbURfKV+aHCCTtlhbWyOdTjM3N4fWGiklIo5jjDFI1eLZv5Uv5ne7BNd/OE0+28Xq6iqLi4uMjY2xsrKCUgrLsjojPN874EMtpBpEVIMIRySZ/9njVMbBGMP606cUi0Wmp6cpFAqkUimADuDdwSeq9YhqPULrmBuXRjiZFhhjKJfLfJt+CUgWFhawbZuenh601ojPgIN6RDVoAnD5QgHXsQ69STVecPW8xfvAI5fLMTw8jNYa3/c7L5ga7ycIJQf1JsmkOfyZlvpExrwmmRnlWvEPPM/D930qlQpSyg6gL9fF79fPYSUTPPpzlzBq39eer6LCBlU/ZHBwkFqthu/7hwJf7MHUxADLNy/y09k8Dx+XMcbgv3nGPy+2eOdOEQQBlmXR3d1NPp/Htu22B0ophBDtwJyw+fXqKI2m5uXuDq92dnF/vM13Pb24rktfXx8AWuu2iUKI8sbGxpnx8XFs2z7cgROOxdDpAYZ+e0QikejkwRiUUpRKJYQQZeG67q3t7e17pVJp9NgYHlGO42xns9lb/wEzO4Q7kfoa0wAAAABJRU5ErkJggg==";
$ICON["psd"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHrSURBVDiNlZK/a1NRFMc/7+U2waQmjc8SFa1BLCISFbqoCP4AB+kgTq6KdBUqtuDgPyDFTXFwqLoYB0dxEWIqOqRQeI2DCcWgCImhlbRK6v3xroMktTEp5gtnOBzO537PuccpFAoXtNYzQRAcpQ+5rusLIW45+XzeT6fTmVQqheu6/9UcBAG1Wo1KpbIopJQZz/OQUvZjAM/zKJVKGWGMwRgDwJO3qwCEhcOuRIiTB7cRGXC6Alp9QmuNtRaA2dwyyViIRNSlUlcMxwUPr+9mKBrqCtFa4yqlsNZircVoxVh6gEcTe7h5MUl1pcnrxbV2vTOUUghjTNuB1opW7g26aK1Yl5rn75bJvv+O0gFnj8SZHE+1x9g0gtGaz/Umj3PfeLXQwLGGE6NRrt1f4vSh7YyPJVlXwV8P6k6A4uOXNRo/frHPi3D78gj7d4bZmwzx5sMKOwYdrp5LbQ04c8zjzpV0e1HWWh5MHOBprsqzuRoLSw1mbxzuDtBaYYKNHMAElpfzdc5nhvhU/UmhvLqFA7OxxJaCwJKd+8rdF02G42EmL430BszfO9W23VLIhez08U3//w9AKYUQouux9JLW+s8hCSFKvu8jpex5MJ0hpcT3fYQQJRGLxabK5fJMsVgc7cdBJBIpJxKJqd+MbGewqu9a+AAAAABJRU5ErkJggg==";
$ICON["py"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJkSURBVDiNlZO9a1NRHIafe+65uflo2tigKVgxUq0gbUUcREQ3cfALHN0EK66CHVzcXMTJ2X/Af8DJwVYqQqWWNFSbKNaKH63VmCa9yT3n3HscNBeli77z8z783uHnzM3NnTbG3IvjeIL/iBCiIqW86czMzFTK5fJ4qVRCCPFP5TiOWVtbY2VlZVEqpcaLxSJKqQR49PwVzxbf4gqBUhqtFdcunmR071DCFItFarXauIiiiCiKsNZiraXRCpivf+bUkYNk8gUcv4/1AO4/fJww1lp6PWmMwVoLQLPdYW7pHZtByHRllVani47gR6CxTifhejHGILXWWGt58vINs6+/0OxEbHZjgkaTTjdEOR6trqE/FRK+uA64iNEbyPwIWmtE7/zpxVUqGw5LGxEfWoKvyqNFFhUJsukMGbYoFPawM1wgrN5NZiQTgtCg4gyu9PBcS9T4hI/CcyDrhlwafY8XZSBSEDWw1v6a0BNopcBxSPk+pcY8t868YyjXxuouKdcl7wtoLEMUEMdsF6SFxrcWwk0uT7zn0Ege2uugO6DasNUC3QXhEWqPzG+B6AmunjvOfucjO7of2NXXBrOMdbZotjb4sdWioX2+iTKrqowdOrv9guHSILcnLwCgl2Yh0wcyhacjYiNofFcEg1fonzhBxu/fLvgzOs5DLotjArLpAmvNo8TBU/p2H8NN5RM+EWitkVImAnd4klrlAdKzxFZi1AJix3nS6cJfZWMMUkpZq1Qqo2NjY3ieB4DM76P/8J1tT9Qra62pVqtIKWsyl8tN1ev1e9Vq9cA/veLv+L5fHxgYmPoJJsCGQPCg5+wAAAAASUVORK5CYII=";
$ICON["rar"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHqSURBVDiNlZE/a1NRGIefe3KSQqo0CbbGimgyxD8lpQr9BrpmCIigrk4ScFBw7Chox3yB4iJIh8Qv4aRELUUlSYcm6Q00TfHmnnPuyY1DJEOTSvvC4YUDv+f3wOtsvfj4wNrRO5xwlRkjpMOr988pFosAbG9v8/ZpmTBwalI6L6Xn+ZvpK5fz17PXiEg5DYgJoh+ilEolAKrVKnfX16jvNlc77YNNOfD9fCKe4mD3iFE4mgJE42NoMpmc/HV/90nEU9T9Zl4apTnueDPDAE50vMvlMrVaDYBAB3iHAUZphFIK5Wm0b2a+ILAASCnZ2NgYAwKL8jRKKaRWCqP0zHaAWBABoFAoUKlUABgG43atFELr2c0nDSqVCoVCYWKgfYPWBqm1wShzqoG1dsrAWotR/wChGKL/A1ADTW5xZdKeW1xBDTRaGUIxRIYRCxHQf2ZDevt9Ht9+RvTe+JyBb+nt9xFSEEYssjtw3fWbc0vLyaVTLU7OwtWLHPf6dL+4rmylm/z4uVM3RzZ7ZgIQS8h6K928IF3rsffwWza1kDpPnnb/MOt+8lwpvNzo+9d2wxt9zpwHMO9kG8LLxaUyMbXcv5+5lbmDEJEzhcNwSKexk2mZX3vOpbUnj0bGexOG+sZ5DISYazqx+dd/AeApGyDxL7TZAAAAAElFTkSuQmCC";
$ICON["rb"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAKKSURBVDiNlZNLa5NbFIafvbNz0YTGkNpYLBovraDWiSAqgqJ4OBwngnCmIlRw5KVYKKIDEUWw6kDxBwhOHQiCOFDIRDQIxxjUJgVbDo2m1WpsLs23v/0tB9VC6aSu8fs8rHfBUvl8/rDv+yNBEOzgD0ZrXTDGnFe5XK6QzWb7M5kMWutlwUEQUK1WGR8ff2s8z+tPp9N4nrcopESoPXyAe/uajgN/MXbvLp/GynxuWXZeu8GWY/9SKpX6jXMO59wi2K/8z7szA7T/e8nKkGbuQ5HUidO8HzyN32zx4vYIm48ewzmH8X0fEVmAZ5494c3ZAWjUCQkgAZ0b+pgdGWbj+gyjdaFhDCKC7/toay0igohgqxXy5wZoN+v4gFNgE0lWHjxCZaLKl9ESHbUpVkRj83lrMc65+Q1EyJ07RatRJwygAIGt1+9QevKYr1ZoW8esVyNkxxERnHPo3xVmnj/lQy7HrA8WcED2+ElU/hHxoEHD+ngoAq3pXrt+ocLCDRIatnSmGP3yjdjqLvZeuMznG9cof/+OpNJ4StNWISIYYun0UkE0lWT3xSv0Tk+T3Lmb/NBZTGsOaTaRZpNw91pUAG5qklR3Zqngzc1bbNqzjfT0BJP3i8yOlbAKvBVxYp2dhLyA5swnlFasyqxeKqgUi8xNVVnnz1DVa7AIgsK1WvyYrLBOQojR1LBEOxJLBSqRoPJxAhId1L6+J0Boo4mJYqOJkIiG6YuFeTfXoC1uscBaS+/gMK+uXqLRk0UrRaQeJhwJY6IRfqRWobu6iPT0sGtzL6F9+7HWzguMMaVCodC3/dBhjv79z7KeyVpLoVDAGFMy8Xh8qFwujxSLxd5l0b8mGo2Wk8nk0E8I/36fE9VC/wAAAABJRU5ErkJggg==";
$ICON["rpm"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIRSURBVDiNlZE/SFtRFMZ/eb3vJiHFB039h1Yi0lGnTrabaTs46BAK7ZbRVerk4JRFhHZJV8mSdrB0C1n7EDIEFV6cEghCcLC8oVBI6Hv35XQoeTRaS/3gcA+ce77vO+ckms3mc2PMwXA4XOEOsCzLU0q9Tbiu6+VyueXp6Wksy/qv5uFwyNXVFRcXFy0VBMFyNpslCIK7GCCbzdJut5dVFEVEUTRW7Ha7uK5Lv99n5OzJygqPlpbiP6M+ZYxBRAA4OTmhVCqRz+cpFouk02kABoMB/a8u3z9+IvPmNWpxEQBjDCoMQ0SEVqvFxsYGh4eH5PN5gJg4lUqRevmCn/czfCu84sH7dySfPSUMQ6woihARtra2SKfTrK2tISJ/Db26yr25OX6UPyAi4yNUq1Xm5+dj1dvw8MtnZDBARH6PMCLY29sDYHt7m/39fXK5HOvr68zMzFAqlZidneXy8pKFhQUSiQS7u7sYY6BSqYjv+wJIvV6P81qtJlprOTo6ksnJSWk0GqK1ltPTUwHE932pVCpi/XmFqampOD8+PmZzc5OJiYmxhY5wY4Rer4fWGhGhUChQLBZxHAcR4ezsDNu26Xa72LZNr9e7SaC1jpnL5fKYqm3bY+9IKCYIwxCl1D+3fx3GGIwxWEqptud5BEFw6/2vRxAEeJ6HUqqtMpnMTqfTOTg/P398FwfJZLLjOM7OL2H4X7hSCaOSAAAAAElFTkSuQmCC";
$ICON["rss"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIRSURBVDiNlZLPS1RRFMc/9737HMVooCdNSaKLIqlGIdq0sCyQkKgoi1rm31C6qEVUiwzMsFWrFrbpB1L0gxBCyIqgoR+8cTUDZtqiWdaiGd+9754WpjCMQnPgbA7nfM73e+5VuVyuz1o76pzroo7wPC/SWl9UMzMzUUdHRzaTyeB53n8NO+colUrMz8/ndRzH2TAMieO4HgGEYUihUMjqJElIkgQA+/gwKtyNatmDasmiWvcDak3Aypy21iIiy8VfJfhVgrlpANSWfeie66iNbWtCrLV4xhhEBBFBn32N3zuG2nUeCTaRLH5k6dEJbDSBiFvtW0ljDF6SJKsFm3+A4ON1D6JPP4Fth3DlMvGbG9iv92sANRbiD3eXtQVNBD3DBP13sJ/uYd7dYuntbRrbD6LSbdUWVgAigj5wGW/7UVylwtLUFSovLuDvHUS19+LKf6i8ulRlpQbgd58j6B8hdWYCadyMyb/EfHlI0HcNaQix33LYuffrA0xhmvLTYaRhAw3Hx3CJR2VqBHGC33kMZwT7I6oCVN2g/Pwq8vsnkgiNJ2/i7+zHRM+wC59RW7M447CLEcG//tobdJ2Cpgx+5xFEBNXavbx1IcJr7cIZwXzPVylQ4+PjMjAwgNa6rq9srWVychJPa12Ioog4jmveeb2M45goitBaF3Rzc/NQsVgcnZ2d3VGPglQqVUyn00N/AWXjhgPgZar3AAAAAElFTkSuQmCC";
$ICON["script"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHiSURBVDiNlZK9a1NhFMZ/933P/Qgp6XDFki2LLjZFdKoEWpBY/4Vg/oNSFPuRbiKunaWEqhQRcZdOQrldHKJLkikB6dpF7VAJyfu+1yFfHXsPnOXA+Z3nPDxeq9WqGmMOnHMrZCilVFtEdryzs7N2qVQqLy0toZS60bJzjouLC87PzzsyHA7LcRwzHA6zCCCOY3q9XlmstdRqNZIkyQRYW1tjc3MTZYzJvAyQJAnGGNRoNJoNC4VCJshoNEJZa2eDTqdDo9GgUCjgeQqtNFoLon1E+2gtaKXxvLHZ1trxC9OqP6uzuvqIdrvDfmOfW/FtoiBHFE46yBEGOaIgIgwijDGIMQalNKKFH62f1Gt1tp5v0djfo1gs8vrVGzw8AFJS0jTFOYdL7RzgS4BooVKpsL3zkvJKmaPmO94fHRMFOZgAIMWlbgxw1wCiBRGf448f+PzpC9sv9rj8c4lSQhjk8LyJgul1Z7DXAQCihMfrG/z9fYmI4PshyfdvLCzkZx6tPlgfX7YaM7iaA6obVU6+nvDv1xVq4rxWmvv3HqKUnkV8Kt06y5On1Tng8PAtURRlysBgMKDZbCIi0js9Pb27vLyM7/s3DlC320VEepLP53f7/f5Bt9u9k0VBGIb9xcXF3f+O+N/4FuZWJwAAAABJRU5ErkJggg==";
$ICON["sql"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAF7SURBVDiNnZK9juJAEIRrxu2xjZORIzsgJEFiX4D43uiCy06b77OQI5GARES2+wTIQrYTCJB/pj2MNwLt6XZ166u8SvVVtzgcDj+ccy/OuSeMkJTyVUr5U+x2u9c0TRfT6RRE9C2ztRZ5nqMsyzcyxizSNAUzg5m/3SBNUxyPxwUxM6y1GIZhDAGEEGBmEDOj7/tR5ruYGeScg7X2vwKccyAA8DxvFD8AKKUAAFRVFbTWCIJgVIAxBlVVgeq6xul0QpZlMMY8cKSUf9UFACJCEAQoigJ1XYOSJMH1ekVZlrhf5F8BSinEcYwkSUCXywXz+Ry+749C6Psem80G1LYt8jxHlmXouu5xUiHEH4b7n/i+jzAMURQF2rYFaa0fCB83+Er3DeI4htYa1DQNZrMZJpPJKISmabBer0FRFHXb7TZcLpew1oKZMQzDpwhCCCilQETY7/eIoqgTq9Xq1/l8/t11XcjMuN1ucM59GiClhOd5UEohDMMuSZLnd8/JzHyDGebxAAAAAElFTkSuQmCC";
$ICON["tiff"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAILSURBVDiNlZI/T1NhFMZ/533ve+8t1CLcQE3ENJpgYkJ1dtfRL+Jmwu4X4FO4OBpXV1aIBhsHS0KrCbVRKlBI2/evQ4c6GXumszy/POc8jxweHj631u6nlB6zxIjIcZ7ne3JwcHDcarXazWYTpdR/iWOMDIdD+v3+58xa266qCmvtMgaoqoput9vOvPccf/jE+5dvSLoE0Uh0SLAQpygsKjm0WBQeLQGAF29f470n895zMfjNduMOZAUJjXMziFNKPUFhiT4gKWCUR6sIwM1ojK95Mucct6Rga3MdbQwhJILXaAmYPKBFAzl+IugkFIUBEVQQnHNzB7mpsfPsETenI6TIsD+HKDXD1AJKGbS5TZgUxIkhXy1QpSGKmZ8QQkArhRpP2X7a4rp3QSjXyBuryOyMYrNi2psh5TrUVygebCBaGIkQQkB57xEBSZCsB4TavS3s2TXhyuCGlnxtg3xlBTEZYTxl+v0SSIsnJonc/DhnenlFsAH3dYL4GSoL5FczkhsSfEmKCjXQIKDS6gIQs8h4MEBnGTFGvHV4axHl0ApSkkUDme+V3P8LUDp+DXso0cQUCcGRkv9nkRreLgD15jrfzntLNfHJ5hp+1J+ncLf9kFen75YCjMdjwpePZEqp7tHR0c7u7i7GmP8SO+fodDoopbpZvV7fOzk52e90OjvLOCjLsttoNPb+ANPUFu+gUJIiAAAAAElFTkSuQmCC";
$ICON["text"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFMSURBVDiNlZA9isJAFMd/hgcWFhZRJFNoLLZ0a7XfStDLrLfwMAqewEILu6xV0lgpgieYj2SbTdhs4qIPhhmG/+drHI/HD2vtKk3Td14Yz/MiEfls7Ha7KAzDUa/Xw/O8p8hpmnK73Tifz1+itR75vo/W+pUA+L5PHMcjcc7hnHuJDJDzxFpLlmUArNdrut1uAVJKcblcSm+lFMPhEABrLWKMKQQWi0XFKQzDyjvHG2MQ51zxsdlsAIoUSimAwjlPM51OixqlCvP5vLbvYDAo3TneWlsW2O/3JadHu8irVAQmk0nJqS7FvwkOh0OJdL/fAeh0OgAEQQDwOMF4PK7dwd95mGC73VbcrtcrQRDU1ioEjDGICLPZrALq9/sl199kay2eiMRRFKG1Jsuyp47WmiiKEJFYWq3WMkmS1el0entqAT/TbDaTdru9/AbO//fVB3FwJQAAAABJRU5ErkJggg==";
$ICON["video"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJgSURBVDiNlZO9bhtHFIW/mZ2d3RVXJEs1hBMYCQtFhhYp1QgR8g58Cbmy38JurJcI8hCBmq0JxEVAG8gP1KiUREhczp2fFLMJbHe+7WDunHO+M+ri4uJn7/0bpdSLl9/8RdFU6MpS2BJVGgCSeIIT4t4Rdnve/f0tKaXfjTGvzG63e9v3/cnl5SU/Pj+ksBZdlejSoAqdF4RIFE/cC8E5fmifcXV19eLs7Oyt8d6frFYr7u7ueAjvsbWlqPLrSo8LYswq9oIbHB//dKxWK7z3J+r09DSt12vOz8/5mrm+vqbrOtTx8XGazWYAXJ38Q12XaGvRpYbRAiESJRKdYxiEy/fPALi/v0d77+n7HhHhcFJStzXNtKaZTTiYtxzMW5rZhGZaU7c1h5MSEaHve7z3GO89XdcBoKuSorYUTZ1pjBSieMJuP+YREBG6rsN7jxYR1us1IoIqCpQp0KWhqCxle0DZHlBUNlMxBaoo+PSO8d6zXC6z16RIMZFSIsWM7n8KKZFigpQQEZbLZVbgvWez2SAimbUIcXD4pwHZPiLbR/zTQBxcPhOPiLDZbHIGIQQWi0UOe1CgFMSEHi3lIoWcw94RBodIYrFYEELIFm5ubjg6OmL/lLCjdG2Kz4oUfSA6wQ2CiOL29pb5fI5q2zZZa7+qRP+Ncy4r2G63TKdTfltNqJsKbUt0WXzxF7KCYbfnp18eeXh4oGkaTAjhQ1VV32utmR3WuQO1RdsSZcYMRvlhcFRGIXJHVVWklD6YGOPrGOMbpdR3v/7xhLYeXRp0WX6hYKTkHM45Ukoftdav/wWP7nOnXPYUNgAAAABJRU5ErkJggg==";
$ICON["xml"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHGSURBVDiNlZLPSlthEMV/98t3c4PBXJtbSCEg2RQkNN34DC5cuOgL+BT1LXwAX6R7CegmReE2tHAjKsQ/pCuDBsn3504XMTeNLaUZmMUMZ86cOUzQ6/V2nHOHeZ5/ZIVQSqVa689Bt9tNW61Wp9FooJT6r+E8zxmNRlxfX3/TxphOkiQYY1YRQJIkZFnW0d57vPcrDQPM57RzDhF5pVFABQAEE0NgPXmtUvTm4ZxDWWsRkSLLJ1eou3FRV758R/fvUXdjyidXS1hrLcp7XzSi7iXh+S2+vjZT9WzRP0aYdgNfXyM8vyXqXhZ47z1qfkJ0fEF4NuRxf5s8KiEihP17/NsqPq6QRyUe97cJz4ZExxeICM65hQfB0xQBpBQUnoRfh5jOu4VHpQCBGfaFoFAw2d3Cbm6wfnQKU0cwfkZnP5nOCaaO9aNT7OYGk92tPwlEhMleG9uMUTcPlHtDbKuOr5YREdTNA7YZM9lrF/ilE+bx9OkDgfWIVovtgGvWsK038Bv2rwQAohV5s/ZSSNHjFa4gsNaitV7pE51zMw+01lmaphhjlp7kX2mMIU1TtNaZrlarB4PB4LDf779fRUEURYM4jg9+AY0DZ4cpAUR4AAAAAElFTkSuQmCC";
$ICON["zip"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHmSURBVDiNlY+/TxRRFEbPLHcXWUNgRTYokVJCIAEbLSS2Vjs2/gEmJmosrKisqKykxMTKzoqYOKudrYWSaFgxFFtoICghSBZml5k375fFGBLDbgJf8op3k3u+c4Pmhwe3M2OfO+9n6JagxN2Hb6nVagDU63VWXt6hgF4vSd+CdDrtpQvVK9NjE5MUpHgSUDhHrCPuPXoCwOs375icvcXOz7WZ/d2tJVGddHp0pIw7/ILz9qRAsQJApVI5nvnOBqMjZX7/SKfFZCk+2cR3WQYIGARgeXmZRqMBgMsUXv/CZCkFrRRWtbFZ0vU5awAQERYXF3OANVjVRiuFGJXisqOu7fkJOSAMQ6Ioyk8wBpcdYVRKwSjVsz03cABEUUQYhv8MHDZLMEohOlO4LOlp4Kw9YeCsxWUJOlOItYJVvQFBGjM/Vz1un5+rYtMYqxKsFSTVA/ggwKn9rgDfavJiYYqgeD3/6xjdakIwQKo90m7FmP4bDI6P97T4P5coDl0l3tum3fqEBFJic+0jRwetUwLylIeGCaSMWK2ZmL3J4MXTGuSJ97ZZ3/yMeCmx9X2Vzp/3ZwKcH6nipYR4dbjTKU2NXQtriPSdatkYy9fVb3i1sRO8enz5fuvAPUsU1bMYDPSzOzxUePoXhH8UgmSvdmoAAAAASUVORK5CYII=";
$ICON["default"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAC0SURBVDiN7Y8tjsMwGESn1kgBAQEGoSELs7fojdpb9FShYd4gh4TmCt+PXVReV4U70sD3NHNZ1/VqZo9Syi8aEkJIJG+XZVnSNE3zOI4IIbwFl1JwnieO4/ijiMwxRohIywDEGJFznunucPcmGABeHM0MtdZmAQCYGaiqHwtUFXT3jwXfufAv+JJAVUGyGTYzBJI5pQQRQa31rYoIUkogmdn3/X3f98e2bT8tC7qu24dhuD8BD6e7SzzK9MwAAAAASUVORK5CYII=";

$ICON["7z"] = $ICON["archive"];
$ICON["bz2"] = $ICON["archive"];
$ICON["cab"] = $ICON["archive"];
$ICON["gz"] = $ICON["archive"];
$ICON["tar"] = $ICON["archive"];

$ICON["aac"] = $ICON["audio"];
$ICON["aif"] = $ICON["audio"];
$ICON["aifc"] = $ICON["audio"];
$ICON["aiff"] = $ICON["audio"];
$ICON["ape"] = $ICON["audio"];
$ICON["au"] = $ICON["audio"];
$ICON["flac"] = $ICON["audio"];
$ICON["iff"] = $ICON["audio"];
$ICON["m4a"] = $ICON["audio"];
$ICON["mid"] = $ICON["audio"];
$ICON["mp3"] = $ICON["audio"];
$ICON["mpa"] = $ICON["audio"];
$ICON["ra"] = $ICON["audio"];
$ICON["wav"] = $ICON["audio"];
$ICON["wma"] = $ICON["audio"];
$ICON["f4a"] = $ICON["audio"];
$ICON["f4b"] = $ICON["audio"];
$ICON["oga"] = $ICON["audio"];
$ICON["ogg"] = $ICON["audio"];
$ICON["xm"] = $ICON["audio"];
$ICON["it"] = $ICON["audio"];
$ICON["s3m"] = $ICON["audio"];
$ICON["mod"] = $ICON["audio"];

$ICON["hex"] = $ICON["bin"];

$ICON["xlsx"] = $ICON["calc"];
$ICON["xltx"] = $ICON["calc"];
$ICON["xltm"] = $ICON["calc"];
$ICON["xlam"] = $ICON["calc"];
$ICON["xlr"] = $ICON["calc"];
$ICON["xls"] = $ICON["calc"];
$ICON["csv"] = $ICON["calc"];

$ICON["less"] = $ICON["css"];
$ICON["sass"] = $ICON["css"];
$ICON["scss"] = $ICON["css"];

$ICON["docx"] = $ICON["doc"];
$ICON["docm"] = $ICON["doc"];
$ICON["dot"] = $ICON["doc"];
$ICON["dotx"] = $ICON["doc"];
$ICON["dotm"] = $ICON["doc"];
$ICON["log"] = $ICON["doc"];
$ICON["msg"] = $ICON["doc"];
$ICON["odt"] = $ICON["doc"];
$ICON["pages"] = $ICON["doc"];
$ICON["rtf"] = $ICON["doc"];
$ICON["tex"] = $ICON["doc"];
$ICON["wpd"] = $ICON["doc"];
$ICON["wps"] = $ICON["doc"];

$ICON["svg"] = $ICON["draw"];
$ICON["svgz"] = $ICON["draw"];

$ICON["ai"] = $ICON["eps"];

$ICON["xhtml"] = $ICON["html"];
$ICON["shtml"] = $ICON["html"];
$ICON["htm"] = $ICON["html"];
$ICON["url"] = $ICON["html"];

$ICON["jar"] = $ICON["java"];

$ICON["jpeg"] = $ICON["jpg"];
$ICON["jpe"] = $ICON["jpg"];

$ICON["json"] = $ICON["js"];

$ICON["md"] = $ICON["markdown"];

$ICON["apk"] = $ICON["package"];
$ICON["pkg"] = $ICON["package"];
$ICON["dmg"] = $ICON["package"];

$ICON["phtml"] = $ICON["php"];

$ICON["m3u"] = $ICON["playlist"];
$ICON["m3u8"] = $ICON["playlist"];
$ICON["pls"] = $ICON["playlist"];
$ICON["pls8"] = $ICON["playlist"];

$ICON["bat"] = $ICON["script"];
$ICON["cmd"] = $ICON["script"];
$ICON["sh"] = $ICON["script"];

$ICON["tif"] = $ICON["tiff"];

$ICON["txt"] = $ICON["text"];
$ICON["nfo"] = $ICON["text"];
$ICON["list"] = $ICON["text"];

$ICON["asf"] = $ICON["video"];
$ICON["asx"] = $ICON["video"];
$ICON["avi"] = $ICON["video"];
$ICON["flv"] = $ICON["video"];
$ICON["mkv"] = $ICON["video"];
$ICON["mov"] = $ICON["video"];
$ICON["mp4"] = $ICON["video"];
$ICON["mpg"] = $ICON["video"];
$ICON["rm"] = $ICON["video"];
$ICON["srt"] = $ICON["video"];
$ICON["swf"] = $ICON["video"];
$ICON["vob"] = $ICON["video"];
$ICON["wmv"] = $ICON["video"];
$ICON["m4v"] = $ICON["video"];
$ICON["f4v"] = $ICON["video"];
$ICON["f4p"] = $ICON["video"];
$ICON["ogv"] = $ICON["video"];


/***************************************************************************/
/*   HERE COMES THE CODE.                                                  */
/*   DON'T CHANGE UNLESS YOU KNOW WHAT YOU ARE DOING ;)                    */
/***************************************************************************/

//
// The class that displays icons
//
class ImageServer
{
	//
	// Checks if an image is requested and displays one if needed
	//
	public static function showImage()
	{
		global $ICON;
		if(isset($_GET['img']))
		{
			if(strlen($_GET['img']) > 0)
			{
				$mtime = gmdate('r', filemtime($_SERVER['SCRIPT_FILENAME']));
				$etag = md5($mtime.$_SERVER['SCRIPT_FILENAME']);

				if ((isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $mtime)
					|| (isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $etag))
				{
					header('HTTP/1.1 304 Not Modified');
					return true;
				}
				else {
					header('ETag: "'.$etag.'"');
					header('Last-Modified: '.$mtime);
					header('Content-type: image/png');
					if(isset($ICON[$_GET['img']]))
						print base64_decode($ICON[$_GET['img']]);
					else
						print base64_decode($ICON["default"]);
				}
			}
			else {
				header('ETag: "'.$etag.'"');
				header('Last-Modified: '.$mtime);
				header('Content-type: image/png');
				print base64_decode($ICON["default"]);
			}
			return true;
		}
		return false;
	}
}

//
// The class for logging user activity
//
class Logger
{
	public static function log($message)
	{
		global $simplex;
		if(strlen(Simplex::getConfig('confLogFile')) > 0)
		{
			if(Location::isFileWritable(Simplex::getConfig('confLogFile')))
			{
				$message = "[" . date("Y-m-d h:i:s", mktime()) . "] ".$message." (".$_SERVER["HTTP_USER_AGENT"].")\n";
				error_log($message, 3, Simplex::getConfig('confLogFile'));
			}
			else
				$simplex->setErrorString("langErrorWriteLog");
		}
	}

	public static function logAccess($path, $isDir)
	{
		$message = $_SERVER['REMOTE_ADDR']." ".GateKeeper::getUserName()." accessed ";
		$message .= $isDir?"dir":"file";
		$message .= " ".$path;
		Logger::log($message);
	}

	public static function logQuery()
	{
		if(isset($_POST['log']) && strlen($_POST['log']) > 0)
		{
			Logger::logAccess($_POST['log'], false);
			return true;
		}
		else
			return false;
	}

	public static function logCreation($path, $isDir)
	{
		$message = $_SERVER['REMOTE_ADDR']." ".GateKeeper::getUserName()." created ";
		$message .= $isDir?"dir":"file";
		$message .= " ".$path;
		Logger::log($message);
	}

	public static function emailNotification($path, $isFile)
	{
		if(strlen(Simplex::getConfig('confEmailNotification')) > 0)
		{
			$message = "This is a message to let you know that ".GateKeeper::getUserName()." ";
			$message .= ($isFile?"uploaded a new file":"created a new directory")." in Simplex.\n\n";
			$message .= "Path : ".$path."\n";
			$message .= "IP : ".$_SERVER['REMOTE_ADDR']."\n";
			mail(Simplex::getConfig('confEmailNotification'), "Upload notification", $message);
		}
	}
}

//
// The class controls logging in and authentication
//
class GateKeeper
{
	public static function init()
	{
		global $simplex;
		if(strlen(Simplex::getConfig("confSession")) > 0)
			session_name(Simplex::getConfig("confSession"));

		if(count(Simplex::getConfig("confUsers")) > 0)
			session_start();
		else
			return;

		if(isset($_GET['logout']))
		{
			$_SESSION['username'] = null;
			$_SESSION['password'] = null;
		}

		if(isset($_POST['inputPassword']) && strlen($_POST['inputPassword']) > 0)
		{
			if(GateKeeper::isUser((isset($_POST['inputUsername'])?$_POST['inputUsername']:""), $_POST['inputPassword']))
			{
				$_SESSION['username'] = isset($_POST['inputUsername'])?$_POST['inputUsername']:"";
				$_SESSION['password'] = $_POST['inputPassword'];

				$addr = $_SERVER['PHP_SELF'];
				if(isset($_GET['m']))
					$addr .= "?m";
				else if(isset($_GET['s']))
					$addr .= "?s";
				header( "Location: ".$addr);
			}
			else
				$simplex->setErrorString("langErrorSignin");
		}
	}

	public static function isUser($userName, $userPass)
	{
		foreach(Simplex::getConfig("confUsers") as $user)
		{
			if($user[1] == $userPass)
			{
				if(strlen($userName) == 0 || $userName == $user[0])
				{
					return true;
				}
			}
		}
		return false;
	}

	public static function isLoginRequired()
	{
		if(Simplex::getConfig("confLogin") == false){
			return false;
		}
		return true;
	}

	public static function isUserLoggedIn()
	{
		if(isset($_SESSION['username']) && isset($_SESSION['password']))
		{
			if(GateKeeper::isUser($_SESSION['username'], $_SESSION['password']))
				return true;
		}
		return false;
	}

	public static function isAccessAllowed()
	{
		if(!GateKeeper::isLoginRequired() || GateKeeper::isUserLoggedIn())
			return true;
		return false;
	}

	public static function isUploadAllowed(){
		if(Simplex::getConfig("confEnableUpload") == true && GateKeeper::isUserLoggedIn() == true && GateKeeper::getUserStatus() == "staff" || GateKeeper::getUserStatus() == "admin")
			return true;
		return false;
	}

	public static function isNewdirAllowed(){
		if(Simplex::getConfig("confEnableMkDir") == true && GateKeeper::isUserLoggedIn() == true && GateKeeper::getUserStatus() == "staff" || GateKeeper::getUserStatus() == "admin")
			return true;
		return false;
	}

	public static function isDeleteAllowed(){
		if(Simplex::getConfig("confEnableDelete") == true && GateKeeper::isUserLoggedIn() == true && GateKeeper::getUserStatus() == "admin")
			return true;
		return false;
	}

	public static function getUserStatus(){
		if(GateKeeper::isUserLoggedIn() == true && Simplex::getConfig("confUsers") != null && is_array(Simplex::getConfig("confUsers"))){
			foreach(Simplex::getConfig("confUsers") as $user){
				if($user[0] != null && $user[0] == $_SESSION['username'])
					return $user[2];
			}
		}
		return null;
	}

	public static function getUserName()
	{
		if(GateKeeper::isUserLoggedIn() == true && isset($_SESSION['username']) && strlen($_SESSION['username']) > 0)
			return $_SESSION['username'];
		if(isset($_SERVER["REMOTE_USER"]) && strlen($_SERVER["REMOTE_USER"]) > 0)
			return $_SERVER["REMOTE_USER"];
		if(isset($_SERVER['PHP_AUTH_USER']) && strlen($_SERVER['PHP_AUTH_USER']) > 0)
			return $_SERVER['PHP_AUTH_USER'];
		return "an anonymous user";
	}

	public static function showLoginBox(){
		if(!GateKeeper::isUserLoggedIn() && count(Simplex::getConfig("confUsers")) > 0)
			return true;
		return false;
	}
}

//
// The class for any kind of file managing (new folder, upload, etc).
//
class FileManager
{
	function newFolder($location, $dirname)
	{
		global $simplex;
		if(strlen($dirname) > 0)
		{
			$forbidden = array(".", "/", "\\");
			for($i = 0; $i < count($forbidden); $i++)
			{
				$dirname = str_replace($forbidden[$i], "", $dirname);
			}

			if(!$location->uploadAllowed())
			{
				// The system configuration does not allow uploading here
				$simplex->setErrorString("langErrorUploadDenied");
			}
			else if(!$location->isWritable())
			{
				// The target directory is not writable
				$simplex->setErrorString("langErrorUploadPermission");
			}
			else if(!mkdir($location->getDir(true, false, false, 0).$dirname, 0777))
			{
				// Error creating a new directory
				$simplex->setErrorString("langErrorMkDir");
			}
			else if(!chmod($location->getDir(true, false, false, 0).$dirname, 0777))
			{
				// Error applying chmod 777
				$simplex->setErrorString("langErrorChDir");
			}
			else
			{
				// Directory successfully created, sending e-mail notification
				Logger::logCreation($location->getDir(true, false, false, 0).$dirname, true);
				Logger::emailNotification($location->getDir(true, false, false, 0).$dirname, false);
			}
		}
	}

	function uploadFile($location, $newFile)
	{
		global $simplex;
		$name = basename($newFile['name']);
		if(get_magic_quotes_gpc())
			$name = stripslashes($name);

		$uploadDir = $location->getFullPath();
		$uploadFile = $uploadDir . $name;

		if(function_exists("finfo_open") && function_exists("finfo_file"))
			$mimeType = File::getFileMime($newFile['tmp_name']);
		else
			$mimeType = $newFile['type'];

		$extension = File::getFileExtension($newFile['name']);

		if(!$location->uploadAllowed())
		{
			$simplex->setErrorString("langErrorUploadDenied");
		}
		else if(!$location->isWritable())
		{
			$simplex->setErrorString("langErrorUploadPermission");
		}
		else if(!is_uploaded_file($newFile['tmp_name']))
		{
			$simplex->setErrorString("langErrorUpload");
		}
		else if(is_array(Simplex::getConfig("confUploadType")) && count(Simplex::getConfig("confUploadType")) > 0 && !in_array($mimeType, Simplex::getConfig("confUploadType")))
		{
			$simplex->setErrorString("langErrorUploadType");
		}
		else if(is_array(Simplex::getConfig("confUploadRejectExtension")) && count(Simplex::getConfig("confUploadRejectExtension")) > 0 && in_array($extension, Simplex::getConfig("confUploadRejectExtension")))
		{
			$simplex->setErrorString("langErrorUploadType");
		}
		else if(!@move_uploaded_file($newFile['tmp_name'], $uploadFile))
		{
			$simplex->setErrorString("langErrorMove");
		}
		else
		{
			chmod($uploadFile, 0755);
			Logger::logCreation($location->getDir(true, false, false, 0).$name, false);
			Logger::emailNotification($location->getDir(true, false, false, 0).$name, true);
		}
	}

	public static function delete_dir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir")
						FileManager::delete_dir($dir."/".$object);
					else
						unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}

	public static function delete_file($file){
		if(is_file($file)){
			unlink($file);
		}
	}

	//
	// The main function, checks if the user wants to perform any supported operations
	//
	function run($location)
	{
		if(isset($_POST['newDir']) && strlen($_POST['newDir']) > 0){
			if($location->uploadAllowed() && GateKeeper::isUserLoggedIn() && GateKeeper::isAccessAllowed() && GateKeeper::isNewdirAllowed()){
				$this->newFolder($location, $_POST['newDir']);
			}
		}

		if(isset($_FILES['newFile']['name']) && strlen($_FILES['newFile']['name']) > 0){
			if($location->uploadAllowed() && GateKeeper::isUserLoggedIn() && GateKeeper::isAccessAllowed() && GateKeeper::isUploadAllowed()){
				$this->uploadFile($location, $_FILES['newFile']);
			}
		}

		if(isset($_GET['del'])){
			if(GateKeeper::isUserLoggedIn() && GateKeeper::isAccessAllowed() && GateKeeper::isDeleteAllowed()){
				$split_path = Location::splitPath($_GET['del']);
				$path = "";
				for($i = 0; $i < count($split_path); $i++){
					$path .= $split_path[$i];
					if($i + 1 < count($split_path))
						$path .= "/";
				}
				if($path == "" || $path == "/" || $path == "\\" || $path == ".")
					return;

				if(is_dir($path))
					FileManager::delete_dir($path);
				else if(is_file($path))
					FileManager::delete_file($path);
			}
		}
	}
}

//
// Dir class holds the information about one directory in the list
//
class Dir
{
	var $name;
	var $location;

	//
	// Constructor
	//
	function Dir($name, $location)
	{
		$this->name = $name;
		$this->location = $location;
	}

	function getName()
	{
		return $this->name;
	}

	function getNameHtml()
	{
		return htmlspecialchars($this->name);
	}

	function getNameEncoded()
	{
		return rawurlencode($this->name);
	}

	//
	// Debugging output
	//
	function debug()
	{
		print("Dir name (htmlspecialchars): ".$this->getName()."\n");
		print("Dir location: ".$this->location->getDir(true, false, false, 0)."\n");
	}
}

//
// File class holds the information about one file in the list
//
class File
{
	var $name;
	var $location;
	var $size;
	//var $extension;
	var $type;
	var $modTime;

	//
	// Constructor
	//
	function File($name, $location)
	{
		$this->name = $name;
		$this->location = $location;

		$this->type = File::getFileType($this->location->getDir(true, false, false, 0).$this->getName());
		$this->size = File::getFileSize($this->location->getDir(true, false, false, 0).$this->getName());
		$this->modTime = filemtime($this->location->getDir(true, false, false, 0).$this->getName());
	}

	function getName()
	{
		return $this->name;
	}

	function getNameEncoded()
	{
		return rawurlencode($this->name);
	}

	function getNameHtml()
	{
		return htmlspecialchars($this->name);
	}

	function getSize()
	{
		return $this->size;
	}

	function getType()
	{
		return $this->type;
	}

	function getModTime()
	{
		return $this->modTime;
	}

	//
	// Determine the size of a file
	//
	public static function getFileSize($file)
	{
		$sizeInBytes = filesize($file);

		// If filesize() fails (with larger files), try to get the size from unix command line.
		if (Simplex::getConfig("confLargeFile") == true || !$sizeInBytes || $sizeInBytes < 0) {
			$sizeInBytes=exec("ls -l '$file' | awk '{print $5}'");
		}
		return $sizeInBytes;
	}

	public static function getFileType($filepath)
	{
		/*
		 * This extracts the information from the file contents.
		 * Unfortunately it doesn't properly detect the difference between text-based file types.
		 *
		$mimeType = File::getMimeType($filepath);
		$mimeType_chunks = explode("/", $mimeType, 2);
		$type = $mimeType_chunks[1];
		*/
		return File::getFileExtension($filepath);
	}

	public static function getFileMime($filepath)
	{
		$fhandle = finfo_open(FILEINFO_MIME);
		$mimeType = finfo_file($fhandle, $filepath);
		$mimeType_chunks = preg_split('/\s+/', $mimeType);
		$mimeType = $mimeType_chunks[0];
		$mimeType_chunks = explode(";", $mimeType);
		$mimeType = $mimeType_chunks[0];
		return $mimeType;
	}

	public static function getFileExtension($filepath)
	{
		return strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
	}

	//
	// Debugging output
	//
	function debug()
	{
		print("File name: ".$this->getName()."\n");
		print("File location: ".$this->location->getDir(true, false, false, 0)."\n");
		print("File size: ".$this->size."\n");
		print("File modTime: ".$this->modTime."\n");
	}
}

class Location
{
	var $path;

	//
	// Split a file path into array elements
	//
	public static function splitPath($dir)
	{
		$dir = stripslashes($dir);
		$path1 = preg_split("/[\\\\\/]+/", $dir);
		$path2 = array();
		for($i = 0; $i < count($path1); $i++)
		{
			if($path1[$i] == ".." || $path1[$i] == "." || $path1[$i] == "")
				continue;
			$path2[] = $path1[$i];
		}
		return $path2;
	}

	//
	// Get the current directory.
	// Options: Include the prefix ("./"); URL-encode the string; HTML-encode the string; return directory n-levels up
	//
	function getDir($prefix, $encoded, $html, $up)
	{
		$dir = "";
		if($prefix == true)
			$dir .= "./";
		for($i = 0; $i < ((count($this->path) >= $up && $up > 0)?count($this->path)-$up:count($this->path)); $i++)
		{
			$temp = $this->path[$i];
			if($encoded)
				$temp = rawurlencode($temp);
			if($html)
				$temp = htmlspecialchars($temp);
			$dir .= $temp."/";
		}
		return $dir;
	}

	function getPathLink($i, $html)
	{
		if($html)
			return htmlspecialchars($this->path[$i]);
		else
			return $this->path[$i];
	}

	function getFullPath()
	{
		return (strlen(Simplex::getConfig('confBaseDir')) > 0?Simplex::getConfig('confBaseDir'):dirname($_SERVER['SCRIPT_FILENAME']))."/".$this->getDir(true, false, false, 0);
	}

	//
	// Debugging output
	//
	function debug()
	{
		print_r($this->path);
		print("Dir with prefix: ".$this->getDir(true, false, false, 0)."\n");
		print("Dir without prefix: ".$this->getDir(false, false, false, 0)."\n");
		print("Upper dir with prefix: ".$this->getDir(true, false, false, 1)."\n");
		print("Upper dir without prefix: ".$this->getDir(false, false, false, 1)."\n");
	}


	//
	// Set the current directory
	//
	function init()
	{
		if(!isset($_GET['dir']) || strlen($_GET['dir']) == 0)
		{
			$this->path = $this->splitPath(Simplex::getConfig('confStartDir'));
		}
		else
		{
			$this->path = $this->splitPath($_GET['dir']);
		}
	}

	//
	// Checks if the current directory is below the input path
	//
	function isSubDir($checkPath)
	{
		for($i = 0; $i < count($this->path); $i++)
		{
			if(strcmp($this->getDir(true, false, false, $i), $checkPath) == 0)
				return true;
		}
		return false;
	}

	//
	// Check if uploading is allowed into the current directory, based on the configuration
	//
	function uploadAllowed()
	{
		if(Simplex::getConfig('confEnableUpload') != true)
			return false;
		if(Simplex::getConfig('confUploadDir') == null || count(Simplex::getConfig('confUploadDir')) == 0)
			return true;

		$confUploadDir = Simplex::getConfig('confUploadDir');
		for($i = 0; $i < count($confUploadDir); $i++)
		{
			if($this->isSubDir($confUploadDir[$i]))
				return true;
		}
		return false;
	}

	function isWritable()
	{
		return is_writable($this->getDir(true, false, false, 0));
	}

	public static function isDirWritable($dir)
	{
		return is_writable($dir);
	}

	public static function isFileWritable($file)
	{
		if(file_exists($file))
		{
			if(is_writable($file))
				return true;
			else
				return false;
		}
		else if(Location::isDirWritable(dirname($file)))
			return true;
		else
			return false;
	}
}

class Simplex
{
	var $location;
	var $dirs;
	var $files;
	var $sort_by;
	var $sort_as;
	var $logging;
	var $spaceUsed;
	var $lang;

	//
	// Determine sorting, calculate space.
	//
	function init()
	{
		$this->sort_by = "";
		$this->sort_as = "";
		if(isset($_GET["sort_by"]) && isset($_GET["sort_as"]))
		{
			if($_GET["sort_by"] == "name" || $_GET["sort_by"] == "size" || $_GET["sort_by"] == "mod")
				if($_GET["sort_as"] == "asc" || $_GET["sort_as"] == "desc")
				{
					$this->sort_by = $_GET["sort_by"];
					$this->sort_as = $_GET["sort_as"];
				}
		}
		if(strlen($this->sort_by) <= 0 || strlen($this->sort_as) <= 0)
		{
			$this->sort_by = "name";
			$this->sort_as = "desc";
		}


		global $LANG;
		if(isset($_GET['lang']) && isset($LANG[$_GET['lang']]))
			$this->lang = $_GET['lang'];
		else
			$this->lang = Simplex::getConfig("confLang");

		$this->logging = false;
		if(Simplex::getConfig("confLogFile") != null && strlen(Simplex::getConfig("confLogFile")) > 0)
			$this->logging = true;
	}

	//
	// Read the file list from the directory
	//
	function readDir()
	{
		global $simplex;
		//
		// Reading the data of files and directories
		//
		if($open_dir = @opendir($this->location->getFullPath()))
		{
			$this->dirs = array();
			$this->files = array();
			while ($object = readdir($open_dir))
			{
				if($object != "." && $object != "..")
				{
					if(is_dir($this->location->getDir(true, false, false, 0)."/".$object))
					{
						if(!in_array($object, Simplex::getConfig('confHiddenDir')))
							$this->dirs[] = new Dir($object, $this->location);
					}
					else if(!in_array($object, Simplex::getConfig('confHiddenFile')))
						$this->files[] = new File($object, $this->location);
				}
			}
			closedir($open_dir);
		}
		else
		{
			$simplex->setErrorString("langErrorReadDir");;
		}
	}

	//
	// A recursive function for calculating the total used space
	//
	function sum_dir($start_dir, $ignore_files, $levels = 1)
	{
		if ($dir = opendir($start_dir))
		{
			$total = 0;
			while ((($file = readdir($dir)) !== false))
			{
				if (!in_array($file, $ignore_files))
				{
					if ((is_dir($start_dir . '/' . $file)) && ($levels - 1 >= 0))
					{
						$total += $this->sum_dir($start_dir . '/' . $file, $ignore_files, $levels-1);
					}
					elseif (is_file($start_dir . '/' . $file))
					{
						$total += File::getFileSize($start_dir . '/' . $file) / 1024;
					}
				}
			}

			closedir($dir);
			return $total;
		}
	}

	function calculateSpace()
	{
		if(Simplex::getConfig('confSubfolders') <= 0)
			return;
		$ignore_files = array('..', '.');
		$start_dir = getcwd();
		$spaceUsed = $this->sum_dir($start_dir, $ignore_files, Simplex::getConfig('confSubfolders'));
		$this->spaceUsed = round($spaceUsed/1024, 3);
	}

	function sort()
	{
		if(is_array($this->files)){
			usort($this->files, "Simplex::cmp_".$this->sort_by);
			if($this->sort_as == "desc")
				$this->files = array_reverse($this->files);
		}

		if(is_array($this->dirs)){
			usort($this->dirs, "Simplex::cmp_name");
			if($this->sort_by == "name" && $this->sort_as == "desc")
				$this->dirs = array_reverse($this->dirs);
		}
	}

	function makeArrow($sort_by)
	{
		if($this->sort_by == $sort_by && $this->sort_as == "asc")
		{
			$sort_as = "desc";
			$img = "arrow_up";
		}
		else
		{
			$sort_as = "asc";
			$img = "arrow_down";
		}

		if($sort_by == "name")
			$text = $this->getString("langFileName");
		else if($sort_by == "size")
			$text = $this->getString("langFileSize");
		else if($sort_by == "mod")
			$text = $this->getString("langFileLastmod");

		return "<a href=\"".$this->makeLink(false, $sort_by, $sort_as, null, $this->location->getDir(false, true, false, 0))."#simplex\">
			$text <img style=\"border:0;\" alt=\"".$sort_as."\" src=\"?img=".$img."\"></a>";
	}

	function makeLink($logout, $sort_by, $sort_as, $delete, $dir)
	{
		$link = "?";
		if($logout == true)
		{
			$link .= "logout";
			return $link;
		}

		if(isset($this->lang) && $this->lang != Simplex::getConfig("confLang"))
			$link .= "lang=".$this->lang."&amp;";

		if($sort_by != null && strlen($sort_by) > 0)
			$link .= "sort_by=".$sort_by."&amp;";

		if($sort_as != null && strlen($sort_as) > 0)
			$link .= "sort_as=".$sort_as."&amp;";

		$link .= "dir=/".$dir;
		if($delete != null)
			$link .= "&amp;del=".$delete;
		return $link;
	}

	function makeIcon($l)
	{
		$l = strtolower($l);
		return "?img=".$l;
	}

	function formatModTime($time)
	{
		$timeformat = "M d, Y G:i";
		if(Simplex::getConfig("confTimeFormat") != null && strlen(Simplex::getConfig("confTimeFormat")) > 0)
			$timeformat = Simplex::getConfig("confTimeFormat");
		return date($timeformat, $time);
	}

	function formatSize($size)
	{
		$sizes = Array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB');
		$y = $sizes[0];
		for ($i = 1; (($i < count($sizes)) && ($size >= 1024)); $i++)
		{
			$size = $size / 1024;
			$y  = $sizes[$i];
		}
		return round($size, 2)." ".$y;
	}

	//
	// Debugging output
	//
	function debug()
	{
		print("Explorer location: ".$this->location->getDir(true, false, false, 0)."\n");
		for($i = 0; $i < count($this->dirs); $i++)
			$this->dirs[$i]->output();
		for($i = 0; $i < count($this->files); $i++)
			$this->files[$i]->output();
	}

	//
	// Comparison functions for sorting.
	//

	public static function cmp_name($b, $a)
	{
		return strcasecmp($a->name, $b->name);
	}

	public static function cmp_size($a, $b)
	{
		return ($a->size - $b->size);
	}

	public static function cmp_mod($b, $a)
	{
		return ($a->modTime - $b->modTime);
	}

	//
	// The function for getting a translated string.
	// Falls back to english if the correct language is missing something.
	//
	public static function getLangString($stringName, $lang)
	{
		global $LANG;
		if(isset($LANG[$lang]) && is_array($LANG[$lang])
			&& isset($LANG[$lang][$stringName]))
			return $LANG[$lang][$stringName];
		else if(isset($LANG["en"]))// && is_array($LANG["en"])
			//&& isset($LANG["en"][$stringName]))
			return $LANG["en"][$stringName];
		else
			return "Translation error";
	}

	function getString($stringName)
	{
		return Simplex::getLangString($stringName, $this->lang);
	}

	//
	// The function for getting configuration values
	//
	public static function getConfig($name)
	{
		global $CONFIG;
		if(isset($CONFIG) && isset($CONFIG[$name]))
			return $CONFIG[$name];
		return null;
	}

	public static function setError($message)
	{
		global $ERROR;
		if(isset($ERROR) && strlen($ERROR) > 0)
			;// keep the first error and discard the rest
		else
			$ERROR = $message;
	}

	function setErrorString($stringName)
	{
		Simplex::setError($this->getString($stringName));
	}

	//
	// Main function, activating tasks
	//
	function run($location)
	{
		$this->location = $location;
		$this->calculateSpace();
		$this->readDir();
		$this->sort();
		$this->outputHtml();
	}

	public function printLoginBox()
	{
		?>
<div class="row text-muted">
<div class="col-xs-12 col-md-9 pull-right">
<form class="navbar-form navbar-right" enctype="multipart/form-data" method="post">
<?php
		$require_username = false;
		foreach(Simplex::getConfig("confUsers") as $user){
			if($user[0] != null && strlen($user[0]) > 0){
				$require_username = true;
				break;
			}
		}
		if($require_username)
		{
		?>
<div class="form-group">
<label class="sr-only" for="inputUsername"><?php print $this->getString("langInputUsername");?></label>
<input type="text" name="inputUsername" id="inputUsername" class="form-control" placeholder="<?php print $this->getString("langInputUsername");?>" required>
</div>
<?php
		}
	?>
<div class="form-group">
<label class="sr-only" for="inputPassword"><?php print $this->getString("langInputPassword");?></label>
<input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="<?php print $this->getString("langInputPassword");?>" required>
</div>
<button class="btn btn-default hidden-xs" type="submit"><?php print $this->getString("langBtnSignin");?></button>
<button class="btn btn-default btn-block visible-xs" type="submit"><?php print $this->getString("langBtnSignin");?></button>
<p class="help-block text-right"><?php print $this->getString("langInfoSignin");?></p>
</form><!-- sign-in-form -->
</div>
</div>
<?php
	}

	//
	// Printing the actual page
	//
	function outputHtml()
	{
		global $ERROR;
		global $LOADTIME;
?>
<!DOCTYPE html>
<html lang="<?php print $this->getConfig('confLang');?>">
<head>
<meta charset="<?php print $this->getConfig('confCharset');?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php if(Simplex::getConfig('confTitle') != null) print Simplex::getConfig('confTitle');?></title>

<!-- Bootstrap -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

<style>
/* Fonts from Google Fonts */
@import url(//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic&subset=latin,latin-ext);
@import url(//fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic,700italic&subset=latin,latin-ext);
@import url(//fonts.googleapis.com/earlyaccess/nanumgothic.css);
@import url(//fonts.googleapis.com/earlyaccess/nanumgothiccoding.css);

/* Some elements from Apaxy */
* {
	margin:0;
	padding:0;
}
html {
	min-height: 100%;
	padding-top: 1em;
	padding-bottom: 1em;
	border-top: 10px solid #eee;
	border-bottom: 10px solid #eee;
	color: #61666c;
	line-height: 10px;
}
.font-monospace {
	font-family: 'Ubuntu Mono', 'Nanum Gothic Coding', monospace;
	font-weight: 400;
}
.font-sans-serif {
	font-family: 'Ubuntu', 'Nanum Gothic', sans-serif;
	font-weight: 300;
}
strong,
.strong {
	font-weight: 500;
}
.no-strong {
	font-weight: 300;
}
.transparent {
	border: 0px;
}
a:link {
	text-decoration: none;
	color: #61666c;
}
a:visited {
	color: #61666c;
}
a:hover {
	color: #2d2d2d;
}
a:active {
	color: #2d2d2d;
}
a:focus {
	color: #2d2d2d;
}
table {
	table-layout:fixed;
}
tr {
	height: 39px;
	text-align: center;
}
th {
	white-space: nowrap;
}
td {
	word-wrap: break-word;
}
td a:link {
	display: block;
}
.btn {
	font-weight: 300;
}
.btn-file {
	position: relative;
	overflow: hidden;
}
.btn-file input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	min-width: 100%;
	min-height: 100%;
	font-size: 100px;
	text-align: right;
	filter: alpha(opacity=0);
	opacity: 0;
	background: red;
	cursor: inherit;
	display: block;
}
input[readonly] {
	background-color: white !important;
	cursor: text !important;
}
textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus {
	border-color: rgba(97, 102, 108, 0.8);
	box-shadow: 0 1px 1px rgba(97, 102, 108, 0.075) inset, 0 0 8px rgba(97, 102, 108, 0.6);
	outline: 0 none;
}
</style>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="font-sans-serif">
<?php
if(Simplex::getConfig('confShowHeader') == true)
{
	?>
<header class="header-wrapper">
<div class="container">
<div class="row">
<h3 class="no-strong text-center">
<a href="<?php print $this->makeLink(false, null, null, null, "");?>"><span><?php if(Simplex::getConfig('confTitle') != null) print Simplex::getConfig('confTitle');?></span></a>
<?php
	if(Simplex::getConfig("confTitleSub") != null && is_array(Simplex::getConfig("confTitleSub")) && count(Simplex::getConfig("confTitleSub")) > 0)
	{
		$confTitleSub = Simplex::getConfig("confTitleSub");
	?>
<span><small class="no-strong"><?php print $confTitleSub[array_rand($confTitleSub)];?></small></span>
<?php
	}
	?>
</h3>
</div>
</div>
</header>

<?php
}
?>
<a id="simplex"></a>

<?php
if(Simplex::getConfig('confShowHeader') == true)
{
	?>
<hr>

<?php
}
?>
<?php
//
// Print the error (if there is something to print)
//
if(isset($ERROR) && strlen($ERROR) > 0)
{
	?>
<div class="container">
<div class="row">
<div class="alert alert-danger text-center" role="alert">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="sr-only">Error: </span><?php print $ERROR;?>
</div>
</div>
</div><!-- END: Error alert area -->

<?php
}
?>
<section class="container">
<?php
// Checking if the user is allowed to access the page, otherwise showing the login box
if(!GateKeeper::isAccessAllowed() && GateKeeper::isLoginRequired())
{
	$this->printLoginBox();
}
else
{
	?>
<?php
	if(Simplex::getConfig('confShowBreadcrumb') == true)
	{
		?>
<div class="row">
<div class="col-xs-12">
<p>
<a href="?dir=/#simplex"><?php print $this->getString("langInfoRoot");?></a> /
<?php
		for($i = 0; $i < count($this->location->path); $i++)
		{
			?>
<a href="<?php print $this->makeLink(false, null, null, null, $this->location->getDir(false, true, false, count($this->location->path) - $i - 1));?>#simplex"><?php print $this->location->getPathLink($i, true);?></a> /
<?php
		}
		?>
</p>
</div>
</div>

<?php
	}
	?>
<table class="table table-hover">
<thead class="small">
<tr>
<th style="width: 39px;"></th>
<th class="no-strong text-left"><?php print $this->makeArrow("name");?></th>
<th class="no-strong text-center hidden-xs" style="width: 156px;"><?php print $this->makeArrow("mod");?></th>
<th class="no-strong text-center" style="width: 97.5px;"><?php print $this->makeArrow("size");?></th>
<?php
	if(GateKeeper::isDeleteAllowed())
	{
		?>
<th class="no-strong text-center" style="width: 39px;"><?php print Simplex::getString("langFileDelete");?></th>
<?php
	}
	?>
</tr>
</thead>

<tbody>
<tr>
<td><img alt="dir" src="?img=folder-home"></td>
<td class="text-left"><a href="<?php print $this->makeLink(false, null, null, null, $this->location->getDir(false, true, false, 1));?>#simplex">..</a></td>
<td class="hidden-xs"></td>
<td></td>
<?php
	if(GateKeeper::isDeleteAllowed())
	{
		?>
<td></td>
<?php
	}
	?>
</tr>
<?php
	//
	// Ready to display folders and files.
	//
	$row = 1;

	//
	// Folders first
	//
	if($this->dirs)
	{
		foreach ($this->dirs as $dir)
		{
			?>

<tr>
<td><img alt="dir" src="?img=folder"></td>
<td class="text-left"><a href="<?php print $this->makeLink(false, null, null, null, $this->location->getDir(false, true, false, 0).$dir->getNameEncoded());?>/#simplex"><?php print $dir->getNameHtml();?></a></td>
<td class="hidden-xs"></td>
<td></td>
<?php
			if(GateKeeper::isDeleteAllowed())
			{
				?>
<td class="text-center delete"><a data-name="<?php print htmlentities($dir->getName());?>" href="<?php print $this->makeLink(false, null, null, $this->location->getDir(false, true, false, 0).$dir->getNameEncoded(), $this->location->getDir(false, true, false, 0));?>"><img src="?img=del" alt="<?php print $this->getString("langInfoDelete");?>"></a></td>
<?php
			}
			?>
</tr>
<?php
			$row =! $row;
		}
	}

	//
	// Now the files
	//
	if($this->files)
	{
		$count = 0;
		foreach ($this->files as $file)
		{
			?>

<tr>
<td><img alt="<?php print $file->getType();?>" src="<?php print $this->makeIcon($file->getType());?>"></td>
<td class="text-left"><a href="<?php print $this->location->getDir(false, true, false, 0).$file->getNameEncoded();?>"<?php
			if(Simplex::getConfig('confNewWindow') == true)
				print " target=\"_blank\"";
			print ">";
			print $file->getNameHtml();
			?></a></td>
<td class="hidden-xs"><?php print $this->formatModTime($file->getModTime());?></td>
<td><?php print $this->formatSize($file->getSize());?></td>
<?php
			if(GateKeeper::isDeleteAllowed()){
				?>
<td class="delete"><a data-name="<?php print htmlentities($file->getName());?>" href="<?php print $this->makeLink(false, null, null, $this->location->getDir(false, true, false, 0).$file->getNameEncoded(), $this->location->getDir(false, true, false, 0));?>">
<img src="?img=del" alt="<?php print $this->getString("langInfoDelete");?>"></a></td>
<?php
			}
			?>
</tr>
<?php
			$row =! $row;
		}
	}


	//
	// The files and folders have been displayed
	//
	?>
</tbody>
</table>
<?php
}
?>
</section>
<footer class="footer-wrapper">
<div class="container">
<?php
if(GateKeeper::isAccessAllowed() && GateKeeper::showLoginBox())
{
	$this->printLoginBox();
}
?>
<div class="row text-muted">
<?php
if(GateKeeper::isAccessAllowed() && $this->location->uploadAllowed() && (GateKeeper::isUploadAllowed() || GateKeeper::isNewdirAllowed()))
{
	?>
<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 pull-right">
<form class="navbar-form navbar-right" enctype="multipart/form-data" method="post">
<div class="form-group">
<label class="sr-only" for="newDir"><?php print $this->getString("langInfoMkDir");?></label>
<input class="form-control" name="newDir" id="newDir" placeholder="<?php print $this->getString("langInfoMkDir");?>" type="text" required>
</div>
<button class="btn btn-default hidden-xs" type="submit"><?php print $this->getString("langBtnMkdir");?></button>
<button class="btn btn-default btn-block visible-xs" type="submit"><?php print $this->getString("langBtnMkdir");?></button>
</form><!-- create-directory-form -->
</div>

<div class="col-xs-12 col-sm-7 col-md-5 pull-right" style="padding-bottom: 11px;">
<form class="navbar-form navbar-right" enctype="multipart/form-data" method="post">
<!-- From http://www.abeautifulsite.net/whipping-file-inputs-into-shape-with-bootstrap-3 -->
<div class="form-group">
<label class="sr-only" for="newFile"><?php print $this->getString("langInfoUpload");?></label>
<div class="input-group">
<span class="input-group-btn">
<span class="btn btn-default btn-file"><?php print $this->getString("langBtnChooseFile");?><input type="file" name="newFile" id="newFile" multiple></span>
</span>
<input type="text" class="form-control" placeholder="<?php print $this->getString("langInfoUpload");?>" readonly>
</div>
</div>
<button class="btn btn-default hidden-xs" type="submit"><?php print $this->getString("langBtnUpload");?></button>
<button class="btn btn-default btn-block visible-xs" type="submit"><?php print $this->getString("langBtnUpload");?></button>
</form><!-- upload-file-form -->
</div>

<?php
}
?>
<?php
if(GateKeeper::isUserLoggedIn()){
	?>
<div class="col-xs-12 col-sm-2 pull-left" style="margin:8px 0 8px 0;">
<a href="<?php print $this->makeLink(true, null, null, null, "");?>">
<button class="btn btn-default hidden-xs" type="button"><?php print $this->getString("langBtnSignout");?></button>
<button class="btn btn-default btn-block visible-xs" type="button"><?php print $this->getString("langBtnSignout");?></button>
</a>
</div>
<?php
}
?>
</div>
</div><!-- file-manager-tools-container -->

<div class="footer-bottom-wrapper">
<hr>
<div class="container visible-xs">
<?php
if($this->getConfig("confShowLoadTime") == true)
{
?>
<div class="row">
<div class="col-xs-12 text-center">
<p class="text-muted">
<?php printf($this->getString("langInfoLoadTime"), (microtime(TRUE) - $LOADTIME)*1000);?>
</p>
</div>
</div><!-- row -->

<?php
}
?>
<div class="row">
<div class="col-xs-12 text-center">
<h4 class="no-strong"><?php if(Simplex::getConfig('confTitle') != null) print Simplex::getConfig('confTitle');?> with <a href="https://github.com/kdzlvaids/Simplex">Simplex</a></h4>
</div>
</div><!-- row -->
</div><!-- container -->

<div class="container hidden-xs">
<?php
if($this->getConfig("confShowLoadTime") == true)
{
?>
<div class="row">
<div class="col-sm-12 text-left">
<p class="text-muted">
<?php printf($this->getString("langInfoLoadTime"), (microtime(TRUE) - $LOADTIME)*1000);?>
</p>
</div>
</div><!-- row -->

<?php
}
?>
<div class="row">
<div class="col-sm-8 text-left">
<h4 class="no-strong"><?php if(Simplex::getConfig('confTitle') != null) print Simplex::getConfig('confTitle');?> with <a href="https://github.com/kdzlvaids/Simplex">Simplex</a></h4>
</div>

<div class="col-sm-1 col-sm-offset-3 pull-right">
<a href="#simplex"><button class="btn btn-default" type="button" style="margin:3px 0 2px 0;">Top</button></a>
</div>
</div><!-- row -->
</div><!-- container -->
</div><!-- footer-bottom-wrapper -->
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- From http://www.abeautifulsite.net/whipping-file-inputs-into-shape-with-bootstrap-3 -->
<script>
$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});
	
$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    });
});
<?php
if(($this->getConfig('confLogFile') != null && strlen($this->getConfig('confLogFile')) > 0)
	|| (GateKeeper::isDeleteAllowed()))
{
?>

$(document).ready(function() {
<?php
	if(GateKeeper::isDeleteAllowed()){
?>

	$('td.delete a').click(function(){
		var answer = confirm('Are you sure you want to delete : \'' + $(this).attr("data-name") + "\' ?");
		return answer;
	});
<?php
	}
	if($this->logging == true)
	{
?>

		function logFileClick(path)
		{
			 $.ajax({
		        	async: false,
					type: "POST",
					data: {log: path},
					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
					cache: false
				});
		}

		$("a.file").click(function(){
			logFileClick("<?php print $this->location->getDir(true, true, false, 0);?>" + $(this).html());
			return true;
		});
<?php
	}
?>
	});
<?php
}
?>
</script>
</body>
</html>
<?php
	}
}

//
// This is where the system is activated.
// We check if the user wants an image and show it. If not, we show the explorer.
//
$simplex = new Simplex();
$simplex->init();

GateKeeper::init();

if(!ImageServer::showImage() && !Logger::logQuery())
{
	$location = new Location();
	$location->init();
	if(GateKeeper::isAccessAllowed())
	{
		Logger::logAccess($location->getDir(true, false, false, 0), true);
		$fileManager = new FileManager();
		$fileManager->run($location);
	}
	$simplex->run($location);
}
?>
