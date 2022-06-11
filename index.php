<?php

declare(strict_types=1);

// require_once('./src/Request.php');

spl_autoload_register(function (string $name) {
    $name = str_replace(['\\', 'App/'], ['/', ''], $name);
    $path = "src/$name.php"; //jeśli name = Request - $path = 'src/Request.php' - czyli przekieruje nas do tego, co jest w tym pliku
    require_once($path); //doda jednorazowo tą ścieżkę, do wykorzystania na stronie
});


require_once('./src/utils/debug.php');
$configuration = require_once('./config/config.php');

use App\Request; // za pomocą powyższej funkcji str_replace w przeglądarce zamienia ścieżkę na /Request i t.d.
use App\Controller\AbstractController;
use App\Controller\NoteController;
use App\Exception\AppException;
use App\Exception\ConfigurationException;
// use App\Request;



// error_reporting(0);  //jeśli otkomentujemy, to błędy nie będą się pojawiaćna stronie
// ini_set('display_errors', '0');


$request = new Request($_GET, $_POST, $_SERVER);

//$_GET - przechowuje dane, które są w URL
//Czyli jeśli mamy:
//localhost/notes/?action=show
//GET = ['action'=> 'show']
//$_POST - przechowuje dane, które wysyłamy przez formularz
//w zniennej SERWER my dowiadujemy się czy pytamy o coś za pomocą GET, czy wysyłamy coś ca pomocą POST


try { //wykonaj się to, jeśli nie ma błędów:
    AbstractController::initConfiguration($configuration); //wywołujemy statycną metodę
    $controller = new NoteController($request);
    $controller->run();
} catch (ConfigurationException $e) { //wykonaj się w razie błędu ConfigurationException
    echo "<h1>Wystąpił błąd aplikacji</h1>";
    echo "<p>Błąd konfiguracji - skontaktuj się z administratorem xyz@gmail.com</p>";
} catch (AppException $e) { //wykonaj się w razie błędu AppException
    echo "<h1>Wystąpił błąd w aplikacji</h1>";
    echo '<h3>' . $e->getMessage() . '</h3>';
    // echo '<h3>' . $e->getPrevious()->getMessage() . '</h3>';
} catch (\Throwable $e) { //wykonaj się przy jakimś innym błędzie
    echo "<h1>Wystąpił błąd aplikacji!</h1>";
    dump($e); //to w koniecznej aplikacji usuwamy, ponieważ jest to informacja tylko dla nas
}



/* Za pomocąpowyższej obsługi błędów dowiadujemy się jaki bład i z czym związany, stąd wiemy gdzie go szukać, i w tym czasie nie wyskakuje dokłądna informacjia na stonie, widoczna dla użytkownika(Każdy z błędów mamy rozpisane w osobnych plikach) */