<?php

// Routes App admin

$this->router->add('login', '/admin/login', 'LoginController:form');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');
