<!DOCTYPE html>
<?php
require_once "session.php";
require_once "Helpers.php";
require_once "Esame.php";
require_once "Certificazione.php";

//qui si salva solamente!!!!111
$action = "insert";

if (!empty($_POST)) {
    // keep track validation errors
    $id_certificazioneError = null;
    $nomeError = null;
    $descrizioneError = null;
    $dataError = null;

    // keep track post values
    $id_certificazione = $_POST['id_certificazione'];
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $data = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['data'])));

    // validate input
    $valid = true;

    if (empty($id_certificazione)) {
        $id_certificazioneError = 'Per favore seleziona la certificazione';
        $valid = false;
    }

    if (empty($nome)) {
        $nomeError = 'Per favore inserisci il nome';
        $valid = false;
    }

    if (empty($descrizione)) {
        $descrizioneError = 'Per favore inserisci la descrizione';
        $valid = false;
    }

    if (empty($data)) {
        $dataError = 'Per favore inserisci la data';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $esame = new Esame($id);
        $esame->setId_certificazione($id_certificazione);
        $esame->setNome($nome);
        $esame->setDescrizione($descrizione);
        $esame->setData($data);
        $esito = $esame->insert();  // In base all'id riempio l'oggetto
        if ($esito === false) {
            $_SESSION['messaggio'] = "notifyError('Impossibile continuare', 'Errore in fase di lettura dal DB.')";
            header("Location: backend-esame.php?q=all");
        } else {
            $_SESSION['messaggio'] = "notifySuccess('Operazione Completata', 'Esame salvato correttamente.')";
            header("Location: backend-esame.php?q=all");
        }
    }
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="it">
    <!--<![endif]-->
    <?php include 'backend-head.php' ?>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo" >
        <?php include 'backend-header.php' ?>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php include 'backend-sidebar.php' ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 1603px;">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Nuovo Esame
                                <small>creazione nuovo esame</small>
                            </h1>
                        </div>
                    </div>
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="backend.php">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Nuovo Esame</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Nuovo Esame</span>
                                    </div>
                                    <div class="portlet-body form">
                                        <form method="post" action="backend-esame-new-form.php">
                                            <div class="form-body">
                                            </div>
                                            <div class="form-body">
                                                <div class="form-group <?php echo!empty($nomeError) ? 'has-error' : ''; ?>">
                                                    <label for="nome">Nome</label>
                                                    <input type="text" 
                                                           name="nome"
                                                           minlenght="3"
                                                           maxlenght="100"
                                                           class="form-control" 
                                                           placeholder="Inserisci il nome..."> 
                                                    <?php if (!empty($nomeError)): ?><span class="help-block"><?php echo $nomeError; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group <?php echo!empty($descrizioneError) ? 'has-error' : ''; ?>">
                                                    <label for="descrizione">Descrizione</label>
                                                    <textarea class="form-control" 
                                                              id="descrizione" 
                                                              rows="3" 
                                                              minlength="10"
                                                              maxlength="255"
                                                              name="descrizione" 
                                                              placeholder="Inserisci la descrizione..."></textarea>
                                                    <?php if (!empty($descrizioneError)): ?><span class="help-block"><?php echo $descrizioneError; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group <?php echo!empty($id_certificazioneError) ? 'has-error' : ''; ?>">
                                                    <label>Certificazione</label>
                                                    <select name="id_certificazione" class="form-control">
                                                        <option value="" selected disabled>Seleziona Certificazione</option>
                                                        <?php
                                                        $listaCertificazioni = Certificazione::selectAll();
                                                        foreach ($listaCertificazioni as $certificazione) {
                                                            $id = $certificazione->getId(); // echo $some_var ? 'true': 'false';
                                                            $nomeCertificazione = $certificazione->getNome();
                                                            echo "<option value='$id'>$nomeCertificazione";
                                                            echo "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php if (!empty($id_certificazioneError)): ?><span class="help-block"><?php echo $id_certificazioneError; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group <?php echo!empty($dataError) ? 'has-error' : ''; ?>">
                                                    <label for="data">Data Esame</label>
                                                    <div class="form-group">
                                                        <input 
                                                            placeholder="Seleziona la data..." 
                                                            name="data"
                                                            class="form-control date-picker" 
                                                            size="16" 
                                                            type="text" 
                                                            value="">
                                                    </div>
                                                    <?php if (!empty($dataError)): ?><span class="help-block"><?php echo $dataError; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <input name="submit" type="submit" value="Salva" class="btn blue" />
                                                <a href="backend.php" type="button" class="btn default">Cancella</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
            <?php include 'backend-quick-sidebar.php' ?>
        </div>
        <!-- END CONTAINER -->
        <?php include 'backend-footer.php' ?>
    </body>
</html>