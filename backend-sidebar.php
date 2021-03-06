<?php
require_once 'session.php';
?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start 
            <?php
            if ($_SESSION['activePage'] === "backend.php")
                :
                ?>active open<?php endif; ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <!--<span class="selected"></span> -->
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start <?php if ($_SESSION['activePage'] === "backend.php"): ?>active open<?php endif; ?>"> 
                        <a href="backend.php" class="nav-link ">
                            <i class="icon-star"></i>
                            <span class="title">Cruscotto</span>
                            <span <?php if ($_SESSION['activePage'] === "backend.php"): ?>class="selected"<?php endif; ?>></span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="index.php" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title">Homepage</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Utilità</h3>
            </li>
            <?php if ($_SESSION['amministratore'] == 1) { ?>
                <li class="nav-item  
                <?php
                if (($_SESSION['activePage'] === "backend-esame-new-form.php") OR
                ($_SESSION['activePage'] === "backend-esame.php?q=todo") OR
                ($_SESSION['activePage'] === "backend-esame.php?q=done") OR    
                ($_SESSION['activePage'] === "backend-esame.php?q=all") 
                ) :
                ?>active open<?php endif; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-docs"></i>
                        <span class="title">Esami</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu <?php if ($_SESSION['activePage'] === "backend-esame-new-form.php"): ?>active open<?php endif; ?>">
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-esame-new-form.php"): ?>active open<?php endif; ?> ">
                            <a href="backend-esame-new-form.php" class="nav-link ">
                                <i class="icon-plus"></i>
                                <span class="title">Nuovo Esame</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-esame.php?q=todo"): ?>active open<?php endif; ?> ">
                            <a href="backend-esame.php?q=todo" class="nav-link ">
                                <i class="icon-calendar"></i>
                                <span class="title">In Programma</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-esame.php?q=done"): ?>active open<?php endif; ?> ">
                            <a href="backend-esame.php?q=done" class="nav-link ">
                                <i class="icon-check"></i>
                                <span class="title">Svolti</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-esame.php?q=all"): ?>active open<?php endif; ?> ">
                            <a href="backend-esame.php?q=all" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Visualizza Tutti</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  
                <?php
                if (($_SESSION['activePage'] === "backend-certificazione-form.php?action=insert") OR
                ($_SESSION['activePage'] === "backend-certificazione.php") 
                ) :
                ?>active open<?php endif; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-badge"></i>
                        <span class="title">Certificazioni</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-certificazione-form.php?action=insert"): ?>active open<?php endif; ?> ">
                            <a href="backend-certificazione-form.php?action=insert" class="nav-link ">
                                <i class="icon-plus"></i>
                                <span class="title">Nuova Certificazione</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-certificazione.php"): ?>active open<?php endif; ?> ">
                            <a href="backend-certificazione.php" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Visualizza Tutti</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  
                <?php
                if (($_SESSION['activePage'] === "backend-organizzazione-form.php?action=insert") OR
                ($_SESSION['activePage'] === "backend-organizzazione.php") 
                ) :
                ?>active open<?php endif; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">Organizzazioni</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-organizzazione-form.php?action=insert"): ?>active open<?php endif; ?> ">
                            <a href="backend-organizzazione-form.php?action=insert" class="nav-link ">
                                <i class="icon-plus"></i>
                                <span class="title">Nuova Organizzazione</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-organizzazione.php"): ?>active open<?php endif; ?> ">
                            <a href="backend-organizzazione.php" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Visualizza Tutti</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  
                <?php
                if ($_SESSION['activePage'] === "backend-messaggistica.php") :
                ?>active open<?php endif; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-emoticon-smile"></i>
                        <span class="title">Messaggistica</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-messaggistica.php"): ?>active open<?php endif; ?> ">
                            <a href="backend-messaggistica.php" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Visualizza Tutti</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  
                <?php
                if (($_SESSION['activePage'] === "backend-utente.php") OR
                   ($_SESSION['activePage'] === "backend-utente-form.php?action=update&id=" . $_SESSION['idUtente'] . "")
                ):
                ?>active open<?php endif; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">Utenti</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-utente-form.php?action=update&id=" . $_SESSION['idUtente'] . ""): ?>active open<?php endif; ?> ">
                            <a href="backend-utente-form.php?action=update&id=<?php echo $_SESSION['idUtente']; ?>" class="nav-link ">
                                <i class="icon-folder"></i>
                                <span class="title">Il Mio Profilo</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-utente.php"): ?>active open<?php endif; ?> ">
                            <a href="backend-utente.php" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Visualizza Tutti</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($_SESSION['amministratore'] == 0) { ?>
                <li class="nav-item  
                <?php
                if (($_SESSION['activePage'] === "backend-esame.php?q=book") OR
                ($_SESSION['activePage'] === "backend-esame.php?q=todo") OR
                ($_SESSION['activePage'] === "backend-esame.php?q=done") 
                ) :
                ?>active open<?php endif; ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-docs"></i>
                        <span class="title">Esami</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-esame.php?q=todo"): ?>active open<?php endif; ?> ">
                            <a href="backend-esame.php?q=todo" class="nav-link ">
                                <i class="icon-calendar"></i>
                                <span class="title">In Programma</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-esame.php?q=done"): ?>active open<?php endif; ?> ">
                            <a href="backend-esame.php?q=done" class="nav-link ">
                                <i class="icon-check"></i>
                                <span class="title">Svolti</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-esame.php?q=book"): ?>active open<?php endif; ?> ">
                            <a href="backend-esame.php?q=book" class="nav-link ">
                                <i class="icon-call-in"></i>
                                <span class="title">Prenota Esame</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php
                if ($_SESSION['activePage'] === "backend-messaggistica.php")
                :
                ?>active open<?php endif; ?> ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-emoticon-smile"></i>
                        <span class="title">Messaggistica</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item <?php if ($_SESSION['activePage'] === "backend-messaggistica.php"): ?>active open<?php endif; ?> ">
                            <a href="backend-messaggistica.php" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Visualizza Tutti</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->