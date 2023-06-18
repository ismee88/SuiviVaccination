<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title"></li>
            <li class="active">
                <a href="{{route('admin')}}"><i class="fe fe-home"></i> <span>Tableau de bord</span></a>
            </li>
            <li class="submenu">
                <a href="#"><i class="fa fa-syringe"></i> <span> Vaccin</span> <span class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{route('vaccin.index')}}">Afficher vaccin</a></li>
                    <li><a href="{{route('vaccin.create')}}">Ajouter vaccin</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-vial-circle-check"></i> <span>Vaccination</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span>Gestion patient</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user-group"></i> <span>Gestion Personel de santé</span></a>
            </li>
            
        </ul>
    </div>
</div>