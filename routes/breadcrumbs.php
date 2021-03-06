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

// Contribuyentes
Breadcrumbs::register('contribuyentes', function ($trail) {
    $trail->parent('home');
    $trail->push('Contribuyentes', route('contribuyentes.index'));
});
Breadcrumbs::register('contribuyentescreate', function ($trail) {
    $trail->parent('contribuyentes');
    $trail->push('Nuevo', route('contribuyentes.create'));
});
Breadcrumbs::register('contribuyentesedit', function ($trail) {
    $trail->parent('contribuyentes');
    $trail->push('Edicion', route('contribuyentes.index'));
});

// Areas
Breadcrumbs::register('areas', function ($trail) {
    $trail->parent('home');
    $trail->push('Areas', route('areas.index'));
});
Breadcrumbs::register('areascreate', function ($trail) {
    $trail->parent('areas');
    $trail->push('Nuevo', route('areas.create'));
});
Breadcrumbs::register('areasedit', function ($trail) {
    $trail->parent('areas');
    $trail->push('Edicion', route('areas.index'));
});