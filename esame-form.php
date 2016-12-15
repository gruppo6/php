<?php
require_once "Esame.php";
// Validazione: verifico se è stato passato il parametro "action" in GET...
if (!isset($_GET["action"])) {
    die("Errore! Nessuna azione specificata.");
}

// ...e se ha un valore corretto
$action = $_GET["action"];
if ($action != "insert" && $action != "update") {
    die("Errore! Azione non prevista.");
}

// Preparo i contenitori per i valori del form
$id = "";
$id_certificazione= "";
$data = "";
if ($action == "update") {
    if (!isset($_GET["id"])) {
        die("Errore! Non è stato specificato l'id del comune da modificare.");
    }
    $id = $_GET["id"];
    $esame = new Esame($id);
    $esito = $esame->select();  // In base all'id riempio l'oggetto
    if ($esito === false) {
        die("Errore in fase di lettura dal DB.");
    }
    $id_certificazione = $utente->getId_certificazione();
    $data = $utente->getData();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Esame</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    
        <?php include 'index-head.php';?>
    
    
    <?php include 'index-header.php';?>
    
    <div class="c-content-box c-size-md c-no-padding c-bg-white">
		<div class="c-content-feature-4">
			<div class="c-bg-parallax c-feature-bg c-content-right c-arrow c-border-left-white" style="background-image: url(img/banner.png)">
			</div>
			<div class="c-content-area c-content-left">
			</div>
			<div class="container">
				<div class="c-feature-content c-left">
					<div class="c-content-v-center">
						<div class="c-wrapper">
							<div class="c-body">
								<div class="c-content-title-1">
									<h3 class="c-font-uppercase c-font-bold c-left">Prenota il tuo esame</h3>
									<div class="c-line-left">
									</div>
									<p class="c-left">
										
									</p>
								</div>
								<div class="c-content">
									
										
									<form method="post" action="esame-action.php?action=<?php echo $action; ?>">
                                                                            <div class="form-group">
                                                                                <label for="id_certificazione">Certificazione: </label>
                                                                                <input type="text" name="id_certificazione" id="id_certificazione" value="<?php echo $id_certificazione; ?>" class="form-control">
                                                                             </div>
                                                                                <div class="form-group">
                                                                                   <label for="data">Data:</label>
                                                                                   <input type="date" name="data" id="data" value="<?php echo $data; ?>" class="form-control">
                                                                                </div>
                                                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                                    
                                                                                </form>
                                                                        
                                                                        
									
									<button class="btn btn-lg c-btn-green c-btn-square c-btn-bold">INVIA</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    
    
    
    
   
        <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
        
        
       
            
            
        

        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        </div>
        </div>
        
        
        <?php include 'calendario.php';?>
        
        
         <?php include 'index-footer.php';?>
    </body>
</html>