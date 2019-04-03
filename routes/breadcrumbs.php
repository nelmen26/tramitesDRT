<?php

// Inicio
Breadcrumbs::register('home', function ($trail) {
    $trail->push('Principal', route('home'));
});

// Usuarios
Breadcrumbs::register('users', function ($trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('users.index'));
});
Breadcrumbs::register('userscreate', function ($trail) {
    $trail->parent('users');
    $trail->push('Nuevo', route('users.create'));
});
Breadcrumbs::register('usersedit', function ($trail) {
    $trail->parent('users');
    $trail->push('Edicion', route('users.index'));
});
// Perfil
Breadcrumbs::register('perfil', function ($trail) {
    $trail->parent('home');
    $trail->push('Perfil', route('users.perfil'));
});

// Roles
Breadcrumbs::register('roles', function ($trail) {
    $trail->parent('home');
    $trail->push('Roles', route('roles.index'));
});
Breadcrumbs::register('rolescreate', function ($trail) {
    $trail->parent('roles');
    $trail->push('Nuevo', route('roles.create'));
});
Breadcrumbs::register('rolesedit', function ($trail) {
    $trail->parent('roles');
    $trail->push('Edicion', route('roles.index'));
});

// Empresa
Breadcrumbs::register('empresas', function ($trail) {
    $trail->parent('home');
    $trail->push('Empresa', route('empresas.index'));
});