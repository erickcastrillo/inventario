<div class="sidebar" data-background-color="brown" data-active-color="danger">
  <div class="logo">
    <a href="/" class="simple-text logo-mini">
      UF
    </a>

    <a href="/" class="simple-text logo-normal">
      UFINET
    </a>
  </div>
  <div class="sidebar-wrapper ps-container ps-theme-default ps-active-x ps-active-y" data-ps-id="09443449-f7f7-e6cf-bafa-ff063f282ac0">
    <div class="user">
      <div class="photo">
        <img src="../../assets/img/faces/face-2.jpg">
      </div>
      <div class="info">
        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
	                        <span>
								Chet Faker
		                        <b class="caret"></b>
							</span>
        </a>
        <div class="clearfix"></div>

        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li>
              <a href="#profile">
                <span class="sidebar-mini">Mp</span>
                <span class="sidebar-normal">My Profile</span>
              </a>
            </li>
            <li>
              <a href="#edit">
                <span class="sidebar-mini">Ep</span>
                <span class="sidebar-normal">Edit Profile</span>
              </a>
            </li>
            <li>
              <a href="#settings">
                <span class="sidebar-mini">S</span>
                <span class="sidebar-normal">Settings</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav">

      <li class="{{ Request::route()->getName() == 'Dashboard' ? 'active' : '' }}">
        <a href="/">
          <i class="ti-home"></i>
          <p>Inicio</p>
        </a>
      </li>
      <li class="{{ Request::route()->getName() == 'Todas las entradas' ? 'active' : '' }}">
        <a data-toggle="collapse" href="#dashboardOverview">
          <i class="ti-import"></i>
          <p>Entradas
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="dashboardOverview">
          <ul class="nav">
            <li>
              <a href="/Entrada">
                <span class="sidebar-mini">T</span>
                <span class="sidebar-normal">Todas</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="sidebar-mini">C</span>
                <span class="sidebar-normal">Compra</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="sidebar-mini">D</span>
                <span class="sidebar-normal">Devoluci&oacute;n</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="{{ Request::route()->getName() == 'Todas las  salidas' ? 'active' : '' }}">
        <a href="#">
          <i class="ti-export"></i>
          <p>Salidas</p>
        </a>
      </li>
      <li class="{{ Request::route()->getName() == 'Traslado' ? 'active' : '' }}">
        <a href="#">
          <i class="ti-share"></i>
          <p>Solicitud de traslado</p>
        </a>
      </li>
      <li {{ Request::route()->getName() == 'Ajuste' ? 'active' : '' }}>
        <a href="#">
          <i class="ti-pencil-alt"></i>
          <p>Ajuste</p>
        </a>
      </li>
      <li class="{{ Request::route()->getName() == 'Reporte' ? 'active' : '' }}">
        <a href="#">
          <i class="ti-files"></i>
          <p>Reportes</p>
        </a>
      </li>
      <li {{ Request::route()->getName() == 'Admin' ? 'active' : '' }}>
        <a href="#">
          <i class="ti-settings"></i>
          <p>Administraci&oacute;n</p>
        </a>
      </li>
    </ul>
    <div class="ps-scrollbar-x-rail" style="width: 260px; left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 259px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 370px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 188px;"></div></div></div>
</div>