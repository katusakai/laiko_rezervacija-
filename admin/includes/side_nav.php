<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php?siandien=&data=<?php echo date('Y-m-d') ?>&search_submit="><i class="fa fa-fw fa-dashboard"></i> Šiandienos rezervacijos</a>
        </li>
        <li>
            <a href="index.php?siandien=&data=<?php echo date('Y-m-d',time()+60*60*24) ?>&search_submit="><i class="fa fa-fw fa-step-forward"></i> Rytojaus rezervacijos</a>
        </li>
		 <li>
            <a href="index.php?url=rezervacija"><i class="fa fa-fw fa-list"></i> Rezervacijų sąrašas</a>
        </li>
        <li>
            <a href="create_rezervacija.php"><i class="fa fa-fw fa-plus"></i> Rezervuoti nauja</a>
        </li>
        <li>
            <a href="index.php?url=darbuotojai"><i class="fa fa-fw fa-users"></i> Darbuotojai</a>
        </li>
    </ul>
</div>
