<div class="sidebar" data-background-color="brown" data-active-color="danger">
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            UF
        </a>

        <a href="/" class="simple-text logo-normal">
            UFINET
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default ps-active-x ps-active-y"
         data-ps-id="09443449-f7f7-e6cf-bafa-ff063f282ac0">
        <div class="user">
            <div class="photo">
                <img src="{{ Auth::user()->profile_pic}}">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
	                        <span>
                                <!-- todo - remove photo -->
								{{ Auth::user()->get_full_name() }}
		                        <b class="caret"></b>
							</span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="/Usuario/{{ Auth::user()->id }}">
                                <span class="sidebar-mini">Mp</span>
                                <span class="sidebar-normal">Mi Perfil</span>
                            </a>
                        </li>
                        <li>
                            <a href="/Usuario/{{ Auth::user()->id }}/edit">
                                <span class="sidebar-mini">Ep</span>
                                <span class="sidebar-normal">Editar Perfil</span>
                            </a>
                        </li>
                        <li>
                            <a href="/auth/logout">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Salir</span>
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
                <a data-toggle="collapse" href="#todas-las-entradas">
                    <i class="ti-import"></i>
                    <p>Entradas
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="todas-las-entradas">
                    <ul class="nav">
                        <li class="{{ Request::route()->getName() == 'Crear entrada por compra' ? 'active' : '' }}">
                            <a href="/Entrada/create">
                                <span class="sidebar-mini">PC</span>
                                <span class="sidebar-normal">Por compra</span>
                            </a>
                        </li>
                        <li class="{{ Request::route()->getName() == 'Crear entrada por desinstalación' ? 'active' : '' }}">
                            <a href="/Devolucion/create">
                                <span class="sidebar-mini">PD</span>
                                <span class="sidebar-normal">Por desinstalación</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#todas-las-salidas">
                    <i class="ti-export"></i>
                    <p>Salidas
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="todas-las-salidas">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-mini">PG</span>
                                <span class="sidebar-normal">Por gasto</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini">PD</span>
                                <span class="sidebar-normal">Por devoluci&oacute;n</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini">PD</span>
                                <span class="sidebar-normal">Por desecho</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ Request::route()->getName() == 'Todas las entradas' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#todas-las-traslados">
                    <i class="ti-share"></i>
                    <p>Traslados
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="todas-las-traslados">
                    <ul class="nav">
                        <li class="{{ Request::route()->getName() == 'Solicitud de traslado' ? 'active' : '' }}">
                                <a href="/Traslado/create">
                                    <span class="sidebar-mini">S</span>
                                    <span class="sidebar-normal">Solicitud</span>
                                </a>
                            </li>
                        <li class="{{ Request::route()->getName() == 'Todos los autorizaciones' ? 'active' : '' }}">
                            <a href="/Traslado">
                                <span class="sidebar-mini">A</span>
                                <span class="sidebar-normal">Autorizaciones</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ Request::route()->getName() == 'Ajuste' ? 'active' : '' }}">
                <a href="#">
                    <i class="ti-pencil-alt"></i>
                    <p>Ajuste</p>
                </a>
            </li>
            <li class="{{ Request::route()->getName() == 'Generar reporte' ? 'active' : '' }}">
                <a href="/Reporte">
                    <i class="ti-files"></i>
                    <p>Reportes</p>
                </a>
            </li>
            <li class="{{ Request::route()->getName() == 'Reporte de Inventario' ? 'active' : '' }}">
                <a href="/Reporte/Inventario">
                    <i class="ti-package"></i>
                    <p>Reporte de Inventario</p>
                </a>
            </li>
            <li {{ Request::route()->getName() == 'Admin' ? 'active' : '' }}>
                <a href="#">
                    <i class="ti-settings"></i>
                    <p>Administraci&oacute;n</p>
                </a>
            </li>
        </ul>
        <div class="ps-scrollbar-x-rail" style="width: 260px; left: 0px; bottom: 3px;">
            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 259px;"></div>
        </div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 370px; right: 3px;">
            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 188px;"></div>
        </div>
    </div>
</div>
